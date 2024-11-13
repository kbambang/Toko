<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;

class KasirSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      User::create([
        'name' => 'Kasir1',
        'email' => 'kasir1@gmail.com',
        'role' => 'kasir',
        'password' => bcrypt('123')
      ]);
    }
}
