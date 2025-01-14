<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        // Membuat atau memperbarui Roles
        $admin = Role::updateOrCreate(['name' => 'Administrator']);
        $pengelola = Role::updateOrCreate(['name' => 'Pengelola']);
        $user = Role::updateOrCreate(['name' => 'User']);

        // Membuat Permissions
        $viewLaporan = Permission::updateOrCreate(['name' => 'view-laporan']);
        // Memberikan Permissions ke Role
        $admin->givePermissionTo($viewLaporan);
        $pengelola->givePermissionTo($viewLaporan);
    }
}
