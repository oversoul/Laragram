<?php

namespace App;

use Hootlex\Moderation\Moderatable;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

	use Moderatable;

    public $fillable = ['instagram_id','thumb', 'picture', 'caption', 'user_id'];

    public function status()
    {
    	return $this->status == 0 ? "Rejected" : "Approved";
    }
}
