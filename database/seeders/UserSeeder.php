<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::firstOrCreate([
            'email' => 'student@gmail.com',
            'password' => Hash::make('password'),
            'email_verified_at'=>now(),
            'last_login' => now(),
            'type' => 0,
        ]);

        User::firstOrCreate([
            'email' => 'cbe@gmail.com',
            'password' => Hash::make('password'),
            'email_verified_at'=>now(),
            'last_login' => now(),
            'type' => 1,
        ]);

        User::firstOrCreate([
            'email' => 'department@gmail.com',
            'password' => Hash::make('password'),
            'email_verified_at'=>now(),
            'last_login' => now(),
            'type' => 2,
        ]);

        User::firstOrCreate([
            'email' => 'supervisor@gmail.com',
            'password' => Hash::make('password'),
            'email_verified_at'=>now(),
            'last_login' => now(),
            'type' => 3,
        ]);

        User::firstOrCreate([
            'email' => 'institution@gmail.com',
            'password' => Hash::make('password'),
            'email_verified_at'=>now(),
            'last_login' => now(),
            'type' => 4,
        ]);
    }
}
