<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use Mail;

use App\Mail\MailContactSender;
use App\Models\MailContact;

class ContactController extends Controller
{
    public function SumbitMessage( ContactRequest $req ){
        $mail = new MailContact();
        try {
            $mail->body = $req->input('message');
            $mail->name = $req->input('firstname');
            $mail->from = $req->input('email');
            $mail->to = "omnissya@gmail.com";
            $mail->title = 'Сообщение от пользователя сайта ' . config('app.name');

            Mail::send(new MailContactSender($mail));
        } catch (Exception $e) {
            return redirect()->route('contact-page')->with('error-contact', 'Произошла внутренняя ошибка на сайте!');
        }
        return redirect()->route('contact-page')->with('success-contact', 'Сообщение было отправлено.');

        //бомжатское отправление на почту обычного письма без верстки
        // Mail::send(['text' => $req->input('message')],
        //
        // function ($message) use ($name, $email){
        //   $message->to('omnissya@gmail.com', 'Давиду')->subject('Сообщение от ' . $name);
        //   $message->from($email, $name);
        // });

    }
}
