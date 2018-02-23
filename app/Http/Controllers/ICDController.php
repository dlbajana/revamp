<?php

namespace App\Http\Controllers;

use App\ICD;
use App\SSP;
use Illuminate\Http\Request;

class ICDController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('icd.index');
    }
}
