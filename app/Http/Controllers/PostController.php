<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $posts = Post::with('user','comments')->orderBy('created_at','desc')->paginate(5);
      $user = auth()->user;
      return view('welcome',['posts' => $posts,]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      $inputs = $request->validate([
      'title' => 'required|max:255',
      'body' => 'required|max:2000',
      'image' => 'image|max:2000',
      ]);
      $post = new Post(); //postモデルに準じてpostのインスタンスを作成
      $post->title = $request->title;
      $post->body = $request->body;
      $post->user_id = auth()->user()->id;

      if(request('image')) {  //もし送信されたデータの中にimageがあれば、次の処理を行う↓↓
        $original = request()->file('image')->getClientOriginalName(); //元々のファイル名を取得し、これを$originalに代入する
        $name = date('Ymd_His').'_'.$original;  //秒まで表示する日付を表示させ、$nameの名前で画像ファイルを指定した場所に保存する
        request()->file('image')->move('storage/images',$name);  //$nameの名前で画像ファイルのファイル名をデータベースに保存する
        $post->image = $name;
      }
      $post->save();
      return redirect()->route('top',$post)->with('message','投稿を送信しました');
    }


    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
      return view('post.show',['post'=>$post]);
    }
    public function showWelcomePage()
    {
     $posts=Post::with('comments')->paginate(5); // ユーザーのコメント一覧を取得（ログイン状態に関係なく）
     return view('welcome',['posts'=>$posts]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
      return view('post.edit',['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
       $inputs = $request->validate([
          'title' => 'required|max:255',
          'body' => 'required|max:2000',
          'image' => 'image|max:2000',
       ]);
       $post->title = $inputs['title'];
       $post->body = $inputs['body'];

       if(request('image')) {
        $original =request()->file('image')->getClientOriginalName();
        $name = date('Ymd_His').'_'.$original;
        $file = request()->file('image')->move('storage/images',$name);
        $post->image = $name;
       }
       $post->save();
       return redirect()->route('post.show',$post)->with('message','投稿を更新しました');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
      $post->delete();
      return redirect()->route('top')->with('message','投稿を削除しました');
    }
}
