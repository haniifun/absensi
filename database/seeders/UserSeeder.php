<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'nama' => 'Admin Website',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin123'),
            'status' => 'Aktif',
        ]);
        $admin->assignRole('admin');

        $pembina = User::create([
            'nama' => 'Pembina',
            'email' => 'pembina@gmail.com',
            'password' => bcrypt('pembina123'),
            'status' => 'Aktif',
        ]);
        $pembina->assignRole('pembina');

        $ketua = User::create([
            'nama' => 'Ketua',
            'email' => 'ketua@gmail.com',
            'id_univ' => 1,
            'id_divisi' => 1,
            'tahun_ajar' => '2019',
            'status' => 'Aktif',
            'password' => bcrypt('ketua123'),
        ]);
        $ketua->assignRole('ketua');

        $anggota = User::create([
            'nama' => 'Anggota',
            'email' => 'anggota@gmail.com',
            'id_univ' => 1,
            'id_divisi' => 2,
            'tahun_ajar' => '2020',
            'status' => 'Aktif',
            'password' => bcrypt('anggota123'),
        ]);
        $anggota->assignRole('anggota');
    }
}
