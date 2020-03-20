<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Member;
use App\SponsorRecruiter;
use Illuminate\Http\Request;

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

        ]);

        Member::create($request->all());

        if ($request->sponsor_id || $request->recruiter_id) {
            $sponsorRecruiter = new SponsorRecruiter();
            $sponsorRecruiter->userID = $request->userID;
            $sponsorRecruiter->sponsor_id = $request->sponsor_id;
            $sponsorRecruiter->recruiter_id = $request->recruiter_id;
            $sponsorRecruiter->save();
        }
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
        return response()->json(['success' => 'Got the Request', 'data' => $member]);
    }

    public function getAllUserID(Request $request)
    {
    }
}