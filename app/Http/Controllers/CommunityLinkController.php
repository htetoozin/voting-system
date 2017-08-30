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
}
