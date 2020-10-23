<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        // $this->call(UsersTableSeeder::class);


        // factory('App\User', 10)->create();//10ユーザー作成
        factory('App\User', 10)->create()->each(function ($user) {
            $user->posts()->save(factory('App\Post')->make());
        }); //userとそれと関連したpostsも作成
    }
}
