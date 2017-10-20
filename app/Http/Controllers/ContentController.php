<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContentController extends Controller
{

    public function registration()
    {
        return view('registration.index');
    }


    public function create()
    {
        return view('registration.create');
    }

    public function store()
    {

        dd(request(['title','body']));

        // Create a new post using the request data

        // Save it to the DB

        // Redirect to the home page


    }
}
