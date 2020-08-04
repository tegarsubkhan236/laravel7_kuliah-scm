<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenyaluransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penyalurans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('stock_id')->unsigned();
            $table->bigInteger('temp_stock_id')->unsigned();
            $table->bigInteger('jumlah');
            $table->text('keterangan');
            $table->timestamps();

            $table->foreign('stock_id')
                ->on('stocks')->references('id')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('temp_stock_id')
                ->on('temporary_stocks')->references('id')
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
        Schema::dropIfExists('penyalurans');
    }
}
