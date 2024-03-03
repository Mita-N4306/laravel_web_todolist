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
        <div class="button-comprehensive">
          {{-- ログイン本人以外または管理者は表示されない --}}
          @can('update',$post)
           <a href="{{ route('post.edit',$post) }}">
            <div class="edit-button-container">
             <button type="button" class="btn btn-success">編集</button>
            </div>
           </a>
          @endcan
          @can('delete',$post)
           <form action="{{ route('post.destroy',$post) }}" method="post">
            @csrf
            @method('delete')
             <div class="edit-button-container">
              <button type="submit" class="btn btn-danger" onClick="return confirm('本当に削除しますか？');" >削除</button>
             </div>
           </form>
          @endcan
        </div>
  </div>
@include('comment.show')
@endsection
