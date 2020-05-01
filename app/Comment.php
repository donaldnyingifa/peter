<?php

namespace App;

class Comment extends Model
{
    public function bug()
    {
    	return $this->belongsTo(Bug::class);
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
