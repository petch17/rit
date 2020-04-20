<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('works', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('begin_date')->nullable(); //วันเริ่มจ้าง
            $table->date('end_date')->nullable(); //วันสิ้นสุดจ้าง
            $table->string('address_work')->nullable(); //ที่อยู่สวนที่ให้ไปตัด
            $table->string('status_bill')->nullable(); //สถานะชำระเงิน
            $table->string('status_tranfar')->nullable(); //สถานะชำระเงินค่ามัดจำ
            $table->string('status_work')->nullable(); //สถานะงาน รอดำเนินการ , กำลังดำเนินการ , ดำเนินการเสร็จสิ้น
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('works');
    }
}
