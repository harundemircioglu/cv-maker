<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::firstOrCreate(['email' => 'superadmin@mail.com'], [
            'name' => 'Super Admin',
            'password' => bcrypt('password'),
        ])->assignRole('super-admin');

        User::firstOrCreate(['email' => 'admin@mail.com'], [
            'name' => 'Admin',
            'password' => bcrypt('password'),
        ])->assignRole('admin');

        User::firstOrCreate(['email' => 'guest@mail.com'], [
            'name' => 'Guest',
            'password' => bcrypt('password'),
        ])->assignRole('Guest');
    }
}
