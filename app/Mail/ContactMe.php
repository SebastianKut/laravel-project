<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMe extends Mailable
{
    use Queueable, SerializesModels;
// public varaible in Mailable classes is automatically available in the view
    public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(string $data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        // this method builds email from the view we just have to initialize new object from ContactMe class in the controller

        // return $this->view('mail.contact-me')
        // ->subject('some subject about' . $this->data);
    
    // Another method is to build mail using markdown
    //This can be created using 'php artisan make:mail NameOfMailClass --markdown=viewroute.viewname'
    //This will create mail class and corresponding markdown view
    return $this->markdown('mail.contact-me-markdown')
        ->subject('some subject about ' . $this->data);

    //To customize mail we copy all the neccessary files from vendor so we can modify them with the following command
    // 'php artisan vendor:publish --tag=laravel-mail'
    // This will copy it to [/resources/views/vendor/mail]

        
    
    }
}
