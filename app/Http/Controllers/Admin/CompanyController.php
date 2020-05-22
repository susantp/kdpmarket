<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\CompanyInfo;
use App\Member;
use App\SponsorRecruiter;
use Illuminate\Support\Facades\DB;




class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {

        $this->middleware('auth');
    }

    public function indexQualified()
    {
        $qCompanies = Member::select('userID', 'name', 'center_name', 'center_phone', 'center_qualify')->where('center_qualify', 'yes')->get();
        // return $qCompanies;
        return view('backend.company.index', ['companies' => $qCompanies, 'role' => 'admin']);
    }

    public function indexBonusList()
    {
        $members = Member::all();
        return view('backend.company.bonusindex', ['members' => $members, 'role' => 'admin']);
    }

    public function bonusMemberCalculate(Request $request)
    {
        $bonusDate = $request->bonusDate;
        $bonusMember =  DB::select('SELECT * FROM `sponsor_recruiter` WHERE DATE(bonus_at) = "'.$bonusDate.'"');
        $data['success'] = true;
        $data['result'] = $bonusMember;
        return response()->json($data);
        dd($bonusMember);

    }


    public function index()
    {
        $companies = CompanyInfo::with('members')->get();
        // dd($companies);
        return view('backend.company.index', ['companies' => $companies, 'role' => 'admin']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $members = Member::select('name', 'id')->get();
        return view('backend.company.create', ['members' => $members, 'role' => 'admin']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $company = new CompanyInfo();
        // dd($request);
        $company->company_name = $request->company_name;
        $company->company_phone = $request->company_phone;
        $company->company_email = $request->company_email;
        $company->company_owner = $request->company_owner;

        $company->save();
        return redirect()->route('companies.index', ['role' => 'admin', 'success' => 'Company created successfully.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = CompanyInfo::find($id);
        $members = Member::select('name', 'id')->get();
        return view('backend.company.edit', ['company' => $company, 'role' => 'admin', 'members' => $members]);
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
        $company = CompanyInfo::find($id);
        // dd($request);
        $company->company_name = $request->company_name;
        $company->company_phone = $request->company_phone;
        $company->company_email = $request->company_email;
        $company->company_owner = $request->company_owner;

        $company->save();
        return redirect()->route('companies.index', ['role' => 'admin', 'success' => 'Company Updated successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
