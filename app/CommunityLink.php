<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommunityLink extends Model
{

	protected $fillable = ['channel_id', 'title', 'link'];

    public function creator()
    {
    	return $this->belongsTo(User::class, 'user_id');	
    }

    public static function from(User $user)
    {
    	$link = new Static;

    	$link->user_id = $user->id;

    	return $link;

    }


    public function contribute($attributes)
    {
    	return $this->fill($attributes)->save();
    }

    public function channel()
    {
        return $this->belongsTo(Channel::class);    
    }
}
