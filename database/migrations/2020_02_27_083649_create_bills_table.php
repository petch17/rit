<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('transfar_slip')->nullable(); //รูปโอนมัดจำ
            $table->string('monney_slip')->nullable(); //รูปโอน
            $table->string('transfar_date')->nullable(); //วันที่โอนมัดจำ
            $table->string('monney_date')->nullable(); //วันที่โอน
            $table->string('transfar_monney')->nullable(); //จำนวนเงินมัดจำ
            $table->string('transfar_desc')->nullable(); //รายละเอียดมัดจำ
            $table->string('monney')->nullable(); //จำนวนเงิน
            $table->string('desc')->nullable(); //รายละเอียด
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bills');
    }
}
