<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->string('titlename')->nullable(); //คำนำหน้า
            $table->string('name')->nullable(); //ชื่อจริง
            $table->string('lastname')->nullable(); //นามสกุล
            $table->string('address')->nullable(); //ที่อยู่
            $table->string('phone')->nullable(); //โทรศัพท์
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
