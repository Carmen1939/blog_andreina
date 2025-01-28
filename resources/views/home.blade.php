@extends('template')

@section('content')
 <div>
    <h1>Mis Blog</h1>
    <div>
        <span>Programación</span>
        <h3>Blog</h3>
        <p>Desarrollo web</p>
        <img src="{{asset('imags/dev.png')}}" alt="">
    </div>
    <div>
        @foreach($posts as $post)
            <p>
                <strong>{{ $post->id }}</strong>
                <a href="{{route('post',$post->slug)}}">
                {{ $post->title }}
                </a>
                <br>
                <span>{{$post->created_at->format('d/m/Y')}}</span>
                <span>{{$post->user->name}}</span>
            </p>
        @endforeach
    </div>
 </div>
 {{ $posts->links() }}
@endsection