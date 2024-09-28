<?php

namespace App\Listeners;

use App\Events\testevent;
use App\Models\User;
use Illuminate\Queue\InteractsWithQueue;
use App\Notifications\TestingNotifiaction;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;

class TestListener
{
    /**
     * Create the event listener.
     */
    public function __construct(public User $user)
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(testevent $event): void
    {

        $user = $event->user;
        Notification::send($user,new TestingNotifiaction());
    }
}
