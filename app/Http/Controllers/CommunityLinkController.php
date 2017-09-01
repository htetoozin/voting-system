<?php

namespace App\Http\Controllers;

use App\CommunityLink;
use App\Channel;
use Illuminate\Http\Request;

class CommunityLinkController extends Controller
{
    public function index()
    {
    	$links = CommunityLink::where('approved', 1)->paginate(10);
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


    	if (auth()->user()->isTrusted()) {
    		flash()->success('Thank for your contribution');
    	}else{
    		flash()->overlay('This contribution will be approved shortly.', 'Thanks!');
    	}

    	CommunityLink::from(auth()->user())
    				->contribute($request->all());

    	return back();
    }
}
