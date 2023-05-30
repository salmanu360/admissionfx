@extends('recruiter.master')
@section('content')
<div class="page-header">
    <div class="page-title">
        <h3>All College</h3>
    </div>
    <!--<div class="dropdown filter custom-dropdown-icon">
        <a href="{{route('colg.create')}}"><button class="btn btn-success"><i class="fa-solid fa-square-plus"></i> Add College</button></a>
    </div>-->
</div>


<div class="row layout-top-spacing" id="cancel-row">
                
    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
        <div class="widget-content widget-content-area br-6">
            <div class="table-responsive mb-4 mt-4">
                
                <table class="multi-table table table-striped table-bordered table-hover non-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>College</th>
                            <th>Slug</th>
                            <th>Created by</th>
                            <th>Country</th>
                            <th>State</th>
                            <th>City</th>
                            <th>Campus</th>
                            <th>Intake</th>
                            <th>Level Of education</th>
                            <th>Application Fee</th>
                            <th>Image</th>
                            <th>Status</th>
                            <!--<th>Action</th>-->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($colleges as $college)
                        <tr>
                            <td>{{$loop->index + 1}}</td>
                           <td><a style="color:blue" href="{{route('colg.getDetail', $college->id)}}">{{$college->name}}</a></td>
                            <td>{{$college->slug}}</td>
                            <td>{{$college->created_by_name}}</td>
                            <td>{{$college->country->name}}</td>
                            <td>{{$college->state_id}}</td>
                            <td>{{$college->city_id}}</td>
                            <td>{{$college->campus}}</td>
                            <td>{{$college->intake}}</td>
                            <td>{{$college->level_of_edu}}</td>
                            <td>{{$college->application_fee}}</td>
                            <td><img src="{{asset($college->image)}}" width="70" alt=""></td>
                            <td>
                                @if($college->status == 1)
                                    <a class="badge bg-success updateCollegeStatus btn-rounded" style="color: #fff;" href="javascript:" id="country-{{$college->id}}" college_id="{{$college->id}}">Active</a>
                                @else
                                <a class="badge bg-danger updateCollegeStatus btn-rounded" style="color: #fff;" href="javascript:" id="country-{{$college->id}}" college_id="{{$college->id}}">Deactive</a>
                                @endif
                            </td>
                           <!-- <tr>
                            <td class="text-centers">
                                {{-- <a href=""><i class="far fa-eye"></i></a> --}}
                                <a href="{{route('colg.create')}}"><i class="fa-solid fa-square-plus"></i></a>
                                <a href="{{route('colg.edit', $college->id)}}"><i class="far fa-edit"></i></a>
                                <a class="text text-danger btn-sm deleteRecord" style="color: white" href="javascript:void(0);" rel="{{ $college->id }}" rel1="delete_college" onclick="deleterecord('{{$college->id}}','delete_college');">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                            </td>
                            
                        </tr>-->
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>College</th>
                            <th>Slug</th>
                            <th>Created by</th>
                            <th>Country</th>
                            <th>State</th>
                            <th>City</th>
                            <th>Campus</th>
                            <th>Intake</th>
                            <th>Level Of education</th>
                            <th>Application Fee</th>
                            <th>Image</th>
                            <th>Status</th>
                            <!--<th>Action</th>-->
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
        window.location.href = SITEURL + "/college/" + deleteFunction + "/" + id;
    }
    })
 
    }
    
</script>
@endsection 