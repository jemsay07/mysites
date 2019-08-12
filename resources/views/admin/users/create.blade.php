@extends('layouts.app')
@section('content')
	@include('includes.error')
	<div class="container-fluid">
		<form class="row" method="post" action="/users/@yield('editID')">
			@section('editMethod')
				@show
				@if ( count( $errors ) > 0 )
					<div class="alert alert-danger">
						@foreach ($errors->all() as $error)
							<p>{{ $error }}</p>
						@endforeach
					</div>
				@endif
			<div class="col-12 col-lg-2">
				<div class="card">
				    <div class="nav flex-column nav-pills card-body" id="v-pills-tab" role="tablist" aria-orientation="vertical">
				      <a class="nav-link active" id="pills-basic-info-tab" data-toggle="pill" href="#pills-basic-info" role="tab" aria-controls="pills-basic-info" aria-selected="true">Basic Information</a>
				      <a class="nav-link" id="pills-education-tab" data-toggle="pill" href="#pills-education" role="tab" aria-controls="pills-education" aria-selected="false">Education</a>
				      <a class="nav-link" id="pills-working-exp-tab" data-toggle="pill" href="#pills-working-exp" role="tab" aria-controls="pills-working-exp" aria-selected="false">Working Experience</a>
				      <a class="nav-link" id="pills-skills-tab" data-toggle="pill" href="#pills-skills" role="tab" aria-controls="pills-skills" aria-selected="false">Skills</a>
				    </div>
				</div>

			</div>
			<div class="col-12 col-lg-8">
			    <div class="tab-content" id="v-pills-tabContent">
			      <div class="tab-pane fade show active" id="pills-basic-info" role="tabpanel" aria-labelledby="pills-basic-info-tab">
			      	<div class="card">
				      	<div class="card-header">
				      		<strong>Basic Information</strong>
				      	</div>
				      	<div class="card-body">
				      		<div class="form-row">
					      		<div class="col-12 col-lg-6 form-group">
					      			<label for="first_name">First Name</label>
					      			<input type="text" class="form-control" name="first_name" value="@yield('editFName')">
					      		</div>
					      		<div class="col-12 col-lg-6 form-group">
					      			<label for="last_name">Last Name</label>
					      			<input type="tex t" class="form-control" name="last_name" value="@yield('editLName')">
					      		</div>
				      		</div>
				      		<div class="form-row">
					      		<div class="col-12 col-lg-4 form-group">
					      			<label for="gender">Gender</label>
					      			<select class="form-control" name="gender">
					      				<option value="male" @yield('editGenderM')>Male</option>
					      				<option value="female" @yield('editGenderF')>Female</option>
					      			</select>
					      		</div>
								<div class="col-12 col-lg-4 form-group input-append date form_datetimepicker">
									<label for="birthday">Birthday</label>
									<div class="input-group">
									    <input type="text" class="form-control" name="birthday" value="@yield('birthday')" readonly>
									    <div class="input-group-append">
									    	<span class="add-on input-group-text"><i class="icon-th far fa-calendar-alt"></i></span>
									    </div>
									</div>
								</div>
					      		<div class="col-12 col-lg-4 form-group">
					      			<label for="age">Age</label>
					      			<input type="number" class="form-control" name="age" value="@yield('age')">
					      		</div>
				      		</div>
				      		<div class="form-group">
				      			<label for="address">Address</label>
				      			<input type="text" class="form-control" name="address" value="@yield('address')">
				      		</div>
				      		<div class="form-row">
					      		<div class="col-12 col-lg-6 form-group">
					      			<label for="contact_number">Contact Number</label>
					      			<input type="number" class="form-control" name="contact_number"  value="@yield('contact_number')">
					      		</div>
					      		<div class="col-12 col-lg-6 form-group">
					      			<label for="email">Email Address</label>
					      			<input type="email" class="form-control" name="email" value="{{ $user->email }}">
					      		</div>
				      		</div>
				      		<div class="form-group">
				      			<label for="bio">Bio</label>
				      			<textarea class="form-control" name="bio">@yield('bio')</textarea>
				      		</div>
				      		<div class="form-row form-group">
				      			<div class="col-12 col-lg-6">
				      				<h3 class="h4">Social Media</h3>
				      			</div>
				      			<div class="col-12 col-lg-6">
				      				<button type="button" class="btn btn-info float-right" id="addSocial"><i class="fas fa-plus"></i></button>
				      			</div>
				      		</div>
				      		<div id="new_sets_sm">
				      			@if (Request::path() ==='users/create')
						      		<div class="sets_of_sm form-row position-relative">
							      		<div class="col-4 input-group my-1">
							      			<div class="input-group-prepend">
							      				<span class="input-group-text" id="basic-addon2"><i class="fas fa-share-alt"></i></span>
							      			</div>
							      			<select class="form-control" name="social_meta[0][sm_brand]" aria-describedby="basic-addon2">
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
							      				<span class="input-group-text" id="basic-addon3"><i class="fas fa-link"></i></span>
							      			</div>
							      			<input type="text" class="form-control" name="social_meta[0][sm_link]" aria-describedby="basic-addon3">
							      		</div>
							      		<div class="col-3 input-group my-1">
							      			<div class="input-group-prepend">
							      				<span class="input-group-text" id="basic-addon4"><i class="fas fa-columns"></i></span>
							      			</div>
							      			<select class="form-control" name="social_meta[0][sm_target]" aria-describedby="basic-addon4">
							      				<option value="_blank">New Tab</option>
							      				<option value="_self">Self</option>
							      			</select>
							      		</div>
							      		<div class="col-1 my-1"> 
							      			{{-- <button class="btn btn-danger btn-block remove" style="right:-15px;top:12px;"><i class="fas fa-trash-alt"></i></button> --}}
							      			&nbsp;
							      		</div>
						      		</div>
				      			@else
				      				@yield('socialmedia')
				      			@endif

				      		</div>
				      	</div>
				      </div>
				  </div>
			      <div class="tab-pane fade" id="pills-education" role="tabpanel" aria-labelledby="pills-education-tab">
			      	<div class="card">
				      	<div class="card-header">
				      		<strong>Education</strong>
				      	</div>
				      	<div class="card-body">
				      		<div class="form-row form-group">
				      			<div class="col-12 col-lg-12">
				      				<h3 class="h4 d-inline">Tertiary</h3>
				      				<span id="addTertiary" class="badge badge-info p-2"><i class="fas fa-plus"></i></span>
				      			</div>
				      		</div>
							<div id="new_tertiary">
								@if (Request::path() ==='users/create')
						      		<div class="sets_of_tertiary my-3 pb-2">
							      		<div class="form-row form-group">
								      		<div class="col-12 col-lg-4">
								      			<label for="university_0">Institute/University</label>
								      			<input type="text" class="form-control" name="tertiary_meta[0][university]" id="university_0">
								      		</div>
								      		<div class="col-12 col-lg-4">
								      			<label for="u_major_0">Major</label>
								      			<input type="text" class="form-control" name="tertiary_meta[0][u_major]" id="u_major_0">
								      		</div>
											<div class="col-12 col-lg-4 input-append date form_datetimepicker">
												<label for="u_year_end_0">School Year End</label>
												<div class="input-group">
												    <input type="text" class="form-control" name="tertiary_meta[0][u_year_end]" id="u_year_end_0" value="" readonly>
												    <div class="input-group-append">
												    	<span class="add-on input-group-text"><i class="icon-th far fa-calendar-alt"></i></span>
												    </div>
												</div>
											</div>
							      		</div>
							      		<div class="form-row form-group">
								      		<div class="col-12 col-lg-6">
								      			<label for="u_address_0">Address</label>
								      			<input type="text" class="form-control" name="tertiary_meta[0][u_address]" id="u_address_0">
								      		</div>
								      		<div class="col-12 col-lg-6">
								      			<label for="u_qualify_0">Qualification</label>
								      			<select type="text" class="form-control" name="tertiary_meta[0][u_qualify]" id="u_qualify_0">
								      				<option value="none">Select Qualification</option>
								      				<option value="hsd">High School Diploma</option>
								      				<option value="vd_scc">Vocational Diploma / Short Course Certificate</option>
								      				<option value="bcdegree">Bachelor's/College Degree</option>
								      				<option value="pgd_master">Post Graduate Diploma / Master's Degree</option>
								      				<option value="license">Professional License (Passed Board/Bar/Professional License Exam)</option>
								      				<option value="doctorate">Doctorate Degree</option>
								      			</select>
								      		</div>
										</div>				      			
						      		</div>
						      	@else
						      		@yield('tertiary')
				      			@endif
							</div>
				      		<div class="form-group">
				      			<h3 class="h5">Secondary</h3>
				      		</div>
							@if (Request::path() ==='users/create')
								<div class="form-group">
					      			<label for="secondary_meta[0][]">Institute/School</label>
					      			<input type="text" class="form-control" name="secondary_meta[0][high_school]">
					      		</div>
					      		<div class="form-row form-group">
						      		<div class="col-12 col-lg-6">
						      			<label for="secondary_meta[0][]">Address</label>
						      			<input type="text" class="form-control" name="secondary_meta[0][hs_address]">
						      		</div>
									<div class="col-12 col-lg-6 input-append date form_datetimepicker">
										<label for="secondary_meta[0][]">School Year</label>
										<div class="input-group">
										    <input type="text" class="form-control" name="secondary_meta[0][end_of_hs]" value="" readonly>
										    <div class="input-group-append">
										    	<span class="add-on input-group-text"><i class="icon-th far fa-calendar-alt"></i></span>
										    </div>
										</div>
									</div>
								</div>
					      	@else
					      		@yield('secondary')
			      			@endif
				      	</div>
				      </div>
				  </div>
			      <div class="tab-pane fade" id="pills-working-exp" role="tabpanel" aria-labelledby="pills-working-exp-tab">
			      	<div class="card">
				      	<div class="card-header">
				      		<strong>Working Experience</strong>
				      		<span id="addWorkExp" class="badge badge-info float-right p-2"><i class="fas fa-plus"></i></span>
				      	</div>
				      	<div class="card-body">
				      		<div id="new_sets_wexp">
				      			@if (Request::path() ==='users/create')
					      			<div class="sets_of_wexp position-relative my-3 pb-2">
							      		<div class="form-row form-group">
								      		<div class="col-12 col-lg-4">
								      			<label for="position_0">Position</label>
								      			<input type="text" class="form-control" name="work_exp_meta[0][position]" id="position_0">
								      		</div>
								      		<div class="col-12 col-lg-4">
								      			<label for="company_0">Company Name</label>
								      			<input type="text" class="form-control" name="work_exp_meta[0][company]" id="company_0">
								      		</div>
								      		<div class="col-12 col-lg-4">
								      			<label for="role_0">Role</label>
								      			<input type="text" class="form-control" name="work_exp_meta[0][role]" id="role_0">
								      		</div>
							      		</div>
							      		<div class="form-row form-group align-items-center">
											<div class="col-4 col-lg-5 input-append date form_datetimepicker">
							      				<label for="joined_start_0">Join Start</label>
												<div class="input-group">
												    <input type="text" class="form-control" name="work_exp_meta[0][joined_start]" value="" readonly id="joined_start_0">
												    <div class="input-group-append">
												    	<span class="add-on input-group-text"><i class="icon-th far fa-calendar-alt"></i></span>
												    </div>
												</div>
											</div>
											<div class="col-4 col-lg-5 input-append date form_datetimepicker">
							      				<label for="joined_end_0">Join End</label>
												<div class="input-group">
												    <input type="text" class="form-control" name="work_exp_meta[0][joined_end]" value="" readonly id="joined_end_0">
												    <div class="input-group-append">
												    	<span class="add-on input-group-text"><i class="icon-th far fa-calendar-alt"></i></span>
												    </div>
												</div>
											</div>
								      		<div class="col-4 col-lg-2">
								      			{{-- <div class="form-check"> --}}
									      			{{-- <input class="form-check-input" type="checkbox" id="autoSizingCheck" name="work_exp_meta[0][present]">
											        <label class="form-check-label" for="autoSizingCheck"> Present</label> --}}
								      			<label for="work_status_0">Status</label>
								      			<select class="form-control" name="work_exp_meta[0][work_status]" id="work_status_0">
								      				<option value="current">Present</option>
								      				<option value="left">Left</option>
								      			</select>
									      		{{-- </div> --}}
								      		</div>
							      		</div>
							      		<div class="form-row form-group">
								      		<div class="col-12">
								      			<label for="exp_0">Experience Description</label>
								      			<textarea type="text" class="form-control" name="work_exp_meta[0][exp]" id="exp_0"></textarea>
								      		</div>
							      		</div>			      			
						      		</div>
						      	@else
						      		@yield('work')
				      			@endif
				      		</div>
				      	</div>
				    </div>
				  </div>
			      <div class="tab-pane fade" id="pills-skills" role="tabpanel" aria-labelledby="pills-skills-tab">
			      	<div class="card">
				      	<div class="card-header">
				      		<strong>Skills</strong>
				      		<span id="addSkills" class="badge badge-info float-right p-2"><i class="fas fa-plus"></i></span>
				      	</div>
				      	<div class="card-body">
				      		<div id="new_sets_skills">
				      			@if (Request::path() ==='users/create')
						      		<div class="sets_of_skills form-row form-group position-relative">
							      		<div class="col-12 col-lg-6">
							      			<label>Skills</label>
							      			<input type="text" class="form-control" name="skill_meta[0][skills]">
							      		</div>
							      		<div class="col-12 col-lg-5">
							      			<label>Profession</label>
							      			<select class="form-control" name="skill_meta[0][profession]">
							      				<option value="beginner">Beginner</option>
							      				<option value="intermediate">Intermediate</option>
							      				<option value="advance">Advanced</option>
							      			</select>
							      		</div>
							      		<div class="col-12 col-lg-1">
							      			<label>&nbsp;</label>
							      			<button type="button" class="btn btn-danger btn-block remove_skills"><i class="fas fa-trash-alt"></i></button>
							      		</div>
						      		</div>
						      	@else      	
						      		<div class="form-row form-group">
						      			<div class="col-12 col-lg-6">
						      				<label>Skills</label>
						      			</div>
						      			<div class="col-12 col-lg-6">
						      				<label>Profession</label>
						      			</div>
						      		</div>
						      		@yield('skill')
				      			@endif
				      		</div>
				      	</div>
				    </div>
				  </div>
			    </div>
			</div>
			<div class="col-12 col-lg-2">
		      	<div class="card">
			      	<div class="card-header">
			      		<strong>Action</strong>
			      	</div>
			      	<div class="card-body">
			      		<button type="submit" class="btn btn-primary btn-block">Add</button>
			      	</div>
			    </div>
			</div>
			@csrf
		</form>
	</div>
@endsection