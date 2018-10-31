<?php

namespace DigitalCloud\LaravelRebound;

use Illuminate\Contracts\Queue\Job;

class CallQueuedHandler extends \Illuminate\Queue\CallQueuedHandler
{
    public function call(Job $job, array $data)
    {
        if($data['commandName'] && !class_exists($data['commandName'])){
            $job->delete();
            return;
        }

        parent::call($job,$data);
    }
}
