<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>influencer_education</title>
</head>
<body>
  <header class="header-content">
    <nav>
        <a class="nav-button" href="/">授業管理</a>
        @if (Auth::check())
            <a class="nav-button" href="/">お知らせ管理</a>
            <a class="nav-button" href="/">バナー管理</a>
                <form method="POST" action="/logout">
                    @csrf
                    <button class="logout-button" type="submit">ログアウト</button>
                </form>
        @else
            <a class="nav-button" href="/">ログイン</a>
        @endif
    </nav>
  </header>
  <div class="container">
      @yield('content')
  </div>
</body>
</html>
