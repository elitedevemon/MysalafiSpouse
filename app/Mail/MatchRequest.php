<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MatchRequest extends Mailable
{
    use Queueable, SerializesModels;

    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // dd($this->data['data']['user_id']);
        $sender= User::find($this->data['data']['user_id']);
        // dd($sender->profile_code);
        $receiver= User::find($this->data['data']['r_user_id']);
        return $this->subject('My Salafi Spouse: Match Request')->view('emails.match-request', [
            'sender' => $sender->profile_code,
            'receiver' => $receiver->profile_code,
            'id' => $receiver->id,
        ]);
    }
}
