<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('users')->truncate();
        DB::table('posts')->truncate();
        DB::table('roles')->truncate();
        DB::table('permissions')->truncate();
        DB::table('orders')->truncate();
        DB::table('results')->truncate();
        DB::table('exams')->truncate();

        // $this->call(UsersTableSeeder::class);



        // factory('App\User', 10)->create();//10ユーザー作成
        // factory('App\User')->create()->each(function ($user) {
        //     $user->posts()->save(factory('App\Post')->make());
        // }); //userとそれと関連したpostsも作成
        $this->call(UserSeeder::class);
        $this->call(PostSeeder::class);
        $this->call(OrderSeeder::class);
        $this->call(ResultSeeder::class);
    }
}