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
        Schema::create('around_tables', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('around');
            $table->string('status');
            $table->unsignedBigInteger('flat');
            $table->timestamps();

            $table->foreign('around')->references('id')->on('arounds')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('around_tables');
    }
};
