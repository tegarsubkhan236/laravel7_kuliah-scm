<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDikerjakansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_dikerjakans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("worker_id")->unsigned();
            $table->bigInteger("tempStock_id")->unsigned();
            $table->bigInteger("order_id")->unsigned();
            $table->string("jumlah_bahan", 50);
            $table->text("keterangan");
            $table->timestamps();

            $table->foreign("worker_id")
                ->on('workers')->references('id')
                ->onDelete('restrict')->onUpdate('restrict');
            $table->foreign("tempStock_id")
                ->on('temporary_stocks')->references('id')
                ->onDelete('restrict')->onUpdate('restrict');
            $table->foreign("order_id")
                ->on('orders')->references('id')
                ->onDelete('restrict')->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_dikerjakans');
    }
}
