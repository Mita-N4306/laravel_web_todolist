<header>
    <div class="header-container">
      <div class="logo-container">
       <a href="{{route('post.index')}}"><img src="{{asset('img/header-logo.png')}}" alt="ヘッダーロゴ画像"></a>
      </div>
      <div class="menu-container">
       @if(Auth::check())
        <ul>
            <li><a href="{{route('logout')}}">ログアウト</a></li>
            <li><a href="{{route('post.mypost')}}">あなたの投稿一覧</a></li>
            <li><a href="{{route('post.mycomment')}}">あなたの返信コメント</a></li>
            <li><a href="#">お問い合わせ</a></li>
        </ul>
       @else
        <ul>
            <li><a href="{{route('signup')}}">新規会員登録</a></li>
            <li><a href="{{route('login')}}">ログイン</a></li>
            <li><a href="#">お問い合わせ</a></li>
        </ul>
       @endif
      </div>
    </div>
</header>
@if(Auth::check())
 <p class="login-user-name">
  ユーザー:<span>{{Auth::user()->name}}さん</span>
 </p>
@endif
