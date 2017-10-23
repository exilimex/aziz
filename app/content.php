<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class content extends Model
{
    protected $guarded = ['id'];

   /* public function cat()
    {
        return $this->belongsTo(ContentCategory::class,'id','cat_id');
    }
*/
}
