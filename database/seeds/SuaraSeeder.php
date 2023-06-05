<?php

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SuaraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $suara = Factory::create('id_ID');
        for ($i = 1; $i <= 20; $i++) {
            DB::table('suara')->insert([
                'user_id' => $suara->numberBetween(52, 91),
                'kandidat_id' => $suara->numberBetween(1, 3),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
