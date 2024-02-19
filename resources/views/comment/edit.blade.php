@extends('layout.app')
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
        </form>
  </div>
 @endsection