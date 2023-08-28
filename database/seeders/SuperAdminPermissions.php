<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;

class SuperAdminPermissions extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // create super-admin role for api guard
        $superAdminRole = Role::create(['name' => 'super-admin']);

        // assign super-admin role from api guard to user of id 1
        $user = User::find(1);
        $user->assignRole($superAdminRole);
    }
}
