<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('marketing_id')->unsigned();
            $table->bigInteger('jenis_id')->unsigned();
            $table->string('barang', 50);
            $table->string('status', 50);
            $table->timestamps();

            $table->foreign('marketing_id')
                ->on('marketings')->references('id')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('jenis_id')
                ->on('jenis_cucis')->references('id')
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
        Schema::dropIfExists('orders');
    }
}
