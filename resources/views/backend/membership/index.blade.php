@extends('layouts.backend.app')
@section('content')

<div class="container-fluid">
    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-12">
            <!-- Grayscale Utilities -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Member List</h6>
                </div>
                <div class="card-body">
                    {{-- <div class="">
                        <a class="btn btn-success" href="{{ route('membership.create') }}"> Add New Member</a>
                </div> --}}


                <table class="table table-bordered table-responsive dataTable">
                    <thead>
                        <tr>
                            <td>SN</td>
                            <td>ID</td>
                            <td>Name</td>
                            <td>Phone</td>
                            <td>Mail</td>
                            <td>Depositor Name</td>
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
                            <td>Action</td>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($members as $member)
                        <tr>
                            <td>{{$loop->iteration}}</td>
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
                            <td>
                                @php
                                $center =
                                App\Member::select('name','userID')->where('id',$member->center_name)->first();
                                // dd($center['name']);
                                @endphp
                                {{ $center['name'] ?? '' }}-{{$center['userID'] ?? ''}}
                            </td>
                            <td>{{$member->center_phone}}
                            </td>
                            {{-- <td>
                                @if ($member->center_qualify == 'yes')
                                {{'YES'}}
                            @else
                            {{'No'}}
                            @endif
                            {{-- {{$member->center_qualify}}
                            </td> --}}
                            <td>
                                <a class="btn btn-primary" href="{{ route('membership.edit',$member->id) }}">Edit</a>
                                {{-- <a class="btn btn-info" href="{{ route('membership.show',$member->id) }}">Show</a>
                                --}}
                                {{-- <form action="{{ route('membership.destroy',$member->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                                </form> --}}
                            </td>
                        </tr>

                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">

                    {{-- {{ $members->links() }} --}}
                </div>
            </div>
        </div>
    </div>


</div>
</div>

<script>
    $(document).ready( function () {
    $('.dataTable').DataTable({
        "scrollY": '100vh',
        "scrollX": true,
        'pagingType' : 'simple'
    });
    } );
</script>
@endsection
