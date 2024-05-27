<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeHotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("type_hotel")->insert([
            ["typeH"=>"Hôtel de chaîne"],
            ["typeH"=>"Hôtel"],
            ["typeH"=>"Motel"],
            ["typeH"=>"Hôtel-boutique"],
            ["typeH"=>"Station balnéaire"],
            ["typeH"=>"Auberge"],
            ["typeH"=>"Hôtel éphémère"],
            ["typeH"=>"Boatel"],
            ["typeH"=>"Hôtel de suites"],
        ]);
    }
}
