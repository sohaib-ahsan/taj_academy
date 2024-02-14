<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam', function (Blueprint $table) {
            $table->integer('exam_id')->autoIncrement();            
            $table->foreignId('course_id')->constrained('courses', 'course_id');
            $table->foreignId('std_id')->constrained('student', 'std_id');
            $table->date('date');
            $table->integer('total_marks');
            $table->integer('obt_marks');
            $table->string('exam_type');
            $table->string('description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exam');
    }
}
