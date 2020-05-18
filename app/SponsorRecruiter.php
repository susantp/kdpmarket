<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SponsorRecruiter extends Model
{
    protected $table = 'sponsor_recruiter';
    protected $fillable = ['bonus_at'];
}