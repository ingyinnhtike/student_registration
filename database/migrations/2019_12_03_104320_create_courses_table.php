<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('major_id')->unsigned();
            $table->bigInteger('year_id')->unsigned();
            $table->smallInteger('status')->unsigned()->default(0);//0 is open, 1 is close
            $table->timestamps();

            $table->foreign('major_id')
                ->references('id')
                ->on('majors')
                ->onDelete('cascade');


            $table->foreign('year_id')
                ->references('id')
                ->on('years')
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
        Schema::dropIfExists('courses');
    }
}
