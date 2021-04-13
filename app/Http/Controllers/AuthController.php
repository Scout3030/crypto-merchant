<?php

namespace App\Http\Controllers;

use stdClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Mail\AccountActivatedMail;
use App\Mail\NewAccountMail;
use App\Mail\SendOTPToken;
use App\Models\User;
use App\Rules\StrengthPassword;
use App\Traits\AuthenticatesUsers;
use App\Traits\RegistersUsers;
use App\Traits\ResetsPasswords;
use App\Traits\SendsPasswordResetEmails;

class AuthController extends Controller {
    use AuthenticatesUsers, RegistersUsers, SendsPasswordResetEmails, ResetsPasswords;

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
            Mail::to($user->email)->send(new NewAccountMail($obj));
        } catch (\Throwable $e) {
            report($e);

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
            Mail::to($user->email)->send(new AccountActivatedMail($obj));

        } catch (\Throwable $e) {
            report($e);

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

    public function login(Request $request)
    {
        $this->validateLogin($request);
        session()->put('user-email', $request->email);
        $user = User::whereEmail($request->email)->first();
        if (Hash::check($request->password, $user->password)) {
            $token = rand(100000,999999);

            $user->fill([
                'otp_token' => $token,
                'token_status' => (string) User::ACTIVED_TOKEN
            ])->save();

            try {
                Mail::to($user->email)->send(new SendOTPToken($token));
            } catch (\Throwable $e) {
                report($e);

                return back()->withErrors('An error occurred while sending the verification email.');
            }

            return redirect('/login/verify');
        }

        return back()->withErrors('Incorrect credentials.');
    }

    public function verifyLoginToken(Request $request)
    {
        $otp_token = $request->otp_token;
        $email = session()->get('user-email');
        $user = User::whereEmail($email)->first();
        if($user->otp_token == $otp_token && $user->token_status == (string) User::ACTIVED_TOKEN){

            $user->fill([
                'otp_token' => null,
                'token_status' => (string) User::INACTIVED_TOKEN
            ])->save();


            Auth::loginUsingId($user->id);
            session()->forget('user-email');
            
            if($user->first_login == (string) User::YES){
                return redirect()->route('auth.change.password');
            }

            return redirect('/merchant');
        }
        return back()->withErrors('An error occurred while sending the verification email.');
    }

    public function updatePassword(){
        $this->validate(request(), [
			'password' => ['required', 'confirmed', new StrengthPassword]
		]);

        /** @var User */
		$user = auth()->user();

        $user->password = bcrypt(request('password'));
		$user->save();

        return redirect('/merchant'); 
    }

    /**
     * Get the broker to be used during password reset.
     *
     * @return \Illuminate\Contracts\Auth\PasswordBroker
     */
    public function broker()
    {
        return Password::broker();
    }
}
