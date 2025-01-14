<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class AssignRoleAdmin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $user = User::find(1); // Temukan pengguna dengan ID 1 (atau ID yang sesuai)
        if ($user) {
            // Menghapus role 'User' jika ada
            $user->removeRole('User');

            // Menambahkan role 'Administrator'
            $user->assignRole('Administrator');
        } else {
            echo "User with ID 1 not found!";
        }
    }
}
