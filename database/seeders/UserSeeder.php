<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@gmail.com',
            'phone' => 'admin123',
            'usertype' => 'admin',
            'password' => Hash::make('admin123'), // Hash the password
        ]);

        User::create([
            'name' => 'Regular User',
            'email' => 'user@example.com',
            'phone' => '0987654321',
            'usertype' => 'user',
            'password' => Hash::make('user123'), // Hash the password
        ]);
    }
}
