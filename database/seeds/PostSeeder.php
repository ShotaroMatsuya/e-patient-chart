<?php

use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // factory('App\User', 10)->create(); //10ユーザー作成
        // factory('App\User')->create()->each(function ($user) {
        //     $user->posts()->save(factory('App\Post')->make());
        // }); //userとそれと関連したpostsも作成
        factory('App\Post', 100)->create()->each(function ($post) {
            $post->user()->save(factory('App\User')->make());
        });
    }
}
