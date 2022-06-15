<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\DonationRequest;
use Illuminate\Http\Request;

class mainController extends Controller
{
    public function home(){
        $donationrequests=DonationRequest::take(4)->get();
        $posts=Post::take(9)->get();
        return view('front.home',compact('posts','donationrequests'));
    }
}
