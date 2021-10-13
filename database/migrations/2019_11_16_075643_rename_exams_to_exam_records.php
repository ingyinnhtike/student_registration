<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameExamsToExamRecords extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('exams', function (Blueprint $table) {
            $table->dropForeign('exams_user_id_foreign');
        });
        Schema::rename('exams', 'exam_records');
        Schema::table('exam_records', function (Blueprint $table) {
            $table->json('data')->nullable()->after('status');
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
        Schema::table('exam_records', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });
        Schema::rename('exam_records', 'exams');
        Schema::table('exams', function (Blueprint $table) {
            $table->dropColumn('data');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }
}
