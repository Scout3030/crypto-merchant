<?php

use Carbon\Carbon;
use Jenssegers\Agent\Agent;

function getSegmentContext(): array
{
    $agent = new Agent();

    return [
        "context" => [
            "ip" => request()->ip(),
            "agent" => $agent->browser(),
            "platform" => $agent->platform(),
            "action_by" => auth()->user()->email,
            "action_date" => Carbon::now()
        ]
    ];
}

