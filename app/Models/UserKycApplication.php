<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserKycApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'full_name',
        'date_of_birth',
        'address',
        'country',
        'state',
        'state_other',
        'city',
        'city_other',
        'phone_number',
        'skype_id',
        'identification_document',
        'other_document',
        'upload_document',
        'document_number',
        'tax_id',
        'step'
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
