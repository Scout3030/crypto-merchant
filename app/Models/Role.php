<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    const ROLE_NAME_ROOT     = 'Root';
    const ROLE_NAME_MANAGER  = 'Manager';
    const ROLE_NAME_MERCHANT = 'Merchant';

    use HasFactory;
}
