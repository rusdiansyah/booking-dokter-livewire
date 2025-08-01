<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        Role::factory()->create([
            'nama' => 'Admin',
        ]);

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@email.com',
            'role_id' => 1,
            'password' => Hash::make('password'),
        ]);
    }
}
