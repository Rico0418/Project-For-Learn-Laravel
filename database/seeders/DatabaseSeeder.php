<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // $rico = User::create([
        //     'name' => 'Ricardo eric wijaya',
        //     'username' => 'rico',
        //     'email' => 'asd.com',
        //     'email_verified_at' => now(),
        //     'password' => Hash::make('password'),
        //     'remember_token' => Str::random(10)
        // ]);
        // Category::create([
        //     'name' => 'Web Design',
        //     'slug' => 'web-design'
        // ]);
        // Post::create([
        //     'title' => 'Judul Artikel 1',
        //     'author_id' => 1,
        //     'category_id' =>1,
        //     'slug' => 'judul-artikel-1',
        //     'body' => 'If you install a new version of XAMPP while an old XAMPP folder still exists, it wont automatically override the old installation, as it installs to its own folder by default. This can lead to conflicts because:'
        // ]);

        // Post::factory(10)->recycle([
        //     Category::factory(3)->create(),
        //     $rico,
        //     User::factory(5)->create()
        // ])->create();
        $this->call([CategorySeeder::class,UserSeeder::class]);
        Post::factory(25)->recycle([
            Category::all(),
            User::all()
        ])->create();
    }
}
