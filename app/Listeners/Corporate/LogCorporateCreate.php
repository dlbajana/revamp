<?php

namespace App\Listeners\Corporate;

use App\Events\Corporate\CorporateCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\CorporateLog;

class LogCorporateCreate
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
     * @param  CorporateCreated  $event
     * @return void
     */
    public function handle(CorporateCreated $event)
    {
        CorporateLog::create([
            'corporate_id' => $event->corporate->id,
            'title' => 'Create Corporate Record',
            'created_by' => auth()->user()->id,
        ]);
    }
}
