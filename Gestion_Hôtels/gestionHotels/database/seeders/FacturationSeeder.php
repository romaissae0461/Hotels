<?php

namespace Database\Seeders;

use App\Models\Facturation;
use Illuminate\Database\Seeder;

class FacturationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Facturation::create([
            'idC' => 1,
            'idReserv' => 1,
            'idS' => 1,
            'prixC' => 200.00,
            'tax' => 20.00,
            'totalPrix' => 220.00,
        ]);
    }
}
