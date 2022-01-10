<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class VisitAllProfiles extends Component
{
    public function mount()
    {
        if(Auth::check())
        {
            return redirect('dashboard');
        }
    }
    public function render()
    {
        $fields = "id,caption,media_type,media_url,permalink,thumbnail_url,timestamp,username";
        $token = "IGQVJWNGhtemFZAR3I0Y1AzNjl3UjB5ZA2NrU3JUT0FCYUJCQWN5V1NTV1VyRElCeWZAiWUNoOU9QZA1g2NEM2QnIycmlqdDhqOEVSXzg4emdxX2diWDJnVkRFSGRrcHIzV3U3THA4ZAHozTTJuc25SQUpEOAZDZD";
        $limit = 100;
        $json_feed_url="https://graph.instagram.com/me/media?fields={$fields}&access_token={$token}&limit={$limit}";
        $json_feed = @file_get_contents($json_feed_url);
        $contents = json_decode($json_feed, true, 512, JSON_BIGINT_AS_STRING);
        // dd( $contents);
        return view('livewire.visit-all-profiles')->layout('layouts.site-master')->with('post', $contents);
    }
}
