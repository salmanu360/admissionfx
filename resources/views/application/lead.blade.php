@extends('application.master')
@section('content')
<div class="page-header">
    <div class="page-title">
        <h3>All Lead Status</h3>
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
                            <th>Name</th>
                            <th>Created Date</th>
                            <th>Created by</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($leadStatus as $lead)
                        <tr>
                            <td>{{$loop->index + 1}}</td>
                            <td>{{$lead->name}}</td>
                            <td>{{$lead->created_date}}</td>
                            <td>{{$lead->created_by_name}}</td>
                           
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Created Date</th>
                            <th>Created by</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

    </div>






<!-- ediGradingModal  Modal -->
@foreach ($leadStatus as $lead)
<div class="modal fade" id="ediGradingModal{{$lead->id}}" tabindex="-1" role="dialog"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="example-Modal3"> Edit </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
               <form action="{{route('leadStatus.update', $lead->id)}}" method="POST">
                @csrf
                @method("PUT")
                <div class="form-group">
                    <label for="recipient-name" class="form-control-label">Name :</label>
                        <input type="text" class="form-control" name="name" value="{{$lead->name}}">
                        @error('name')
                            <span class="text text-danger">{{$message}}</span>
                        @enderror
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="form-control-label">Date :</label>
                        <input type="date" class="form-control" name="date" value="{{$lead->created_date}}">
                        @error('date')
                            <span class="text text-danger">{{$message}}</span>
                        @enderror
                </div>
        </div>
        <div class="modal-footer">
            <button type="reset" class="btn btn-danger" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success" data-dismiss="#">Update</button>
        </div>
               </form>
    </div>
</div>
</div>
@endforeach
<!-- ediGradingModal Modal -->


@endsection
@section('js')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
