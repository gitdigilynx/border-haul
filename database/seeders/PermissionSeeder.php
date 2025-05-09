<?php

// database/seeders/PermissionSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    public function run()
    {
        $modules = [
            'carrier' => 'Carrier Users',
            'shipper' => 'Shipper Users',
            'address' => 'Address',
            'documents' => 'Documents',
        ];

        $actions = ['add', 'edit', 'delete', 'view'];

        foreach ($modules as $slug => $name) {
            foreach ($actions as $action) {
                Permission::firstOrCreate([
                    'name' => "{$slug}.{$action}",
                    'guard_name' => 'web',
                ]);
            }
        }
    }
}
