@extends('layouts.master')

@section('content')
    <div class="col-sm-8 blog-main">

        <h1>تسجيل مستخدم</h1>

        <hr>

        <form method="post" action="/registration/">
            {{ csrf_field() }}
        <div class="form-group">
            <label for="title">العنوان</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="title">
        </div>

        <div class="form-group">
            <label for="body">المحتوى</label>
         <textarea id="body" name="body" class="form-control" ></textarea>
        </div>

        <button type="submit" class="btn btn-primary">حفظ</button>
    </form>
    </div>

@endsection