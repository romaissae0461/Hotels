<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Client::create([
            'nomC' => 'mhglufkytj',
            'prenom' => 'mohligukfydtn',
            'adresse' => 'hlgukfydjtshfx',
            'telephone' => '0123456789',
            'email' => 'kfvhbnj@hgilufkydjts.com',
            'password' => bcrypt('123'),
        ]);
    }
}
