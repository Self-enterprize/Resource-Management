<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $existing = DB::table('schools')->count();
        if ($existing) {
            return;
        }

        DB::table('schools')->insert([
            'name' => 'Digital College',
            'localisation' => 'Bastos, Yaounde',
            'email' => 'digatcollege@gmail.com',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('schools')->insert([
            'name' => 'Keyce Informatique',
            'localisation' => 'Mellen, Yaounde',
            'email' => 'keyceinformatique@gmail.com',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('schools')->insert([
            'name' => 'Paris Formation',
            'localisation' => 'Paris, France',
            'email' => 'parisformation@gmail.com',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
