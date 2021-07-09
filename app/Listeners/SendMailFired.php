<?php

namespace App\Listeners;

use App\Events\SendMail;
use App\Mail\Mail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendMailFired
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
     * @param  SendMail  $event
     * @return void
     */
    public function handle(SendMail $event)
    {
        $details = [
            'title' => 'Changing information',
            'body'  => 'Your personal info was successfully updated.'
        ];
        \Mail::to($event->userId->email)->send(new Mail($details));
    }
}
