<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $existing = DB::table('users')->count();
        if ($existing) {
            return;
        }

        DB::table('users')->insert([
            'firstName' => 'Admin',
            'lastName' => 'admin',
            'phoneNumber' => '+237689098765',
            'position_id' => 1,
            'role' => 'admin',
            'email' => 'admin@gmail.com',
            'qr_code' => 'uoijdsvsdjv',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('users')->insert([
            'firstName' => 'Nlend',
            'lastName' => 'Patrick',
            'phoneNumber' => '+237699493765',
            'position_id' => 3,
            'role' => 'manager',
            'email' => 'nlendpatrick@gmail.com',
            'qr_code' => 'uoijdsvsdjv',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('users')->insert([
            'firstName' => 'Tombi',
            'lastName' => 'Emmanuel',
            'phoneNumber' => '+237670458765',
            'position_id' => 2,
            'role' => 'director',
            'email' => 'tombiemmanuel@gmail.com',
            'qr_code' => 'uoijdsvsdjv',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('users')->insert([
            'firstName' => 'Hamadou',
            'lastName' => 'Ismael',
            'phoneNumber' => '+237680456765',
            'position_id' => 4,
            'department_id' => 1,
            'role' => 'supervisor',
            'email' => 'hamadouismael@gmail.com',
            'qr_code' => 'uoijdsvsdjv',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('users')->insert([
            'firstName' => 'Mva',
            'lastName' => 'Cecilia',
            'phoneNumber' => '+237670486265',
            'position_id' => 5,
            'department_id' => 1,
            'role' => 'employee',
            'email' => 'ceciliamva107@gmail.com',
            'qr_code' => 'uoijdsvsdjv',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
