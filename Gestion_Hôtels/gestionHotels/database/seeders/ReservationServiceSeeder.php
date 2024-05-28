<?php

namespace Database\Seeders;

use App\Models\ReservationService;
use Illuminate\Database\Seeder;

class ReservationServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ReservationService::create([
            'idReserv' => 1,
            'idS' => 1,
            'dateSer' => '2024-04-10',
            'heure' => '14:00',
        ]);
    }
}
