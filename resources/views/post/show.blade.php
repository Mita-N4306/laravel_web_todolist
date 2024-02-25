@extends('layouts.app')
@section('content')
 <div class="Individual-container">
  <h2>投稿の個別表示</h2>
 </div>
 @include('commons.success_message')
  <div class="show-post-container">
     <p>{{$post->title}}</p>
     <p>{!! nl2br(e($post->body)) !!}</p>
     @if($post->image)
     <div class="body-container">
      <img src="{{ asset('storage/images/'.$post->image)}}" alt="投稿画像">
      <p>(画像ファイル：{{ $post->image }})</p>
     </div>
     @endif
      <div class="name-display-container">
       <p> {{ $post->user->name }}さん • {{$post->created_at->diffForHumans()}}</p>
      </div>
     @if(Auth::id() === $post->user_id)
        <div class="button-comprehensive">
         <a href="{{ route('post.edit',$post) }}">
          <div class="edit-button-container">
           <button type="button" class="btn btn-success">編集</button>
          </div>
         </a>
     @endif
     @if(Auth::id() === $post->user_id)
        <form action="{{ route('post.destroy',$post) }}" method="post">
         @csrf
         @method('delete')
         <div class="edit-button-container">
          <button type="submit" class="btn btn-danger" onClick="return confirm('本当に削除しますか？');" >削除</button>
         </div>
        </form>
        </div>
     @endif
    </div>
@include('comment.show')
@endsection
