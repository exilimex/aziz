@extends('layouts.master')


@section('content')
<div class="col-sm-8 blog-main">

    <h1>{{ $Post->title }}</h1>

        {{ $Post->body }}


    <hr>


<div class="comments">

        <ui class="list-group">

            @foreach($Post->comments as $comment)

          <li class="list-group-item">

              {{ $comment->body }}

          </li>
            @endforeach

        </ui>



    <hr>

    {{-- add a comment --}}

            <div class="card">

                <div class="card-body">

                    <form method="post" action="/registration/{{ $comment->id }}/comments">
                        {{ csrf_field() }}

                        <div class="form-group ">
                            <textarea name="body" placeholder="اضف تعليق "  class="form-control"></textarea>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">ارسال</button>
                        </div>
                    </form>

                </div>

            </div>
    </div>
</div>
@endsection