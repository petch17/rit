<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateBookbankTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        {
            //
            Schema::table('bookbank', function (Blueprint $table) {


                $table->unsignedBigInteger('users_id')->nullable();
                $table->unsignedBigInteger('work_id')->nullable();


                $table->foreign('users_id')->references('id')->on('users');
                $table->foreign('work_id')->references('id')->on('works');

        });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
