<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('working')->nullable(); //งานที่ทำ ตัดหญ้า,ตัดปาล์ม,ใส่ปุ๋ย
            $table->string('kilo_palm')->nullable(); //สถานะชำระเงิน ชำระ,ค้างชำระ
            $table->string('unit_fertilizer')->nullable(); //สถานะชำระเงิน ชำระ,ค้างชำระ
            $table->string('farm_grass')->nullable(); //สถานะชำระเงิน ชำระ,ค้างชำระ
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('work_details');
    }
}
