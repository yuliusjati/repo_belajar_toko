<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
          $table->bigIncrements('id_order');
          $table->unsignedBigInteger('id_customer');
          $table->unsignedBigInteger('id_product');
          $table->date('tanggal_order');
          $table->integer('berat');
          $table->integer('total');
          $table->timestamps();

          $table->foreign('id_customer')->references('id_customer')->on('customers');
          $table->foreign('id_product')->references('id_product')->on('product');
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
