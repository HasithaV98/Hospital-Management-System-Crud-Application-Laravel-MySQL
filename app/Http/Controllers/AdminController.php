<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Appointment;
use Notification;
use App\Notifications\SendMailNotification;


class AdminController extends Controller
{
    public function addDoctors(){

        return view('admin.add_doctors');

    }
    public function upload(Request $reruest){
        $doctor=new doctor;
        $image=$reruest->file;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $reruest->file->move('doctorimage',$imagename);
        $doctor->image=$imagename;

        $doctor->name=$reruest->name;
        $doctor->phone=$reruest->phone;
        $doctor->speciality=$reruest->speciality;
        $doctor->room=$reruest->room;

        $doctor->save();
        return redirect()->back()->with('message','Doctor Added Susscessfully');





    }
    public function showappointments(){
        $data=appointment::all();
        return view('admin.showappointments',compact('data'));
    }
    public function approved($id){
        $data=appointment::find($id);
        $data->status='approved';
        $data->save();
        return redirect()->back();

    }
    public function canceled($id){
        $data=appointment::find($id);
        $data->status='canceled';
        $data->save();
        return redirect()->back();
    }
    public function doctorshows(){
        $data=doctor::all();
        return view('admin.doctorshows',compact('data'));
    }
    public function deletedoctor($id){
        $data=doctor::find($id);
        $data->delete();
        return redirect()->back();
    }
    public function updatedoctor($id){
        $data=doctor::find($id);
        return view('admin.updatedoctor',compact('data'));
    }
    public function editdoctor(Request $request, $id){
        $doctor=doctor::find($id);
        $doctor->name=$request->name;
        $doctor->phone=$request->number;
        $doctor->Speciality=$request->speciality;
        $doctor->room=$request->room;
       
        $image=$request->file;
        if($image){
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->file->move('doctorimage',$imagename);
            $doctor->image=$imagename;

        }
        
        $doctor->save();
        return redirect()->back()->with('message','Updated successfully!');
        


    }
    public function emailview($id){
        $data=appointment::find($id);
        return view('admin.emailview',compact('data'));
    }
    public function sendemail(Request $request, $id){
        $data=appointment::find($id);
        $details=[
            'greeting'=>$request->greeting,
            'mailbody'=>$request->mailbody,
            'actiontext'=>$request->actiontext,
            'actionurl'=>$request->actionurl,
            'endpart'=>$request->endpart


        ];
        Notification::send($data,new SendMailNotification($details));
        return redirect()->back();
        //zwnbjmphhnicinnq

    }
}
