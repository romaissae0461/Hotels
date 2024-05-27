<?php

namespace Database\Seeders;

use App\Models\Manager;
use Illuminate\Database\Seeder;

class ManagerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Manager::create([
            'nomM' => 'gufyudtghjf',
            'email' => 'cdtcgg@gufiyhjv.com',
            'password' => bcrypt('123'),
        ]);
    }
}
