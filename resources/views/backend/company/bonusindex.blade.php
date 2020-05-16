@extends('layouts.backend.app')
@section('content')

<div class="container-fluid">
    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-12">
            <!-- Grayscale Utilities -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Bonus List - Only Company</h6>
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
                            <td>Date/Time</td>
                            <td>Acc Owner</td>
                            <td>RRN</td>
                            <td>Bank Name</td>
                            <td>Acc Number</td>
                            <td>Rec ID</td>
                            <td>Rec Name</td>
                            <td>Center Name</td>
                            <td>A Line</td>
                            <td>B Line</td>
                            <td>Up Line</td>
                            <td>Bonus Date</td>

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
                            <td>{{$member->created_at->format('j-m-Y h:i:s A')}}
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
                            <td>
                                @php
                                $center =
                                App\Member::select('name','userID')->where('id',$member->center_name)->first();
                                // dd($center['name']);
                                @endphp
                                {{ $center['name'] ?? '' }}
                            </td>
                            <td>@php
                                $recruiter_left =
                                App\SponsorRecruiter::select('recruiter_left')->where('recruiter_id',$member->userID)->sum('recruiter_left');
                                // dd($center);
                                @endphp
                                {{ $recruiter_left }}
                            </td>
                            <td>@php
                                $recruiter_right =
                                App\SponsorRecruiter::select('recruiter_right')->where('recruiter_id',$member->userID)->sum('recruiter_right');
                                // dd($center);
                                @endphp
                                {{ $recruiter_right }}</td>
                            <td></td>
                            <td></td>
                        </tr>

                        @endforeach
                    </tbody>
                </table>

                <div class="row">
                    <div>
                        <h4>Calculate Date</h4>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control">
                    </div>
                    <div class="col">
                        <button class="btn btn-primary">Calculate</button>
                    </div>
                </div>
                <table class="table table-bordered table-responsive ">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Bonus Date</td>
                            <td>Bonus Mem</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>2020-04-10</td>
                            <td>1</td>
                            <td>Cancel</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>2020-04-03</td>
                            <td>1</td>
                            <td>Cancel</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>2020-03-27</td>
                            <td>1</td>
                            <td>Cancel</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>Total</td>
                            <td>15</td>
                            <td></td>
                        </tr>
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
