<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembeliansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembelians', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('stock_id')->unsigned();
            $table->bigInteger('supplier_id')->unsigned();
            $table->bigInteger('jumlah');
            $table->integer('harga');
            $table->text('keterangan')->nullable();
            $table->timestamps();

            $table->foreign('stock_id')
                ->on('stocks')->references('id')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('supplier_id')
                ->on('suppliers')->references('id')
                ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pembelians');
    }
}
