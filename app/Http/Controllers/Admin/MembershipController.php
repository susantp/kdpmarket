<?php

namespace App\Http\Controllers\Admin;

use App\CompanyInfo;
use App\Http\Controllers\Controller;
use App\Member;
use App\SponsorRecruiter;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class MembershipController extends Controller
{

    public function __construct()
    {

        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $members = Member::paginate(10);
        $members = Member::all();

        return view('backend.membership.index', ['members' => $members, 'role' => 'admin']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $companies = Member::select('id', 'userID', 'name', 'phone')->distinct('userID')->get();
        // dd( $companies);
        return view('backend.membership.create', ['role' => 'admin', 'companies' => $companies]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'name' => 'required',
            'userID' => 'unique:members,userID',
            'first_password_login' => 'required',
            'second_password_eWallet' => 'required',
        ]);

        // dd($request->all());
        $member = new Member();
        $member->userID = $request->userID;
        $member->name = $request->name;
        $member->phone = $request->phone;
        $member->email = $request->email;
        $member->rrn = $request->rrn;
        $member->deposit_name = $request->deposit_name;
        $member->deposit_date = $request->deposit_date;
        $member->voucher_no = $request->voucher_no;
        $member->account_owner = $request->account_owner;
        $member->bank_name = $request->bank_name;
        $member->account_number = $request->account_number;
        $member->recruiter_id = $request->recruiter_id;
        $member->recruiter_name = $request->recruiter_name;
        $member->sponsor_id = $request->sponsor_id;
        $member->sponsor_name = $request->sponsor_name;
        // $member->center_name = $request->center_name_text;
        $member->center_name = $request->center_name_select;
        $member->center_phone = $request->center_phone;
        $member->center_qualify = $request->center_qualify;
        $member->password = Hash::make($request->first_password_login);
        $member->second_password_eWallet = Hash::make($request->second_password_eWallet);

        $member->save();
        // if ($current_recruiter->status  == 'no') {
        //     dd('inside if statement line 90');
        // }
        //     dd($current_recruiter);

        if ($member) {
            $recruiter = new SponsorRecruiter();
            $recruiter->member_id = $member->id;
            $recruiter->userID = $member->userID;
            $recruiter->sponsor_id = $member->sponsor_id;
            $recruiter->recruiter_id = $member->recruiter_id;
            if ($request->recruiter_bonus == 'recruiter_left') {
                $recruiter->recruiter_left = 1;
                $recruiter->recruiter_right = 0;
            }
            if ($request->recruiter_bonus == 'recruiter_right') {
                $recruiter->recruiter_right = 1;
                $recruiter->recruiter_left = 0;
            }
            // check if the current recruiter has previous recruitment history
            $recruiter->status = 'no';
            $recruiter->save();
            $current_recruiter = SponsorRecruiter::where('userID', $request->recruiter_id)->first();
            $recruiter_left_count = SponsorRecruiter::select('recruiter_left')->where('recruiter_id', $request->recruiter_id)->sum('recruiter_left');
            $recruiter_right_count = SponsorRecruiter::select('recruiter_right')->where('recruiter_id', $request->recruiter_id)->sum('recruiter_right');

            if ($current_recruiter->status == 'no' && $recruiter_left_count >= 5 && $recruiter_right_count >= 5) {
                $now = now();
                $current_recruiter->status = 'yes';
                // dd($date);
                $current_recruiter->bonus_at =  $now;
                $current_recruiter->save();
            } 
        } else {

            return redirect()->route('membership.index', ['role' => 'admin', 'error' => 'Member Couldnot be created.']);
        }

        // dd($member);
        return redirect()->route('membership.index', ['role' => 'admin', 'success' => 'Member created successfully.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $member = Member::find($id);
        return view('backend.membership.show', ['member' => $member, 'role' => 'admin']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $member = Member::find($id);
        $sponsorRecruiter = SponsorRecruiter::where('member_id', $id)->first();
        $companies = Member::select('id', 'userID', 'name', 'phone')->distinct('userID')->get();

        // dd($sponsorRecruiter);
        // $companies = CompanyInfo::select('company_name', 'company_phone')->get();
        return view('backend.membership.edit', ['member' => $member, 'role' => 'admin', 'companies' => $companies, 'sponsorRecruiter' => $sponsorRecruiter]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);
        // dd($request);
        $member = Member::find($id);
        // $member->userID = $request->userID;
        $member->name = $request->name;
        $member->phone = $request->phone;
        if (empty($request->email)) {
            $request->email = '-';
        }
        $member->email = $request->email;
        $member->rrn = $request->rrn;
        $member->deposit_name = $request->deposit_name;
        $member->deposit_date = $request->deposit_date;
        $member->voucher_no = $request->voucher_no;
        $member->account_owner = $request->account_owner;
        $member->bank_name = $request->bank_name;
        $member->account_number = $request->account_number;
        $member->recruiter_id = $request->recruiter_id;
        $member->recruiter_name = $request->recruiter_name;
        $member->sponsor_id = $request->sponsor_id;
        $member->sponsor_name = $request->sponsor_name;
        $member->center_name = $request->center_name_select;
        $member->center_phone = $request->center_phone;
        $member->center_qualify = $request->center_qualify;
        $member->save();

        $recruiter = SponsorRecruiter::where('member_id', $id)->first();
        $recruiter->sponsor_id = $member->sponsor_id;
        $recruiter->recruiter_id = $member->recruiter_id;
        if ($request->recruiter_bonus == 'recruiter_left') {
            $recruiter->recruiter_left = 1;
            $recruiter->recruiter_right = 0;
        }
        if ($request->recruiter_bonus == 'recruiter_right') {
            $recruiter->recruiter_right = 1;
            $recruiter->recruiter_left = 0;
        }
        // $recruiter->status = 'no';

        $recruiter->save();


        return redirect()->route('membership.index')
            ->with('success', 'Member updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $member = Member::find($id);
        $member->delete();

        return redirect()->route('membership.index')
            ->with('success', 'Member deleted successfully');
    }

    public function changeInfo()
    {
        $userIds = Member::select('userID', 'id')->get();
        // echo "<pre>";
        // print_r($userIds);
        // die;
        return view('backend.membership.changeInfo', ['role' => 'admin', 'userIds' => $userIds]);
    }
    public function checkRecruiterInfo(Request $request)
    {
        $info = $request->all();
        $member = Member::select('name')->where('userID', $info['id'])->get();
        $checkrepeatation = Member::where('sponsor_id', '=', $info['id'])->get();
        $row_count = $checkrepeatation->count();
        return response()->json(['success' => 'Got the Request', 'data' => $member, 'count' => $row_count]);

        // return response()->json(['success' => 'Got the Request', 'data' => $member]);
    }

    public function checkUserID(Request $request)
    {
        dd($request);
    }


    public function checkPassword(Request $request)
    {
        //"curpwd":"adsf","pwd":"asdf","conpwd":"asdf"
        // $currentpassword = User::find(Auth::id());
        // return strcmp(bcrypt($request->curpwd), $currentpassword->password);
        return Auth::id();
        $user = User::find(Auth::id());
        $user->password = bcrypt($request->pwd);
        $response = $user->save();
        if ($response > 0) {
            return view('cauth.changepassword', ['msg' => 'Password Change Successfully']);
        }
    }

    public function memberChangePassword()
    {
        $userIds = Member::select('userID', 'id')->get();
        return view('backend.membership.changePassword', ['userIds' => $userIds, 'role' => 'admin']);
    }

    public function showSponsors()
    {
        return view('backend.chart', ['role' => 'admin']);
    }
}
