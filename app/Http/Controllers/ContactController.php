<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
//To make Toastr class for easy callback
use Brian2694\Toastr\Facades\Toastr;
use App\Contact;

class ContactController extends Controller
{
    public function sendMessage(Request $request){
        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required|email',
            'subject'=>'required',
            'message'=>'required',
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }
        $contact = new Contact;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
        $contact->save();
        Toastr::success('Your message successfully send','Success',['positionClass'=>'toast-top-right']);
        return redirect()->back();
    }
}
