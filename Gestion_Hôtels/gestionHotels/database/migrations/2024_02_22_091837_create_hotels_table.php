<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotels', function (Blueprint $table) {
            $table->increments('idH');
            $table->string('nomH');
            $table->integer('nbrChambre');
            $table->string('email');
            $table->string('adresse');
            $table->unsignedBigInteger('prixC');
            $table->unsignedBigInteger('type_hotel_id')->nullable();
            $table->timestamps();

            $table->foreign('type_hotel_id')->references('id')->on('type_hotel');
            $table->foreign('prixC')->references('id')->on('chambres');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hotels');
    }
}
