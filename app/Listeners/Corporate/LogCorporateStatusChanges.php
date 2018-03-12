<?php

namespace App\Listeners\Corporate;

use App\Events\Corporate\CorporateStatusChanged;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\CorporateLog;

class LogCorporateStatusChanges
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
     * @param  CorporateStatusChanged  $event
     * @return void
     */
    public function handle(CorporateStatusChanged $event)
    {
        CorporateLog::create([
            'corporate_id' => $event->corporate->id,
            'title' => 'Change status to ' . strtoupper($event->corporate->status),
            'created_by' => $event->createdById,
        ]);
    }
}
