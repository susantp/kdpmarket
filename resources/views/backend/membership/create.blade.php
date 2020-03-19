@extends('layouts.backend.app')
@section('content')<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Content Row -->

    <div class="row">
        <div class="col-lg-10">
            <!-- Grayscale Utilities -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        Member Registration 등록화면 설명
                    </h6>
                </div>
                <div class="card-body">
                    <form class="memberRegistration">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="rID">ID</label>
                                    <input type="text" class="form-control" id="rID" aria-describedby="rID"
                                        placeholder="회원 ID (6자리이상)" />
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="rName">Name</label>
                                    <input type="text" class="form-control" id="rName" placeholder="회원이름" />
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="rPhone">Phone</label>
                                    <input type="text" class="form-control" id="rPhone" aria-describedby="rPhone"
                                        placeholder="전화번호" />
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="rEmail">Email</label>
                                    <input type="email" class="form-control" id="rEmail" aria-describedby="rEmail"
                                        placeholder="이메일 주소" />
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="rDname">Depositor
                                        Name</label>
                                    <input type="text" class="form-control" id="rDname" aria-describedby="rDname"
                                        placeholder="입금자 이름" />
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="rDtime">Deposite Date /
                                        Time</label>
                                    <input type="text" class="form-control" id="rDtime" aria-describedby="rDtime"
                                        placeholder="입금일자 및 시간" />
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="rVnumber">Voucher
                                        Number</label>
                                    <input type="text" class="form-control" id="rVnumber" aria-describedby="rVnumber"
                                        placeholder="상품권 번호" />
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="rAowner">Account
                                        Owner</label>
                                    <input type="text" class="form-control" id="rAowner" aria-describedby="rAowner"
                                        placeholder="예금주 이름" />
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="rRRN">RRN
                                        (6자리-7자리)</label>
                                    <input type="text" class="form-control" id="rRRN" aria-describedby="rRRN"
                                        placeholder="주민등록 번호 (6자리-7자리)" />
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="rBName">Bank Name</label>
                                    <input type="text" class="form-control" id="rBName" aria-describedby="rBName"
                                        placeholder="은행이름" />
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="rAcountNumber">Account
                                        Number</label>
                                    <input type="text" class="form-control" id="rAcountNumber"
                                        aria-describedby="rAcountNumber" placeholder="계좌번화" />
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-row">
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <label for="rRID" class="labelHighlight">Recruiter
                                                ID</label>
                                            <input type="text" class="form-control" id="rRID" aria-describedby="rRID"
                                                placeholder="모집인 ID" />
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="rCheckID">Check ID</label>
                                        <button type="submit" class="btn btn-info" id="rCheckID">
                                            Check
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="rRecruiterName">Recruiter
                                        Name</label>
                                    <input type="text" class="form-control" id="rRecruiterName"
                                        aria-describedby="rRecruiterName" placeholder="모집인 이름" />
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-row">
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <label for="rSPID" class="labelHighlight">Sponsor
                                                ID</label>
                                            <input type="text" class="form-control" id="rSPID" aria-describedby="rSPID"
                                                placeholder="스폰서(후원인) ID" />
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="rCheckID">Check ID</label>
                                        <button type="submit" class="btn btn-info" id="rCheckID">
                                            Check
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="rSpName">Sponsor Name</label>
                                    <input type="text" class="form-control" id="rSpName" aria-describedby="rSpName"
                                        placeholder="스폰서(후원인) 이름" />
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-row">
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <label for="rCName" class="labelHighlight">Center
                                                Name</label>
                                            <input type="text" class="form-control" id="rCName"
                                                aria-describedby="rCName" placeholder="사업장(사무실) 오너 이름" />
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="rCheckID">Check</label>
                                        <button type="submit" class="btn btn-info" id="rCheckID">
                                            Check
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="rCPhone">Center Phone</label>
                                    <input type="text" class="form-control" id="rCPhone" aria-describedby="rCPhone"
                                        placeholder="사업장(사무실) 전화번호)" />
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label>Center Qualify</label>
                                <br /><br />
                                <div class="form-row">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                            id="inlineRadio1" value="option1" />
                                        <label class="form-check-label" for="inlineRadio1">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                            id="inlineRadio2" value="option2" />
                                        <label class="form-check-label" for="inlineRadio2">No</label>
                                    </div>
                                </div>
                            </div>
                            <!-- end of row -->
                        </div>
                        <hr />
                        <button type="submit" class="btn btn-primary">
                            Submit
                            <i class="fa fa-fw fa-paper-plane"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection