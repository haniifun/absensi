<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Pembina
        Permission::firstOrCreate(['name' => 'tambah-ketua'])->assignRole('pembina');
        Permission::firstOrCreate(['name' => 'hapus-ketua'])->assignRole('pembina');
        // Ketua
        Permission::firstOrCreate(['name' => 'buat-jadwal'])->assignRole('ketua');
        Permission::firstOrCreate(['name' => 'edit-jadwal'])->assignRole('ketua');
        Permission::firstOrCreate(['name' => 'hapus-jadwal'])->assignRole('ketua');
        Permission::firstOrCreate(['name' => 'tambah-anggota'])->assignRole('ketua');
        Permission::firstOrCreate(['name' => 'edit-anggota'])->assignRole('ketua');
        Permission::firstOrCreate(['name' => 'hapus-anggota'])->assignRole('ketua');
        Permission::firstOrCreate(['name' => 'ubah-status'])->assignRole('ketua');
        Permission::firstOrCreate(['name' => 'approve-absensi'])->assignRole('ketua');
        Permission::firstOrCreate(['name' => 'export'])->assignRole('ketua');
        // Mahasiswa
        Permission::firstOrCreate(['name' => 'absensi'])->assignRole('mahasiswa');
        
        // Admin
        Permission::firstOrCreate(['name' => 'tambah-ketua'])->assignRole('admin');
        Permission::firstOrCreate(['name' => 'hapus-ketua'])->assignRole('admin');
        Permission::firstOrCreate(['name' => 'buat-jadwal'])->assignRole('admin');
        Permission::firstOrCreate(['name' => 'edit-jadwal'])->assignRole('admin');
        Permission::firstOrCreate(['name' => 'hapus-jadwal'])->assignRole('admin');
        Permission::firstOrCreate(['name' => 'tambah-anggota'])->assignRole('admin');
        Permission::firstOrCreate(['name' => 'edit-anggota'])->assignRole('admin');
        Permission::firstOrCreate(['name' => 'hapus-anggota'])->assignRole('admin');
        Permission::firstOrCreate(['name' => 'ubah-status'])->assignRole('admin');
        Permission::firstOrCreate(['name' => 'approve-absensi'])->assignRole('admin');
        Permission::firstOrCreate(['name' => 'export'])->assignRole('admin');
        Permission::firstOrCreate(['name' => 'absensi'])->assignRole('admin');
    }
}
