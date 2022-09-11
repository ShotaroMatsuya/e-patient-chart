<?php

namespace App\Http\Controllers;

use App\Exam;
use App\Post;
use App\User;
use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    public function index()
    {
        $orders = Order::orderBy('executed_at', 'asc')->get();
        return view('admin.orders.index', ['orders' => $orders]);
    }
    public function create(Post $post)
    {

        return view('admin.orders.create')->with('exams', Exam::all())->with('doctors', User::all()->whereNotNull('major'))->with('post', $post);
    }
    public function store(Request $request)
    {
        $this->authorize('create', Order::class); //PostPolicyクラスで定義されているmethodをセット、第２引数にPostモデルをセット


        $inputs = request()->validate([
            'post_id' => 'required',
            'comment' => 'required|min:8|max:255',
            'executed_at' => 'required',
            'exam_id' => 'required'

        ]);
        $order = Order::create($inputs);

        session()->flash('order-created-message', 'Order was reserved to' . $order->exam->name);

        return redirect()->route('orders.index');
    }
    public function edit(Order $order)
    {
        return view('admin.orders.edit')->with('order', $order)->with('doctors', User::all()->whereNotNull('major'));
    }
}