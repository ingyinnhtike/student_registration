<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppliedCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applied_courses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('course_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->string('roll_no', 30);
            $table->string('photo')->default('default.jpg');

            $table->smallInteger('status')->unsigned()->default(0);// 0 is currently attend, 1 is pass, 2 is fail
            $table->tinyInteger('stipend')->unsigned()->default(0);// 0 is not applied, 1 is applied
            $table->tinyInteger('boudoir')->unsigned()->default(0);// 0 is not applied, 1 is applied

            $table->string('current_address')->nullable();
            $table->string('current_phone')->nullable();
            $table->json('data')->nullable();

            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('course_id')
                ->references('id')
                ->on('courses')
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
        Schema::dropIfExists('applied_courses');
    }
}
