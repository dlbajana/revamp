<?php

namespace App\Http\Controllers;

use App\Physician;
use App\Specialization;
use App\Nationality;
use Illuminate\Http\Request;

class PhysicianController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $physicians = Physician::orderBy('id', 'desc')->get();
        return view('physicians.index', compact('physicians'));
    }

    public function create()
    {
        $specializations = Specialization::all();
        $nationalities = Nationality::all();

        return view('physicians.create', compact(
            'specializations', 'nationalities'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'tin' => 'required|unique:physicians',
        ]);

        Physician::createFromRequest($request);

        session()->flash('notify', [
            'message' => 'Physician Enrollment Successful!',
            'type' => 'success'
        ]);

        return redirect()->route('physicians.index');
    }

    public function show(Physician $physician)
    {
        return view('physicians.show', compact('physician'));
    }

    public function edit(Physician $physician)
    {
        $specializations = Specialization::all();
        $nationalities = Nationality::all();

        return view('physicians.edit', compact(
            'physician', 'specializations', 'nationalities'
        ));
    }

    public function update(Request $request, Physician $physician)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'tin' => 'required|unique:physicians,tin,' . $physician->id,
        ]);

        $physician->updateFromRequest($request);

        session()->flash('notify', [
            'message' => 'Physician Profile has been updated!',
            'type' => 'success'
        ]);

        return redirect()->route('physicians.index');
    }

    public function action(Physician $physician, Request $request)
    {
        $physicianAction = $physician->physicianActions()->create([
            'status' => $request->status,
            'effective_immediately' => $request->effective_immediately ?: 0,
            'effectivity_date' => $request->effectivity_date,
            'reason' => $request->reason,
            'remarks' => $request->remarks,
            'created_by' => auth()->user()->id,
        ]);

        if ($physicianAction->effective_immediately) {
            $physician->update([
                'accreditation_status' => $physicianAction->status,
            ]);

            $physician->logChangeAccreditationStatus(
                $physicianAction->status, $physicianAction->created_by
            );
        }

        session()->flash('notify', [
            'message' => 'Physician status has been updated!',
            'type' => 'success'
        ]);

        return redirect()->route('physicians.index');
    }
}
