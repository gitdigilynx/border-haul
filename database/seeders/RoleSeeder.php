<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);
        Role::firstOrCreate(['name' => 'shipper', 'guard_name' => 'web']);
        Role::firstOrCreate(['name' => 'carrier', 'guard_name' => 'web']);
    }
}
