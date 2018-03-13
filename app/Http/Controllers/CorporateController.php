<?php

namespace App\Http\Controllers;

use App\Events\Corporate\CorporateStatusChanged;
use App\Events\Corporate\CorporateInfoChanged;
use App\Events\Corporate\CorporateCreated;
use App\Corporate;
use App\Industry;
use Illuminate\Http\Request;

class CorporateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $corporates = Corporate::all();
        return view('corporates.index', compact('corporates'));
    }

    public function create()
    {
        $industries = Industry::all();
        return view('corporates.create', compact('industries'));
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'card_name' => 'required',
            'philhealth_no' => 'required',
            'acceptance_age' => 'required',
            'termination_age' => 'required',
            'business_address' => 'required',
            'date_effectivity_from' => 'required',
            'billing_due_date' => 'required',
            'contact_person_name' => 'required',
            'contact_person_designation' => 'required',
            'hr_email' => 'required',
            'tin' => 'required|unique:corporates',
            'revolving_fund' => 'required',
            'threshold' => 'required',
        ];

        if ($request->industry == 'Others') {
            $rules['industry_others'] = 'required';
        }

        $request->validate($rules);

        $corporate = Corporate::createFromRequest($request);

        event(new CorporateCreated($corporate));

        session()->flash('notify', [
            'message' => 'Corporate Enrollment Successful!',
            'type' => 'success'
        ]);

        return redirect()->route('corporates.index');
    }

    public function show(Corporate $corporate)
    {
        $corporate->load(['corporateLogs', 'corporateFundHistories']);
        return view('corporates.show', compact('corporate'));
    }

    public function edit(Corporate $corporate)
    {
        $industries = Industry::all();
        return view('corporates.edit', compact('corporate', 'industries'));
    }

    public function update(Request $request, Corporate $corporate)
    {
        $request->validate([
            'name' => 'required',
            'card_name' => 'required',
            'philhealth_no' => 'required',
            'acceptance_age' => 'required',
            'termination_age' => 'required',
            'business_address' => 'required',
            'contact_person_name' => 'required',
            'contact_person_designation' => 'required',
            'hr_email' => 'required',
            'tin' => 'required|unique:corporates,tin,' . $corporate->id,
            'threshold' => 'required',
        ]);

        $corporate->updateFromRequest($request);

        event(new CorporateInfoChanged($corporate));

        session()->flash('notify', [
            'message' => 'Corporate Profile has been updated!',
            'type' => 'success',
        ]);

        return redirect()->route('corporates.index');
    }

    public function action(Request $request, Corporate $corporate)
    {
        $corporateAction = $corporate->corporateActions()->create([
            'status' => $request->status,
            'effective_immediately' => $request->effective_immediately ?: 0,
            'effective_date' => $request->effective_date,
            'reason' => $request->reason,
            'remarks' => $request->remarks,
            'created_by' => auth()->user()->id,
        ]);

        if ($corporateAction->effective_immediately) {
            $corporate->update([
                'status' => $corporateAction->status,
            ]);

            event(new CorporateStatusChanged($corporate));
        }

        session()->flash('notify', [
            'message' => 'Corporate status has been updated!',
            'type' => 'success',
        ]);

        return redirect()->route('corporates.index');
    }

    public function addFund(Request $request, Corporate $corporate)
    {
        $fund = str_replace(['₱ ', ','], '', $request->fund);
        $corporate->debitFund($fund, 'Add Fund');

        session()->flash('notify', [
            'message' => 'Fund successfully added.',
            'type' => 'success',
        ]);

        return redirect()->route('corporates.show', $corporate->id);
    }

    public function printDocument(Request $request, Corporate $corporate)
    {
        $pdf = \PDF::loadView('corporates.corporate-enrollment-form', compact('corporate'))
                    ->setPaper('legal', 'portrait');

        return $pdf->stream('corporate-enrollment-form.pdf');
    }
}
