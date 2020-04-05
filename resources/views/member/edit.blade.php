@extends('layouts.backend.memberLayout.app')
@section('content')
<div class="row">
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
    <div class="col-lg-10">
        <!-- Grayscale Utilities -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Member 등록화면 설명</h6>
            </div>
            <div class="card-body">
                <form class="memberRegistration" action="{{route('member.memberUpdate',$member->id)}}" method="POST">
                    @csrf
                    {{-- @method('PUT') --}}
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="rID">ID</label>
                                <input type="text" class="form-control" value="{{$member->userID}}" name="userID"
                                    id="userID" aria-describedby="rID" placeholder="회원 ID (6자리이상)" >
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="rName">Name</label>
                                <input type="text" class="form-control" value="{{$member->name}}" name="name" id="name"
                                    placeholder="회원이름">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="rPhone">Phone</label>
                                <input type="text" class="form-control" value="{{$member->phone}}" name="phone"
                                    id="phone" aria-describedby="rPhone" placeholder="전화번호">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="rEmail">Email</label>
                                <input type="email" class="form-control" value="{{$member->email}}" name="email"
                                    id="email" aria-describedby="rEmail" placeholder="이메일 주소">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="rDname">Depositor Name</label>
                                <input type="text" class="form-control" value="{{$member->deposit_name}}"
                                    name="deposit_name" id="deposit_name" aria-describedby="rDname"
                                    placeholder="입금자 이름">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="rDtime">Deposite Date / Time</label>
                                <input type="date" class="form-control" value="{{$member->deposit_date}}"
                                    name="deposit_date" id="deposit_date" aria-describedby="rDtime"
                                    placeholder="입금일자 및 시간">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="rVnumber">Voucher Number</label>
                                <input type="text" class="form-control" value="{{$member->voucher_no}}"
                                    name="voucher_no" id="voucher_no" aria-describedby="rVnumber" placeholder="상품권 번호">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="rAowner">Account Owner</label>
                                <input type="text" class="form-control" value="{{$member->account_owner}}"
                                    name="account_owner" id="account_owner" aria-describedby="rAowner"
                                    placeholder="예금주 이름">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="rRRN">RRN (6자리-7자리)</label>
                                <input type="text" class="form-control" value="{{$member->rrn}}" name="rrn" id="rrn"
                                    aria-describedby="rRRN" placeholder="주민등록 번호 (6자리-7자리)">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="rBName">Bank Name</label>
                                <input type="text" class="form-control" value="{{$member->bank_name}}" name="bank_name"
                                    id="bank_name" aria-describedby="rBName" placeholder="은행이름">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="rAcountNumber">Account Number</label>
                                <input type="text" class="form-control" value="{{$member->account_number}}"
                                    name="account_number" id="account_number" aria-describedby="rAcountNumber"
                                    placeholder="계좌번화">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-row">
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label for="rRID" class="labelHighlight">Recruiter ID</label>
                                        <input type="text" class="form-control" value="{{$member->recruiter_id}}"
                                            name="recruiter_id" id="recruiter_id" aria-describedby="rRID"
                                            placeholder="모집인 ID">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="rCheckID"></label>
                                    <button type="button" class="btn btn-info" id="rCheckID">Check</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="rRecruiterName">Recruiter Name</label>
                                <input type="text" class="form-control" value="{{$member->recruiter_name}}"
                                    name="recruiter_name" id="recuriter_name" aria-describedby="rRecruiterName"
                                    placeholder="모집인 이름">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-row">
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label for="rSPID" class="labelHighlight">Sponsor ID</label>
                                        <input type="text" class="form-control" value="{{$member->sponsor_id}}"
                                            name="sponsor_id" id="sponsor_id" aria-describedby="rSPID"
                                            placeholder="스폰서(후원인) ID">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="rCheckID"></label>
                                    <button type="button" class="btn btn-info" id="rSponsorCheckID">Check</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="rSpName">Sponsor Name</label>
                                <input type="text" class="form-control" value="{{$member->sponsor_name}}"
                                    name="sponsor_name" id="sponsor_name" aria-describedby="rSpName"
                                    placeholder="스폰서(후원인) 이름">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-row">
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label for="rID">Center Name</label>
                                        <select name="center_name" id="center_name" class="form-control">
                                            <option>select</option>
                                            @foreach ($companies as $company)
                                        <option value="{{$company->company_name}}" data-phone="{{$company->company_phone}}">{{$company->company_name}}</option>
                                            @endforeach
                                        </select>
                                        {{-- <input type="text" class="form-control" name="userID" id="userID"
                                            aria-describedby="rID" placeholder="회원 ID (6자리이상)"> --}}
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="rCheckID"></label>
                                    <button type="button" class="btn btn-info" id="rCheckID">Check</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="rCPhone">Center Phone</label>
                                <input type="text" class="form-control" value="{{$member->center_phone}}"
                                    name="center_phone" id="center_phone" aria-describedby="rCPhone"
                                    placeholder="사업장(사무실) 전화번호)">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label>Center Qualify</label>
                            <br><br>
                            <div class="form-row">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                        id="inlineRadio1" value="option1">
                                    <label class="form-check-label" for="inlineRadio1">Yes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                        id="inlineRadio2" value="option2">
                                    <label class="form-check-label" for="inlineRadio2">No</label>
                                </div>
                            </div>
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
<script>
    $(document).ready(function () {
        $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
        $('#rCheckID').click(function(){
            var recruiter_id = $('#recruiter_id').val();
            $.ajax({
                type: "post",
                url: "{{route('checkRecruiterInfo')}}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    id: recruiter_id},
                success: function (data) {
                    // console.log(data);
                    
                        $('#recuriter_name').val(data.data[0].name);
                    
                }
            });
        });

        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#rSponsorCheckID').click(function(){
        var sponsor_id = $('#sponsor_id').val();
        $.ajax({
            type: "post",
            url: "{{route('checkRecruiterInfo')}}",
            data: {
                "_token": "{{ csrf_token() }}",
                id: sponsor_id
                },
            success: function (data) {
                
                console.log(data.data[0].name);
                if(data.count>=2) {
                alert("Limit Reached !");
                }else{
                $('#sponsor_name').val(data.data[0].name);
                }
        
        }
        });
        });

        $('#center_name').change(function(e)
       {
           e.preventDefault();
                var company_phone = $(this).find(':selected').data('phone');
                $('#center_phone').val(company_phone);
                // alert(com_ph);
       });
    });
</script>
@endsection