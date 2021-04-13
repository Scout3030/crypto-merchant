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
        'city_id',
        'phone_number',
        'skype_id',
        'identification_document',
        'upload_document',
        'document_number',
        'tax_id'
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
