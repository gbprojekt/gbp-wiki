@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-10 offset-col-1">
                <h4>Übersicht der Beiträge der Kategorie "{{ $categoryName }}"</h4>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Titel</th>
                            <th>Inhalt</th>
                        </tr>
                    </thead>
                    <tbody>
                    @if($posts != null)
                        @foreach($posts as $post)
                            <tr>
                                <td>{{ $post->id }}</td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->content }}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td>Keine Beiträge vorhanden.</td>
                            <td></td>
                            <td></td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection