<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class usersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'name' => 'manteca',
            'email' => 'manteca@gmail.com',
            'password' => '12345678',
            'users_id' => 1,
            'status' => 1,
         ]);
    }
}
