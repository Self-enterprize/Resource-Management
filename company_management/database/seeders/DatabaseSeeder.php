<?php
namespace Database\Seeders;

use App\Models\Prospect;
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
            PositionSeeder::class,
            UserSeeder::class,
            ProspectSeeder::class,
            SuggestionSeeder::class,
            ComplaintSeeder::class,
            SchoolSeeder::class,
            DepartmentSeeder::class
        ]);
    }
}
