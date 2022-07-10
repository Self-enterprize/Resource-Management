<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $existing = DB::table('departments')->count();
        if ($existing) {
            return;
        }

        DB::table('departments')->insert([
            'name' => 'Pole Developement',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('departments')->insert([
            'name' => 'Pole Commercial',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('departments')->insert([
            'name' => 'Pole International',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('departments')->insert([
            'name' => 'Pole Academique',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('departments')->insert([
            'name' => 'Pole Administration',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
