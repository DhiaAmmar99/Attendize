<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMailable extends Mailable
{
    use Queueable, SerializesModels;
   public $id; 
   public $data; 
   public $tabname;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($id,  $data, $tabname)
    {
         $this->id=$id;
         $this->data=$data;
         $this->tabname=$tabname;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Registration summary')->view('successMail')->with([
            'id' => $this->id,
            'data' => $this->data,
            'tabname' => $this->tabname,
        ]);
    }
}
