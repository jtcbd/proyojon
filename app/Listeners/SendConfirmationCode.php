<?php

namespace App\Listeners;

use App\Events\AccountCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendConfirmationCode
{
    /**
     * Handle the event.
     *
     * @param  AccountCreated  $event
     * @return void
     */
    public function handle(AccountCreated $event)
    {
        $code = $event->user->generateVerificationToken();
        $message = "your confirmation code is " . $code;
        send_message($event->user->mobile, $message);
    }
}
