<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'id' => 1, // explicit, so foreign keys elsewhere match reliably
            'name' => 'Test Salesperson',
            'email' => 'test@auto2close.local',
            'password' => Hash::make('password'),
        ]);
    }
}