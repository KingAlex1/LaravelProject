<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="../app/css/main.css" rel="stylesheet">
</head>
<body class="vsc-initialized">
<div class="main-wrapper">
    <div class="">
        <!-- Right Side Of Navbar -->
        <ul class="nav navbar-nav navbar-right">
            <!-- Authentication Links -->
            @guest
                <div class="auth-block">
                    <li class="auth-href" style="text-decoration: n"><a href="{{ route('login')
                    }}">Login</a></li>
                    <li class="auth-href"><a href="{{ route('register') }}">Register</a></li>
                </div>
            @else
                <div class="auth-block">

                    <li style="list-style-type: none;" >
                        <a href="#" class="auth-user dropdown-toggle" data-toggle="dropdown" role="button"
                           aria-expanded="false" aria-haspopup="true" v-pre>
                           Вы:  {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                    </li>

                    <li style="list-style-type: none">
                        <a class="auth-logout" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Выйти
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                              style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </div>


            @endguest
        </ul>

    </div>

    @yield('content')
</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
