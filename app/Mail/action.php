<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class action extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
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

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: $this->Subject,
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'emails.action',
            with: [
                'invoiceNumber'=>$this->invoiceNumber,
                 'Subject'=>$this->Subject,
                 'status'=>$this->status ,
                 'currentTime'=>$this->currentTime,
             ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
