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
        $orders = Order::orderBy('executed_at', 'desc')->get();
        return view('admin.orders.index', ['orders' => $orders]);
    }
    public function create(Post $post)
    {

        return view('admin.orders.create')->with('exams', Exam::all())->with('doctors', User::all()->whereNotNull('major'))->with('post', $post);
    }
    public function store(Request $request)
    {
        $this->authorize('create', Post::class); //PostPolicyクラスで定義されているmethodをセット、第２引数にPostモデルをセット

        // auth()->user();
        // dd(request()->all());
        $inputs = request()->validate([
            'name' => 'required|min:8|max:255',
            // 'post_image'=>'mimes:jpeg,png,bmp'
            'birthday' => 'required',
            'sex' => 'required',
            'clinical_diagnosis' => 'required',
            'description' => 'required',
            'user_id' => 'required'

        ]);
        $post = Post::create($inputs);
        // dd($post);
        session()->flash('post-created-message', 'Post with title was created. ' . $post->name);

        return redirect()->route('post.index');
    }
}
