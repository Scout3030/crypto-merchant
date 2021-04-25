<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserKycApplicationPerson extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'person_name',
        'person_address',
        'country',
        'state',
        'state_other',
        'city',
        'city_other',
        'type_person'
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
