<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

class SendEmailController extends Controller
{
    //
    function index()
    {
    	return view('send_email');
    }

    function send(Request $request)
    {
    	$this->validate($request, [
    		'name'		=>		'required',
    		'email'		=>		'required|email',
    		'topic'		=>		'required',
    		'message'	=>		'required'
    	]);
    	$data = array(
    		'name'		=> $request->name,
    		'topic'		=> $request->topic,
    		'message'	=> $request->message

    	);

    	Mail::to('6010110680@psu.ac.th')->send(new SendMail($data));
    	return back()->with('success', 'Your email has been sent.');
    }
} 
