@extends('layouts.app')
 @section('content')
  <div class="form-container">
     <div class="register-top-container">
       <h1>--REGISTER--</h1>
       <img src="{{asset('img/login.jpg')}}" alt="ログイン画像">
       <p>新規登録を行うと、コメント欄を利用できたり、あなたの登録したコメント一覧を閲覧することができます。</p>
     </div>
  </div>
  <div class="text-container">
    <div class="exposition-container">
     <h2>新規会員登録</h2>
     <p>↓↓登録は以下を入力後、新規登録ボタンを押してください↓↓</p>
    </div>
     <form action="{{route('signup.post')}}" method="post">
      @csrf
      <div class="form-group">
        <label for="name">名前</label>
        <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required>
       </div>
       <div class="form-group">
         <label for="email">メールアドレス</label>
         <input type="text" id="email" name="email" class="form-control" value="{{ old('email') }}" required>
       </div>
       <div class="form-group">
          <label for="password">パスワード</label>
          <input type="password" id="password" name="password" class="form-control" value="{{ old('password')}}" required>
       </div>
       <div class="form-group">
          <label for="password_confirmation">パスワード確認</label>
          <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" value="{{ old('password_confirmation') }}" required>
       </div>
       <div class="button-container">
        <button type="submit" class="btn btn-primary">新規登録</button>
       </div>
     </form>
      @include('commons.return_back')
  </div>
 @endsection

