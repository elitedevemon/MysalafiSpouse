<?php

namespace App\Http\Livewire;

// use App\Http\Livewire\Table\Reviews;
use App\Models\AboutUs;
use App\Models\Faqs;
use App\Models\Review;
use App\Models\SocialLink;
use Livewire\Component;

class Site extends Component
{
    // public $reviewDataTable = new Reviews();
    public $review_id;
    public $faq_id;
    protected $queryString = ['review_id', 'faq_id'];
    public $about_us;
    public $question;
    public $answer;
    public $faq_active = true;
    public $reviews_name;
    public $reviews_text;
    public $reviews_active = true;
    public $video_link;
    public $instagram;
    public $facebook;
    public $twiter;
    public $linkdin;
    public $address;
    public $type = true;
    public $email;
    public $active = 1;
    public function render()
    {
        return view('livewire.site');
    }
    
    public function mount()
    {
        if($this->review_id){
            $review = Review::find($this->review_id);
            $this->reviews_name = $review->name;
            $this->reviews_text = $review->text;
            $this->reviews_active = $review->active;
            $this->type = (int)$review->type;
           
        }
        if($this->faq_id){
            $faq = Faqs::find($this->faq_id);
            $this->question = $faq->question;
            $this->answer = $faq->answer;
            $this->faq_active = $faq->active;
           
        }
        $aboutUs = AboutUs::first();
        if($aboutUs){
            $this->about_us = $aboutUs->about_us;
            $this->video_link = $aboutUs->video_link;
            $this->active = $aboutUs->active;
        }
        $aboutUs = SocialLink::first();
        if($aboutUs){
            $this->instagram = $aboutUs->instagram;
            $this->facebook = $aboutUs->facebook;
            $this->twiter = $aboutUs->twiter;
            $this->linkdin = $aboutUs->linkdin;
            $this->address = $aboutUs->address;
            $this->email = $aboutUs->email;
        }
    }
    public function store()
    {
        $this->validate([
            'about_us' => 'required',
            'video_link' => 'required|url',
        ]);
        $aboutUs = AboutUs::firstOrNew();
        $aboutUs->about_us = $this->about_us;
        $aboutUs->video_link = $this->video_link;
        $aboutUs->active = $this->active;
        $aboutUs->save();
        session()->flash('message', 'Data save successfully.');
    }
    public function reviewsStore()
    {
        $this->validate([
            'reviews_name' => 'required',
            'reviews_text' => 'required',
        ]);
        $review = new Review();
        $review->name = $this->reviews_name;
        $review->text = $this->reviews_text;
        $review->active = $this->reviews_active;
        $review->type = $this->type;
        $review->save();
        $this->reviews_name = '';
        $this->reviews_text = '';
        $this->reviews_active = '';
        session()->flash('message', 'Review add successfully.');
        
    }
    public function faqStore()
    {
        $this->validate([
            'question' => 'required',
            'answer' => 'required',
        ]);
        $review = new Faqs();
        $review->question = $this->question;
        $review->answer = $this->answer;
        $review->active = $this->faq_active;
        $review->save();
        $this->question = '';
        $this->answer = '';
        // $this->faq_active = '';
        session()->flash('message', 'Faq add successfully.');
        
    }
    public function socialLinkStore()
    {
        $this->validate([
            'instagram' => 'required|url',
            'facebook' => 'required|url',
            'twiter' => 'required|url',
            'linkdin' => 'required|url',
            'address' => 'required',
            'email' => 'required|email',
        ]);
        $socialLink = SocialLink::firstOrNew();
        $socialLink->instagram = $this->instagram;
        $socialLink->facebook = $this->facebook;
        $socialLink->twiter = $this->twiter;
        $socialLink->linkdin = $this->linkdin;
        $socialLink->address = $this->address;
        $socialLink->email = $this->email;
        $socialLink->save();
        session()->flash('message', 'Social link add successfully.');
        
    }
    public function reviewsUpdate()
    {
       
        $this->validate([
            'reviews_name' => 'required',
            'reviews_text' => 'required',
        ]);
        $review =  Review::find($this->review_id);
        $review->name = $this->reviews_name;
        $review->text = $this->reviews_text;
        $review->active = $this->reviews_active;
        $review->type = $this->type;
       
        $review->update();
        // $this->review_id = '';
        // $this->reviews_name = '';
        // $this->reviews_text = '';
        // $this->reviews_active = '';
       
        session()->flash('message', 'Review update successfully.');
        return redirect("superadmin/website?review_id=$this->review_id");
    }
    public function faqUpdate()
    {
       
        $this->validate([
            'question' => 'required',
            'answer' => 'required',
        ]);
        $faq =  Faqs::find($this->faq_id);
        $faq->question = $this->question;
        $faq->answer = $this->answer;
        $faq->active = $this->faq_active;
        $faq->save();
        // $this->faq_id = '';
        // $this->question = '';
        // $this->answer = '';
        // $this->reviews_active = '';
       
        session()->flash('message', 'Faq update successfully.');
        return redirect("superadmin/website?faq_id=$this->faq_id");
    }
}
