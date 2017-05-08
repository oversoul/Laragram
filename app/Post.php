<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public $fillable = ['instagram_id','thumb', 'picture', 'caption', 'user_id'];
}
