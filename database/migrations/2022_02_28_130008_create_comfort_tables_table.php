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
        Schema::create('comfort_tables', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('comfort');
            $table->integer('status');
            $table->unsignedBigInteger('flat');
            $table->timestamps();


            $table->foreign('comfort')->references('id')->on('comforts')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('flat')->references('id')->on('flats')->onDelete('cascade')->onUpdate('cascade');
        });



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comfort_tables');
    }
};
