@extends('layouts.admin')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('modern-light-menu/plugins/select2/select2.min.css')}}">
@endsection
@section('content')
    <div class="page-header">
        <div class="page-title">
            <h3>Edit User</h3>
        </div>
        <div class="dropdown filter custom-dropdown-icon">
            <a href="{{route('user.index')}}">
                <button class="btn btn-success"><i class="fa-solid fa-eye"></i> View User</button>
            </a>
        </div>
    </div>

    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
            @include('admin.partials._message')
            <form action="{{route('user.update', $users->id)}}" method="post">
                @csrf
                @method('PUT')
                <div id="form-wizard" class="sw-main sw-theme-default">
                    <div class="sw-container tab-content" style="min-height: 0px;">
                            <div class="border-bottom border-gray pb-2"></div>
                            <div class="fields_container" data-rows-limit="-1">
                                <div class="form-group field-recruitersform-company_name required">
                                    <label class="form-label" for="recruitersform-company_name">Name</label>
                                    <input type="text" id="recruitersform-company_name" class="form-control "
                                           name="name" value="{{$users->name}}">
                                           @error('name')
                                               <span class="text text-danger">{{$message}}</span>
                                           @enderror
                                </div>
                                <div class="form-group field-recruitersform-email required">
                                    <label class="form-label" for="recruitersform-email">Email</label>
                                    <input type="text" readonly id="recruitersform-email" class="form-control" value="{{$users->email}}" name="email">
                                    @error('email')
                                               <span class="text text-danger">{{$message}}</span>
                                           @enderror
                                </div>
                                <div class="form-group field-recruitersform-website">
                                    <label class="form-label" for="recruitersform-website">Change Password</label>
                                    <input type="password" id="recruitersform-website" class="form-control" name="newPassword">
                                </div>
                                <div class="form-group field-recruitersform-website">
                                    <label class="form-label" for="recruitersform-website">Assign Role</label>
                                    <select class="form-control" name="role" id="">
                                        <option>Select Role</option>
                                        @foreach ($roles as $role)
                                            <option value="{{$role->name}}" {{$users->role == $role->name ? 'selected' : ''}}>{{$role->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('role')
                                               <span class="text text-danger">{{$message}}</span>
                                           @enderror
                                </div>
                            </div>

                            <div class="border-bottom border-gray pb-2"></div>

                                <div class="form-group field-recruitersform-confirmation">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" id="recruitersform-confirmation"
                                                class="custom-control-input" name="declare_confirm"
                                                value="1" checked="checked">
                                        <label class="custom-control-label" for="recruitersform-confirmation">I declare
                                            that the information contained in this application and all supporting
                                            documentation is true and correct.</label>

                                    </div>
                                </div>
                                <div class="form-group field-recruitersform-acceptance required">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" id="recruitersform-acceptance"
                                                class="custom-control-input" name="terms_conditions" value="1"
                                                checked="checked" >
                                        <label class="custom-control-label" for="recruitersform-acceptance">I have read
                                            and accept <a href="#"> Terms and Conditions </a>
                                            and <a href="#"> Privacy Policy </a>.</label>
                                    </div>
                                </div>
                                <div class="form-group ">
                                            <button type="submit" class="btn btn-primary float-right">Update</button>
                                </div>
                            </div>
                    </div>
                </div>
            </form>
        </div>
    </div>


@endsection

@section('js')
    <script src="{{asset('modern-light-menu/plugins/flatpickr/flatpickr.js')}}"></script>
    <script src="{{asset('modern-light-menu/plugins/flatpickr/custom-flatpickr.js')}}"></script>
    <script src="{{asset('modern-light-menu/plugins/select2/select2.min.js')}}"></script>
    <script src="{{asset('modern-light-menu/plugins/select2/custom-select2.js')}}"></script>
    <script>
        $(".tagging").select2({
            tags: true
        });

        $(".basic").select2({
            tags: true,
        });
    </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (Session::get('success'))
    <script>
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: '{{ Session::get('success') }}',
            showConfirmButton: false,
            timer: 5000
        });
    </script>
@endif
@endsection