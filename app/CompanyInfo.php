<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class CompanyInfo extends Authenticatable
{
    use Notifiable;

    protected $guard = 'companies';
    protected $fillable = [
        'company_name','company_phone','company_email','password',
    ];

    protected $hidden = [
        'password','remember_token',
    ];
}
