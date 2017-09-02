<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Exceptions\CommunityLinkAlreadySubmitted;

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

        if ($user->isTrusted()) {
            $link->approve();
        }

    	return $link;

    }


    public function contribute($attributes)
    {
        if ($existing = $this->hasAlreadyHasBeenSubmitted($attributes['link'])) {
           $existing->touch();

           throw new CommunityLinkAlreadySubmitted;
           
        }
    	return $this->fill($attributes)->save();
    }

    public function approve()
    {
        $this->approved = true;

        return $this;    
    }

    public function channel()
    {
        return $this->belongsTo(Channel::class);    
    }

    protected function hasAlreadyHasBeenSubmitted($link)
    {
        return static::where('link', $link)->first();
    }
}
