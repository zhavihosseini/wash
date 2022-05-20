<?php

namespace App\Mail;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class mail extends Mailable
{
    use Queueable, SerializesModels;
    public $code;
    protected $time;
    protected $name;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($code,$time,$name)
    {
        $this->code = $code;
        $this->time = $time;
        $this->name = $name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.newemail')->with([
            'code'=>$this->code,
            'time'=>$this->time,
            'name'=>$this->name,
        ]);
    }
}
