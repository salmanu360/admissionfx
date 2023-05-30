@extends('layouts.admin')
@section('content')
    <div class="page-header">
        <div class="page-title">
            <h3>All Cities</h3>
        </div>
        <div class="dropdown filter custom-dropdown-icon">
            <a href="{{route('cities.create')}}"> <button class="btn btn-success"><i class="fa-solid fa-square-plus"></i> Add City</button></a>
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
                            <th>City Name</th>
                            <th>Slug</th>
                            <th>State Name</th>
                            <th>Country Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cities as $city)
                        @php $Country =  \App\Models\Country::where('id',$city->state->country_id)->first(); @endphp
                            <tr>
                                <td>{{$loop->index + 1}}</td>
                                <td>{{$city->name}}</td>
                                <td>{{$city->slug}}</td>
                                <td>{{$city->state->name}}</td>
                                <td>
                                    @if(!empty($Country->name))
                                    {{$Country->name}}
                                    @endif
                                </td>
                                <td>
                                    @if($city->status == 1)
                                        <a class="badge bg-success updateCountryStatus btn-rounded" style="color: #fff;" href="javascript:" id="city-{{$city->id}}" city_id="{{$city->id}}">Active</a>
                                    @else
                                        <a class="badge bg-danger updateCountryStatus btn-rounded" style="color: #fff;" href="javascript:" id="city-{{$city->id}}" city_id="{{$city->id}}">Deactive</a>
                                    @endif
                                </td>
                                <td class="text-centers">
                                    {{-- <a href=""><i class="far fa-eye"></i></a> --}}
                                    <a href="{{route('cities.create')}}"><i class="fa-solid fa-square-plus"></i></a>
                                    <a href="{{route('cities.edit', $city->id)}}"><i class="far fa-edit"></i></a>
                                    <a class="text text-danger btn-sm deleteRecord" style="color: white" href="javascript:void(0);" rel="{{ $city->id }}" rel1="delete_city" onclick="deleterecord('{{$city->id}}','cities/destroy');">
                                        <i class="far fa-trash-alt"></i>
                                    </a>
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>#</th>
                            <th>City Name</th>
                            <th>Slug</th>
                            <th>State Name</th>
                            <th>Country Name</th>
                            <th>Status</th>
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
                    window.location.href = SITEURL + "/admin/" + deleteFunction + "/" + id;
                }
            })

        }
        
            @if($message = Session::get('success_message'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.success("{{ $message }}");
  @endif

    </script>
@endsection