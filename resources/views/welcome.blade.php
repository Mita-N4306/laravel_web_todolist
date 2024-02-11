@extends('layouts.app')
@section('content')
<div class="top-container">
 @if(Auth::check())
  <div class="login-message-container">
   <h5>ログイン中</h5>
  </div>
 @endif
  <div class="top-container-area">
    <h1>web開発 To Do List(仮:Ver10)</h1>
  </div>
  @if(Auth::check())
   <div class="post-container">
     <h2>投稿新規作成</h2>
     <p>↓↓投稿内容を2000文字以内で入力後、投稿ボタンを押してくださいm(__)m</p>
      @include('commons.success_message')
       <form action="{{ route('post.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
         <div class="form-group">
          <label for="title">件名</label>
           <input type="text" id="title" name="title" required value="{{ old('title')}}">
         </div>
         <div class="form-group">
          <label for="body">本文</label>
           <textarea class="post-content" name="body" id="body" cols="30" rows="10" required>{{ old('body') }}</textarea>
         </div>
         <div class="form-group">
          <label for="image">画像を入れる</label>
           <input type="file" id="image" name="image">
         </div>
         <div class="button-container">
            <button type="submit" class="btn btn-primary">記事を投稿する</button>
         </div>
       </form>
   </div>
  @endif
  <div class="search-container" >
   <h3>Web開発で分からないところはここで一発解決!(検索窓から検索してください)</h3>
  </div>
   @include('commons.carousel')
    <div class="posts-container">
     @if(Auth::check())
      <div class="user-name-container">
       <h3>{{Auth::user()->name}}さん、こんにちは！</h3>
      </div>
     @endif
     @if(isset($posts) && count($posts) >0)
      @foreach($posts as $post)
       <div class="idex-post-container">
        <div class="title-container">
          <a href="{{ route('post.show',$post)}}">
            <p>件名:{{$post->title}}</p>
          </a>
        </div>
        <div class="body-container">
          <p>投稿内容:{{Str::limit($post->body,100,'...')}}</p>
        </div>
        <div class="post-user-date">
          <p>{{$post->user->name}}さん、{{$post->created_at->diffForHumans()}}</p>
        </div>
        <div class="comment-badge-container">
          @if($post->comments->count())
           <span class="badge">コメント{{$post->comments->count()}}件</span>
           @else
            <span>コメントはまだありません</span>
          @endif
          @if(Auth::id())
           <a href="{{route('post.show'.$post)}}">
            <div class="button-container">
              <button type="submit" class="btn btn-success">コメントする</button>
            </div>
           </a>
          @endif
        </div>
       </div>
      @endforeach
      {{ $posts->links("pagination::bootstrap-4") }}
       @else
        <p>No posts available.</p>
     @endif
    </div>
</div>
@endsection
