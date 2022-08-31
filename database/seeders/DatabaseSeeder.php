<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // User::create([
        //     'name' => 'Abdur Rafi',
        //     'email' => 'rafi@mail.com',
        //     'password' => bcrypt('password')
        // ]);

        // User::create([
        //     'name' => 'Loid Forger',
        //     'email' => 'loid@mail.com',
        //     'password' => bcrypt('password')
        // ]);

        User::factory(5)->create();

        Category::create([
            'name' => 'Web Developer',
            'slug' => 'web-developer'
        ]);

        Category::create([
            'name' => 'UI/UX',
            'slug' => 'ui-ux'
        ]);

        Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);


        Post::factory(20)->create();
    }
}
