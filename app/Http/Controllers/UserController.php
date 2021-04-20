<?php

namespace App\Http\Controllers;

use App\Helpers\Formats;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function profile()
    {
        return view('profile.edit');
    }
}
