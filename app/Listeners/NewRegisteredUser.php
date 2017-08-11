<?php

namespace App\Listeners;

use App\Events\NewUserRegister;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewRegisteredUser
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
     * @param  NewUserRegister  $event
     * @return void
     */
    public function handle(NewUserRegister $event)
    {
        $data = [
            'name'=>$event->getName(),
            'token'=>$event->getToken()
        ];
        Mail::send(['html'=>'mail.newusersignup'],['data'=>$data], function ($message) use ($event){
            $message->from(env('MAIL_USERNAME'),'SIWALAN');
            $message->to($event->getEmail())->subject('SIWALAN - Konfirmasi pendaftaran');
        });
    }
}
