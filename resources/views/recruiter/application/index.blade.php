@extends('recruiter.master')
@section('content')
<div class="page-header">
    <div class="page-title">
        <h3>Student All Application List</h3>
    </div>
</div>


<div class="row layout-top-spacing" id="cancel-row">
                
    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
        <div class="widget-content widget-content-area br-6">
            <div class="table-responsive mb-4 mt-4">
                
                <table class="multi-table table table-striped table-bordered table-hover non-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Action</th>
                            <th>App ID</th>
                            <!--<th>Student ID</th>-->
                            <th>Student Name</th>
                            <th>Student Email</th>
                            <th>Student Phone</th>
                            <th>College</th>
                            <th>Course</th>
                            <th>Application Fee</th>
                            <th>Visa Fee</th>
                            <th>App Fee Status</th>
                            <th>Visa Fee Status</th>
                            <!--<th>Payment Date</th>-->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($applies as $apply)
                        <tr>
                            <td>{{$loop->index + 1}}</td>
                            <td></td>
                            <td>{{$apply->id}}</td>
                            <!--<td>{{$apply->stdid}}</td>-->
                            <td>{{$apply->stdName}}</td>
                            <td>{{$apply->stdEmail}}</td>
                            <td>{{$apply->stdPhone}}</td>
                            <td>{{$apply->clgName}}</td>
                            <td>{{$apply->crName}}</td>
                            <td>
                                @if ($apply->application_fee != null)
                                    <span>{{$apply->application_fee}}</span>
                                    @else
                                    <span>not set</span>
                                @endif
                            </td>
                            <td>
                                @if ($apply->visa_fee != null)
                                    <span>{{$apply->visa_fee}}</span>
                                    @else
                                    <span>not set</span>
                                @endif
                            </td>
                            <td>
                                @if ($apply->application_fee_status == 0)
                                    <span class="badge badge-danger">unpaid</span>
                                    @else
                                    <span class="badge badge-success">paid</span>
                                @endif
                            </td>
                            <td>
                                @if ($apply->visa_fee_status == 0)
                                    <span class="badge badge-danger">unpaid</span>
                                    @else
                                    <span class="badge badge-success">paid</span>
                                @endif
                            </td>
                            <!--<td>{{$apply->payment_date}}</td>-->
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Action</th>
                            <th>App ID</th>
                            <!--<th>Student ID</th>-->
                            <th>Student Name</th>
                            <th>Student Email</th>
                            <th>Student Phone</th>
                            <th>College</th>
                            <th>Course</th>
                            <th>Application Fee</th>
                            <th>Visa Fee</th>
                            <th>App Fee Status</th>
                            <th>Visa Fee Status</th>
                            <!--<th>Payment Date</th>-->
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

    </div>
@endsection
@section('js')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

{{-- <script>
    $(".deleteRecord").click(function () {

        var SITEURL = '{{ URL::to('') }}';

        var id = $(this).attr('rel');

        var deleteFunction = $(this).attr('rel1');

        Swal.fire({
            title: "Are You Sure? ",
        text: "You will not be able to recover this record again",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Yes, Delete it!"
    },
        function () {
            window.location.href = SITEURL + "/admin/country/" + deleteFunction + "/" + id;
        });

    });
</script> --}}

<script>
    function deleterecord(id,deletefunction){
    var SITEURL = '{{ URL::to('') }}';

    var id = id;

    var deleteFunction = deletefunction;

    Swal.fire({
    title: 'Are you sure?',
    text: "You won't be able to revert this!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
    if (result.isConfirmed) {
        window.location.href = SITEURL + "/course/" + deleteFunction + "/" + id;
    }
    })
 
    }
    
</script>
@endsection 