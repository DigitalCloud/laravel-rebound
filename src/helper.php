<?php

if (!function_exists("fire")) {
    function fire($event)
    {
        DigitalCloud\LaravelRebound\Jobs\BroadcastEventJob::dispatch($event)->onConnection('rabbitmq_fanout');
    }
}