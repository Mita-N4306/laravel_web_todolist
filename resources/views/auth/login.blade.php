@extends('layouts.app')
 @section('content')
  <div class="form-container">
   <div class="login-top-container">
     <h1>--LOGIN--</h1>
     <img src="{{asset('img/login.jpg')}}" alt="ログイン画像">
     <p>ログインを行うと、コメント欄を利用できたり、あなたの登録したコメント一覧を閲覧することができます。</p>
   </div>
   </div class="text-container">
    <div class="exposition-container">
     <h2>ログイン</h2>
     <p>↓↓ログインすると投稿やコメントすることができます↓↓</p>
    </div>
     <form action="{{route('login.post')}}" method="post">
      @csrf
       <div class="form-group">
        <label for="email">メールアドレス</label>
         <input type="text" id="email" name="email" class="form-control" value="{{old('email')}}" required>
       </div>
       <div class="form-group">
        <label for="password">パスワード</label>
         <input type="password" id="password" name="password" class="form-control" value="{{old('password')}}" required>
       </div>
       <div class="button-container">
        <button type="submit" class="btn btn-primary">
          ログイン
        </button>
       </div>
     </form>
     <div class="new-register-link">
      <a href="{{route('signup')}}">新規登録はこちら</a>
     </div>
     @include('commons.return_back')
   </div>
  </div>
 @endsection

