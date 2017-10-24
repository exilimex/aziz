<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\content;

class ContentController extends Controller
{

    public function registration()
    {
        $content = content::all();
        return view('registration.index' , compact('content'));
    }




    public function show($id)
    {

        $Post = content::find($id);

        return view('registration.show', compact('Post'));
    }



    public function create()
    {
        return view('registration.create');
    }





    public function store()
    {

        $this->validate(request(),[

            'title' => 'required',
            'body' => 'required',
        ]);

        content::create(request()->all());

        return redirect('/registration/create');

    }
}
