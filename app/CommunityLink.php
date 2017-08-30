<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommunityLink extends Model
{
    public function creator()
    {
    	return $this->belongsTo(User::class, 'user_id');	
    }
}
