<?php

namespace App\Listeners\Corporate;

use App\Events\Corporate\CorporateInfoChanged;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\CorporateLog;

class LogCorporateInfoChanges
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
     * @param  CorporateInfoChanged  $event
     * @return void
     */
    public function handle(CorporateInfoChanged $event)
    {
        CorporateLog::create([
            'corporate_id' => $event->corporate->id,
            'title' => 'Update Corporate Record.',
            'created_by' => auth()->user()->id,
        ]);
    }
}
