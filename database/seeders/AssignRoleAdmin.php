<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class AssignRoleAdmin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        // Create the admin user
        $admin = User::create([
            'id' => 1,
            'name' => 'SIPAR Admin',
            'email' => 'mgilangbagindo@gmail.com',
            'password' => Hash::make('12345678'),
            'avatar' => '',
            'role' => ''
        ]);

        // Assign the Administrator role
        $adminRole = Role::where('name', 'Administrator')->first();
        if ($adminRole) {
            $admin->assignRole($adminRole);
        }
    }
}
