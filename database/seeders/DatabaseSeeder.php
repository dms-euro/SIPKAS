<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name' => 'Admin',
            'password' => Hash::make('123'),
            'email' => 'admin@gmail.com',
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Kelas 9A',
            'password' => Hash::make('123'),
            'email' => '9A@gmail.com',
            'role' => 'kelas',
        ]);
    }
}
