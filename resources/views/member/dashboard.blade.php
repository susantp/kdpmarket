@extends('layouts.backend.memberLayout.app')
@section('content')
<table class="table table-bordered table-striped table-responsive">
    <tr>
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
        <td>Center Qualify</td>

    </tr>

    <tr>
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
        <td>{{$member->created_at->format('j-m-Y h:i:s A')}}
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
        <td>{{$member->center_qualify}}
        </td>

    </tr>


</table>

@endsection
