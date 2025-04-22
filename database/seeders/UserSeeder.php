<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        $users = [
            ['email' => 'admin@test.com', 'role' => 'admin'],
            ['email' => 'shipper@test.com', 'role' => 'shipper'],
            ['email' => 'carrier@test.com', 'role' => 'carrier'],
        ];

        foreach ($users as $userData) {
            User::updateOrCreate(
                ['email' => $userData['email']],
                [
                    'name' => explode('@', $userData['email'])[0],
                    'password' => Hash::make('12345678'),
                    'role' => $userData['role'],
                ]
            );
        }
    }
}
