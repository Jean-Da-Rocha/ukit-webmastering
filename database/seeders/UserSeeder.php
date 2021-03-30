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
        User::factory(50)->create();

        User::create([
            'username' => 'tester',
            'email' => 'test@test.com',
            'password' => '$2y$12$iFMUxcP/aC7Gnue3zp67wOBxPrebcLGOwZ9i4EHZrzqW4qo4QUDZO', // testings
            'role_id' => config('role.admin'),
        ]);
    }
}
