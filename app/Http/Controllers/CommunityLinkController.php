<?php

namespace App\Http\Controllers;

use App\CommunityLink;
use App\Channel;
use Illuminate\Http\Request;

class CommunityLinkController extends Controller
{
    public function index()
    {
    	$links = CommunityLink::paginate(10);
    	$channels = Channel::orderBy('title', 'asec')->get();
    	return view('community.index', compact('links', 'channels'));	
    }


    public function store(Request $request)
    {
    	//CommunityLink::create($request->all());

    	$this->validate($request, [
    		'channel_id' => 'required|exists:channels,id',
    		'title' => 'required',
    		'link'  => 'required|active_url|unique:community_links'
    	]);

    	CommunityLink::from(auth()->user())
    				->contribute($request->all());

    	return back();
    }
}
