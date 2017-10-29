<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Comment extends Model
{
   protected $guarded = ['id'];


    public function content()
    {

        return $this->belongsTo(content::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
