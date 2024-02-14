<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect(route("login"));
});

Route::get('signup', function () {
    return view('signup');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/login', function () {
    return view('login');
})->name("login");
Route::post('/submit-form', 'App\Http\Controllers\Controller@submit')->name("submit-form");
Route::post('/submit-signup', 'App\Http\Controllers\Controller@signup')->name("submit-signup");


Route::middleware('checkAdminSession')->group(function () {

    
Route::get('/changepassword', function () {
    return view('changepassword');
});

Route::post('/submit-password', 'App\Http\Controllers\Controller@password')->name("submit-password");

Route::get('/home', function () {
    return view('home');
})->name("home");


Route::get('/logout', function () {
    Session::forget('admin');
    Session::flush();
    return redirect()->route('login')->with('success', 'Logged out successfully');
})->name("logout");


// -------------- Student ----------------

Route::get('/student', 'App\Http\Controllers\StudentController@student')
->name("student");

Route::get('/studentIdDetails{id}', "App\Http\Controllers\StudentController@studentIdDetails")
->name("studentIdDetails");

// search
Route::post('/searchStudent', 'App\Http\Controllers\StudentController@searchStudent')->name("searchStudent");
Route::get('/searchStudent', function () {
    return redirect()->route('student');
})->name("searchStudent");

Route::post("/updateStatus", "App\Http\Controllers\StudentController@updateStatus")->name("updateStatus");
Route::post("/updateStudent", "App\Http\Controllers\StudentController@updateStudent")->name("updateStudent");

// -------------- Attendance ----------------

Route::get('/attendance', 'App\Http\Controllers\AttendanceController@attendance')
->name("attendance");

Route::post('/saveAttendance', 'App\Http\Controllers\AttendanceController@saveAttendance')
->name("saveAttendance");

Route::post('/gotoAttendance', 'App\Http\Controllers\AttendanceController@gotoAttendance')
->name("gotoAttendance");

Route::get('/rollNoAttendance', function () {
    return view('rollNoAttendance');
})->name("rollNoAttendance");

Route::post('/rollNosubmit', 'App\Http\Controllers\AttendanceController@rollNosubmit')
->name("rollNosubmit");

// -------------- Admission ----------------


Route::get('/newAdmission', 'App\Http\Controllers\adminController@newAdmission')
->name("newAdmission");

Route::post('/saveAdmission', 'App\Http\Controllers\adminController@saveAdmission')->name("saveAdmission");

// -------------- Courses ----------------

Route::get('/courses','App\Http\Controllers\courseController@courses')
->name("courses");


Route::get('/addNewCourse', 'App\Http\Controllers\courseController@addNewCourse')
->name("addNewCourse");

Route::post('/NewCourse', 'App\Http\Controllers\courseController@NewCourse')->name("NewCourse");
Route::get('/deleteCourse{courseCode}', 'App\Http\Controllers\courseController@deleteCourse')->name("deleteCourse");

Route::get('/courseDetails{courseCode}','App\Http\Controllers\courseController@courseDetails')
->name("courseDetails");



// search
Route::post('/searchCourse', 'App\Http\Controllers\courseController@searchCourse')
->name("searchCourse");

Route::get('/searchCourse', function () {
    return redirect()->route('courses');
})->name("searchCourse");

// -------------- Examination ----------------


Route::get('/examination', 'App\Http\Controllers\ExamController@examination')
->name("examination");

Route::post("searchActiveStudent", "App\Http\Controllers\ExamController@searchActiveStudent")
->name("searchActiveStudent");
Route::get('/searchActiveStudent', function () {
    return redirect()->route('examination');
})->name("searchActiveStudent");

Route::get('/newExam', function(){
    return view("newExam");
})->name("newExam");

Route::post("newExamSubmit",  "App\Http\Controllers\ExamController@newExamSubmit")
->name("newExamSubmit");

Route::get('/examInput', function(){
    return view("examInput");
})->name("examInput");

Route::post("saveMarks",  "App\Http\Controllers\ExamController@saveMarks")
->name("saveMarks");

Route::get('/examDetails_{examType}_{exam_date}', "App\Http\Controllers\ExamController@examDetails")
->name("examDetails");

// -------------- Fees ----------------

Route::get('/fees', 'App\Http\Controllers\FeeController@fees')
->name("fees");

Route::post('searchAstudent', 'App\Http\Controllers\FeeController@searchAstudent')
->name("searchAstudent");

Route::get('/searchAstudent', function () {
    return redirect()->route('fees');
})->name("searchAstudent");

Route::get('feePay{studentId}', 'App\Http\Controllers\FeeController@feePay')
->name("feePay");

Route::post('addInstallment', 'App\Http\Controllers\FeeController@addInstallment')
->name("addInstallment");

Route::get('printFee{fee_id}', 'App\Http\Controllers\FeeController@printFee')
->name("printFee");
});