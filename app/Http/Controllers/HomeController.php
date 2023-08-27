<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Appointment;

class HomeController extends Controller
{
    public function home(){
        if(Auth::id()){
            if(Auth::user()->usertype=='0'){
                $doctor=doctor::all();
                return view('user.home',compact('doctor'));
    
    
    
            }
            else{
                return view('admin.home');
            }

        }
        else{
            return redirect()->back();
        }

        
    }
    public function index(){
        if(Auth::id()){
            return redirect('home');
        }
        else{
            $doctor=doctor::all();
            return view('user.home',compact('doctor'));

        }
        
    }
    public function appointment(Request $request){

        $data=new appointment;
        $data->name=$request->name;
        $data->email=$request->email;
        $data->phone=$request->number;
        $data->date=$request->date;
        $data->doctor=$request->doctor;
        $data->message=$request->message;
        $data->status='In progress';
        if(Auth::id()){
            $data->user_id=Auth::user()->id;

        }
        $data->save();
        return redirect()->back()->with('message','Appointment request received, we will contact yoy soon');
        


    }
    public function myappointments(){
        if(Auth::id()){
            $userid=Auth::user()->id;
            $appoint=appointment::where('user_id',$userid)->get();

            return view('user.my_appointments',compact('appoint'));

        }
        else{
            return redirect()->back();
        }
        
    }
    public function cancel_appoint($id){
        $data=appointment::find($id);
        $data->delete();
        return redirect()->back();

    }
    
}
