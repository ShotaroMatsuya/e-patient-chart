<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    //
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->get();
        // $posts = auth()->user()->posts();//posts()[メソッド]とするとそのあとにメソッドチェーンをつなぐことができる
        // $posts = auth()->user()->posts; //posts[プロパティ]とするとcollection型の配列が取得できる(foreachで回せる)

        // $posts = DB::table('posts')->paginate(5);
        // $posts = auth()->user()->posts()->paginate(5);
        // dd($posts);
        return view('admin.posts.index', ['posts' => $posts]);
    }
    public function show(Post $post)
    {
        // dd($id);
        // Post::findOrFail($id);
        return view('admin.posts.edit', ['post' => $post]);
    }
    public function create()
    {
        $doctors = User::all()->whereNotNull('major');
        // dd($doctors);
        $this->authorize('create', Post::class); //PostPolicyクラスで定義されているmethodをセット、第２引数にPostモデルをセット

        return view('admin.posts.create', ['doctors' => $doctors]);
    }
    public function store(Request $request)
    {
        $this->authorize('create', Post::class); //PostPolicyクラスで定義されているmethodをセット、第２引数にPostモデルをセット

        // auth()->user();
        // dd(request()->all());
        $inputs = request()->validate([
            'name' => 'required|min:3|max:255',
            // 'post_image'=>'mimes:jpeg,png,bmp'
            'birthday' => 'required',
            'sex' => 'required',
            'clinical_diagnosis' => 'required',
            'description' => 'required',
            'user_id' => 'required'

        ]);

        // if (request('post_image')) {
        //     $inputs['post_image'] = request('post_image')->store('images'); //filesystemで設定されいてるpathの直下にimagesというフォルダを作りそのなかにimageファイルを格納する(デフォルトだとstorage直下に生成)
        // }

        // dd($request->post_image);

        // auth()->user()->posts()->create($inputs);
        $post = Post::create($inputs);
        // dd($post);

        session()->flash('post-created-message', 'Post with title was created. ' . $post->name);


        return redirect()->route('admin.index');
    }
    public function edit(Post $post)
    {
        $this->authorize('view', $post); //PostPolicyクラスのviewをセット,
        // if(auth()->user()->can('view',$post)){

        // }
        return view('admin.posts.edit', ['post' => $post]);
    }


    public function destroy(Post $post, Request $request)
    {
        $this->authorize('delete', $post); //PostPolicyクラスで定義されているmethodをセット、第２引数にPostモデルをセット

        // if (auth()->user()->id !== $post->user_id){
        $post->delete();
        // Session::flash('message', 'Post was deleted.');
        $request->session()->flash('message', 'Post was deleted.');
        return back();
    }
    public function update(Post $post)
    {
        $inputs = request()->validate([
            'name' => 'required|min:3|max:255',
            // 'post_image'=>'mimes:jpeg,png,bmp'
            'birthday' => 'required',
            'sex' => 'required',
            'clinical_diagnosis' => 'required',
            'description' => 'required'

        ]);

        //連想配列として取得されている
        //saveメソッドを使うためにはinstance(オブジェクト)にする必要がある
        // if (request('post_image')) {
        //     $inputs['post_image'] = request('post_image')->store('images'); //filesystemで設定されいてるpathの直下にimagesというフォルダを作りそのなかにimageファイルを格納する(デフォルトだとstorage直下に生成)
        //     $post->post_image = $inputs['post_image'];
        // }
        $post->name = $inputs['name'];
        $post->birthday = $inputs['birthday'];
        $post->sex = $inputs['sex'];
        $post->clinical_diagnosis = $inputs['clinical_diagnosis'];
        $post->description = $inputs['description'];

        $this->authorize('update', $post); //PostPolicyクラスで定義されているmethodをセット、第２引数にPostモデルをセット

        $post->save(); //saveメソッドは新規作成時も更新時も同じ用に使用できる
        // $post->update([]);updateメソッドは更新時のみに使用でき、引数に配列をセットすることができる
        // auth()->user()->posts()->save($post); //userモデルで定義したrelationshipを用いてsaveするとuser情報もupdateされる
        session()->flash('post-updated-message', 'Patient was updated. ' . $inputs['name']);

        return redirect()->route('admin.index');
    }
}
