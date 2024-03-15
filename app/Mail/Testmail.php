<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Testmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $data;
    

    public function __construct(User $user)
    {
        $this->user = $user;
    }
   
    public function build()
    {
        return $this->view('testmail')
        ->from('yanibenavides01@gmail.com')
                ->subject('Bienvenido!');
    }
}
