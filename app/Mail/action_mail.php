<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class action_mail extends Mailable
{
    use Queueable, SerializesModels;

    public $Subject;
    public $invoiceNumber;
    public $status;
    public $currentTime;

    public function __construct($Subject,$invoiceNumber,$status,$currentTime)
    {
        $this->invoiceNumber = $invoiceNumber;
        $this->Subject = $Subject;
        $this->status = $status;
        $this->currentTime = $currentTime;
    }

    public function build()
    {
        return $this->subject($this->Subject)
                    ->view('emails.action');
    }
}
