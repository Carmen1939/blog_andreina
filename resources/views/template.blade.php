<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
</head>
<body>
    <form action="{{ route('home') }}" method="GET">
        <input type="text" name="search" placeholder="Buscar" value="{{ request('search') }}">
    </form>
    <p>
        @auth
        <a href="{{route('posts.index')}}">Post</a>
        @else
        <a href="{{route('login')}}">Login</a>
        @endauth
    </p>

    <hr>
    
    @yield('content')
</body>
</html>