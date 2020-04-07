<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->string('titlename')->nullable(); //คำนำหน้า
            $table->string('name')->nullable(); //ชื่อจริง
            $table->string('lastname')->nullable(); //นามสกุล
            $table->string('username')->nullable(); //ไอดี
            $table->string('address')->nullable(); //ที่อยู่
            $table->string('phone')->nullable(); //โทรศัพท์
            // $table->string('email')->unique();
            // $table->timestamp('email_verified_at')->nullable();
            $table->string('password'); //รหัสผ่าน
            $table->rememberToken();
            $table->tinyInteger('type'); //กำหนด admin
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
        Schema::dropIfExists('users');
    }
}
