<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
     {
        User::create([
            'name' => 'Seu Nome', 
            'email' => 'admin@gmail.com', 
            'email_verified_at' => now(), 
            'password' => Hash::make('12345678'), 
        ]);
    }
}
