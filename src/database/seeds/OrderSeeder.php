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
        $exam1 = Exam::create([
            'name' => '病理部'
        ]);
        $exam2 = Exam::create([
            'name' => '内視鏡科'
        ]);
        $exam3 = Exam::create([
            'name' => '放射線科'
        ]);
        factory(App\Order::class, 20)->create();
    }
}
