<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Provider;
use App\ProviderAction;
use App\Physician;
use App\PhysicianProvider;

class ProviderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $providers = Provider::with(['addressProvince', 'providerLogs'])
                        ->orderBy('id', 'desc')
                        ->get();

        return view('providers.index', compact('providers'));
    }

    public function create()
    {
        $providers = Provider::select('id', 'name', 'tin')->get();
        return view('providers.create', compact('providers'));
    }

    public function store(Request $request)
    {
        if ($request->tin_from_existing_provider) {
            $validatedProvider = $request->validate([
                'id' => 'nullable|unique:providers',
                'name' => 'required|max:255',
                'business_type' => 'required',
                'accreditation_status' => 'required',
            ]);
        } else {
            $validatedProvider = $request->validate([
                'id' => 'nullable|unique:providers',
                'name' => 'required|max:255',
                'business_type' => 'required',
                'accreditation_status' => 'required',
                'tin' => 'required|unique:providers',
            ]);
        }

        Provider::createFromRequest($request);

        session()->flash('notify', [
            'message' => 'Provider Enrollment Successful!',
            'type' => 'success'
        ]);

        return redirect()->route('providers.index');
    }

    public function show(Provider $provider)
    {
        $provider->load(['physicians', 'providerLogs']);
        return view('providers.show', compact('provider'));
    }

    public function edit(Provider $provider)
    {
        $providers = Provider::select('id', 'name', 'tin')->get();
        $physicians = Physician::whereNotIn('id', $provider->physicians->pluck('id'))
                        ->get();

        return view('providers.edit', compact('provider', 'physicians', 'providers'));
    }

    public function update(Request $request, Provider $provider)
    {
        if ($request->tin_from_existing_provider) {
            $validatedProvider = $request->validate([
                'id' => 'nullable|unique:providers',
                'name' => 'required|max:255',
                'business_type' => 'required',
                'accreditation_status' => 'required',
            ]);
        } else {
            $validatedProvider = $request->validate([
                'id' => 'nullable|unique:providers',
                'name' => 'required|max:255',
                'business_type' => 'required',
                'accreditation_status' => 'required',
                'tin' => 'required|unique:providers',
            ]);
        }

        if ($physicians = $request->physician) {
            foreach ($physicians as $key => $physicianId) {
                if ($physicianId) {
                    $physicianProvider = PhysicianProvider::where('physician_id', $physicianId)
                                            ->where('provider_id', $provider->id)
                                            ->first();

                    if (! $physicianProvider) {
                        $physicianProvider = PhysicianProvider::create([
                            'physician_id' => $physicianId,
                            'provider_id' => $provider->id,
                            'room_no' => $request->room_no[$key],
                            'schedule' => $request->schedule[$key],
                        ]);

                        // Log the affiliation of physician to provider
                        $provider->logAffiliatePhysician(
                            $physicianProvider->physician
                        );
                    }
                }

            }
        }

        $provider->updateFromRequest($request);

        session()->flash('notify', [
            'message' => 'Provider Profile has been updated!',
            'type' => 'success'
        ]);

        return redirect()->route('providers.index');
    }

    public function action(Request $request, Provider $provider)
    {
        $providerAction = $provider->providerActions()->create([
            'status' => $request->status,
            'effective_immediately' => $request->effective_immediately ?: 0,
            'effectivity_date' => $request->effectivity_date,
            'reason' => $request->reason,
            'remarks' => $request->remarks,
            'created_by' => auth()->user()->id,
        ]);

        if ($providerAction->effective_immediately) {
            $provider->update([
                'accreditation_status' => $providerAction->status,
            ]);

            $provider->logChangeAccreditationStatus(
                $providerAction->status, $providerAction->created_by
            );
        }

        session()->flash('notify', [
            'message' => 'Provider status has been updated!',
            'type' => 'success'
        ]);

        return redirect()->route('providers.index');
    }

    public function printDocument(Request $request, Provider $provider)
    {
        $provider->load('providerContactPersons');
        $pdf = \PDF::loadView('providers.provider-enrollment-form', compact('provider'))
                    ->setPaper('legal', 'portrait');

        return $pdf->stream('provider-enrollment-form.pdf');
    }
}
