<?php

namespace App\Listeners;

use App\Models\User;
use App\Notifications\SolicitudNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class SolicitudListener implements ShouldQueue
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
        // User::all()->except($solicitud->user_id)
        //            ->each(function(User $user) use ($solicitud){
        //              $user->notify(new SolicitudNotification($solicitud));
        //            });

        User::all()->except($event->solicitud->user_id)
                   ->each(function(User $user) use($event){
                        Notification::send($user, new SolicitudNotification($event->solicitud));
                   });
    }
}
