<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>influencer_education</title>
</head>
<body>
  <header class="header-content">
    <nav>
        <a class="nav-button" href="/timetable">時間割</a>
        @if (Auth::check())
            <a class="nav-button" href="/progress">授業進捗</a>
            <a class="nav-button" href="/profile">プロフィール設定</a>
                <form method="POST" action="/logout">
                    @csrf
                    <button class="logout-button" type="submit">ログアウト</button>
                </form>
        @else
            <a class="nav-button" href="/login">ログイン</a>
        @endif
    </nav>
  </header>
  <div class="container">
      @yield('content')
  </div>
</body>
</html>
