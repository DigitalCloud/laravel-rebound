<?php

namespace DigitalCloud\LaravelRebound\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class BroadcastEventJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $test;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($event)
    {

        $this->test = $event;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        event($this->test);
    }
}
