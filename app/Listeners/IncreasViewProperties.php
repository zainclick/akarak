<?php

namespace App\Listeners;

use App\Events\PropertiesViewer;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class IncreasViewProperties
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(PropertiesViewer $event): void
    {
        $this->updateViewer($event->property);
    }

    function updateViewer($property){
        $property->views = $property->views + 1;
        $property->save();
    }
}
