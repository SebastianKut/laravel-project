<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMe;

class ContactController extends Controller
{
    public function store()
    {
        request()->validate([
            'email' => ['required', 'email']
        ]);

        // Raw method to send email
        // Mail::raw('Email body', function ($message) {
        //     $message->to(request('email'))
        //         ->subject('Subscription confirmation');
        // });

        // Send html email using ContactMe class (made with 'php artisan make:mail ContactMe' command)

        Mail::to(request('email'))->send(new ContactMe('some hardcoded data'));

        // redirect and send the flash message to session, that can be read in th eview with session('message')
        return redirect('/')
        ->with('message', 'Email sent'); 
    }
}
