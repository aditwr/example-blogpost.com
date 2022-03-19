<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // \App\Models\User::factory(10)->create();
        // User::factory(5)->create();
        Post::factory(200)->create();
        // Category::factory(5)->create();
        Comment::factory(500)->create();

        $user = [
            [
                'name' => 'Aditya Wahyu',
                'username' => 'aditya',
                'password' => Hash::make('adityawahyu'),
                'email' => 'aditya@gmail.com'
            ],
            [
                'name' => 'Ririn Putri',
                'username' => 'ririn',
                'password' => Hash::make('sinta'),
                'email' => 'ririn@gmail.com'
            ],
            [
                'name' => 'Pepdriyanto Cahyo',
                'username' => 'cahyo',
                'password' => Hash::make('cahyo'),
                'email' => 'cahyo@gmail.com'
            ],
            [
                'name' => 'Djati Iksan',
                'username' => 'djati',
                'password' => Hash::make('djati'),
                'email' => 'djati@gmail.com'
            ],
            [
                'name' => 'Vita Kumalasari',
                'username' => 'vita',
                'password' => Hash::make('vita'),
                'email' => 'vita@gmail.com'
            ],
            [
                'name' => 'Putri Kirana',
                'username' => 'putrikirana',
                'password' => Hash::make('putrikirana'),
                'email' => 'putrikirana@gmail.com'
            ],
            [
                'name' => 'Galih Putra',
                'username' => 'galih',
                'password' => Hash::make('galih'),
                'email' => 'galihputra@gmail.com'
            ],
        ];

        User::create($user[0]);
        User::create($user[1]);
        User::create($user[2]);
        User::create($user[3]);
        User::create($user[4]);
        User::create($user[5]);
        User::create($user[6]);

        $category = [
            [
                'name' => 'Web Programming',
                'slug' => 'web-programming',
            ],
            [
                'name' => 'Web Design',
                'slug' => 'web-design',
            ],
            [
                'name' => 'Software Development',
                'slug' => 'software-development',
            ],
            [
                'name' => 'Mobile Development',
                'slug' => 'mobile-development',
            ],
            [
                'name' => 'Design',
                'slug' => 'design',
            ],
        ];
        Category::create($category[0]);
        Category::create($category[1]);
        Category::create($category[2]);
        Category::create($category[3]);
        Category::create($category[4]);
    }
}
