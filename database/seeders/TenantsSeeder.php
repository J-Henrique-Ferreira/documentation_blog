<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tenant;


class TenantsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i <= 5; $i++) {
            Tenant::updateOrCreate([
                'name' => 'Tenant' . $i + 1,
                'domain' => 'tenant' . $i + 1
            ]);
        }
    }
}
