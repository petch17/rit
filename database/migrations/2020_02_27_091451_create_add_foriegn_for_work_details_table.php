<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddForiegnForWorkDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('work_details', function (Blueprint $table) {
            $table->unsignedBigInteger('work_id')->nullable()->after('id');

            $table->foreign('work_id')
                ->references('id')->on('works')
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
        Schema::table('work_details', function (Blueprint $table) {
            $table->dropForeign(['work_id']);
        });
    }
}
