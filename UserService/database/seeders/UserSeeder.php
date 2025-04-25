<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Jalankan seeder.
     */
    public function run(): void
    {
        $users = [
            ['name' => 'Alvyn', 'email' => 'alvyn@email.com'],
            ['name' => 'Adam', 'email' => 'adam@email.com'],
            ['name' => 'Rifki', 'email' => 'rifki@email.com'],
            ['name' => 'Raka', 'email' => 'raka@email.com'],
            ['name' => 'Budi', 'email' => 'budi@email.com'],
            ['name' => 'Santi', 'email' => 'santi@email.com'],
            ['name' => 'Lia', 'email' => 'lia@email.com'],
            ['name' => 'Rian', 'email' => 'rian@email.com'],
            ['name' => 'Dina', 'email' => 'dina@email.com'],
            ['name' => 'Yoga', 'email' => 'yoga@email.com'],
        ];

        foreach ($users as $user) {
            User::create([
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => Hash::make('password') 
            ]);
        }
    }
}
