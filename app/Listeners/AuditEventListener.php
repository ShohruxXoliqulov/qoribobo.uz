<?php

namespace App\Listeners;

use App\Events\AuditEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;

class AuditEventListener
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
    public function handle(AuditEvent $event): void
{
    DB::table('audits')->insert([
        'user_name' => $event->user,
        'event_type' => $event->event_type,
        'data' => json_encode($event->data), // Encode credit data
        'date' => date('Y-m-d H:i:s'),
    ]);
}
}
