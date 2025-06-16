<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         User::create([
            'name' => 'Admin LocFest',
            'email' => 'admin@locfest.com',
            'email_verified_at' => now(), 
            'password' => Hash::make('LocFest123'), 
            'tipo' => 3, 
        ]);
    }
}