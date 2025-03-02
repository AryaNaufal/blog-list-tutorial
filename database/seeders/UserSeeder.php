<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->truncate();

        User::factory()->count(5)->create();

        // DB::table('users')->insert([
        //     'name' => 'Admin',
        //     'email' => 'Amin@example.com',
        //     'password' => Hash::make('password'),
        // ]);

        // DB::table('users')->insert([
        //     'name' => 'John Doe',
        //     'email' => 'John@example.com',
        //     'password' => Hash::make('password'),
        // ]);
    }
}
