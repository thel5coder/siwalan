<?php

namespace App\Listeners;

use App\Events\UserDinasCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class NewUserDinasCreated
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  UserDinasCreated  $event
     * @return void
     */
    public function handle(UserDinasCreated $event)
    {
        Mail::send(['html'=>'mail.userdinas'],['email'=>$event->getEmail(),'password'=>$event->getPassword()], function ($message) use ($event){
            $message->from(env('MAIL_USERNAME'),'SIWALAN');
            $message->to($event->getEmail())->subject('SIWALAN - Informasi Akun');
        });
    }
}
