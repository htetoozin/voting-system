<?php

namespace App\Queries;

use App\CommunityLink;


class CommunityLinksQuery{
	public function get($sortBypopular, $channel)
	{
		$orderBy = $sortBypopular ? 'votes_count' : 'updated_at';
		return CommunityLink::with('creator', 'channel')
				->withCount('votes')
				->forChannel($channel)
                ->where('approved', 1)
                ->groupBy('community_links.id')
                ->orderBy($orderBy, 'desc')
                ->paginate(3);     	
	}
}