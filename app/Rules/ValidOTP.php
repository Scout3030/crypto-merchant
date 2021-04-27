<?php

namespace App\Rules;

use App\Models\User;
use Illuminate\Contracts\Validation\Rule;

class ValidOTP implements Rule
{
    private User $user;
    private int $tries;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        $email = session('otp-email');
        $this->user = User::whereEmail($email)->first();
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if($value != $this->user->otp_token){
            $this->user->otp_tries++;
            if($this->user->otp_tries == (env('OTP_MAX_TRIES') ?? 3)){
                $this->user->blocked_at = now()->format('Y-m-d H:i:s');
            }
            $this->tries = (env('OTP_MAX_TRIES') ?? 3) - $this->user->otp_tries;
            $this->user->save();
            return false;
        };
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return "OTP failed. You have {$this->tries} attempts left";
    }
}
