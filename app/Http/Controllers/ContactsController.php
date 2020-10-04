<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactsMessage;
use App\Http\Requests\MessageRequest;

class ContactsController extends Controller
{
    public function contacts(){

        return view('content/contacts');
    }

    public function sendMessage(MessageRequest $request) {
        $name = $request['name'];
        $email = $request['email'];
        $question = $request['question'];

        Mail::to('voshod8574@mail.ru')->send(new ContactsMessage($name, $email, $question));
        session()->flash('success', 'Сообщение отправлено. Мы ответим в ближайшее время!');

        return back();
    }
}
