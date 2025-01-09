<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class AssignRolePengelola extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        // Retrieve the Pengelola and User roles
        $PengelolaRole = Role::where('name', 'Pengelola')->first();
        $UserRole = Role::where('name', 'User')->first();

        if ($PengelolaRole) {
            // Update users with IDs 2 to 5 to have the pengelola role
            User::whereBetween('id', [2, 5])->get()->each(function ($user) use ($PengelolaRole, $UserRole) {
                // Remove the User role if the user has it
                if ($UserRole) {
                    $user->removeRole($UserRole);
                }

                // Assign the Pengelola role
                $user->assignRole($PengelolaRole);
            });
        }
    }
}
