<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
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
        // Ambil role Pengelola
        $PengelolaRole = Role::findByName('Pengelola');

        if ($PengelolaRole) {
            // Update pengguna dengan ID 2 hingga 5 agar memiliki role Pengelola
            User::whereBetween('id', [2, 5])->get()->each(function ($user) use ($PengelolaRole) {
                // Menyinkronkan role pengguna dengan role Pengelola
                $user->syncRoles(['Pengelola']);
            });
        }
    }
}
