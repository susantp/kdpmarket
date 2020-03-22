@extends('layouts.backend.app')
@section('content')
<div class="container-fluid">
    <!-- Content Row -->

    <div class="row">
        <div class="col-lg-12">
            <!-- Grayscale Utilities -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Recruiting Chart</h6>
                </div>
                <div class="card-body">
                    {{-- <div class="row">
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
                    </div> --}}
                    <!-- end of organigazion search -->
                    <hr>


                    {{-- google waalaa chart --}}

                    <div id="chart_div"></div>

                    <!-- sponsor tree -->

                    {{-- <div class="tf-tree tf-gap-lg">
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
                    </div> --}}
                    <!-- tree ends -->
                </div>
            </div>
        </div>

    </div>
</div>
<script type="text/javascript" src="https:///balkangraph.com/js/latest/OrgChart.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
        
            $.ajax({
                type: "get",
                url: "{{route('chartdata')}}",
                data: {
                    "_token": "{{ csrf_token() }}"
                },
                success: function (data) {
                    var nodes = data;
                            for (var i = 0; i < nodes.length; i++) {
    nodes[i].field_number_children = childCount(nodes[i].id);
}

function
childCount(id) {
    let count = 0;
    for (var i = 0; i < nodes.length; i++) {
        if (nodes[i].pid == id) {
            count++;
            count
                += childCount(nodes[i].id);
        }
    }
    return count;
}
// OrgChart.templates.rony.field_number_children = '<circle cx="60" cy="110" r="15" fill="#F57C00"></circle><text fill="#ffffff" x="60" y="115" text-anchor="middle">{val}</text>';
var chart = new OrgChart(document.getElementById("chart_div"), {
    template: "rony",
    collapse: {
        level: 3
    },
    nodeBinding: {
        field_0: "name",
        field_1: "title",
        // field_number_children: "field_number_children"
    },
    nodes: nodes
});
                }
            });
        });


</script>
@endsection