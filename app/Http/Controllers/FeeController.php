<?php

namespace App\Http\Controllers;
use App\Models\Fee;
use App\Models\Student;


use Illuminate\Http\Request;

class FeeController extends Controller
{
    public function fees($id = 1, $search = null)
    {

        $paid = Fee::whereYear('date', '=', date('Y'))
           ->whereMonth('date', '=', date('m'))
           ->sum('paid');


        // make an array of students id as key and value as total amount paid by that student
        $array = array();
        $fees = Fee::all();

        foreach($fees as $fee){
            if(array_key_exists($fee->std_id, $array)){
                $array[$fee->std_id] += $fee->paid;
            }else{
                $array[$fee->std_id] = $fee->paid;
            }
        }

        // make an array of students for which there exists a record for current month payment
        $array2 = array();
        $fees = Fee::whereYear('date', '=', date('Y'))
           ->whereMonth('date', '=', date('m'))
           ->get();
           
        foreach($fees as $fee){
            if(!in_array($fee->std_id, $array2)){
                array_push($array2, $fee->std_id);
            }
        }

        if ($id == 1){
            $students = Student::where('active', 1)->with('courses')->get();
        }
        else{
            $students = Student::where('name', 'like', '%' . $search . '%')
            ->where('active', 1)
            ->orWhere('std_id', 'like', '%' . $search . '%')
            ->orWhere('roll_no', 'like', '%' . $search . '%')
            ->orWhereHas('courses', function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%')
                    ->orWhere('course_code', 'like', '%' . $search . '%');
            })
            ->get();
        }
        return view('fees', compact('students', 'paid', 'array', 'array2'));
    }

    public function searchAStudent(Request $request){

        if($request->has('searchBtn')){

            $search = $request->search;
            $search = strtolower($search);
            return $this->fees(2, $search);
        }
        if($request->has('refreshBtn')){
            return redirect()->route('fees');
        }
    }

    public function feePay($studentId){
        $student = Student::where('std_id', $studentId)->first();
        $fee = Fee::where('std_id', $studentId)->get();
        return view('feePay', compact('student', 'fee'));
    }

    public function addInstallment(Request $request){
        $validated = $request->validate([
            'date' => 'required',
            'amount' => 'required',
        ]);

        if ($request->amount > $request->balance) {
            return redirect()->back()->with('fail', 'Amount is greater than balance');
        }

        $fee = new Fee;
        $fee->std_id = $request->std_id;
        $fee->date = $request->date;
        $fee->paid = $request->amount;
        $fee->save();

        return redirect()->route('feePay', $request->std_id)->with('success', 'Installment added successfully');
    }

    public function printFee($fee_id){
        $fee = Fee::where('fee_id', $fee_id)->first();
        $student = Student::where('std_id', $fee->std_id)->with('courses')->first();
        $total_recieved = Fee::where('std_id', $fee->std_id)->sum('paid');
        return view('printFee', compact('fee', 'student', 'total_recieved'));
    }
}

