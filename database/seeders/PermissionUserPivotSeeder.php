<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class PermissionUserPivotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usersList = User::all();

        foreach ($usersList as $user) {
            if ($user->id !== 1) {
                $user->assignPermission('client');
                $user->save();
            }
        }

        $userMaster = new User();
        $userMaster = $userMaster->find(1);

        $userMaster->assignPermission("admin_owner");
    }
}
