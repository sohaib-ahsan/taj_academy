<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    use HasFactory;
    protected $primaryKey = 'course_id';

    protected $fillable = [
        'course_code', 'course_name', 'course_fees'
    ];

    public function students()
    {
        return $this->hasMany(Student::class, 'course_id', 'course_id');
    }
}


