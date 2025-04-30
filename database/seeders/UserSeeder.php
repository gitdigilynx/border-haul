<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin@test.com',
                'role' => 'Admin',
                'password' => '12345678',
            ],
            [
                'name' => 'Shipper',
                'email' => 'shipper@test.com',
                'role' => 'Shipper',
                'password' => '12345678',
            ],
            [
                'name' => 'Carrier',
                'email' => 'carrier@test.com',
                'role' => 'Carrier',
                'password' => '12345678',
            ],
            [
                'name' => 'Sub Admin',
                'email' => 'subadmin@test.com',
                'role' => 'subAdmin',
                'password' => '12345678',
            ],
            [
                'name' => 'Shipper User',
                'email' => 'shipperuser@test.com',
                'role' => 'ShipperUser',
                'password' => '12345678',
            ],
            [
                'name' => 'Carrier User',
                'email' => 'carrieruser@test.com',
                'role' => 'CarrierUser',
                'password' => '12345678',
            ],
        ];

        foreach ($users as $userData) {
            User::updateOrCreate(
                ['email' => $userData['email']],
                [
                    'name' => $userData['name'],
                    'role' => $userData['role'],
                    'password' => Hash::make($userData['password']),
                ]
            );
        }
    }
}
