<?php

namespace App\Http\Controllers;

use App\RVU;
use Illuminate\Http\Request;

class RVUController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('rvu.index');
    }
}
