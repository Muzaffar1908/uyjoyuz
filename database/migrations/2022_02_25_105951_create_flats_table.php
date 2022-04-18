<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flats', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('flat_type');
            $table->unsignedBigInteger('region');
            $table->unsignedBigInteger('district');
            $table->unsignedBigInteger('payment_type');
            $table->unsignedBigInteger('user');
            $table->string('url');
            $table->integer('status')->default('1');
            $table->integer('rent_and_sale')->default('1');
            $table->integer('flat_floor');
            $table->integer('floor');
            $table->string('square');
            $table->string('comment');
            $table->string('phone');
            $table->string('name');
            $table->integer('number_of_rooms');
            $table->integer('price');
            $table->timestamps();

            $table->foreign('flat_type')->references('id')->on('flat_types')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('region')->references('id')->on('regions')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('district')->references('id')->on('districts')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('payment_type')->references('id')->on('payment_types')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('user')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('flats');
    }
};
