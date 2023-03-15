<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** Roles */
        $adminRole = Role::create(['name' => 'admin']);

        /** User */
        $adminUser = User::factory()
            ->create([
                'email' => 'admin@test.com',
                'password' => bcrypt('Developer123!')
            ]);

        $adminUser->assignRole($adminRole);
    }
}
