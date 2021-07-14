<?php

namespace App\Http\Controllers;
use App\Registration;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $registrations = Registration::where('year_level', '=', 1)->count();
        return view('home', compact('registrations'));
    }

    public function fyear()
    {
        $fyear = Registration::where('year_level', '=', 1)->get();
        return view('registrations.fyear', compact('fyear'));
    }
}
