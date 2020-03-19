@extends('layouts.backend.app')
@section('content')

<div class="container-fluid">
    <!-- Content Row -->
    <div class="row">
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('membership.create') }}"> Add New Member</a>
        </div>
        <table class="table table-bordered table-striped">
            <tr>
                <td>SN</td>
                <td>ID</td>
                <td>Name</td>
                <td>Phone</td>
                <td>E-Mail</td>
                <td>Deposit Name</td>
                <td>Deposit Date/Time</td>
                <td>Voucher No</td>
                <td>Account Owner</td>
                <td>RRN</td>
                <td>Bank Name</td>
                <td>Account Number</td>
                <td>Recruiter ID</td>
                <td>Recruiter Name</td>
                <td>Sponsor ID</td>
                <td>Sponsor Name</td>
                <td>Center Name</td>
                <td>Center Phone</td>
                {{-- <td>Center Qualify</td> --}}
                <td>Action</td>

            </tr>
            @foreach ($members as $member)
            <tr>
                <td>{{$loop->index + 1}}</td>
                <td>{{$member->userID}}
                </td>
                <td>{{$member->name}}
                </td>
                <td>{{$member->phone}}
                </td>
                <td>{{$member->email}}
                </td>
                <td>{{$member->deposit_name}}
                </td>
                <td>{{$member->deposit_date}}
                </td>
                <td>{{$member->voucher_no}}
                </td>
                <td>{{$member->account_owner}}
                </td>
                <td>{{$member->rrn}}
                </td>
                <td>{{$member->bank_name}}
                </td>
                <td>{{$member->account_number}}
                </td>
                <td>{{$member->recruiter_id}}
                </td>
                <td>{{$member->recruiter_name}}
                </td>
                <td>{{$member->sponsor_id}}
                </td>
                <td>{{$member->sponsor_name}}
                </td>
                <td>{{$member->center_name}}
                </td>
                <td>{{$member->center_phone}}
                </td>
                <td>
                    <form action="{{ route('membership.destroy',$member->id) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('membership.show',$member->id) }}">Show</a>

                        <a class="btn btn-primary" href="{{ route('membership.edit',$member->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>

            <<<<<<< HEAD @endforeach {{-- <tr>
                <td>1</td>
                <td>lorem ipsum Lorem ipsum dolor sit, amet
                </td>
                <td>lorem ipsum Lorem ipsum dolor sit, amet
                </td>
                <td>lorem ipsum Lorem ipsum dolor sit, amet
                </td>
                <td>lorem ipsum Lorem ipsum dolor sit, amet
                </td>
                <td>lorem ipsum Lorem ipsum dolor sit, amet
                </td>
                <td>lorem ipsum Lorem ipsum dolor sit, amet
                </td>
                <td>lorem ipsum Lorem ipsum dolor sit, amet
                </td>
                <td>lorem ipsum Lorem ipsum dolor sit, amet
                </td>
                <td>lorem ipsum Lorem ipsum dolor sit, amet
                </td>
                <td>lorem ipsum Lorem ipsum dolor sit, amet
                </td>
                <td>lorem ipsum Lorem ipsum dolor sit, amet
                </td>
                <td>lorem ipsum Lorem ipsum dolor sit, amet
                </td>
                <td>lorem ipsum Lorem ipsum dolor sit, amet
                </td>
                <td>lorem ipsum Lorem ipsum dolor sit, amet
                </td>
                <td>lorem ipsum Lorem ipsum dolor sit, amet
                </td>
                <td>lorem ipsum Lorem ipsum dolor sit, amet
                </td>
            </tr>
            <tr>
                <td>1</td>
                <td>lorem ipsum Lorem ipsum dolor sit, amet
                </td>
                <td>lorem ipsum Lorem ipsum dolor sit, amet
                </td>
                <td>lorem ipsum Lorem ipsum dolor sit, amet
                </td>
                <td>lorem ipsum Lorem ipsum dolor sit, amet
                </td>
                <td>lorem ipsum Lorem ipsum dolor sit, amet
                </td>
                <td>lorem ipsum Lorem ipsum dolor sit, amet
                </td>
                <td>lorem ipsum Lorem ipsum dolor sit, amet
                </td>
                <td>lorem ipsum Lorem ipsum dolor sit, amet
                </td>
                <td>lorem ipsum Lorem ipsum dolor sit, amet
                </td>
                <td>lorem ipsum Lorem ipsum dolor sit, amet
                </td>
                <td>lorem ipsum Lorem ipsum dolor sit, amet
                </td>
                <td>lorem ipsum Lorem ipsum dolor sit, amet
                </td>
                <td>lorem ipsum Lorem ipsum dolor sit, amet
                </td>
                <td>lorem ipsum Lorem ipsum dolor sit, amet
                </td>
                <td>lorem ipsum Lorem ipsum dolor sit, amet
                </td>
                <td>lorem ipsum Lorem ipsum dolor sit, amet
                </td>
            </tr>
            <tr>
                <td>1</td>
                <td>lorem ipsum Lorem ipsum dolor sit, amet
                </td>
                <td>lorem ipsum Lorem ipsum dolor sit, amet
                </td>
                <td>lorem ipsum Lorem ipsum dolor sit, amet
                </td>
                <td>lorem ipsum Lorem ipsum dolor sit, amet
                </td>
                <td>lorem ipsum Lorem ipsum dolor sit, amet
                </td>
                <td>lorem ipsum Lorem ipsum dolor sit, amet
                </td>
                <td>lorem ipsum Lorem ipsum dolor sit, amet
                </td>
                <td>lorem ipsum Lorem ipsum dolor sit, amet
                </td>
                <td>lorem ipsum Lorem ipsum dolor sit, amet
                </td>
                <td>lorem ipsum Lorem ipsum dolor sit, amet
                </td>
                <td>lorem ipsum Lorem ipsum dolor sit, amet
                </td>
                <td>lorem ipsum Lorem ipsum dolor sit, amet
                </td>
                <td>lorem ipsum Lorem ipsum dolor sit, amet
                </td>
                <td>lorem ipsum Lorem ipsum dolor sit, amet
                </td>
                <td>lorem ipsum Lorem ipsum dolor sit, amet
                </td>
                <td>lorem ipsum Lorem ipsum dolor sit, amet
                </td>
            </tr>
            <tr>
                <td>1</td>
                <td>lorem ipsum Lorem ipsum dolor sit, amet
                </td>
                <td>lorem ipsum Lorem ipsum dolor sit, amet
                </td>
                <td>lorem ipsum Lorem ipsum dolor sit, amet
                </td>
                <td>lorem ipsum Lorem ipsum dolor sit, amet
                </td>
                <td>lorem ipsum Lorem ipsum dolor sit, amet
                </td>
                <td>lorem ipsum Lorem ipsum dolor sit, amet
                </td>
                <td>lorem ipsum Lorem ipsum dolor sit, amet
                </td>
                <td>lorem ipsum Lorem ipsum dolor sit, amet
                </td>
                <td>lorem ipsum Lorem ipsum dolor sit, amet
                </td>
                <td>lorem ipsum Lorem ipsum dolor sit, amet
                </td>
                <td>lorem ipsum Lorem ipsum dolor sit, amet
                </td>
                <td>lorem ipsum Lorem ipsum dolor sit, amet
                </td>
                <td>lorem ipsum Lorem ipsum dolor sit, amet
                </td>
                <td>lorem ipsum Lorem ipsum dolor sit, amet
                </td>
                <td>lorem ipsum Lorem ipsum dolor sit, amet
                </td>
                <td>lorem ipsum Lorem ipsum dolor sit, amet
                </td>
            </tr> --}} </table> </div> @endsection=======@endforeach </table> </div> </div> @endsection>>>>>>>
                7c8fa355033f2a75babfef739331f950a7a57736
