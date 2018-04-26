<!DOCTYPE html>
<html lang="ru">
<head>
    @include ('layouts.head')
</head>
<body>
<div class="main-wrapper">
    @include('layouts.header')
    <div class="middle">
        @include('layouts.sidebar')
        @yield('content')
        @yield('content2')
    </div>
    @include('layouts.footer')
</div>
<script src="../app/js/main.js"></script>
<script src="https://code.jquery.com/jquery-1.11.2.min.js"></script>
<script src="../app/js/common.js"></script>
</body>
</html>