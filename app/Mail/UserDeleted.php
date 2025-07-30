<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;



class UserDeleted extends Mailable
{
    public $user;
    public $reason;

    public function __construct($user, $reason)
    {
        $this->user = $user;
        $this->reason = $reason;
    }

    public function build()
    {
        return $this
            ->subject('Compte supprimé')
            ->view('emails.user_deleted')
            ->with([
                'name' => $this->user->name,
                'reason' => $this->reason
            ]);
    }
}

