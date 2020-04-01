@if ($role == 'admin')
@extends('layouts.backend.app')

@else
@extends('layouts.backend.memberLayout.app')
    
@endif
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
                    <div id="chart_div"></div>
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
                    // console.log(data);
                    var nodes = data;
//                             for (var i = 0; i < nodes.length; i++) {
//                             nodes[i].field_number_children = childCount(nodes[i].id);
//                         }

// function
// childCount(id) {
//     let count = 0;
//     for (var i = 0; i < nodes.length; i++) {
//         if (nodes[i].pid == id) {
//             count++;
//             count
//                 += childCount(nodes[i].id);
//         }
//     }
//     return count;
// }
// OrgChart.templates.rony.field_number_children = '<circle cx="60" cy="110" r="15" fill="#F57C00"></circle><text fill="#ffffff" x="60" y="115" text-anchor="middle">{val}</text>';

OrgChart.templates.isla.field_1 = '<text class="field_1" style="font-size: 20px;" fill="grey" x="90" y="65" text-anchor="middle">{val}</text>';
var chart = new OrgChart(document.getElementById("chart_div"), {
    template: "isla",
    collapse: {
        level: 6
    },
    nodeBinding: {
        field_0: "name",
        field_1: "id",
        // field_number_children: "field_number_children"
    },
    nodes: nodes
});
                }
            });
        });


</script>
@endsection
