<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypeHotelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_hotel', function (Blueprint $table) {
            $table->id();
            $table->enum('typeH',['Hôtel de chaîne', 'Hôtel', 'Motel', 'Hôtel-boutique', 'Station balnéaire', 'Auberge', 'Hôtel éphémère', 'Boatel', 'Hôtel de suites'])->default('Hôtel');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('type_hotel');
    }
}
