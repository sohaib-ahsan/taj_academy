<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Batch;
use App\Models\Student;

class Attendance extends Model {
    protected $primaryKey = ['std_id', 'date'];
    public $incrementing = false;
    public $table = 'attendance';

    protected $fillable = ['std_id', 'date'];

    public function student()
    {
        return $this->belongsTo(Student::class, 'std_id');
    }    
}

