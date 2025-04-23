<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        Role::firstOrCreate(['name' => 'Admin', 'guard_name' => 'web']);
        Role::firstOrCreate(['name' => 'Shipper', 'guard_name' => 'web']);
        Role::firstOrCreate(['name' => 'Carrier', 'guard_name' => 'web']);
    }
}
