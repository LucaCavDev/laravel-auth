<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TestMail extends Mailable
{
    use Queueable, SerializesModels;

    public $text;

    public function __construct($text = 'emptiness')
    {
        $this -> text = $text;
    }

    public function build()
    {
        return $this
            -> from('noreply@esboolean.com')
            -> view('mail.testMail');
    }
}
