<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnrollmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enrollments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->string('year', 20);//it has been change to string 50
            $table->string('major', 30);//it has been change to string 255
            $table->string('roll_no', 30);
            $table->string('photo');
            $table->tinyInteger('stipend')->unsigned()->default(0);// ထောက်ပံ့ကြေး
            $table->tinyInteger('boudoir')->unsigned()->default(0);// ဘော်ဒါဆောင်

            $table->string('current_address')->nullable();
            $table->string('current_phone')->nullable();

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
        Schema::dropIfExists('enrollments');
    }
}
