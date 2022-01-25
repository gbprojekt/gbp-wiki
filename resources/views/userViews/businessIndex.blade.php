@extends('layouts.app')

@section('content')

    @if($posts != null)
        @foreach($posts as $post)
            <div class='container'>
                <h3>{{$post->title}}</h3>
            </div>
            <div class="container">
                <p>{{$post->content}}</p>
            </div>
        @endforeach
    @else
        <div class='container'>
            <p>Keine Beiträge vorhanden.</p>
        </div>
    @endif


@endsection
