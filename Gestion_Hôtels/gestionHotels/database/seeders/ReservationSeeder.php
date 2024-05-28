<?php

namespace Database\Seeders;

use App\Models\Reservation;
use Illuminate\Database\Seeder;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Reservation::create([
            'dateReserv' => '2024-04-05',
            'dateArrivee' => '2024-04-10',
            'dateDepart' => '2024-04-15',
            'nbrChambre' => 2,
            'nbrPersonne' => 4,
            'idC' => 1,
            'id' => 1,
            'nom' => 'mhglufkytj',
            'prenom' => 'mohligukfydtn',
            'email' => 'kfvhbnj@hgilufkydjts.com',
        ]);
    }
}
