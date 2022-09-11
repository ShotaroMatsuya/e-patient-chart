<?php

use App\Exam;
use App\Order;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Exam::create([
            'name' => '病理部'
        ]);
        Exam::create([
            'name' => '内視鏡科'
        ]);
        Exam::create([
            'name' => '放射線科'
        ]);
        factory(App\Order::class, 20)->create();
    }
}