<?php

namespace App\Listeners;

use App\Models\User;
use App\Notifications\IngresoNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class IngresoListener
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
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        // User::all()->except($ingreso->user_id)
        //            ->each(function(User $user) use ($ingreso){
        //              $user->notify(new IngresoNotification($ingreso));
        //            });

        User::all()->except($event->ingreso->user_id)
                   ->each(function(User $user) use($event){
                        Notification::send($user, new IngresoNotification($event->ingreso));
                   });
    }
}
