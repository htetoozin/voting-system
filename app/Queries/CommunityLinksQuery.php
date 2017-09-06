<?php

namespace App\Queries;

use App\CommunityLink;


class CommunityLinksQuery{
	public function get($sortBypopular, $channel)
	{
		$orderBy = $sortBypopular ? 'vote_count' : 'updated_at';
		return CommunityLink::with('votes', 'creator', 'channel')
				->forChannel($channel)
                ->where('approved', 1)
                ->leftJoin('community_links_votes', 'community_links_votes.community_link_id', '=', 'community_links.id')
                ->selectRaw(
                    'community_links.*, count(community_links_votes.id) as vote_count'
                )
                ->groupBy('community_links.id')
                ->orderBy($orderBy, 'desc')
                ->paginate(3);     	
	}
}