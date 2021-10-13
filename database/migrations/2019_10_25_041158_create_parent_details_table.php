<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParentDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parent_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned()->index();
            $table->string('name_mm')->nullable();
            $table->string('name_eng')->nullable();
            $table->string('email')->nullable();
            $table->string('race')->nullable();
            $table->string('religion')->nullable();
            $table->string('township', 50)->nullable();
            $table->smallInteger('state')->unsigned()->nullable();
            $table->string('nrc', 30)->nullable();
            $table->string('nrc2', 30)->nullable();
            $table->string('relation_to_user')->default('unknown');
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('work')->nullable();
            $table->json('data')->nullable();
            $table->smallInteger('availability')->unsigned()->default(1);//0 is not having at all, 1 is alive, 2 is decreased
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
        Schema::dropIfExists('parent_details');
    }
}
