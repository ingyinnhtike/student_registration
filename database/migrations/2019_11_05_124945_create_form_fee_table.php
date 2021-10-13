<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormFeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * This table was only used in early version of the system.
         * Since the version assigning fee to course, course_fee table is used
         * instead of this table.
         */
        Schema::create('form_fee', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('form_type_id')->unsigned();
            $table->bigInteger('fee_id')->unsigned();
            $table->integer('amount')->unsigned();

            $table->foreign('form_type_id')
                ->references('id')
                ->on('form_types')
                ->onDelete('cascade');

            $table->foreign('fee_id')
                ->references('id')
                ->on('fees')
                ->onDelete('cascade');

            $table->unique(['form_type_id', 'fee_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('form_fee');
    }
}
