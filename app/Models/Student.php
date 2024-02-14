<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table = 'student';
    protected $primaryKey = 'std_id';

    protected $fillable = [
        'name', 'roll_no', 'father_name', 'CNIC', 'email', 'gender', 'image',
        'contact_no', 'father_contactNo', 'DOB', 'address', 'registration_date',
        'course_id', 'active', 'batch_id', 'fees', 'qualification'
    ];

    public function courses()
    {
        return $this->belongsTo(Courses::class, 'course_id');
    }

    public function attendance()
    {
        return $this->hasMany(Attendance::class, 'std_id', 'std_id')->whereHas('course', function ($query) {
            $query->where('course_id', $this->course_id);
        });
    }

    public function exams()
    {
        return $this->hasMany(Exam::class, 'std_id', 'std_id')->whereHas('course', function ($query) {
            $query->where('course_id', $this->course_id);
        });
    }

    public function fees()
    {
        return $this->hasMany(Fee::class, 'std_id', 'std_id')->whereHas('course', function ($query) {
            $query->where('course_id', $this->course_id);
        });
    }

}
