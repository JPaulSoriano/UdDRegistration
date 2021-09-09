<?php

namespace App\Http\Controllers;
use App\Registration;
use App\Course;
use App\Department;
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
        $courses = Course::all();
        $departments = Department::all();

        $fyear = Registration::where('year_level', '=', 1)->count();
        $rtoday = Registration::whereDate('created_at', '=', date('Y-m-d'))->count();
        $total = Registration::all()->count();
        $verified = Registration::where('status', '=', '0')->count();
        $admission = Registration::where('status_admission', '=', '0')->count();
        $enrollment = Registration::where('status_enrollment', '=', '0')->count();
        $screenshot = Registration::whereNull('image')->count();
        
        return view('home', compact('fyear', 'rtoday', 'total', 'verified', 'admission', 'enrollment', 'screenshot', 'courses','departments'));
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

    public function total()
    {
        $total = Registration::all();
        return view('registrations.total', compact('total'));
    }


    public function verified()
    {
        $verified = Registration::where('status', '=', '0')->get();
        return view('registrations.verified', compact('verified'));
    }

    public function admission()
    {
        $admission = Registration::where('status_admission', '=', '0')->get();
        return view('registrations.admission', compact('admission'));
    }

    public function enrollment()
    {
        $enrollment = Registration::where('status_enrollment', '=', '0')->get();
        return view('registrations.enrollment', compact('enrollment'));
    }


    public function screenshot()
    {
        $screenshot = Registration::whereNull('image')->get();
        return view('registrations.screenshot', compact('screenshot'));
    }
    

}
