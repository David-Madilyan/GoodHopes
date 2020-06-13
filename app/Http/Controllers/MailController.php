<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\MailSender;

class MailController extends Controller
{
    public function send(){
      Mail::send(new MailSender());
    }

    // public function SendFromContact(){
    //   Mail::send(new MailSenderContact());
    // }
}
