@extends('layouts.app')
 @section('content')
  <div class="text-container">
    <div class="commentedit-container">
        <h1>--COMMENT EDIT--</h1>
        <img src="{{asset('img/comment_edit.png')}}" alt="コメント編集画像">
    </div>
      <div class="exposition-container">
        <h2>コメントの編集</h2>
        <p>↓↓コメント内容を編集後、更新ボタンを押してください↓↓</p>
      </div>
        <form action="{{route('comment.update',$comment->id)}}" method="post" enctype="multipart/form-data">
           @csrf
           @method('put')
            <div class="form-group">
              <textarea name="body" id="body" cols="30" rows="10" required>{{old('body',$comment->body)}}</textarea>
            </div>
             {{-- 画像の表示 --}}
             @if($comment->image)
              <div class="body-container">
                <img src="{{asset('storage/images/'.$comment->image)}}" alt="コメント画像">
                <p>画像ファイル：{{$comment->image}}</p>
              </div>
             @endif
              <label for="image">違う画像に入れ替える</label>
               <input type="file" name="image" id="image">
                <div class="button-container">
                  <button type="submit" class="btn btn-primary">コメントを更新する</button>
                </div>
        </form>
  </div>
 @endsection
