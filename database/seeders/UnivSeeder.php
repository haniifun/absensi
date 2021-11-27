<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Univ;

class UnivSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Univ::insert([
            ['nama_univ' => 'Universitas Indonesia'],
            ['nama_univ' => 'Universitas Diponegoro'],
            ['nama_univ' => 'Universitas Gajah Mada'],
            ['nama_univ' => 'IPB University'],
            ['nama_univ' => 'Institut Teknologi Bandung'],
        ]);
    }
}
