<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned()->index();
            $table->smallInteger('university_status')->unsigned()->default(0);//0 is Day, 1 is UDE
            $table->string('name_mm');
            $table->string('name_eng');
            $table->string('email')->unique()->nullable();
            $table->string('race');
            $table->string('religion');
            $table->string('township', 50);
            $table->smallInteger('state')->unsigned();
            $table->string('nrc', 30);
            $table->string('nrc2', 30)->nullable();
            $table->string('blood_type', 30)->nullable();
            $table->string('designation', 50)->nullable();
            $table->date('dob');
            /*$table->string('high_school_roll_no', 15);
            $table->year('high_school_year');
            $table->string('high_school_exam_location');*/
            $table->string('permanent_address');
            $table->string('permanent_phone');
            $table->string('university_roll_no')->nullable();
            $table->string('university_start_year');
            $table->tinyInteger('gender');
            $table->json('data')->nullable();
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_details');
    }
}
