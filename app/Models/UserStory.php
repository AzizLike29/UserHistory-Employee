<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserStory extends Model
{
    use HasFactory;

    protected $table = 'user_stories';

    protected $fillable = [
        'first_name',
        'last_name',
        'date_of_birth',
        'phone',
        'email',
        'province',
        'city',
        'street_address',
        'zip_code',
        'ktp_number',
        'position',
        'bank_account_name',
        'bank_account_number',
        'scan_ktp_url_drive'
    ];

    public $timestamps = true;
}
