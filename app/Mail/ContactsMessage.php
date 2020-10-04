<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactsMessage extends Mailable
{
    use Queueable, SerializesModels;

    protected $name;
    protected $email;
    protected $question;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $email, $question)
    {
        $this->name = $name;
        $this->email = $email;
        $this->question = $question;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.contacts_message', ['name'=>$this->name, 'email'=>$this->email, 'question'=>$this->question]);
    }
}
