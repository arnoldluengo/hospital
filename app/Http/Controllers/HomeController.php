<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use illuminate\Support\Facades\Auth;

use App\Models\User;

use App\Models\Doctor;

use App\Models\Appointment;


class HomeController extends Controller
{
    public function redirect ()
    {

    if(Auth::id())
    {
        if(Auth::user()->usertype=='0')
        {
            $doctor = doctor::all();
            return view('user.home',compact('doctor'));
        }

        else

        {
            return view('admin.home');
        }
    }
        else
        {
            return redirect()->back();
        }
    }

    public function index()
    {
        if(Auth::id())
        {
            return redirect()->route('home');
        }
        else
        {
            $doctor = doctor::all();
            return view('user.home',compact('doctor'));
        }
    }

    public function appointment(Request $request)
    {
        $data = new appointment;
        $data->name = $request->name;
        $data->email = $request->email;
        
        // Combine date and time
        $date = $request->date;
        if ($request->has('selected_time') && !empty($request->selected_time)) {
            $date .= ' ' . $request->selected_time;
        }
        $data->date = $date;
        
        $data->phone = $request->number;
        $data->message = $request->message;
        $data->doctor = $request->doctor;
        $data->status = 'In Progress';

        if(Auth::id())
        {
            $data->user_id = Auth::user()->id;
        }

        $data->save();

        return redirect()->back()->with('message','Appointment Request Successful. We will contact you soon');
    }

    public function myappointment()
    {
        if(Auth::id())
        {

            if(Auth::user()->usertype == 0)

            {

                $userid = Auth::user()->id;
            $appoint = appointment::where('user_id',$userid)->get();
            return view('user.my_appointment',compact('appoint'));


            }
            
        }
        else
        {
            return redirect()->back();
        }
    }

    public function cancel_appoint($id)
    {
        $data = appointment::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function about()
    {
        return view('user.about');
    }

    public function doctors()
    {
        $doctor = doctor::all();
        return view('user.doctor', compact('doctor'));
    }

    public function news()
    {
        return view('user.latest');
    }

    public function contact()
    {
        return view('user.contact');
    }

    public function showAppointmentForm()
    {
        $doctor = doctor::all();
        return view('user.appointment_direct', compact('doctor'));
    }
}
