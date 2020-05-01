<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Priority extends Model
{
      public function priority()
    {
        return $this->hasMany(Priority::class, 'priority_id');
    }
     public function bug()
    {
        return $this->belongsTo(Bug::class, 'bug_id');
    }
}
