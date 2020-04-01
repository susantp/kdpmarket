<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Member;


class MemberController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:members');
    }
    public function index()
    {
        $id = Auth::user()->id;
        $member = Member::find($id);
        return view('member.dashboard', ['member' => $member, 'role' => 'member']);
        // return view('member.dashboard')->with('role', 'member');
    }

    public function edit($id)
    {
        $member = Member::find($id);
        return view('member.edit', ['member' => $member, 'role' => 'member']);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $member = Member::find($id);

        $member->update($request->all());
        // $member = Member::find($id);
        // $member->name = $request->name;
        // $member->phone = $request->phone;
        // $member->email = $request->email;
        // $member->rrn = $request->rrn;
        // $member->deposit_name = $request->deposit_name;
        // $member->deposit_date = $request->deposit_date;
        // $member->voucher_no = $request->voucher_no;
        // $member->account_owner = $request->account_owner;
        // $member->bank_name = $request->bank_name;
        // $member->account_owner = $request->account_owner;
        // $member->account_number = $request->account_number;
        // $member->recruiter_id = $request->recruiter_id;
        // $member->recruiter_name = $request->recruiter_name;
        // $member->sponsor_id = $request->sponsor_id;
        // $member->sponsor_name = $request->sponsor_name;
        // $member->center_name = $request->center_name;
        // $member->center_phone = $request->center_phone;
        // $member->center_qualify = $request->center_qualify;
        // $member->save();

        return redirect()->route('member.dashboard')
            ->with('success', 'Member updated successfully');
    }

    public function sponsorChartForMember(){
        return view('backend.chart', ['role' => 'member']);
    }
}

