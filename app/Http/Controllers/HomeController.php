<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\home;

class HomeController extends Controller
{
    public function index()
    {
       $body = home::aboute()->all();
      // dd($body);
        return view('home' , compact('body'));
    }



}
