<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Courses;
use App\Models\Batch;
use App\Models\Student;
use App\Models\Attendance;
use App\Models\Exam;


class AttendanceController extends Controller
{
        // Attendance

        public function attendance(){
            // get all students which have an active status 
            $students = Student::where('active', 1)->with('courses')
            ->get();

            $date = date('Y-m-d');
            $present = [];
            $attendance = Attendance::where('date', $date)->get();
            if ($attendance) {
                foreach ($attendance as $student) {
                    $present[] = $student->std_id;
                }
            }
            return view('attendance',compact('present','students', 'date'));
        }
   
    
        public function saveAttendance(Request $request) {
            $attendanceArray = $request->input('attendance_status');
            $date = $request->input('date');
      
            foreach ($attendanceArray as $std_id => $present) {
                
                $existingRecord = Attendance::where('std_id', $std_id)
                                ->where('date', $date)
                                ->first();
                
                if ($existingRecord && $present == "0") {
                    Attendance::where('std_id', $std_id)
                    ->where('date', $date)
                    ->delete();
                }

                else if (!$existingRecord && $present == "1") {
                    if ($present == "1") {
                        Attendance::create([
                            'date' => $date,
                            'std_id' => $std_id
                        ]);
                    }
                }
            }
            return redirect()->route('attendance')->with('success', 'Attendance saved successfully');
        }

        public function gotoAttendance(Request $request) {
            $date = $request->input('date');
            if ($date == date('Y-m-d'))
            {
                return redirect()->route('attendance');
            }
            $present = [];
            $attendance = Attendance::where('date', $date)->get();
            if ($attendance) {
                foreach ($attendance as $student) {
                    $present[] = $student->std_id;
                }
            }
            $students = Student::where('active', 1)->get();
            return view('attendance',compact('present','students', 'date'));
        }
        
        public function rollNosubmit(Request $request) {
            $roll_no = $request->input('roll_no');
            $student = Student::where('roll_no', $roll_no)->with('courses')->first();
            if ($student) {
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
                return view('attendanceDetails',compact('student', 'present', 'dates'));
            }
            else {
                return redirect()->route('rollNoAttendance')->with('fail', 'Student not found');
            }
        }
}
