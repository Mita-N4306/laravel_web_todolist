@foreach($post->comments as $comment)
 <div class="show-comment-container">
    {!! nl2br(e($comment->body)) !!}
    @if($comment->image)
     <div class="body-container">
       <img src="{{asset('storage/images/'.$comment->image)}}" alt="投稿画像(コメント)">
       <p>(画像ファイル：{{$comment->image}})</p>
     </div>
    @endif
     <div>
        <p>{{$comment->user->name}}さん・{{$comment->created_at->diffForHumans()}}</p>
     </div>
    @if(Auth::id() === $comment->user_id)
     <div class="button-comprehensive">
      <a href="{{route('comment.edit',$comment)}}">
          <div class="edit-button-container">
            <button type="button" class="btn btn-success">コメントの編集</button>
          </div>
      </a>
      <form action="{{route('comment.destroy',$comment->id)}}" method="post">
        @csrf
        @method('delete')
         <div class="button-container">
           <button type="submit" class="btn btn-danger" onClick="return-confirm('本当に削除しますか？');">コメントを削除する</button>
         </div>
      </form>
    </div>
    @endif
 </div>
@endforeach
{{-- コメントの機能追加 --}}
@if(Auth::id())
 <div class="comment-container">
  <form action="{{route('comment.store')}}" method="post" enctype="multipart/form-data">
   @csrf
    <div class="form-group">
      <input type="hidden" name="post_id" value="{{$post->id}}">
      <textarea class="post-content" name="body" id="body" cols="30" rows="10" placeholder="コメントを入力してください" required>{{old('body')}}</textarea>
    </div>
    <div class="form-group">
       <label for="image">画像を入れる</label>
       <input type="file" id="image" name="image">
    </div>
      <div class="button-container">
        <button type="submit" class="btn btn-success">コメントする</button>
      </div>
  </form>
 </div>
@endif
{{-- コメント機能ここまで --}}
@include('commons.return_back')
