<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\AccountActivatedMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

use App\Traits\AuthenticatesUsers;
use App\Traits\RegistersUsers;
use App\Mail\NewAccountMail;
use stdClass;

use App\Models\User;
use Illuminate\Validation\Rule;

class AuthController extends Controller {
    use AuthenticatesUsers, RegistersUsers;

    //protected $redirectTo = '/merchant';

    public function __construct()
    {
        // $this->middleware('guest')->except('logout'); // Login
        // $this->middleware('guest'); // Registration
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  Request  $request
     * @return \App\Models\User
     */
    protected function register(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|max:255|unique:users'
        ]);

        // User create
        $user = User::create([
            'email' => $request->email,
            'confirmation_code' => md5(time() . $request->email)
        ]);

        // Send verification email
        $obj = new stdClass();
        $obj->confirmation_code = $user->confirmation_code;
        $obj->email = $user->email;

        try {
            Mail::to('coding.zerones@gmail.com')->send(new NewAccountMail($obj));

        } catch (\Throwable $th) {
            return back()->withErrors('An error occurred while sending the verification email.');
        }


        return back()->with('success', true);
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }

    public function verify($code)
    {
        $user = User::where('confirmation_code', $code)->first();

        if (!$user) return redirect('/');

        $password = Str::random(5);

        $user->confirmation_code = null;
        $user->email_verified_at = now();
        $user->password = Hash::make($password);
        $user->save();

        // Send email from activated account
        $obj = new stdClass();
        $obj->email = $user->email;
        $obj->password = $password;

        try {
            Mail::to('coding.zerones@gmail.com')->send(new AccountActivatedMail($obj));

        } catch (\Throwable $th) {
            return back()->withErrors('An error occurred while sending the verification email.');
        }

        // Redirect account activated successfully
        return view('auth.account_activated');
    }

    /**
     * Validate the user login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            $this->username() => Rule::exists('users')->where(function ($query) {
                $query->whereNotNull('email_verified_at');
            }),
            'password' => 'required|string',
        ], [
            $this->username() . '.exists' => 'The selected email is invalid or the account is not verified.'
        ]);
    }




}
