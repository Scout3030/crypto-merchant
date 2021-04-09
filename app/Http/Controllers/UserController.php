<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Routing\Controller;
use App\Mail\TestingRequest;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
	public function testmail(Request $request)
    {
        $objDemo = new \stdClass();
        $objDemo->demo_one = 'Demo One Value';
        $objDemo->demo_two = 'Demo Two Value';
        $objDemo->sender = 'SenderUserName';
        $objDemo->receiver = 'ReceiverUserName';
 
        Mail::to("michaelmathewssar@gmail.com")->send(new TestingRequest($objDemo));
    }
}