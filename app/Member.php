<?php

namespace App;


use Illuminate\Foundation\Auth\User as Authenticatable;

class Member extends Authenticatable

{
    protected $table = 'members';

    protected $fillable = [
        'userID',
        'name',
        'phone',
        'email',
        'rrn',
        'deposit_name',
        'deposit_date',
        'voucher_no',
        'account_owner',
        'bank_name',
        'account_number',
        'recruiter_id',
        'recruiter_name',
        'sponsor_id',
        'sponsor_name',
        'center_name',
        'center_phone'
    ];
}
