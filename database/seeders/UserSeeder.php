<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'Henry';
        $user->email = 'henry@root.com';
        $user->password = '$2y$10$T4BfLYegQTjxHiZJWtbW9ulET/EEi/VpIwbUwRKUC9V.';
        $user->role_id = 1;
        $user->save();

        $user = new User();
        $user->name = 'Hilure';
        $user->email = 'henry@creator.com';
        $user->password = '$2y$10$T4BfLYegQTjxHiZJWtbW9ulET/EEi/VpIwbUwRKUC9V.';
        $user->role_id = 2;
        $user->save();

        $user = new User();
        $user->name = 'Heri';
        $user->email = 'henry@user.com';
        $user->password = '$2y$10$T4BfLYegQTjxHiZJWtbW9ulET/EEi/VpIwbUwRKUC9V.';
        $user->role_id = 3;
        $user->save();
    }
}
