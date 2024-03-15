<?php

namespace App\Http\Controllers;
use App\Mail\Testmail;
use Illuminate\Http\Request;
use Mail;
class MailControoler extends Controller
{
    public function getMail()
    {
        $data = ['name'=>'Yanira'];
Mail::to('yanibenavides@yahoo.com')->send(new Testmail($data));
    }
}
