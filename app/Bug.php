<?php

namespace App;



class Bug extends Model
{
 /*  public static function unresolved()
   {
    	return static::where('resolved',0)->get();
    } 
   */

   public function scopeUnresolved($query)
    {
    	return $query->where('resolved',0);
    }
    
    public function scopeResolved($query)
    {
    	return $query->where('resolved',1);
    	//return static::where('resolved',1)->get();
    } 

    public function comments()
    {
      return $this->hasMany(Comment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function addComment($body)
    {
     /* Comment::create([
        'body' => $body,
        'bug_id' => $this ->id
        ]);
        */
        $this->comments()->create(compact('body'));
    }
    
   
}
