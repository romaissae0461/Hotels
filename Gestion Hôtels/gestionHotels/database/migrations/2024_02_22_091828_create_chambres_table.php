<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChambresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chambres', function (Blueprint $table) {
            $table->id();
            $table->string('numC');
            $table->integer('nbrLits');
            $table->unsignedBigInteger('type_chambre_id')->nullable();
            $table->double('prixC');
            $table->string('etage');
            $table->timestamps();

            $table->foreign('type_chambre_id')->references('id')->on('type_chambre');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chambres');
    }
}
