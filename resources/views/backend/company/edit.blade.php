@extends('layouts.backend.app')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Content Row -->

    <div class="row">
        <div class="col-lg-10">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
            <!-- Grayscale Utilities -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        Company Registration 등록화면 설명
                    </h6>
                </div>
                <div class="card-body">
                    <form class="memberRegistration" action="{{route('companies.update',$company->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="rName">Company Name</label>
                                    <input type="text" class="form-control" name="company_name" id="name" placeholder="회원이름" value="{{$company->company_name}}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="rPhone">Company Phone</label>
                                    <input type="text" class="form-control" name="company_phone" id="phone"
                                        aria-describedby="rPhone" placeholder="전화번호" value="{{$company->company_phone}}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="rEmail">Company Email</label>
                                    <input type="email" class="form-control" name="company_email" id="email"
                                        aria-describedby="rEmail" placeholder="이메일 주소" value="{{$company->company_email}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="userID">Company Owner</label>
                                <select name="company_owner" id="company_owner" class="form-control">
                                    <option value="">select</option>
                                    @foreach ($members as $member)
                                    <option value="{{$member->id}}">{{$member->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- end of row -->
                        </div>
                        <hr>
                        <button type="submit" class="btn btn-primary">Submit <i
                                class="fa fa-fw fa-paper-plane"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection