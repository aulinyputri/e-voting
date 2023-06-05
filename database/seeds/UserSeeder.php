<?php

use Illuminate\Support\Str;
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
        DB::table('users')->insert([
            // 'kelas_id' => 1,
            'role' => 'admin',
            'nim' => '0',
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'code_unique' => Str::random(6),
            'phone_number' => '089',
            'email_verified_at' => now(),
            'password' => Hash::make('admin'),
            // 'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // $user = Factory::create('id_ID');
        // for ($i = 1; $i <= 50; $i++) {
        //     DB::table('users')->insert([
        //         'kelas_id' => $user->randomElement([2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16]),
        //         'role' => 'user',
        //         'name' => $user->name,
        //         'email' => $user->unique()->safeEmail,
        //         'password' => Hash::make('password'),
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ]);
        // }
    }
}
