<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            TypeChambreSeeder::class,
            TypeHotelSeeder::class,
            ChambreSeeder::class,
            ClientSeeder::class,
            CommentSeeder::class,
            ContactSeeder::class,
            FacturationSeeder::class,
            ManagerSeeder::class,
            ReservationSeeder::class,
            ReservationServiceSeeder::class,
            ServiceSeeder::class,
        ]);
    }
}
