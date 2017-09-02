<?php

namespace App\Http\Controllers;

use App\CommunityLink;
use App\Channel;
use App\Exceptions\CommunityLinkAlreadySubmitted;
use App\Http\Requests\CommunityLinkForm;
use Illuminate\Http\Request;

class CommunityLinkController extends Controller
{
    public function index(Channel $channel = null)
    {
    	$links = CommunityLink::forChannel($channel)
                ->where('approved', 1)
                ->latest('updated_at')
                ->paginate(3);

    	$channels = Channel::orderBy('title', 'asec')->get();
    	return view('community.index', compact('links', 'channels', 'channel'));	
    }


    public function store(CommunityLinkForm $form)
    {
   
    	try {
            
    		$form->persist();

            if (auth()->user()->isTrusted()) {
                flash()->success('Thank for your contribution');
            }else{
                flash()->overlay('This contribution will be approved shortly.', 'Thanks!');
            }

        } catch (CommunityLinkAlreadySubmitted $e) {
            flash()->overlay("We'll instead bump the timestamps and bring that link back to the top. Thanks!", 'That Link Has Already Been Submitted'); 
        }    

    	return back();
    }
}
