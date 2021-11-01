<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->unsignedBigInteger('orderID');
            $table->foreign('orderID')->references('id')->on('orders');
            $table->unsignedBigInteger('productID');
            $table->foreign('productID')->references('id')->on('mobiles');
            $table->unsignedBigInteger('quantity');
            $table->double('unitPrice');
            $table->primary(['orderID', 'productID']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_details');
    }
}
