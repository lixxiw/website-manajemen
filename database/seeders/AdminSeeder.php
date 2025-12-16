<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'stokadmin@example.com'],
            [
                'name' => 'Admin',
                'email' => 'gwanteng@gmail.com',
                'password' => Hash::make('dilon912'),
                'role' => 'admin',
            ]
        );
    }
}
