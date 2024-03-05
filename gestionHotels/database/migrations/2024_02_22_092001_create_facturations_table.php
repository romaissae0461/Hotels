<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idC')->constrained('clients');
            $table->foreignId('idReserv')->constrained('reservations');
            $table->foreignId('idS')->constrained('services');
            $table->unsignedBigInteger('prixC');
            $table->double('tax');
            $table->double('totalPrix');
            $table->timestamps();

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
        Schema::dropIfExists('facturations');
    }
}
