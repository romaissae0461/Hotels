<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Contact::create([
            'name' => 'ufydutsry',
            'email' => 'fyjdtrsy@jvyjdttg.com',
            'message' => 'Ceci est un message de contact.',
        ]);
    }
}
