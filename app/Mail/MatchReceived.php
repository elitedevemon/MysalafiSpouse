<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MatchReceived extends Mailable
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
        // dd($this->data);
        // dd($this->data['data']['user_id']);
        // $sender= User::find($this->data['data']['user_id']);
        // dd($sender->profile_code);
        // $receiver= User::find($this->data['data']['r_user_id']);
        return $this->subject('My Salafi Spouse: Match Request Received')->view('emails.match-received', [
            'data' => $this->data,
            // 'receiver' => $receiver->profile_code,
        ]);
    }
}
