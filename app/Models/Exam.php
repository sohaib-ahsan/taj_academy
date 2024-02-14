<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;
    protected $primaryKey ='exam_id';
    public $incrementing = false;
    public $timestamps = false;
    public $table = 'exam';

    protected $fillable = ['course_id', 'std_id', 'date', 'total_marks', 'exam_type','obt_marks'];

    public function course()
    {
        return $this->belongsTo(Courses::class, 'course_id');
    }

    public function student()
    {
        return $this->belongsTo(Student::class, 'std_id');
    }

}
