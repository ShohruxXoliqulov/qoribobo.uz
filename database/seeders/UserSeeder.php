<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'Faxriddin',
            'email' => 'faxriddin@gmail.com',
            'password' => Hash::make('fedya123'),
        ]);
        $user->assignRole([1]);

        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('fedya123'),
        ]);
        $user->assignRole([2]);
    }
}
