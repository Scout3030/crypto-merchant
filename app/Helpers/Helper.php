<?php

use Carbon\Carbon;
use Jenssegers\Agent\Agent;

function getSegmentContext($email = null): array
{
    $agent = new Agent();

    return [
        "context" => [
            "ip" => request()->ip(),
            "agent" => $agent->browser(),
            "platform" => $agent->platform(),
            "action_by" => $email ?? (auth()->check() ? auth()->user()->email : 'AnonymousUser'),
            "action_date" => Carbon::now()
        ]
    ];
}

