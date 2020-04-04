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
            $table->string('name')->nullabel(); //ชื่อจริง
            $table->string('lastname')->nullabel(); //นามสกุล
            $table->string('username')->nullabel(); //ไอดี
            $table->string('address')->nullabel(); //ที่อยู่
            $table->string('phone')->nullabel(); //โทรศัพท์
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
