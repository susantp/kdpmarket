@extends('layouts.backend.app')
@section('content')
<div class="container-fluid">
    <!-- Content Row -->

    <div class="row">
        <div class="col-lg-6">
            <!-- Grayscale Utilities -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Change Password</h6>
                </div>
                <div class="card-body">
                    @if(!empty($msg))
                    <div class="alert alert-success" role="alert">
                        {{$msg}}
                    </div>
                    @endif
                    <form class="changePwd" action="{{route('dochangepassword')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="userID">UserID</label>
                            <select name="newuserID" id="newuserID" class="form-control">
                                <option value="">select</option>
                                @foreach ($userIds as $userId)
                                <option value="{{$userId->id}}">{{$userId->userID}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="passwordType">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="password_type" id="login_password"
                                    checked value="first_password_login">
                                <label class="form-check-label" for="inlineRadio1">1st Password(Login)</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="password_type" id="eWallet_password"
                                    value="second_password_eWallet">
                                <label class="form-check-label" for="inlineRadio2">2nd Password (E-wallet)</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleCpwd">Current Password</label>
                            <input type="password" class="form-control" id="exampleCpwd" aria-describedby="Cpassword"
                                name="curpwd">
                        </div>
                        <div class="form-group">
                            <label for="InputPassword1">New Password</label>
                            <input type="password" class="form-control" id="pwd" name="pwd">
                        </div>
                        <div class="form-group">
                            <label for="conpwd">Confirm Password</label>
                            <input type="password" class="form-control" id="conpwd" name="conpwd">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection