
@extends('layouts.admin')
@section('content')
	<div class="page-header">
		<div class="page-title">
			<h3>City</h3>
		</div>
		<div class="dropdown filter custom-dropdown-icon">
			<a href="{{route('cities.index')}}"><button class="btn btn-success"><i class="fa-solid fa-eye"></i> View Cities</button></a>
		</div>
	</div>


	<div class="row layout-top-spacing" id="cancel-row">

		<div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
			<div class="widget-content widget-content-area br-6">
				<div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
					@include('admin.partials._message')
					<br>
					<form action="{{ route('cities.store') }}" method="POST" enctype="multipart/form-data">
						@csrf
						<div class="info">
							<div class="row">
								<div class="col-md-11 mx-auto">
									<h3>Add City</h3>
									<hr>
									<div class="work-section">
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label for="degree2">City Name</label>
													<input type="text" name="name" class="form-control mb-4" id="degree2" value="{{ old('name') }}">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label for="degree2">State</label>
													<select  name="state_id" class="form-select form-control digits" id="exampleFormControlSelect9">
														<option value="">Select State</option>
														@foreach($states as $state)
															<option value="{{$state->id}}">{{$state->name}}</option>
														@endforeach
													</select>
												</div>
											</div>

											<div class="col-sm-12">
												<div class="form-group">
													<div class="n-chk">
														<label class="new-control new-checkbox new-checkbox-text checkbox-primary">
															<input type="checkbox" class="new-control-input" name="status">
															<span class="new-control-indicator"></span><span class="new-chk-content">Active</span>
														</label>
													</div>
												</div>
											</div>


											<div class="col-sm-12">
												<div class="form-group">
													<button type="submit" class="btn btn-primary">Add City</button>
												</div>
											</div>

										</div>
									</div>

								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>

	</div>
@endsection

@section('js')
	<script src="{{asset('modern-light-menu/plugins/flatpickr/flatpickr.js')}}"></script>
	<script src="{{asset('modern-light-menu/plugins/flatpickr/custom-flatpickr.js')}}"></script>
@endsection