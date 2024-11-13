<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;

class DummyUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      $userData = [
        [
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'role' => 'admin',
            'password' => bcrypt('123'),
        ],
        [
            'name' => 'Kasir',
            'email' => 'kasir@gmail.com',
            'role' => 'kasir',
            'password' => bcrypt('123'),
        ],
        [
            'name' => 'Owner',
            'email' => 'owner@gmail.com',
            'role' => 'owner',
            'password' => bcrypt('123'),
        ],
        ];

        foreach ($userData as $key => $val) {
            User::create($val);
        }
    }
}
