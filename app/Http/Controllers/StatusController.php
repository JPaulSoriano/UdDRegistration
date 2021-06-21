<?php

namespace App\Http\Controllers;
use App\Registration;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function status(Request $request){
        // Get the search value from the request
        $search = $request->input('status');
    
        // Search in the title and body columns from the posts table
        $registrations = Registration::query()
            ->where('reg_ref', '=', "{$search}")
            ->get();
    
        // Return the search view with the resluts compacted
        return view('status.index', compact('registrations'));
    }
}
