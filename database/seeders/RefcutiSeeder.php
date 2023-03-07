<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RefcutiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ref_cuti')->insert([
            'id_user' => 'admin',
            'tahun' => 'admin@admin.com',
            'cuti_sudah_dipakai' => '0',
            'cuti_belum_dipakai' => '0',
        ]);
    }
}
