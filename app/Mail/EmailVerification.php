<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;

class EmailVerification extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $signedUrl;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
        $this->signedUrl = \URL::temporarySignedRoute(
            'auth.email.verification', now()->addMinutes(60), ['user' => $this->user->id]
        );
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        logger('sending email');
        return $this
            ->from('getintouch@ronaldmirandaweb.com')
            ->to($this->user->email)
            ->subject('Email Verification')
            ->markdown('email.email-verification');
    }
}
