<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    public function index()
    {
        $orders = Order::all();
        return view('admin.orders.index', ['orders' => $orders]);
    }
    public function create()
    {
    }
}
