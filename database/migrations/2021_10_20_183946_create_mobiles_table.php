<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMobilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mobiles', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('name');
            $table->text('thumbnail');
            $table->unsignedBigInteger('brandID');
            $table->foreign('brandID')->references('id')->on('brands');
            $table->double('price');
            $table->string('typeID');
            $table->integer('ramID');
            $table->string('cpu');
            $table->integer('ssdID');
            $table->integer('screenID');
            $table->date('created_at');
            $table->date('updated_at');
            $table->integer('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mobiles');
    }
}
