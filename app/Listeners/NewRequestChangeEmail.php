<?php

namespace App\Listeners;

use App\Events\RequestChangeEmail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class NewRequestChangeEmail
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
     * @param  RequestChangeEmail  $event
     * @return void
     */
    public function handle(RequestChangeEmail $event)
    {
        Mail::send(['html'=>'mail.statuspermintaanrubahemail'],['email'=>$event->getEmail(),'status'=>$event->getStatus()], function ($message) use ($event){
            $message->from(env('MAIL_USERNAME'),'SIWALAN');
            $message->to($event->getEmail())->subject('SIWALAN - Informasi status permintaan perubahan email');
        });
    }
}
