<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name' => 'dimas',
            'email' => 'dimSkuy@gmail.com',
            'password' => Hash::make('12345'),
            'role' => 'user'
        ]);

        User::create([
        'name' => 'juhwan',
        'email' => 'nuge@gmail.com',
        'password' => bcrypt('12345'),
        'role' => 'admin'
         ]);

        User::create([
        'name' => 'rapli',
        'email' => 'parli@gmail.com',
        'password' => bcrypt('12345'),
        'role' => 'operator'
         ]);
    }
}
