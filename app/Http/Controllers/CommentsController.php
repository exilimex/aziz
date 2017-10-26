<?php

namespace App\Http\Controllers;




use App\content;


class CommentsController extends Controller
{
    public function store(content $content)
    {

      $content->addComment(request('body'));


      return back();
    }
}
