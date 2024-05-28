<?php

namespace Database\Seeders;

use App\Models\Chambre;
use Illuminate\Database\Seeder;

class ChambreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Chambre::create([
            'image' => '../assets/imgs/1.jpg',
            'numC' => '1',
            'nbrLits' => 2,
            'type_chambre_id' => 1,
            'prixC' => 150.00,
            'etage' => '2',
            'status' => 1,
            'infos' => 'Informations sur la chambre 1',
        ]);
    }
}
