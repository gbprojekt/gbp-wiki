@extends('layouts.app')

@section('content')
    @if($posts != null)
        @foreach($posts as $post)
            @if($post->image != null)
                @if($loop->iteration % 2 == 0)
                    <div class="container">
                        <div class="row">
                            @if($post->title != null)
                                <div class="col-12 my-4">
                                    <h3 class="py-3 bg-secondary text-white text-center">{{$post->title}}</h3>
                                </div>
                            @else
                                <div class="col-12 my-2">
                                </div>
                            @endif
                        </div>
                        <div class="row">
                            @if($post->content !=null)
                                <div class="col-5 offset-1">
                                    {{$post->content}}
                                </div>
                                <div class="col-4 offset-1">
                                    <img src="{{asset('img/'.$post->image)}}" class="img-fluid" />
                                </div>
                            @else
                                <div class="col-10 offset-1">
                                    <img src="{{asset('img/'.$post->image)}}" class="img-fluid" />
                                </div>
                            @endif
                        </div>
                    </div>
                @else
                    <div class="container">
                        <div class="row">
                            @if($post->title != null)
                                <div class="col-12 my-4">
                                    <h3 class="py-3 bg-secondary text-white text-center">{{$post->title}}</h3>
                                </div>
                            @else
                                <div class="col-12 my-2">
                                </div>
                            @endif
                        </div>
                        <div class="row">
                            @if($post->content !=null)
                                <div class="col-4 offset-1">
                                    <img src="{{asset('img/'.$post->image)}}" class="img-fluid" />
                                </div>
                                <div class="col-5 offset-1">
                                    {{$post->content}}
                                </div>
                            @else
                                <div class="col-10 offset-1">
                                    <img src="{{asset('img/'.$post->image)}}" class="img-fluid" />
                                </div>
                            @endif
                        </div>
                    </div>
                @endif
            @else
                <div class="container">
                    <div class="row">
                        @if($post->title != null)
                            <div class="col-12 my-4">
                                <h3 class="py-3 bg-secondary text-white text-center">{{$post->title}}</h3>
                            </div>
                        @else
                            <div class="col-12 my-2">
                            </div>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-10 offset-1">
                            <p>{{$post->content}}</p>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    @else
        <div class='container'>
            <div class="row">
                <div class="col-12">
                    <p>Keine Beiträge vorhanden.</p>
                </div>
            </div>
        </div>
    @endif
@endsection
