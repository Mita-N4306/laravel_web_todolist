@extends('layouts.app')
 @section('content')
   <div class="contact-container">
      <div class="contact-top-container">
        <h1>--CONTACT--</h1>
        <img src="{{asset('img/contact.png')}}" alt="お問い合わせ画像">
        <h2>お問い合わせ</h2>
        <p>↓↓各フォームを入力後送信ボタンを押してください↓↓</p>
      </div>
        @include('commons.success_message')
        <form action="{{route('contact.store')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="title">件名</label>
            <input type="text" name="title" id="title" value="{{old('title')}}" required placeholder="件名を入力">
        </div>  
        <div class="form-group">
            <label for="email">メールアドレス</label>
            <input type="text" name="email" id="email" value="{{old('email')}}" required placeholder="メールアドレスを入力">
        </div>  
        <div class="form-group">
            <label for="body">本文</label>
            <textarea name="body" id="body" cols="30" rows="10" required placeholder="本文を入力">{{old('body')}}</textarea>
        </div>
        <div class="button-container">
            <button type="submit" class="btn btn-primary">送信する</button>
        </div> 
        </form>
   </div>
   @include('commons.return_back')
 @endsection

