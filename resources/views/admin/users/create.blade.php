@extends('layouts.app')
@section('title', 'jCode Users')
@section('content')
	<div class="container container-lg-w12">
		<form action="{{ route('users.store') }}" class="row mt-3" method="post">
			@csrf			
			<div class="position-relative col-12 col-lg-9">
				<div id="users-tabPill-nav">
					<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
						<a class="nav-link active" id="pills-basic-info-tab" data-toggle="pill" href="#pills-basic-info" role="tab" aria-controls="pills-basic-info" aria-selected="true"><i class="fas fa-user"></i></a>
						<a class="nav-link" id="pills-social-tab" data-toggle="pill" href="#pills-social" role="tab" aria-controls="pills-social" aria-selected="false"><i class="fas fa-hashtag"></i></a>
						<a class="nav-link" id="pills-education-tab" data-toggle="pill" href="#pills-education" role="tab" aria-controls="pills-education" aria-selected="false"><i class="fas fa-school"></i></a>
						<a class="nav-link" id="pills-working-exp-tab" data-toggle="pill" href="#pills-working-exp" role="tab" aria-controls="pills-working-exp" aria-selected="false"><i class="fas fa-briefcase"></i></a>
						<a class="nav-link" id="pills-skills-tab" data-toggle="pill" href="#pills-skills" role="tab" aria-controls="pills-skills" aria-selected="false"><i class="fas fa-laptop-code"></i></a>
					</div>
				</div>
				<div id="user-tabPill-content">
					<div class="tab-content">
						<div class="tab-pane fade show active" id="pills-basic-info" role="tabpanel" aria-labelledby="pills-basic-info-tab">
							<div class="jc-card">
								<div class="jc-card-header">
									<strong>Basic Information</strong>
								</div>
								<div class="jc-card-body">
									<div class="form-group row text-right">
										<label for="first_name" class="col-sm-2 col-form-label {{ $errors->has('first_name') ? 'text-danger' : '' }}">First Name</label>
										<div class="col-sm-10">
											<input type="text" class="form-control {{ $errors->has('first_name') ? 'is-invalid' : '' }}" id="first_name" name="first_name" placeholder="First Name">
											@if($errors->has('first_name'))
												<span class="help-block text-danger">
													<strong>{{ $errors->first('first_name') }}</strong>
												</span>
											@endif
										</div>
									</div>
									<div class="form-group row text-right">
										<label for="last_name" class="col-sm-2 col-form-label {{ $errors->has('last_name') ? 'text-danger' : '' }}">Last Name</label>
										<div class="col-sm-10">
											<input type="text" class="form-control {{ $errors->has('last_name') ? 'is-invalid' : '' }}" id="last_name" name="last_name" placeholder="Last Name">
											@if($errors->has('last_name'))
												<span class="help-block text-danger">
													<strong>{{ $errors->first('last_name') }}</strong>
												</span>
											@endif
										</div>
									</div>
									<div class="form-group row text-right">
										<label for="gender" class="col-sm-2 col-form-label">Gender</label>
										<div class="col-sm-10">
							      			<select class="form-control" name="gender" id="gender">
							      				<option value="male">Male</option>
							      				<option value="female">Female</option>
							      			</select>
										</div>
									</div>
									<div class="form-group row text-right date form_datetimepicker">
										<label for="birthday" class="col-sm-2 col-form-label {{ $errors->has('birthday') ? 'text-danger' : '' }}">Birthday</label>
										<div class="col-sm-10">
											<div class="input-group">
											    <input type="text" class="form-control {{ $errors->has('birthday') ? 'is-invalid' : '' }}" name="birthday" id="birthday" value="" readonly>
											    <div class="input-group-append">
											    	<span class="add-on input-group-text"><i class="icon-th far fa-calendar-alt"></i></span>
											    </div>
											</div>
											@if($errors->has('birthday'))
												<span class="help-block text-danger">
													<strong>{{ $errors->first('birthday') }}</strong>
												</span>
											@endif
										</div>
									</div>
									<div class="form-group row text-right">
										<label for="age" class="col-sm-2 col-form-label {{ $errors->has('age') ? 'text-danger' : '' }}">Age</label>
										<div class="col-sm-10">
											<input type="text" class="form-control {{ $errors->has('age') ? 'is-invalid' : '' }}" id="age" name="age" placeholder="Age">
											@if($errors->has('age'))
												<span class="help-block text-danger">
													<strong>{{ $errors->first('age') }}</strong>
												</span>
											@endif
										</div>
									</div>
									<div class="form-group row text-right">
										<label for="address" class="col-sm-2 col-form-label {{ $errors->has('address') ? 'text-danger' : '' }}">Address</label>
										<div class="col-sm-10">
											<input type="text" class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" id="address" name="address" placeholder="Address">
											@if($errors->has('address'))
												<span class="help-block text-danger">
													<strong>{{ $errors->first('address') }}</strong>
												</span>
											@endif
										</div>
									</div>
									<div class="form-group row text-right">
										<label for="contact_number" class="col-sm-2 col-form-label {{ $errors->has('contact_number') ? 'text-danger' : '' }}">Contact no.</label>
										<div class="col-sm-10">
											<input type="text" class="form-control {{ $errors->has('contact_number') ? 'is-invalid' : '' }}" id="contact_number" name="contact_number" placeholder="Contact Number">
											@if($errors->has('contact_number'))
												<span class="help-block text-danger">
													<strong>{{ $errors->first('contact_number') }}</strong>
												</span>
											@endif
										</div>
									</div>
									<div class="form-group row text-right">
										<label for="email" class="col-sm-2 col-form-label {{ $errors->has('email') ? 'text-danger' : '' }}">Email Address</label>
										<div class="col-sm-10">
											<input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" id="email" name="email" placeholder="Email Address">
											@if($errors->has('email'))
												<span class="help-block text-danger">
													<strong>{{ $errors->first('email') }}</strong>
												</span>
											@endif
										</div>
									</div>
									<div class="form-group row text-right">
										<label for="bio" class="col-sm-2 col-form-label {{ $errors->has('bio') ? 'text-danger' : '' }}">Bio</label>
										<div class="col-sm-10">
											<textarea class="form-control {{ $errors->has('bio') ? 'is-invalid' : '' }}" name="bio" id="bio"></textarea>
											@if($errors->has('bio'))
												<span class="help-block text-danger">
													<strong>{{ $errors->first('bio') }}</strong>
												</span>
											@endif
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="pills-social" role="tabpanel" aria-labelledby="pills-social-tab">
							<div class="jc-card">
								<div class="jc-card-header">
				      				<strong class="d-inline">Social Media</strong>
				      				<span id="addSocial" class="badge badge-info p-2 float-right"><i class="fas fa-plus"></i></span>
								</div>
								<div class="jc-card-body">
									<div id="new_sets_sm">
							      		<div class="sets_of_sm form-row position-relative">
								      		<div class="col-4 input-group my-1">
								      			<div class="input-group-prepend">
								      				<span class="input-group-text" id="sm_brand_0"><i class="fas fa-share-alt"></i></span>
								      			</div>
								      			<select class="form-control" name="social_meta[0][sm_brand]" aria-describedby="sm_brand_0">
								      				<option value="fb">Facebook</option>
								      				<option value="tw">Twitter</option>
								      				<option value="ig">Instagram</option>
								      				<option value="gplus">Google Plus</option>
								      				<option value="yt">Youtube</option>
								      				<option value="lnk">Linkid</option>
								      			</select>
								      		</div> 
								      		<div class="col-4 input-group my-1">
								      			<div class="input-group-prepend">
								      				<span class="input-group-text" id="sm_link_0"><i class="fas fa-link"></i></span>
								      			</div>
								      			<input type="text" class="form-control" name="social_meta[0][sm_link]" aria-describedby="sm_link_0">
								      		</div>
								      		<div class="col-3 input-group my-1">
								      			<div class="input-group-prepend">
								      				<span class="input-group-text" id="sm_target_0"><i class="fas fa-columns"></i></span>
								      			</div>
								      			<select class="form-control" name="social_meta[0][sm_target]" aria-describedby="sm_target_0">
								      				<option value="_blank">New Tab</option>
								      				<option value="_self">Self</option>
								      			</select>
								      		</div>
								      		<div class="col-1 my-1"> 
								      			{{-- <button class="btn btn-danger btn-block remove" style="right:-15px;top:12px;"><i class="fas fa-trash-alt"></i></button> --}}
								      			&nbsp;
								      		</div>
							      		</div>
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="pills-education" role="tabpanel" aria-labelledby="pills-education-tab">
							<div class="jc-card">
								<div class="jc-card-header">
									<strong>Education</strong>
								</div>
								<div class="jc-card-body">
									test
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="pills-working-exp" role="tabpanel" aria-labelledby="pills-working-exp-tab">
							<div class="jc-card">
								<div class="jc-card-header">
									<strong>Work Exp</strong>
								</div>
								<div class="jc-card-body">
									test
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="pills-skills" role="tabpanel" aria-labelledby="pills-skills-tab">
							<div class="jc-card">
								<div class="jc-card-header">
									<strong>Skills</strong>
								</div>
								<div class="jc-card-body">
									test
								</div>
							</div>
						</div>
					</div>
				</div>				
			</div>
			<div class="col-12 col-lg-3">
				<div class="jc-card">
					<div class="jc-card-header">
						<strong>Action</strong>
					</div>
					<div class="jc-card-body">
						<div class="text-center">
							<button class="btn btn-success" type="submit">Submit</button>
						</div>
						
					</div>
				</div>
			</div>
		</form>
	</div>
@endsection