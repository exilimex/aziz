<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Comment;
class content extends Model
{
    protected $guarded = ['id'];


    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /* public function cat()
    {
        return $this->belongsTo(ContentCategory::class,'id','cat_id');
    }
*/
}
