<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Provider;
use App\ProviderAction;
use App\Address;

class ProviderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $providers = Provider::with(['addressProvince'])->orderBy('id', 'desc')->get();
        return view('providers.index', compact('providers'));
    }

    public function create()
    {
        $addresses = Address::all();
        return view('providers.create', compact('addresses'));
    }

    public function store(Request $request)
    {
        $validatedProvider = $request->validate([
            'id' => 'nullable|unique:providers',
            'name' => 'required|max:255',
            'business_type' => 'required',
            'accreditation_status' => 'required',
        ]);

        Provider::createFromRequest($request);

        session()->flash('notify', ['message' => 'Provider Enrollment Successful!', 'type' => 'success']);

        return redirect()->route('providers.index');
    }

    public function show(Provider $provider)
    {
        return view('providers.show', compact('provider'));
    }

    public function edit(Provider $provider)
    {
        $addresses = Address::all();
        return view('providers.edit', compact('provider', 'addresses'));
    }

    public function update(Request $request, Provider $provider)
    {
        $validatedProvider = $request->validate([
            'id' => 'nullable|unique:providers',
            'name' => 'required|max:255',
            'business_type' => 'required',
            'accreditation_status' => 'required',
        ]);

        $provider->updateFromRequest($request);

        session()->flash('notify', ['message' => 'Provider Profile has been updated!', 'type' => 'success']);

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

            $provider->logChangeAccreditationStatus($providerAction->status, $providerAction->created_by);
        }

        session()->flash('notify', ['message' => 'Provider status has been updated!', 'type' => 'success']);

        return redirect()->route('providers.index');
    }
}
