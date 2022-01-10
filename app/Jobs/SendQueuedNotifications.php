<?php

namespace App\Jobs;

use Log;
use App\Models\Member;
use App\Models\RealEstate;
use Illuminate\Bus\Queueable;
use App\Http\Traits\Notification;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class SendQueuedNotifications implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, Notification;

    public $title;
    public $body;

    public function __construct($title, $body)
    {
        $this->title = $title;
        $this->body = $body;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $members =  Member::select('device_token', 'id')->get();

        $this->sendNotificationToAllUser($members, $this->title, $this->body);
    }
}
