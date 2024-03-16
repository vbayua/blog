<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = User::factory()->create([
            'name' => 'John Doe',
            'password' => 'password'
        ]);

        $category = Category::factory()->create([
            'name'=> 'Category 1',
            'slug' => 'category-one',
        ]);

        Post::factory(10)->create([
            'user_id' => $user->id,
            'category_id'=> $category->id
        ]);

        $user = User::factory()->create([
            'name' => 'Elizabeth',
            'password' => 'password'
        ]);

        $category = Category::factory()->create([
            'name'=> 'Category 2',
            'slug' => 'category-two',
        ]);

        Post::factory(10)->create([
            'user_id' => $user->id,
            'category_id'=> $category->id
        ]);

        $user = User::factory()->create([
            'name' => 'Adam Levi',
            'password' => 'password'
        ]);

        $category = Category::factory()->create([
            'name'=> 'Category 3',
            'slug' => 'category-three',
        ]);

        Post::factory(5)->create([
            'user_id' => $user->id,
            'category_id'=> $category->id
        ]);
    }
}
