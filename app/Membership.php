<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Membership extends Authenticatable
{
   use Notifiable;
   protected $guard = 'membership';
   protected $fillable = [
    'userID','name', 'phone', 'email', 'rrn', 'deposit_name', 'deposit_date', 'voucher_no', 'account_owner', 'bank_name', 'account_number', 'recruiter_id', 'recruiter_name', 'sponsor_id', 'sponsor_name', 'center_name', 'center_phone'
   ];
   protected $hidden = [
       'first_password_login','second_password_eWallet','remember_token',
   ];
}
