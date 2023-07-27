<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB; 

use App\Models\Post;

use Illuminate\Support\Facades\Auth;

use resources\views\posts\indexpost;

class PostsController extends Controller
{
    //
    public function hello(){
        echo 'Hello World!!<br>';
        echo 'コントローラーから';
    }

    public function index(){
        $list = DB::table('posts')->get();
        return view('posts.index',['lists'=>$list]);
    }

    public function createForm(){
        return view('posts.createForm');
    }

    public function create(Request $request){
 
        $post = $request->input('newPost');
    $user_id = Auth::check() ? Auth::user()->id : null; // ログイン中のユーザーのIDを取得

    DB::table('posts')->insert([
        'post' => $post,
        'user_id' => $user_id // ユーザーのIDを保存
    ]);

    return redirect('/index');
        
    }



    public function updateForm($id){
 
        $post = DB::table('posts')
        
        ->where('id', $id)
        
        ->first();
        
        return view('posts.updateForm', ['post' => $post]);
        
    }

    public function update(Request $request){
 
        $id = $request->input('id');
        
        $up_post = $request->input('upPost');
        
        DB::table('posts')
        
        ->where('id', $id)
        
        ->update(
        
        ['post' => $up_post]
        
        );
        
        return redirect('/index');
        
    }

    public function delete($id){
 
        DB::table('posts')
        
        ->where('id', $id)
        
        ->delete();
        
        
        
        return redirect('/index');
        
    }

    public function in(Request $request)
    {
        $keyword = $request->input('keyword');

        // $query = Post::query();
        $query = Post::query()->with('user'); // userリレーションをロード

        if(!empty($keyword)) {
            $query->where('post', 'LIKE', "%{$keyword}%");
                // ->orWhere('author', 'LIKE', "%{$keyword}%");
        }

        // $posts = $query->get();

        $lists = $query->get();

        // return view('posts.kennsaku', compact('posts', 'keyword'));

        return view('posts.index', ['lists' => $lists, 'keyword' => $keyword]);
        
    }



}

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // ...

    // 投稿とユーザーを結合するリレーションを定義
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}



