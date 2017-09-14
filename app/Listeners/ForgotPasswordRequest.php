<?php

namespace App\Listeners;

use App\Events\ForgotPassword;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ForgotPasswordRequest
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
     * @param  ForgotPassword  $event
     * @return void
     */
    public function handle(ForgotPassword $event)
    {
        Mail::send(['html'=>'mail.forgot'],['email'=>$event->getEmail()], function ($message) use ($event){
            $message->from(env('MAIL_USERNAME'),'SIWALAN');
            $message->to($event->getEmail())->subject('SIWALAN - Reset password');
        });
    }
}
