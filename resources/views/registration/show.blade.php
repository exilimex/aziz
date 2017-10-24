@extends('layouts.master')


@section('content')
<div class="col-sm-8 blog-main">

    <h1>{{ $Post->title }}</h1>

        {{ $Post->body }}

</div>

    <div class="frame-comment">

    @foreach($Post->comments as $comment)
        <article>

            {{ $comment->body }}

        </article>
    @endforeach
    </div>

@endsection