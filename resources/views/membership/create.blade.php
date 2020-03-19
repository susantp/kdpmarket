@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New Member</h2>
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
    <div class="row">

        <form action="{{ route('membership.store') }}" method="POST">
            @csrf
            <label>
                <p class="label-txt">ENTER YOUR USERNAME</p>
                <input type="text" class="input" name="userID" id="userID" placeholder="Username">
                <div class="line-box">
                    <div class="line"></div>
                </div>
            </label>
            <label>
                <p class="label-txt">ENTER YOUR Name</p>
                <input type="text" class="input" name="name" id="name" placeholder="Name">
                <div class="line-box">
                    <div class="line"></div>
                </div>
            </label>
            <label>
                <p class="label-txt">ENTER YOUR PHONE</p>
                <input type="text" class="input" name="phone" id="phone" placeholder="Phone">
                <div class="line-box">
                    <div class="line"></div>
                </div>
            </label>
            <label>
                <p class="label-txt">ENTER YOUR EMAIL</p>
                <input type="email" class="input" name="email" id="email" placeholder="E-Mail">
                <div class="line-box">
                    <div class="line"></div>
                </div>
            </label>
            <label>
                <p class="label-txt">ENTER YOUR RRN</p>
                <input type="text" class="input" name="rrn" id="rrn" placeholder="RRN">
                <div class="line-box">
                    <div class="line"></div>
                </div>
            </label>
            <label>
                <p class="label-txt">ENTER YOUR DEPOSIT NAME</p>
                <input type="text" class="input" name="deposit_name" id="deposit_name" placeholder="Deposit Name">
                <div class="line-box">
                    <div class="line"></div>
                </div>
            </label>
            <label>
                <p class="label-txt">ENTER YOUR Deposit Date</p>
                <input type="date" class="input" name="deposit_date" id="deposit_date" placeholder="Deposit Date">
                <div class="line-box">
                    <div class="line"></div>
                </div>
            </label>
            <label>
                <p class="label-txt">ENTER YOUR Voucher Number</p>
                <input type="text" class="input" name="voucher_no" id="voucher_no" placeholder="Voucher Number">
                <div class="line-box">
                    <div class="line"></div>
                </div>
            </label>
            <label>
                <p class="label-txt">ENTER YOUR Account Owner</p>
                <input type="text" class="input" name="account_owner" id="account_owner" placeholder="Account Owner">
                <div class="line-box">
                    <div class="line"></div>
                </div>
            </label>
            <label>
                <p class="label-txt">ENTER YOUR Bank Name</p>
                <input type="text" class="input" name="bank_name" id="bank_name" placeholder="Bank Name">
                <div class="line-box">
                    <div class="line"></div>
                </div>
            </label>
            <label>
                <p class="label-txt">ENTER YOUR Account Number</p>
                <input type="text" class="input" name="account_number" id="account_number" placeholder="Account Number">
                <div class="line-box">
                    <div class="line"></div>
                </div>
            </label>
            <label>
                <p class="label-txt">ENTER YOUR Recruiter ID</p>
                <input type="text" class="input" name="recuriter_id" id="recuriter_id" placeholder="Recruiter ID">
                <div class="line-box">
                    <div class="line"></div>
                </div>
            </label>
            <label>
                <p class="label-txt">ENTER YOUR Recruiter Name</p>
                <input type="text" class="input" name="recruiter_name" id="recruiter_name" placeholder="Recruiter Name">
                <div class="line-box">
                    <div class="line"></div>
                </div>
            </label>
            <label>
                <p class="label-txt">ENTER YOUR Sponsor ID</p>
                <input type="text" class="input" name="sponsor_id" id="sponsor_id" placeholder="Sponsor ID">
                <div class="line-box">
                    <div class="line"></div>
                </div>
            </label>
            <label>
                <p class="label-txt">ENTER YOUR Sponsor Name</p>
                <input type="text" class="input" name="sponsor_name" id="sponsor_name" placeholder="Sponsor Name">
                <div class="line-box">
                    <div class="line"></div>
                </div>
            </label>
            <label>
                <p class="label-txt">ENTER YOUR Center Name</p>
                <input type="text" class="input" name="center_name" id="center_name" placeholder="Center Name">
                <div class="line-box">
                    <div class="line"></div>
                </div>
            </label>
            <label>
                <p class="label-txt">ENTER YOUR Center Phone</p>
                <input type="text" class="input" name="center_phone" id="center_phone" placeholder="Center Phone">
                <div class="line-box">
                    <div class="line"></div>
                </div>
            </label>



            <button type="submit">submit</button>
        </form>
    </div>

</div>
@endsection
