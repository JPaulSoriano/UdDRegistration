<?php

namespace App\Http\Controllers;
use App\Registration;
use App\Course;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:register-list|register-create|register-edit|register-delete', ['only' => ['index']]);
         $this->middleware('permission:register-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $registrations = Registration::all();
        return view('registrations.index',compact('registrations'));
    }

    public function create()
    {
        $courses = Course::all();
        return view('registrations.create', compact('courses'));
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'year' => 'required',
            'semester' => 'required',
            'stud_type' => 'required',
            'stud_no' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'middle_name' => 'nullable',
            'course_id' => 'required',
            'year_level' => 'required',
            'phone' => 'required',
            'email' => 'required|unique:registrations,email',
            'last_school' => 'required',
            'payment_method' => 'nullable',
            'payment_ref' => 'nullable|unique:registrations,payment_ref',
            'image' => 'nullable',
            'auth_first_name' => 'nullable',
            'auth_last_name' => 'nullable',
            'auth_middle_name' => 'nullable'
        ]);
  
        $input = $request->all();
  
        if ($image = $request->file('image')) {
            $image = $request->image->store('images', 'public');
            $input['image'] = "$image";
        }

        $input['reg_ref'] = mt_rand(1000000000, 9999999999);

    
        $registration = Registration::create($input);



    
        return redirect()->route('registrations.show', $registration)->with('success','Registration Success');
    }

    public function show(Registration $registration){
        return view('registrations.show', compact('registration'));
    }

    public function edit(Registration $registration)
    {
        return view('registrations.edit',compact('registration'));
    }



    public function update(Request $request, Registration $registration)
    {
        $request->validate([
            'image' => 'required',
            'payment_method' => 'required',
            'payment_ref' => 'required|unique:registrations,payment_ref'
        ]);
  
        $input = $request->all();
  
        if ($image = $request->file('image')) {

            $image = $request->image->store('images', 'public');
            $input['image'] = "$image";

        }else{
            unset($input['image']);
        }
          
        $registration->update($input);
    
        return redirect('/')->with('success','Payment Success');
    }


    public function unverify(Registration $registration)
    {
        $registration->status = '0';
        $registration->save();

        return redirect()->route('registrations.index');
    }

    public function verify(Registration $registration)
    {
        $registration->status = '1';
        $registration->save();

        return redirect()->route('registrations.index');
    }


    public function unadmit(Registration $registration)
    {
        $registration->status_admission = '0';
        $registration->save();

        return redirect()->route('registrations.index');
    }

    public function admit(Registration $registration)
    {
        $registration->status_admission = '1';
        $registration->save();

        return redirect()->route('registrations.index');
    }


    public function unenroll(Registration $registration)
    {
        $registration->status_enrollment = '0';
        $registration->save();

        return redirect()->route('registrations.index');
    }

    public function enroll(Registration $registration)
    {
        $registration->status_enrollment = '1';
        $registration->save();

        return redirect()->route('registrations.index');
    }
}
