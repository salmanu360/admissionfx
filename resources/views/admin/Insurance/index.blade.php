@extends('layouts.admin')
@section('content')
<div class="page-header">
    <div class="page-title">
        <h3>All Insurance</h3>
    </div>
    <div class="dropdown filter custom-dropdown-icon">
        <a href="{{route('insurance.addInsurance')}}"><button class="btn btn-success"><i class="fa-solid fa-square-plus"></i> Add Country</button></a>
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
                            <th>Plan Name </th>
                            <th>Coverage</th>
                            <th>Destination</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($insurances as $insurance)
                        <tr>
                            <td>{{$loop->index + 1}}</td>
                            <td>{{$insurance->plan_name}}</td>
                            <td>{{$insurance->coverage}}</td>
                            <td>{{$insurance->destination}}</td>
                            <td class="text-centers">
                                {{-- <a href=""><i class="far fa-eye"></i></a> --}}
                                <a href="{{route('insurance.addInsurance')}}"><i class="fa-solid fa-square-plus"></i></a>
                                <a href="{{route('editInsurance', $insurance->id)}}"><i class="far fa-edit"></i></a>
                                <a class="text text-danger btn-sm deleteRecord" style="color: white" href="javascript:void(0);" rel="{{ $insurance->id }}" rel1="delete_package" onclick="deleterecord('{{$insurance->id}}','delete_insurance');">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                            </td>
                            
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Plan Name </th>
                            <th>Coverage</th>
                            <th>Destination</th>
                            <th>Action</th>
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
        window.location.href = SITEURL + "/admin/" + deleteFunction + "/" + id;
    }
    })
 
    }
    
</script>
@endsection 