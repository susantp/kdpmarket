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
                    <div class="">
                        <a class="btn btn-success" href="{{ route('membership.create') }}"> Add New Member</a>
                    </div>


                    <table class="table table-bordered table-responsive dataTable">
                        <tr>
                            <td>SN</td>
                            <td>ID</td>
                            <td>Name</td>
                            <td>Phone</td>
                            <td>Mail</td>
                            <td>D Name</td>
                            <td>D Date/Time</td>
                            <td>V No</td>
                            <td>Acc Owner</td>
                            <td>RRN</td>
                            <td>Bank Name</td>
                            <td>Acc Number</td>
                            <td>Rec ID</td>
                            <td>Rec Name</td>
                            <td>Spo ID</td>
                            <td>Spo Name</td>
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

                                    <a class="btn btn-primary"
                                        href="{{ route('membership.edit',$member->id) }}">Edit</a>

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>

                        @endforeach
                    </table>
                </div>
            </div>
        </div>


    </div>
</div>
@endsection