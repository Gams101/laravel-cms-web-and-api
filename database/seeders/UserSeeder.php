<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = [
            'email' => 'admin@test.com',
            'password' => bcrypt('Developer123!')
        ];

        User::factory()->create($admin);

    }
}
