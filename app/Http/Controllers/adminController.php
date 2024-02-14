<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Courses;
use App\Models\Batch;
use App\Models\Student;
use App\Models\Attendance;
use App\Models\Exam;
use Illuminate\Http\UploadedFile;


class adminController extends Controller
{



    // Admission

    public function newAdmission(){
        $courses = Courses::all();
        $roll_no = Student::max('roll_no');
        $roll_no = (int)$roll_no;
        $roll_no = $roll_no + 1;
        return view('newAdmission',compact('courses','roll_no'));
    }

    public function getBatches($course_id){
        $batches = Batch::where('course_id',$course_id)->get();
        return response()->json($batches);
    }

    public function saveAdmission(Request $request){
    
        $validated = $request->validate([
            'name' => 'required',
            'father_name' => 'required',
            'roll_no' => 'required',
            'course_id' => 'required',
            'cnic' => 'required',
            'email' => 'required',
            'gender'=> 'required',
            'phone' => 'required',
            'father_contactNo' => 'required',
            'dob' => 'required',
            'address' => 'required',
            'fees' => 'required',
        ]);

        
        $name = $request->input('name');
        $father_name = $request->input('father_name');
        $roll_no = $request->input('roll_no');
        $course_id = $request->input('course_id');
        $CNIC = $request->input('cnic');
        $email = $request->input('email');
        $gender =  $request->input('gender');
        $contact_no = $request->input('phone');
        $father_contactNo = $request->input('father_contactNo');
        $DOB = $request->input('DOB');
        $address = $request->input('address');
        $fees = $request->input('fees');
        $qualification = $request->input('qualification');
        
        $student = new Student;
        $student->name = $name;
        $student->father_name = $father_name;
        $student->roll_no = $roll_no;
        $student->course_id = $course_id;
        $student->CNIC = $CNIC;
        $student->email = $email;
        $student->gender = $gender;
        $student->contact_no = $contact_no;
        $student->father_contactNo = $father_contactNo;
        $student->address = $address;
        $student->fees = $fees;
        $student->qualification = $qualification;
        
        // check image size
        $file = $request->file('image');
        $size = $file->getSize();
        if($size > 1000000 || $size == false){
            return redirect()->back()->with('fail','Image size is too large');
        }
        $image = $request->file('image');
        $path = public_path('students');
        $image->move($path,$student->roll_no.'.'.$image->getClientOriginalExtension());

        $student->image = $student->roll_no.'.'.$image->getClientOriginalExtension();        
        $date = date_create($request->DOB);
        $format = date_format($date,"Y-m-d"); 
        $student->DOB = $format;
        $student->registration_date = date("Y-m-d");
        $student->save();

        return redirect()->route('home')->with('success','Admission Added Successfully');
   }  
}
