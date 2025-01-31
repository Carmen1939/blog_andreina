<?php

namespace Database\Seeders;
use App\Models\Post;
use App\Models\category;
use App\Models\comments;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         User::factory()->create();
        // User::factory(10)->create();
        
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'user' => 'apirela',
        // ]);
        category::factory(5)->create();
        Post::factory(20)->create();
        comments::factory(10)->create();

        }
}
