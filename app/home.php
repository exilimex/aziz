<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class home extends Model
{
    public static function aboute()
    {
        return static::where('id', 1 )->get();
    }
}
