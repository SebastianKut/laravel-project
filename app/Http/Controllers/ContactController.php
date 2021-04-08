<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function store()
    {
        request()->validate([
            'email' => ['required', 'email']
        ]);

        Mail::raw('Email body', function ($message) {
            $message->to(request('email'))
                ->subject('Subscription confirmation');
        });

        // redirect and send the flash message to session, that can be read in th eview with session('message')
        return redirect('/')
        ->with('message', 'Email sent'); 
    }
}
