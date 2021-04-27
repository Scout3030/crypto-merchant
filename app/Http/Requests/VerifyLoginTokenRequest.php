<?php

namespace App\Http\Requests;

use App\Rules\NotExpiredOTP;
use App\Rules\OTPMaxTries;
use App\Rules\ValidOTP;
use Illuminate\Foundation\Http\FormRequest;

class VerifyLoginTokenRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'otp_token' => [
                new OTPMaxTries,
                'required',
                'min:6',
                'max:6',
                new NotExpiredOTP(),
                new ValidOTP(),
            ],
        ];
    }
}
