<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SmsController extends Controller
{
    public function index()
    {
    	return view('index');
    }

    public function store(Request $request)
    {
    	$validated = $this->validate($request, [
    		'message' => ['required', 'string', 'max:250'],
    	]);

    	if ($code = sms_code($validated['message'])) {
    		session()->flash('success_code', $code);
    	} else {
    		session()->flash('failure_code');
    	}

    	return redirect()->back();
    }
}
