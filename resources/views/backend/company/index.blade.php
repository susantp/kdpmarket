@extends('layouts.backend.app')
@section('content')

<div class="container-fluid">
    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-12">
            <!-- Grayscale Utilities -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">company List</h6>
                </div>
                <div class="card-body">
                    {{-- <div class="">
                        <a class="btn btn-success" href="{{ route('companyship.create') }}"> Add New company</a>
                </div> --}}


                <table class="table table-bordered table-responsive dataTable">
                    <tr>
                        <td>SN</td>
                        <td>Company Name</td>
                        <td>Company Phone</td>
                        <td>Company E-mail</td>
                        <td>Company Owner</td>
                        <td>Action</td>

                    </tr>
                    @foreach ($companies as $company)
                    <tr>
                        <td>{{$loop->index + 1}}</td>
                        <td>{{$company->company_name}}
                        </td>
                        <td>{{$company->company_phone}}
                        </td>
                        <td>{{$company->company_email}}
                        </td>
                        <td>
                            @if ($company->company_owner)
                            {{$company->members->name}}
                            @else
                               - 
                            @endif
                            
                        </td>
                       
                        <td>
                            <a class="btn btn-primary" href="{{ route('companies.edit',$company->id) }}">Edit</a>
                            {{-- <a class="btn btn-info" href="{{ route('companyship.show',$company->id) }}">Show</a> --}}
                            {{-- <form action="{{ route('companyship.destroy',$company->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                            </form> --}}
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
