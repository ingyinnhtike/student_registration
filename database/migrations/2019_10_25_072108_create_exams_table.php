<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exams', function (Blueprint $table) {//rename to exam_records in later migrations
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->smallInteger('exam')->unsigned();
            $table->string('major');
            $table->string('roll_no');
            $table->string('year');
            $table->smallInteger('status')->unsigned();//0 is fail, 1 is pass
            //added data column in later migrations
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
        Schema::dropIfExists('exams');
    }
}
