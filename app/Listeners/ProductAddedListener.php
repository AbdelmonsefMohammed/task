<?php

namespace App\Listeners;

use Mail;
use App\Mail\ProductAdded;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ProductAddedListener
{

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        Mail::to('abdomohammed929@gmail.com')
        ->send(new ProductAdded());
    }
}
