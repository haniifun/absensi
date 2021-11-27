<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::insert([
            ['name' => 'admin', 'guard_name' => 'web'],
            ['name' => 'pembina', 'guard_name' => 'web'],
            ['name' => 'ketua', 'guard_name' => 'web'],
            ['name' => 'anggota', 'guard_name' => 'web'],
        ]);
    }
}
