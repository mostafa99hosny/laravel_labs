<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    //
    protected $fillable = [
         'title',
         'body',
         'user_id',
         'photo',
    ];
    protected $dates = ['deleted_at'];
    function user()
    {
        return $this->belongsTo(User::class);
    }

}
