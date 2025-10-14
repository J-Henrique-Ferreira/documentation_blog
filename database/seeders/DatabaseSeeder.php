<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\TenantsSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */

    public function run(): void
    {
        $this->call(TenantsSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(PermissionsSeeder::class);
        $this->call(PermissionUserPivotSeeder::class);
    }
}
