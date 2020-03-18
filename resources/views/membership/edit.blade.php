@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Member</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-primary" href="{{ route('membership.index') }}"> Back</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    @php
    // dd($member->id);
    @endphp
    <div class="row">

        <form action="{{ route('membership.update',$member->id) }}" method="POST">
            @csrf
            @method('PUT')
            <label>
                <p class="label-txt">ENTER YOUR USERNAME</p>
                <input type="text" class="input" name="userID" id="userID" placeholder="Username"
                    value="{{$member->userID}}">
                <div class="line-box">
                    <div class="line"></div>
                </div>
            </label>
            <label>
                <p class="label-txt">ENTER YOUR Name</p>
                <input type="text" class="input" name="name" id="name" placeholder="Name" value="{{$member->name}}">
                <div class="line-box">
                    <div class="line"></div>
                </div>
            </label>
            <label>
                <p class="label-txt">ENTER YOUR PHONE</p>
                <input type="text" class="input" name="phone" id="phone" placeholder="Phone" value="{{$member->phone}}">
                <div class="line-box">
                    <div class="line"></div>
                </div>
            </label>
            <label>
                <p class="label-txt">ENTER YOUR EMAIL</p>
                <input type="email" class="input" name="email" id="email" placeholder="E-Mail"
                    value="{{$member->email}}">
                <div class="line-box">
                    <div class="line"></div>
                </div>
            </label>
            <label>
                <p class="label-txt">ENTER YOUR RRN</p>
                <input type="text" class="input" name="rrn" id="rrn" placeholder="RRN" value="{{$member->rrn}}">
                <div class="line-box">
                    <div class="line"></div>
                </div>
            </label>
            <label>
                <p class="label-txt">ENTER YOUR DEPOSIT NAME</p>
                <input type="text" class="input" name="deposit_name" id="deposit_name" placeholder="Deposit Name"
                    value="{{$member->deposit_name}}">
                <div class="line-box">
                    <div class="line"></div>
                </div>
            </label>
            <label>
                <p class="label-txt">ENTER YOUR Deposit Date</p>
                <input type="date"" class=" input" name="deposit_date" id="deposit_date" placeholder="Deposit Date"
                    value="{{$member->deposit_date}}">
                <div class="line-box">
                    <div class="line"></div>
                </div>
            </label>
            <label>
                <p class="label-txt">ENTER YOUR Voucher Number</p>
                <input type="text" class="input" name="voucher_no" id="voucher_no" placeholder="Voucher Number"
                    value="{{$member->voucher_no}}">
                <div class="line-box">
                    <div class="line"></div>
                </div>
            </label>
            <label>
                <p class="label-txt">ENTER YOUR Account Owner</p>
                <input type="text" class="input" name="account_owner" id="account_owner" placeholder="Account Owner"
                    value="{{$member->account_owner}}">
                <div class="line-box">
                    <div class="line"></div>
                </div>
            </label>
            <label>
                <p class="label-txt">ENTER YOUR Bank Name</p>
                <input type="text" class="input" name="bank_name" id="bank_name" placeholder="Bank Name"
                    value="{{$member->bank_name}}">
                <div class="line-box">
                    <div class="line"></div>
                </div>
            </label>
            <label>
                <p class="label-txt">ENTER YOUR Account Number</p>
                <input type="text" class="input" name="account_number" id="account_number" placeholder="Account Number"
                    value="{{$member->account_number}}">
                <div class="line-box">
                    <div class="line"></div>
                </div>
            </label>
            <label>
                <p class="label-txt">ENTER YOUR Recruiter ID</p>
                <input type="text" class="input" name="recuriter_id" id="recuriter_id" placeholder="Recruiter ID"
                    value="{{$member->recuriter_id}}">
                <div class="line-box">
                    <div class="line"></div>
                </div>
            </label>
            <label>
                <p class="label-txt">ENTER YOUR Recruiter Name</p>
                <input type="text" class="input" name="recruiter_name" id="recruiter_name" placeholder="Recruiter Name"
                    value="{{$member->recruiter_name}}">
                <div class="line-box">
                    <div class="line"></div>
                </div>
            </label>
            <label>
                <p class="label-txt">ENTER YOUR Sponsor ID</p>
                <input type="text" class="input" name="sponsor_id" id="sponsor_id" placeholder="Sponsor ID"
                    value="{{$member->sponsor_id}}">
                <div class="line-box">
                    <div class="line"></div>
                </div>
            </label>
            <label>
                <p class="label-txt">ENTER YOUR Sponsor Name</p>
                <input type="text" class="input" name="sponsor_name" id="sponsor_name" placeholder="Sponsor Name"
                    value="{{$member->sponsor_name}}">
                <div class="line-box">
                    <div class="line"></div>
                </div>
            </label>
            <label>
                <p class="label-txt">ENTER YOUR Center Name</p>
                <input type="text" class="input" name="center_name" id="center_name" placeholder="Center Name"
                    value="{{$member->center_name}}">
                <div class="line-box">
                    <div class="line"></div>
                </div>
            </label>
            <label>
                <p class="label-txt">ENTER YOUR Center Phone</p>
                <input type="text" class="input" name="center_phone" id="center_phone" placeholder="Center Phone"
                    value="{{$member->center_phone}}">
                <div class="line-box">
                    <div class="line"></div>
                </div>
            </label>



            <button type="submit">submit</button>
        </form>
    </div>

</div>
@endsection
