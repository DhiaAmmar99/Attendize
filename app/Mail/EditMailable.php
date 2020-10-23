<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EditMailable extends Mailable
{
    use Queueable, SerializesModels;


    public $name; 
    public $data;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name,  $data)
    {
        $this->name=$name;
        $this->data=$data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Registration')->view('EditMail')->with([
            'name' => $this->name,
            'data' => $this->data,

        ]);    
     }
}
