<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Courses;
use App\Models\Batch;
use App\Models\Student;
use App\Models\Attendance;
use App\Models\Exam;
    

class CourseController extends Controller
{
    public function courses(){
        $courses = Courses::all();
        return view('courses',['courses'=>$courses]);
    }
    
    public function searchCourse(Request $request){
        $validated = $request->validate([
            'search' => 'required',
        ]);

        if($request->has('searchBtn')){
            $search = $request->search;
            $courses = Courses::where('name','LIKE','%'.$search.'%')
            ->orWhere('course_code','LIKE','%'.$search.'%')->get();
            return view('courses',['courses'=>$courses]);
        }
        if($request->has('refreshBtn')){
            return redirect()->route('courses');
        }
    }

    public function addNewCourse(){
        $course_codeFinal = Courses::orderBy('course_id','desc')->first();
        if($course_codeFinal){
            $course_code = $course_codeFinal->course_code;
            $course_code = substr($course_code,1);
            $course_code = intval($course_code) + 1;
            $course_code = str_pad($course_code, 3, '0', STR_PAD_LEFT);
            $course_code = "C".$course_code;
        }else{
            $course_code = "C001";
        }
        return view('addNewCourse',compact('course_code'));
    }

    public function NewCourse(Request $request){
        $validated = $request->validate([
            'name' => 'required',
            'courseCode' => 'required',
            'coursefees' => 'required',
        ]);

        // check course code
        $courseCode = Courses::where('course_code',$request->input('courseCode'))->first();
        if($courseCode){
            return redirect()->route('addNewCourse')->with('fail','Course Code Already Exists');
        }

        $course = new Courses;
        $course->name = $request->name;
        $course->course_code = $request->input('courseCode');
        $course->course_fees = $request->input('coursefees');
        $course->save();
        return redirect()->route('courses')->with('success','Course Added Successfully');
    }

    
    public function deleteCourse($courseCode){
        $course = Courses::where('course_code',$courseCode)->first();
        $course->delete();
        return redirect()->route('courses')->with('success','Course Deleted Successfully');
    }


    public function courseDetails($course_code){
        $course = Courses::where('course_id',$course_code)->first();
        $studentsEnrolled = Student::where('course_id',$course_code)->get();
        $activeStudents = Student::where('course_id',$course_code)->where('active',1)->get();
        return view('courseDetails',compact('course','studentsEnrolled','activeStudents'));
    }
}
