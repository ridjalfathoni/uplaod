<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Profil extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('profils')->insert([
            'nama' => 'Muhammad Ridjal Fathoni R.',
            'tempat_lahir' => 'Tuban',
            'tgl_lahir' => '1998-11-25',
            'jenis_kelamin' => 'Laki - laki'
        ]);
    }
}
