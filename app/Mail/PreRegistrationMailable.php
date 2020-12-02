<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PreRegistrationMailable extends Mailable
{
    use Queueable, SerializesModels;


    public $id; 
    public $data; 
    public $tabname;
    public $payment;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($id, $data, $tabname, $payment)
    {
        $this->id=$id;
        $this->data=$data;
        $this->tabname=$tabname;
        $this->payment=$payment;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Registration')->view('PreRegistrationMail')->with([
            'id' => $this->id,
            'data' => $this->data,
            'tabname' => $this->tabname,
            'payment' => $this->payment,
        ]);    
     }
}
