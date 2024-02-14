<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Courses;
use App\Models\Batch;
use App\Models\Student;
use App\Models\Attendance;
use App\Models\Exam;

class ExamController extends Controller
{
        // Examination

        public function examination(){
            $exams = Exam::with('student')->get();

            $exams = Exam::select('exam_type', 'date', 'total_marks')
            ->selectRaw('COUNT(DISTINCT std_id) as no_of_students')
            ->groupBy('exam_type', 'date', 'total_marks')
            ->get();
        
            return view('examination', ['exams' => $exams]);
        }


        public function examDetails($examType, $exam_date){
            $examx = Exam::where('exam_type', $examType)
            ->where('date', $exam_date)
            ->with('student')
            ->get();

            
            $marks = $examx[0]->total_marks;
            
            $students = Student::where("active",1)->with('courses')->get();
            
            $exams = array();
            foreach($students as $student){
                $exams[$student->std_id] = null;
            }
            foreach($exams as $key => $value){
                foreach($examx as $ex){
                    if($key == $ex->std_id){
                        $exams[$key] = $ex->obt_marks;
                    }
                }
            }

            $id = 1;

            return view('examInput', ['students'=>$students,'id'=>$id, 'exam' => $examType,
             'marks' => $marks, 'date' => $exam_date, 'exams' => $exams]);
        }   


    public function newExamSubmit(Request $req){
        $validated = $req->validate([
            'exam' => 'required',
            'marks' => 'required',
            'date' => 'required',
        ]);

        $exam = $req->input("exam");
        $marks = $req->input("marks");
        $date = $req->input("date");

        $examx = Exam::where('exam_type', $exam)
        ->where('date', $date)
        ->get();

        if(count($examx) > 0){
            return redirect()->back()->with('fail', 'This exam on the same date already exists');
        }

        $students = Student::where("active",1)->with('courses')->get();

        $id = 0;
        return view('examInput', compact('exam', 'marks', 'date', 'students', 'id'));

    }

    public function saveMarks(Request $req){
        $validated = $req->validate([
            'marks' => 'required',
            'date' => 'required',
            'exam' => 'required',
            'totalmarks' => 'required',
        ]);

        $marks = $req->input("marks");
        $date = $req->input("date");

        foreach($marks as $key => $value){
            $student = Student::where('std_id', $key)->first();
            
            $examx = Exam::where('std_id', $key)
            ->where('exam_type', $req->input("exam"))
            ->where('date', $req->input("date"))
            ->first();

            if($examx){
                if ($value == null){
                    $examx->delete();
                }
                else{
                    $examx->obt_marks = $value;
                    $examx->save();
                }
            }    
            else{      
                if ($value != null){
                $exam = new Exam;
                $exam->std_id = $key;
                $exam->course_id = $student->course_id;
                $exam->exam_type = $req->input("exam");
                $exam->total_marks = $req->input("totalmarks");
                $exam->obt_marks = $value;
                $exam->date = $req->input("date");
                $exam->save();
            }
        }
    }
        return redirect()->route('examination')->with('success', 'Exam Marks Saved Successfully');
    }
}



