<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{
    use HasFactory;
    protected $table = 'fee';
    protected $primaryKey = 'fee_id';
    public $timestamps = false;

    protected $fillable = ['std_id', 'paid', 'date'];


    public function student()
    {
        return $this->belongsTo(Student::class, 'std_id', 'std_id');
    }
}
