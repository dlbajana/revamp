<?php

namespace App\Http\Controllers;

use App\Provider;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $providers = Provider::all();
        return view('providers.index', compact('providers'));
    }

    public function create()
    {
        return view('providers.create');
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
        return view('providers.edit', compact('provider'));
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
}
