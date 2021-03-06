<?php

namespace App\Modules\Menus\Providers;

use Nova\Events\Dispatcher;
use Nova\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;


class EventServiceProvider extends ServiceProvider
{
    /**
     * Register any other events for your application.
     *
     * @param  \Nova\Events\Dispatcher  $events
     * @return void
     */
    public function boot(Dispatcher $events)
    {
        parent::boot($events);

        //
        $path = realpath(__DIR__ .'/../');

        // Load the Events.
        $path = $path .DS .'Events.php';

        $this->loadEventsFrom($path);
    }
}
