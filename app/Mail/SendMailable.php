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
   public $dataLead;
   public $tabDelegate;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($id,  $dataLead, $tabDelegate)
    {
         $this->id=$id;
         $this->dataLead=$dataLead;
         $this->tabDelegate=$tabDelegate;
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
            'dataLead' => $this->dataLead,
            'tabDelegate' => $this->tabDelegate,
        ]);
    }
}
