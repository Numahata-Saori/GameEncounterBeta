<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/profile.js') }}" defer></script>
    <script src="{{ asset('js/sb-anime.js') }}" defer></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script>
    // MenuToggle
    let toggle = document.querySelector('.toggle');
    let navigation = document.querySelector('.navigation');
    let main = document.querySelector('.main');

    toggle.onclick = function(){
      navigation.classList.toggle('active');
      main.classList.toggle('active');
    }

    // add hovered class in selected list item
    let list = document.querySelectorAll('.navigation li');
    function activeLink(){
      list.forEach((item) =>
      item.classList.remove('hovered'));
      this.classList.add('hovered');
    }
    list.forEach((item) =>
    item.addEventListener('mouseover',activeLink));
    </script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/layout.css') }}" rel="stylesheet">
    <link href="{{ asset('css/community.css') }}" rel="stylesheet">
    <link href="{{ asset('css/profile.css') }}" rel="stylesheet">
    <link href="{{ asset('css/contact.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    {{-- <script src="{{ url(mix('js/profile.js')) }}"></script> --}}


</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm game-navbar">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        {{-- ログインしていなかったらログイン画面へのリンクを表示 --}}
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('ログイン') }}</a>
                            </li>
                            @if (Route::has('register'))
                                {{-- <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.register') }}">{{ __('新規登録') }}</a>
                                </li> --}}
                            @endif
                        {{-- ログインしていたらユーザー名とログアウトボタンを表示 --}}
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('ログアウト') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="">
            <div class="row">
                <div class="col-sm-12 menu-layout"> {{-- p-0→paddingを0にする --}}
                    {{-- <div class="card">
                        <div class="card-header">メニュー</div>
                        <ul class="list-group list-group-flush">
                            <a href={{ route('community') }} class="list-group-item"><i class="fas fa-gamepad"></i>コミュニティ</a>
                            <a href={{ route('notice') }} class="list-group-item"><i class="fas fa-exclamation-circle"></i>お知らせ</a>
                            <a href={{ route('nice/from-partner') }} class="list-group-item"><i class="fas fa-thumbs-up"></i>いいね</a>
                            <a href={{ route('chat') }} class="list-group-item"><i class="fas fa-comments"></i>チャット</a>
                            <a href={{ route('profile') }} class="list-group-item"><i class="fas fa-id-badge"></i>プロフィール</a>
                            <a href={{ route('status') }} class="list-group-item"><i class="fas fa-user-circle"></i>会員ステータス</a>
                            <a href={{ route('contact') }} class="list-group-item"><i class="fas fa-file-contract"></i>お問い合わせ</a>
                        </ul>
                    </div> --}}

                    <div class="container">
                        <div class="navigation">
                        <ul>
                            <li>
                                <a href={{ route('community') }}>
                                    <span class="icon"><ion-icon name="game-controller-outline"></ion-icon></span>
                                    <span class="title">コミュニティ</span>
                                </a>
                            </li>
                            <li>
                                <a href={{ route('community') }}>
                                    <span class="icon"><ion-icon name="game-controller-outline"></ion-icon></span>
                                    <span class="title">コミュニティ</span>
                                </a>
                            </li>
                            <li>
                                <a href={{ route('notice') }}>
                                    <span class="icon"><ion-icon name="home-outline"></ion-icon></span>
                                    <span class="title">お知らせ</span>
                                </a>
                            </li>
                            <li>
                                <a href={{ route('nice_from-partner') }}>
                                    <span class="icon"><ion-icon name="person-outline"></ion-icon></span>
                                    <span class="title">いいね</span>
                                </a>
                            </li>
                            <li>
                                <a href={{ route('chat') }}>
                                    <span class="icon"><ion-icon name="chatbubble-outline"></ion-icon></span>
                                    <span class="title">チャット</span>
                                </a>
                            </li>
                            <li>
                                <a href={{ route('profile') }}>
                                    <span class="icon"><ion-icon name="help-circle-outline"></ion-icon></span>
                                    <span class="title">プロフィール</span>
                                </a>
                            </li>
                            <li>
                                <a href={{ route('status') }}>
                                    <span class="icon"><ion-icon name="settings-outline"></ion-icon></span>
                                    <span class="title">会員ステータス</span>
                                </a>
                            </li>
                            <li>
                                <a href={{ route('contact') }}>
                                    <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
                                    <span class="title">お問い合わせ</span>
                                </a>
                            </li>
                        </ul>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 main-layout">
                    @yield('content')
                </div>
            </div>
        </main>
    </div>
</body>
</html>
