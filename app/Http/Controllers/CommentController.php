<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
      $inputs = request()->validate([
         'body' => 'required|max:2000',
         'image' => 'image|max:2000',
      ]);

      $comment = Comment::create([
        'body' => $inputs['body'],
        'user_id' => auth()->user()->id,
        'post_id' => $request->post_id,
      ]);
      if($request->hasFile('image')) {
        $original = request()->file('image')->getClientOriginalName();
        $name = date('Ymd_His').'_'.$original;
        $path = 'public/images'.$name; //アップロードされた画像の保存先のパスを指定($nameの名前で)
        request()->file('image')->move(public_path('storage/images'),$name); //保存先のフォルダーを指定
        $comment->image = $name; //コメントモデルの image カラムに、アップロードされた画像の新しい名前（$name）を保存
      }
      $comment->save();
      return redirect()->route('post.show',$comment->post_id)->with('message','コメントを投稿しました');
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
       $this->authorize('update',$comment);
       return view('comment.edit',['comment' => $comment]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
      $this->authorize('update',$comment);
      $inputs = request()->validate([
       'body' => 'required|max:2000',
       'image' => 'image|max:2000',
      ]);
      $comment->update(['body' => $request->input('body')]);
      if($request->hasFile('image')) {
        $original = $request->file('image')->getClientOriginalName();
        $name = date('Ymd_His').'_'.$original;
        $path = 'public/images/'.$name;
        request()->file('image')->move(public_path('storage/images/'),$name);
        $comment->image = $name;
      }
      $comment->save();
      return redirect()->route('post.show',$comment->post_id)->with('message','コメントを更新しました');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
      $this->authorize('delete',$comment);
      $comment->delete();
      return redirect()->back()->with('message','コメントを削除しました');
    }
}
