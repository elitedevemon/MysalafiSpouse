<?php

namespace App\Http\Livewire;

use App\Models\AboutUs;
use App\Models\Review;
use App\Models\SocialLink;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component
{
    public $about;
    // public $review;
    // public  $fulldescription = false;
    public $fulltextshow = true;
    public function mount()
    {
        if(Auth::check())
        {
            return redirect('dashboard');
        }
        $this->about = AboutUs::first();
       
    }
    public function fulltext()
    {
        // dd('ads');
        $this->fulltextshow = false;
    }
    public function render()
    {   
        $profile = \Dymantic\InstagramFeed\Profile::where('username', 'mysalafispouse')->first();
        //dd($profile);
        // query the user media
        $fields = "id,caption,media_type,media_url,permalink,thumbnail_url,timestamp,username";
        $token =  "IGQVJWNGhtemFZAR3I0Y1AzNjl3UjB5ZA2NrU3JUT0FCYUJCQWN5V1NTV1VyRElCeWZAiWUNoOU9QZA1g2NEM2QnIycmlqdDhqOEVSXzg4emdxX2diWDJnVkRFSGRrcHIzV3U3THA4ZAHozTTJuc25SQUpEOAZDZD";
        
        $limit = 20;
        $json_feed_url="https://graph.instagram.com/me/media?fields={$fields}&access_token={$token}&limit={$limit}";
       
        $json_feed = @file_get_contents($json_feed_url);
        $contents = json_decode($json_feed, true, 512, JSON_BIGINT_AS_STRING);
        //dd($contents);
        $review = Review::where('active', 1)->get();
        $social = SocialLink::first();
        return view('livewire.index')->layout('layouts.site-master')->with('review', $review)
        ->with('social', $social)
        ->with('post', $contents);
    }
}
