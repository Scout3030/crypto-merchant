<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserKycApplicationPerson extends Model
{
    use HasFactory;

    protected $table = 'user_kyc_applications_persons';

    const DIRECTOR = 1;
    const SHAREHOLDER = 2;

    protected $fillable = [
        'user_id',
        'person_name',
        'person_address',
        'country',
        'state',
        'state_other',
        'city',
        'city_other',
        'type_person',
        'status'
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
