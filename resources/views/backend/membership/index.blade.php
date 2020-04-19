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
                            <td>Center Qualify</td>
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
                            <td>{{is_null($member->company) ? "" : $member->company->company_name}}
                            </td>
                            <td>{{is_null($member->company) ? "" : $member->company->company_phone}}
                            </td>
                            <td>
                                @if ($member->company)
                                    @if ($member->company->center_qualify == 'yes')
                                            {{"Yes"}}                                        
                                    @else
                                       {{ "No"}}
                                    @endif
                                @else
                                     {{ "No"}}
                                @endif
                                {{-- {{$member->center_qualify}} --}}
                            </td>
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
        "scrollY": '50vh',
        "scrollX": true,
        'pagingType' : 'simple'
    });
    } );
</script>
@endsection
