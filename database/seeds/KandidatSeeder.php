<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KandidatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kandidat')->insert([
            [
                'nama_kandidat' => 'Calon ke-1',
                'nama_calon' => 'Yanyan Permana & Abdul Aziz',
                'foto' => 'default.png',
            ],
            [
                'nama_kandidat' => 'Calon ke-2',
                'nama_calon' => 'Roni Rahmatulloh & Imam Alawin',
                'foto' => 'default.png',
            ],
            [
                'nama_kandidat' => 'Calon ke-3',
                'nama_calon' => 'Wismanudin & Dadang Efendi',
                'foto' => 'default.png',
            ],
        ]);
    }
}
