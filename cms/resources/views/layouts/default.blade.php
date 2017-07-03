<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="/css/style.css" type="text/css" />
</head>
<body>
    @if (session('flash_message'))
    <div class="flash_message" onclick="this.classList.add('hidden')">{{ session('flash_message') }}</div>
    @endif
    <div class="container">
        @yield('content')      
    </div>
    
    
</body>
</html>