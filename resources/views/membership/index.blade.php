@extends('layouts.app')
@section('content')
hello this is index section for membership
<a href="{{url('/membership/create')}}" class="mr-4" type='button' data-toggle="tooltip" data-placement="top"
    title="Add Page Info"><i class="fas fa-upload"></i>Create</a>
@endsection
