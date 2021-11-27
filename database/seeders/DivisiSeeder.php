<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Divisi;
class DivisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Divisi::insert([
            ['nama_divisi' => 'Divisi 1'],
            ['nama_divisi' => 'Divisi 2'],
            ['nama_divisi' => 'Divisi 3'],
            ['nama_divisi' => 'Divisi 4'],
        ]);
    }
}
