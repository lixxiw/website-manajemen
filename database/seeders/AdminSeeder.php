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
                'email' => 'arelanakganteng@gmail.com',
                'password' => Hash::make('Arel0063'),
                'role' => 'admin',
            ]
        );
    }
}
