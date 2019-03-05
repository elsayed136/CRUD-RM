<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;
//To make Toastr class for easy callback
use Brian2694\Toastr\Facades\Toastr;
use App\Reservation;

class ReservationController extends Controller
{
    public function reserve(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name'          =>'required',
            'email'         =>'required|email',
            'phone'         =>'required',
            'dateandtime'   =>'required'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $reservation = new Reservation;
        $reservation->name = $request->name;
        $reservation->email = $request->email;
        $reservation->phone = $request->phone;
        $reservation->date_and_time = $request->dateandtime;
        $reservation->message = $request->message;
        $reservation->status = false;
        $reservation->save();
        Toastr::success('Reservation request send successfully. we will confirm to you shortly','Success' ,["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }
}
