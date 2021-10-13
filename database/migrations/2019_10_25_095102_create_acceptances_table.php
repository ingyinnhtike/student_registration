<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcceptancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acceptances', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('enrollment_id')->unsigned();

            $table->bigInteger('approved_user_id')->unsigned()->index()->nullable();
            $table->smallInteger('approved_status')->unsigned()->default(0);//0 is pending, 1 is accept, 2 is reject
            $table->string('approved_message')->nullable();
            $table->timestamp('approved_at')->nullable();


            $table->bigInteger('payment_receive_user_id')->unsigned()->index()->nullable();
            $table->smallInteger('payment_receive_status')->unsigned()->default(0);//0 is pending, 1 is accept, 2 is reject
            $table->string('payment_receive_message')->nullable();
            $table->timestamp('payment_received_at')->nullable();

            $table->timestamps();

            $table->foreign('enrollment_id')
                ->references('id')
                ->on('enrollments')
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
        Schema::dropIfExists('acceptances');
    }
}
