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
            ['nama_divisi' => 'Divisi A'],
            ['nama_divisi' => 'Divisi B'],
            ['nama_divisi' => 'Divisi C'],
            ['nama_divisi' => 'Divisi D'],
        ]);
    }
}
