<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:members');
    }
    public function index()
    {
        return view('member.dashboard')->with('role', 'member');
    }
}
