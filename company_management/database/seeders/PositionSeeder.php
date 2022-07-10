<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $existing = DB::table('positions')->count();
        if ($existing) {
            return;
        }

        DB::table('positions')->insert([
            'position_name' => 'Assistant IT Department',
            'priority' => 5,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('positions')->insert([
            'position_name' => 'Chef IT Department',
            'priority' => 4,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('positions')->insert([
            'position_name' => 'Gestionnaire des ressources humaines',
            'priority' => 3,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('positions')->insert([
            'position_name' => 'Directeur financier',
            'priority' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('positions')->insert([
            'position_name' => 'Directeur general',
            'priority' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('positions')->insert([
            'position_name' => 'Administrateur systeme',
            'priority' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
