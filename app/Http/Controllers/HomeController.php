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
        $fyear = Registration::where('year_level', '=', 1)->count();
        $rtoday = Registration::whereDate('created_at', '=', date('Y-m-d'))->count();
        $total = Registration::all()->count();
        return view('home', compact('fyear', 'rtoday', 'total'));
    }

    public function fyear()
    {
        $fyear = Registration::where('year_level', '=', 1)->get();
        return view('registrations.fyear', compact('fyear'));
    }

    public function rtoday()
    {
        $rtoday = Registration::whereDate('created_at', '=', date('Y-m-d'))->get();
        return view('registrations.rtoday', compact('rtoday'));
    }


}
