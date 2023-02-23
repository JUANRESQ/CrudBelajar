<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
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

        Post::create([
            'title' => 'anu',
            'content' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cupiditate dignissimos minima libero ab eligendi earum distinctio accusantium fuga temporibus quasi.',
            'slug' => ('anu'),
            'status' => 1,
            'user_id' => 2
        ]);
        Post::create([
            'title' => 'post 4',
            'content' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cupiditate dignissimos minima libero ab eligendi earum distinctio accusantium fuga temporibus quasi.',
            'slug' => ('post-4'),
            'status' => 1,
            'user_id' => 1
        ]);
        Post::create([
            'title' => 'post 5',
            'content' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cupiditate dignissimos minima libero ab eligendi earum distinctio accusantium fuga temporibus quasi.',
            'slug' => ('post-5'),
            'status' => 2,
            'user_id' => 2
        ]);
        Post::create([
            'title' => 'post 6',
            'content' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cupiditate dignissimos minima libero ab eligendi earum distinctio accusantium fuga temporibus quasi.',
            'slug' => ('post-6'),
            'status' => 1,
            'user_id' => 3
        ]);
        Post::create([
            'title' => 'post 7',
            'content' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cupiditate dignissimos minima libero ab eligendi earum distinctio accusantium fuga temporibus quasi.',
            'slug' => ('post-7'),
            'status' => 2,
            'user_id' => 3
        ]);
    }
}
