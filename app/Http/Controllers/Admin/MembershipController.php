<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Member;
use App\SponsorRecruiter;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
        $members = Member::all();
        return view('backend.membership.index')->with('members', $members);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.membership.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'userID' => 'unique:members,userID',
            'first_password_login' =>'required',
            'second_password_eWallet' => 'required',
        ]);

        // Member::create($request->all());
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
        $member->center_name = $request->center_name;
        $member->center_phone = $request->center_phone;
        $member->center_qualify = $request->center_qualify;
        $member->first_password_login = Hash::make($request->first_password_login);
        $member->second_password_eWallet = Hash::make($request->second_password_eWallet);
        $member->save();
        return redirect()->route('membership.index')->with('success', 'Member created successfully.');
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
        return view('backend.membership.show', compact('member'));
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
        return view('backend.membership.edit', compact('member'));
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
        $member = Member::find($id);

        $member->update($request->all());

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
        return view('backend.membership.changeInfo')->with('userIds', $userIds);
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
        return view('backend.membership.changePassword')->with('userIds', $userIds);
    }
}
