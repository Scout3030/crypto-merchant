<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserKycApplicationDocument extends Model
{
    use HasFactory;

    protected $table = 'user_kyc_applications_documents';

    protected $fillable = [
        'user_id',
        'identification_document',
        'other_document',
        'document_number',
        'image',
        'status'
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
