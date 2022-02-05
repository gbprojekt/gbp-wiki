@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row col-10 offset-col-1 mb-4">
            <nav>
                <a href="{{ route('posts.admincreate') }}">Neuen Beitrag erstellen</a>
            </nav>
        </div>
        @if(Session::has('success'))
            <div class="row">
                <div class="col-10 offset-col-1">
                    <div class="alert alert-success">
                        <p>{{Session::get('success')}}</p>
                    </div>
                </div>
            </div>
        @endif
        @if(Session::has('error'))
            <div class="row">
                <div class="col-10 offset-col-1">
                    <div class="alert alert-danger">
                        <p>{{Session::get('error')}}</p>
                    </div>
                </div>
            </div>
        @endif
        <div class="row">
            <div class="col-10 offset-col-1">
                <h4>Übersicht aller Beiträge</h4>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Subkategorie</th>
                            <th>Titel</th>
                            <th>Inhalt</th>
                            <th>Bild</th>
                            <th>Aktiv</th>
                            <th>Ändern</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>
                                @foreach($subcategories as $subcategory)
                                    @if($subcategory->id === $post->subcategory_id)
                                        {{ $subcategory->name }}
                                    @endif
                                @endforeach
                            </td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->content }}</td>
                            <td>{{ $post->image }}
                            <td>@if($post->active) Ja @else Nein @endif</td>
                            <td>
                                <a href="{{ route('posts.adminedit', $post->id) }}">Ändern</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
