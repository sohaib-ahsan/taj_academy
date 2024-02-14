<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Courses;
use App\Models\Batch;
use App\Models\Student;
use App\Models\Fee;
use App\Models\Attendance;
use App\Models\Exam;


class StudentController extends Controller
{
        // Student Details

        public function student(){
            $students = Student::with('courses')->get();
            return view('studentDetails',compact('students'));
        }
    
        public function studentIdDetails($student_id){
            $student = Student::where('std_id',$student_id)->first();
            $course_id = $student->course_id;
            $course = Courses::where('course_id',$course_id)->first();
            $All_Courses = Courses::all();

            // exam data
            $exams = Exam::where('std_id',$student_id)->get();

            $fees = Fee::where('std_id',$student_id)->get();


            $attendance = Attendance::where('std_id', $student->id)->get();
            $registration = $student->registration_date;
            $date = date('Y-m-d');
            $present = [];
            // make an array of all dates since registration to current date
            $dates = [];
            $current = strtotime($registration);
            $last = strtotime($date);
            while( $current <= $last ) {
                $dates[] = date('Y-m-d', $current);
                // if sat or sun, skip
                if (date('w', $current) == 5) {
                    $current = strtotime('+3 day', $current);
                    continue;
                }
                $current = strtotime('+1 day', $current);
            }
            // check if student was present on each date
            foreach ($dates as $date) {
                $attendance = Attendance::where('std_id', $student->std_id)
                ->where('date', $date)
                ->first();
                if ($attendance) {
                    $present[] = $date;
                }

            }

            $total_days = count($dates);
            $present_days = count($present);


            return view('studentIdDetails',compact('student','course','All_Courses', 'exams', 'fees', 'total_days', 'present_days'));
        }
    

        public function searchStudent(Request $request){
            $validated = $request->validate([
                'search' => 'required',
            ]);
    
            
            if($request->has('searchBtn')){
                $search = $request->search;
                $search = strtolower($search);

                // if "active" in search bar
                if($search == 'active'){
                    $students = Student::where('active',1)->get();
                    return view('studentDetails',compact('students'));
                }

                if ($search == 'inactive'){
                    $students = Student::where('active',0)->get();
                    return view('studentDetails',compact('students'));
                }

                $students = Student::where('name', 'like', '%' . $search . '%')
                ->orWhere('std_id', 'like', '%' . $search . '%')
                ->orWhere('roll_no', 'like', '%' . $search . '%')
                ->orWhereHas('courses', function ($query) use ($search) {
                    $query->where('name', 'like', '%' . $search . '%')
                        ->orWhere('course_code', 'like', '%' . $search . '%');
                })
                ->get();
                
            return view('studentDetails',compact('students'));
            }
            if($request->has('refreshBtn')){
                return redirect()->route('student');
            }
        }

    public function updateStatus(Request $request){

        $validated = $request->validate([
            'student_id' => 'required',
        ]);

        $std_id = $request->input('student_id');

        $student = Student::where('std_id',$std_id)->first();
        if ($student->active == '1'){
            $student->active = '0';
            $student->save();
        }
        else{
            $student->active = '1';
            $student->save();
        }
        return redirect()->route('studentIdDetails',$std_id)->with('success','Status Updated Successfully');
    }
    

    public function updateStudent(Request $request){

        $validated = $request->validate([
            'student_id' => 'required',
            'name' => 'required',
            'roll_no' => 'required',
            'gender' => 'required',
            'father_name' => 'required',
            'cnic' => 'required',
            'dob' => 'required',
            'phone' => 'required',
            'father_phone' => 'required',
            'email' => 'required',
            'address' => 'required',
            'course_code' => 'required',
            'fees' => 'required',
        ]);

        $std_id = $request->input('student_id');
        $student = Student::where('std_id',$std_id)->first();

        $name = $request->input('name');
        $roll_no = $request->input('roll_no');
        $gender = $request->input('gender');
        $father_name = $request->input('father_name');
        $cnic = $request->input('cnic');
        $dob = $request->input('dob');
        $phone = $request->input('phone');
        $father_phone = $request->input('father_phone');
        $email = $request->input('email');
        $address = $request->input('address');
        $fees = $request->input('fees');
        $qualification = $request->input('qualification');
        
        $course_code = $request->input('course_code');
        $course = Courses::where('course_code',$course_code)->first();

        $student->name = $name;
        $student->roll_no = $roll_no;
        $student->gender = $gender;
        $student->father_name = $father_name;
        $student->CNIC = $cnic;
        $student->DOB = $dob;
        $student->contact_no = $phone;
        $student->father_contactNo = $father_phone;
        $student->email = $email;
        $student->qualification = $qualification;
        $student->address = $address;
        $student->course_id = $course->course_id;
        $student->fees = $fees;

        $student->save();
        
        return redirect()->route('studentIdDetails',$std_id)->with('success','Student Updated Successfully');
    }

}
