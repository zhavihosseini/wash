<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class newslettermail extends Mailable
{
    use Queueable, SerializesModels;
    protected $content;
    protected $link;
    protected $namelink;
    protected $time;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($content,$link,$namelink,$time)
    {
        $this->content=$content;
        $this->link=$link;
        $this->namelink=$namelink;
        $this->time=$time;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.newsemail')->with([
            'time'=>$this->time,
            'link'=>$this->link,
            'namelink'=>$this->namelink,
            'content'=>$this->content,
        ]);
    }
}
