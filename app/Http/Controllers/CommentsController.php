<?php

namespace App\Http\Controllers;




use App\content;


class CommentsController extends Controller
{
    public function store(content $content)
    {

        $this->validate(request(),['body'=>'required']);

        $content->addComment(request('body'));


      return back();
    }
}
