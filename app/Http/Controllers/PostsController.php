<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB; 

use App\Models\Post;

use Illuminate\Support\Facades\Auth;

use resources\views\posts\indexpost;

use Illuminate\Support\Facades\Validator; 

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
 
        $request->validate([
            'newPost' => 'required|max:100', // newPostフィールドは必須で、最大100文字まで
        ]);

        $post = $request->input('newPost');

        if (empty(trim($post)) || preg_match('/^\s*$/', $post) || preg_match('/^[　\s]*$/', $post)) {
            return back()->withInput()->withErrors(['newPost' => '投稿内容は必須です。']);
        }

        if (mb_strlen($post) > 100) {
            return back()->withInput()->withErrors(['newPost' => '投稿内容は100文字以内で入力してください。']);
        }
    
        
    

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

        if ($post->user_id !== Auth::id()) {
            // 投稿者でなければリダイレクトまたはエラー処理
            return redirect('/index');
        }
        
        return view('posts.updateForm', ['post' => $post]);
        
    }

    public function update(Request $request){
 
        $id = $request->input('id');
    $up_post = $request->input('upPost');

    $request->validate([
        'upPost' => 'required|max:100', // upPostフィールドは必須で、最大100文字まで
    ]);
        // 空白判定
        if (empty(trim($up_post)) || preg_match('/^\s*$/', $up_post) || preg_match('/^[　\s]*$/', $up_post)) {
            return back()->withInput()->withErrors(['newPost' => '投稿内容が空白です。']);
        }

        
        
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

        $query = Post::query()->with('user'); // userリレーションをロード

        if(!empty($keyword)) {
            $query->where('post', 'LIKE', "%{$keyword}%");
                // ->orWhere('author', 'LIKE', "%{$keyword}%");
        }
        $lists = $query->get();
        

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

