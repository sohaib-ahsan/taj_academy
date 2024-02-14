<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student', function (Blueprint $table) {
            $table->id('std_id');
            $table->string('name', 100);
            $table->string('roll_no', 10)->unique();
            $table->string('father_name', 100)->nullable();
            $table->string('CNIC', 15);
            $table->string('email', 255)->nullable();
            $table->enum('gender', ['Male', 'Female']);
            $table->string('image', 100)->nullable();
            $table->string('contact_no', 15)->nullable();
            $table->string('father_contactNo', 15)->nullable();
            $table->date('DOB');
            $table->string('qualification', 200)->nullable();
            $table->text('address')->nullable();
            $table->date('registration_date');
            $table->string("fees");
            $table->boolean('active')->default(1);            
            $table->foreignId('course_id')->constrained('courses', 'course_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student');
    }
}
