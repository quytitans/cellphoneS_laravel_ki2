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
            $table->id()->autoIncrement();
            $table->unsignedBigInteger('userID');
            $table->double('totalPrice');
            $table->string('shipEmail');
            $table->string('shipName');
            $table->string('shipPhone');
            $table->string('shipAddress');
            $table->string('shipNote');
            $table->timestamps();
            $table->boolean('checkOut'); //1 thanh toan roi, 0 chua thang toan
            $table->unsignedInteger('status'); //1 done, 2 waiting to confirm, 3 processing, 4 cancel, -1 deleted
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
