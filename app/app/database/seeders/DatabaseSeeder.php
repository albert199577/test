<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
// use Illuminate\Support\Facades\DB; 
// use Illuminate\Support\Str;
use App\Models\User;
use App\Models\BlogPost;
use App\Models\Comment;


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
        // DB::table('users')->insert([
        //     'name' => 'Albert',
        //     'email' => 'albert@gmail.com',
        //     'email_verified_at' => now(),
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        //     'remember_token' => Str::random(10),
        // ]);

        $doe = User::factory(20)->create();

        $else = User::factory(1)->Bob()->create();

        // dd(get_class($doe), get_class($else));
        $users = $else->concat($doe);
        $posts = BlogPost::factory(50)->make()->each(function ($post) use($users) {
            $post->user_id = $users->random()->id;
            $post->save();
            // $post->user()->associate($users->random())->save();
        });

        $comments = Comment::factory(150)->make()->each(function ($comment) use($posts) {
            $comment->blog_post_id = $posts->random()->id;
            $comment->save();
        });
        
        dd($posts->count());
    }
}
