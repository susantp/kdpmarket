@extends('layouts.backend.app')
@section('content')
<div class="container-fluid">
    <!-- Content Row -->

    <div class="row">
        <div class="col-lg-7">
            <!-- Grayscale Utilities -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Recruiting Chart</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <form
                            class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                            <div class="input-group">
                                <input type="text" class="form-control bg-light border-0 small"
                                    placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- end of organigazion search -->
                    <hr>

                    <!-- sponsor tree -->
                    <div class="tf-tree tf-gap-lg">
                        <ul>
                            <li>
                                <span class="tf-nc">1</span>
                                <ul>
                                    <li>
                                        <span class="tf-nc">2</span>
                                        <ul>
                                            <li><span class="tf-nc">4</span></li>
                                            <li><span class="tf-nc">5</span></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <span class="tf-nc">3</span>
                                        <ul>
                                            <li><span class="tf-nc">6</span></li>
                                            <li><span class="tf-nc">7</span></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- tree ends -->
                </div>
            </div>
        </div>

    </div>
</div>
@endsection