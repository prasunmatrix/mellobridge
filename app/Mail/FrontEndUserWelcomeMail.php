<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FrontEndUserWelcomeMail extends Mailable
{
    use Queueable, SerializesModels;
    public $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
      $this->data = $data;
      //print_r($this->data); die;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        //return $this->view('email.frontenduser-email-register')->with('data',$this->data);
        //return $this->subject('Welcome to Mello Bridge!')->markdown('email.frontenduser-email-register')->with('data',$this->data);
        return $this->from('prasun@matrixnmedia.com')->markdown('email.frontenduser-email-register')->with('data',$this->data);
    }
}
