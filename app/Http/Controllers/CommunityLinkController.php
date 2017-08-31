<?php

namespace App\Http\Controllers;

use App\CommunityLink;
use Illuminate\Http\Request;

class CommunityLinkController extends Controller
{
    public function index()
    {
    	$links = CommunityLink::paginate(10);
    	return view('community.index', compact('links'));	
    }


    public function store(Request $request)
    {
    	//CommunityLink::create($request->all());

    	$this->validate($request, [
    		'title' => 'required',
    		'link'  => 'required|active_url'
    	]);

    	CommunityLink::from(auth()->user())
    				->contribute($request->all());

    	return back();
    }
}
