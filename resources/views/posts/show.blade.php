@extends('layouts.app')

@section('content')

<h1 class="text-center">{{$post->title}}</h1>

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">title</th>
            <th scope="col">read time</th>
            <th scope="col">featured</th>
            <th scope="col">tags</th>
            <th scope="col">technologies</th>
            <th scope="col">created</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th scope="row">{{$post->id}}</th>
            <td>{{$post->title}}</td>
            <td>{{ $post->reading_time }}</td>
            <td>
                @if($post->featured == 1)
                True
                @elseif($post->featured == 0)
                False
                @endif
            </td>
            <td>
                @foreach($post->tags as $tag)
                {{$tag->name}}
                @endforeach
            </td>
            <td>
                @foreach($post->technologies as $technology)
                {{$technology->name}}
                @endforeach
            </td>
            <td>{{$post->created_at->translatedFormat('d F Y ')}}</td>
        </tr>
    </tbody>
</table>

{{-- CONTENT --}}

@endsection
