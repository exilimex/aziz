<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class content extends Model
{
    protected $guarded = ['id'];



    public function comments()
    {
        return $this->hasMany(Comment::class);
    }


    public function addComment($body)
    {
      // dd(Comment::class);
        $this->comments()->create(compact('body'));
    }



    /* public function cat()
    {
        return $this->belongsTo(ContentCategory::class,'id','cat_id');
    }
*/
}
