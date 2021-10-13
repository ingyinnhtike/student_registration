<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('form_id')->unique()->unsigned();
            $table->bigInteger('payment_received_user_id')->unsigned()->index()->nullable();
            $table->smallInteger('payment_received_status')->unsigned()->default(0);//0 is pending, 1 is accept, 2 is reject
            $table->string('payment_received_message')->nullable();
            $table->timestamp('payment_received_at')->nullable();

            $table->json('data');
            $table->timestamps();

            $table->foreign('form_id')
                ->references('id')
                ->on('forms')
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
        Schema::dropIfExists('invoices');
    }
}
