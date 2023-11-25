<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Comment;
use Faker\Provider\Lorem;
use Illuminate\Database\Seeder;
use \App\Models\User;
use \App\Models\Category;
use \App\Models\Post;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        Post::truncate();
        Category::truncate();
        Comment::truncate();
        User::truncate();

        $user = User::factory()->create();

        $personal = Category::create([
            'name' => 'Personal',
            'slug' => 'personal',
        ]);
        
        $family  = Category::create([
            'name' => 'Family',
            'slug' => 'family',
        ]);
        
        $work    = Category::create([
            'name' => 'Work',
            'slug' => 'work',
        ]);

        Post::create([
            'user_id'=> $user->id,
            'category_id'=> $family -> id,
            'title'=>'My Family Post',
            'slug' => 'first-post',
            'excerpt' => '<p> excerpt of first post </p>',
            'body' => '<p> loremlorem ipsum dolar sit amitlorem ipsum dolar sit amitlorem ipsum dolar sit amitlorem ipsum dolar sit amitlorem ipsum dolar sit amitlorem ipsum dolar sit amit </p>'
        ]);

        Post::create([
            'user_id'=> $user->id,
            'category_id'=> $personal->id,
            'title'=>'My Personal Post',
            'slug' => 'second-post',
            'excerpt' => '<p>excerpt of second post</p>',
            'body' => '<p> loremlorem ipsum dolar sit amitlorem ipsum dolar sit amitlorem ipsum dolar sit amitlorem ipsum dolar sit amitlorem ipsum dolar sit amitlorem ipsum dolar sit amit </p>'
        ]);
        
        Post::create([
            'user_id'=> $user->id ,
            'category_id'=> $work->id,
            'title'=>'My Work Post',
            'slug' => 'third-post',
            'excerpt' => '<p>excerpt of third post</p>',
            'body' => '<p> loremlorem ipsum dolar sit amitlorem ipsum dolar sit amitlorem ipsum dolar sit amitlorem ipsum dolar sit amitlorem ipsum dolar sit amitlorem ipsum dolar sit amit </p>'
        ]);
    }
}
