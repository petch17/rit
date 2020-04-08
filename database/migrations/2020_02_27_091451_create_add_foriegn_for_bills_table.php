<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddForiegnForBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bills', function (Blueprint $table) {
            $table->unsignedBigInteger('work_id')->nullable()->after('id');

            $table->foreign('work_id')
                ->references('id')->on('works')
                ->onDelete('cascade');


            $table->unsignedBigInteger('user_id')->nullable()->after('work_id');

            $table->foreign('user_id')
                ->references('id')->on('users')
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
        Schema::table('bills', function (Blueprint $table) {
            $table->dropForeign(['work_id']);
            $table->dropForeign(['user_id']);
        });
    }
}
