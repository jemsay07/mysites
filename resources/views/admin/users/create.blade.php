@extends('layouts.app')
@section('title', 'jCode Users')
@section('content')
	<div class="container container-lg-w12">
		<div id="user_result"></div>
		<form class="row mt-3" method="POST" id="form_store" data-href="{{route('users.store')}}@yield('editID')" data-status="{{ ( ucfirst(substr(Route::currentRouteName(), 6) ) == 'Create' ) ? 'create' : 'update' }}">
			@section('editMethod')
				@show
			@csrf
			<div class="position-relative col-12 col-lg-9 mb-5">
				<div id="users-tabPill-nav">
					<div class="nav flex-row flex-md-column flex-lg-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
						<a class="nav-link active" id="pills-basic-info-tab" data-toggle="pill" href="#pills-basic-info" role="tab" aria-controls="pills-basic-info" aria-selected="true"><i class="fas fa-user"></i></a>
						<a class="nav-link" id="pills-social-tab" data-toggle="pill" href="#pills-social" role="tab" aria-controls="pills-social" aria-selected="false"><i class="fas fa-hashtag"></i></a>
						<a class="nav-link" id="pills-education-tab" data-toggle="pill" href="#pills-education" role="tab" aria-controls="pills-education" aria-selected="false"><i class="fas fa-graduation-cap"></i></a>
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
									<div class="form-group row">
										<label for="first_name" class="col-sm-3 col-form-label text-right">First Name</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" value="@yield('editFName')">
										</div>
									</div>
									<div class="form-group row">
										<label for="last_name" class="col-sm-3 col-form-label text-right">Last Name</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" value="@yield('editLName')">
										</div>
									</div>
									<div class="form-group row">
										<label for="gender" class="col-sm-3 col-form-label text-right">Gender</label>
										<div class="col-sm-9">
							      			<select class="custom-select" name="gender" id="gender">
							      				@if ( ucfirst(substr(Route::currentRouteName(), 6) ) == 'Create' )
								      				<option value="male">Male</option>
								      				<option value="female">Female</option>
							      				@else
							      					@yield('editGender')
							      				@endif
							      			</select>
										</div>
									</div>
									<div class="form-group row date form_datetimepicker">
										<label for="birthday" class="col-sm-3 col-form-label text-right">Birthday</label>
										<div class="col-sm-9">
											<div class="input-group">
											    <input type="text" class="form-control" name="birthday" id="birthday" value="@yield('editBirthday')" readonly>
											    <div class="input-group-append">
											    	<span class="add-on input-group-text"><i class="icon-th far fa-calendar-alt"></i></span>
											    </div>
											</div>
										</div>
									</div>
									<div class="form-group row">
										<label for="age" class="col-sm-3 col-form-label text-right">Age</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="age" name="age" placeholder="Age" value="@yield('editAge')">
										</div>
									</div>
									<div class="form-group row">
										<label for="address" class="col-sm-3 col-form-label text-right">Address</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="address" name="address" placeholder="Address" value="@yield('editAddress')">
										</div>
									</div>
									<div class="form-group row">
										<label for="contact_number" class="col-sm-3 col-form-label text-right">Contact no.</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="contact_number" name="contact_number" placeholder="Contact Number" value="@yield('editContactNumber')">
										</div>
									</div>
									<div class="form-group row">
										<label for="email" class="col-sm-3 col-form-label text-right">Email Address</label>
										<div class="col-sm-9">
											<input type="email" class="form-control" id="email" name="email" placeholder="Email Address" value="@yield('editEmail')">
										</div>
									</div>
									<div class="form-group row">
										<label for="bio" class="col-sm-3 col-form-label text-right">Bio</label>
										<div class="col-sm-9">
											<textarea class="form-control" name="bio" id="bio">@yield('editBio')</textarea>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="pills-social" role="tabpanel" aria-labelledby="pills-social-tab">
							<div class="jc-card">
								<div class="jc-card-header">
				      				<strong class="d-inline">Social Media</strong>
				      				<span id="addSocial" class="badge badge-info p-2 float-right text-white"><i class="fas fa-plus"></i></span>
								</div>
								<div class="jc-card-body">
									<div id="new_sets_sm">
										@if ( ucfirst(substr(Route::currentRouteName(), 6) ) == 'Create' )
								      		<div class="sets_of_sm form-row position-relative">
												<div class="col-12 col-md-4 col-lg-4 input-group my-1">
													<div class="input-group-prepend">
														<label class="input-group-text" for="sm_brand_0"><i class="fas fa-share-alt"></i></label>
													</div>
													<select class="custom-select" name="social_meta[0][sm_brand]" id="sm_brand_0">
									      				<option value="fb">Facebook</option>
									      				<option value="tw">Twitter</option>
									      				<option value="ig">Instagram</option>
									      				<option value="gplus">Google Plus</option>
									      				<option value="yt">Youtube</option>
									      				<option value="lnk">Linkedin</option>
													</select>
												</div>
												<div class="col-12 col-md-4 col-lg-4 input-group my-1">
													<div class="input-group-prepend">
														<label class="input-group-text" for="sm_link_0"><i class="fas fa-link"></i></label>
													</div>
													<input type="text" class="form-control" name="social_meta[0][sm_link]" id="sm_link_0">
												</div>
												<div class="col-12 col-md-4 col-lg-4 input-group my-1">
													<div class="input-group-prepend">
														<label class="input-group-text" for="sm_target_0"><i class="fas fa-columns"></i></label>
													</div>
													<select class="custom-select" name="social_meta[0][sm_target]" id="sm_target_0">
									      				<option value="_blank">New Tab</option>
									      				<option value="_self">Self</option>
													</select>
												</div>
								      		</div>
							      		@else
							      			@yield('editSocialMedia')
							      		@endif
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="pills-education" role="tabpanel" aria-labelledby="pills-education-tab">
							<div class="jc-card">
								<div class="jc-card-header">
				      				<strong class="d-inline">Education</strong>
				      				<span id="addTertiary" class="badge badge-info p-2 float-right text-white"><i class="fas fa-plus"></i></span>
								</div>
								<div class="jc-card-body">
					      			<div class="form-group row">
					      				<div class="col-sm-3  text-right">
						      				<strong>Tertiary</strong>
						      			</div>
						      			<span class="offset-sm-9"></span>
						      		</div>
									<div id="new_tertiary">
										@if ( ucfirst(substr(Route::currentRouteName(), 6) ) == 'Create' )
								      		<div class="sets_of_tertiary my-3 pb-2">
												<div class="form-group row">
													<label for="university_0" class="col-sm-3 col-form-label text-right {{ $errors->has('tertiary.0.university') ? 'text-danger' : '' }}">Institute/University *</label>
													<div class="col-sm-9">
														<input type="text" class="form-control {{ $errors->has('tertiary.0.university') ? 'is-invalid' : '' }}" id="university_0" name="tertiary[0][university]" placeholder="Institute/University" value="{{ old( 'tertiary.0.university' ) }}">
														@if($errors->has('tertiary.0.university'))
															<span class="help-block text-danger">
																<strong>{{ $errors->first('tertiary.0.university') }}</strong>
															</span>
														@endif
													</div>
												</div>
												<div class="form-group row">
													<label for="qualify_uni_0" class="col-sm-3 col-form-label text-right {{ $errors->has('tertiary.0.qualify_uni') ? 'text-danger' : '' }}">Qualification *</label>
													<div class="col-sm-9">
										      			<select class="custom-select {{ $errors->has('tertiary.0.qualify_uni') ? 'is-invalid' : '' }}" name="tertiary[0][qualify_uni]" id="qualify_uni_0">
										      				<option value="none">Select Qualification</option>
										      				<option value="hsd" {{ ( old( 'tertiary.0.qualify_uni' ) == 'hsd' ) ? 'selected' : '' }}>High School Diploma</option>
										      				<option value="vd_scc" {{ ( old( 'tertiary.0.qualify_uni' ) == 'vd_scc' ) ? 'selected' : '' }}>Vocational Diploma / Short Course Certificate</option>
										      				<option value="bcdegree" {{ ( old( 'tertiary.0.qualify_uni' ) == 'bcdegree' ) ? 'selected' : '' }}>Bachelor's/College Degree</option>
										      				<option value="pgd_master" {{ ( old( 'tertiary.0.qualify_uni' ) == 'pgd_master' ) ? 'selected' : '' }}>Post Graduate Diploma / Master's Degree</option>
										      				<option value="license" {{ ( old( 'tertiary.0.qualify_uni' ) == 'license' ) ? 'selected' : '' }}>Professional License (Passed Board/Bar/Professional License Exam)</option>
										      				<option value="doctorate" {{ ( old( 'tertiary.0.qualify_uni' ) == 'doctorate' ) ? 'selected' : '' }}>Doctorate Degree</option>
										      			</select>
														@if($errors->has('tertiary.0.qualify_uni'))
															<span class="help-block text-danger">
																<strong>{{ $errors->first('tertiary.0.qualify_uni') }}</strong>
															</span>
														@endif
													</div>
												</div>	
												<div class="form-group row">
													<label for="course_uni_0" class="col-sm-3 col-form-label text-right {{ $errors->has('tertiary.0.course_uni') ? 'text-danger' : '' }}">Course *</label>
													<div class="col-sm-9">
														<input type="text" class="form-control {{ $errors->has('tertiary.0.course_uni') ? 'is-invalid' : '' }}" id="course_uni_0" name="tertiary[0][course_uni]" placeholder="Course" value="{{ old('tertiary.0.course_uni') }}">
														@if($errors->has('tertiary.0.course_uni'))
															<span class="help-block text-danger">
																<strong>{{ $errors->first('tertiary.0.course_uni') }}</strong>
															</span>
														@endif
													</div>
												</div>
												<div class="form-group row">
													<label for="major_uni_0" class="col-sm-3 col-form-label text-right">Major</label>
													<div class="col-sm-9">
														<input type="text" class="form-control" id="major_uni_0" name="tertiary[0][major_uni]" placeholder="Major"  value="{{ old('tertiary.0.major_uni') }}">
													</div>
												</div>
												<div class="form-group row date form_datetimepicker">
													<label for="grad_end_uni_0" class="col-sm-3 col-form-label text-right {{ $errors->has('tertiary.0.grad_end_uni') ? 'text-danger' : '' }}">Graduation Date *</label>
													<div class="col-sm-9">
														<div class="input-group">
														    <input type="text" class="form-control {{ $errors->has('tertiary.0.grad_end_uni') ? 'is-invalid' : '' }}" name="tertiary[0][grad_end_uni]" id="grad_end_uni_0" value="{{ old('tertiary.0.grad_end_uni') }}" readonly>
														    <div class="input-group-append">
														    	<span class="add-on input-group-text"><i class="icon-th far fa-calendar-alt"></i></span>
														    </div>
														</div>
														@if($errors->has('tertiary.0.grad_end_uni'))
															<span class="help-block text-danger">
																<strong>{{ $errors->first('tertiary.0.grad_end_uni') }}</strong>
															</span>
														@endif
													</div>
												</div>
												<div class="form-group row">
													<label for="address_uni_0" class="col-sm-3 col-form-label text-right {{ $errors->has('tertiary.0.address_uni') ? 'text-danger' : '' }}">Location *</label>
													<div class="col-sm-9">
														<input type="text" class="form-control {{ $errors->has('tertiary.0.address_uni') ? 'is-invalid' : '' }}" id="address_uni_0" name="tertiary[0][address_uni]" placeholder="Address" value="{{ old('tertiary.0.address_uni') }}">
															@if($errors->has('tertiary.0.address_uni'))
																<span class="help-block text-danger">
																	<strong>{{ $errors->first('tertiary.0.address_uni') }}</strong>
																</span>
															@endif
													</div>
												</div>
												<div class="form-group row">
													<label for="grade_uni_0" class="col-sm-3 col-form-label text-right">Grade</label>
													<div class="col-sm-9">
										      			<select class="custom-select" name="tertiary[0][grade_uni]" id="grade_uni_0">
										      				<option value="none"></option>
										      				<option value="gpa" {{ ( old('tertiary.0.grade_uni') == "gpa" ) ? 'selected' : '' }}>Grade Point Average (GPA)</option>
										      				<option value="inc" {{ ( old('tertiary.0.grade_uni') == "inc" ) ? 'selected' : '' }}>Incomplete</option>
										      				<option value="on_going" {{ ( old('tertiary.0.grade_uni') == "on_going" ) ? 'selected' : '' }}>On-going</option>
										      			</select>
													</div>
												</div>	      			
								      		</div>
							      		@else
							      			@yield('editTertiary')
							      		@endif
									</div>
					      			<div class="form-group row">
					      				<div class="col-sm-3  text-right">
						      				<strong>Secondary</strong>
						      			</div>
						      			<span class="offset-sm-9"></span>
						      		</div>
									<div id="new_secondary">
										@if ( ucfirst(substr(Route::currentRouteName(), 6) ) == 'Create' )
											<div class="sets_of_secondary my-3 pb-2">
												<div class="form-group row">
													<label for="school_0" class="col-sm-3 col-form-label text-right ">Institute/School *</label>
													<div class="col-sm-9">
														<input type="text" class="form-control" id="school_0" name="secondary_meta[0][high_school]" placeholder="Institute/University" value="{{ old( 'secondary_meta.0.high_school' ) }}">
													</div>
												</div>
												<div class="form-group row">
													<label for="hs_address_0" class="col-sm-3 col-form-label text-right ">Address *</label>
													<div class="col-sm-9">
														<input type="text" class="form-control" id="hs_address_0" name="secondary_meta[0][hs_address]" placeholder="Institute/University Address" value="{{ old( 'secondary_meta.0.hs_address' ) }}">
													</div>
												</div>
												<div class="form-group row date form_datetimepicker">
													<label for="grad_of_hs_0" class="col-sm-3 col-form-label text-right">Graduation Date *</label>
													<div class="col-sm-9">
														<div class="input-group">
														    <input type="text" class="form-control" name="secondary_meta[0][grad_of_hs]" id="grad_of_hs_0" value="{{ old('secondary_meta.0.grad_of_hs') }}" readonly>
														    <div class="input-group-append">
														    	<span class="add-on input-group-text"><i class="icon-th far fa-calendar-alt"></i></span>
														    </div>
														</div>
													</div>
												</div>
											</div>
										@else
											@yield('editSecondary')
										@endif
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="pills-working-exp" role="tabpanel" aria-labelledby="pills-working-exp-tab">
							<div class="jc-card">
								<div class="jc-card-header">
				      				<strong class="d-inline">Work Exp</strong>
				      				<span id="addWorkExp" class="badge badge-info p-2 float-right text-white"><i class="fas fa-plus"></i></span>
								</div>
								<div class="jc-card-body">
									<div id="new_sets_wexp">
										@if ( ucfirst(substr(Route::currentRouteName(), 6) ) == 'Create' )
											<div class="sets_of_wexp position-relative my-3 pb-2">
												<div class="form-group row">
													<label for="position_0" class="col-sm-3 col-form-label text-right">Position Title *</label>
													<div class="col-sm-9">
														<input type="text" class="form-control" id="position_0" name="work_exp_meta[0][position]" placeholder="Position Title" value="{{ old( 'first_name' ) }}">
													</div>
												</div>
												<div class="form-group row">
													<label for="company_0" class="col-sm-3 col-form-label text-right">Company Name *</label>
													<div class="col-sm-9">
														<input type="text" class="form-control" id="company_0" name="work_exp_meta[0][company]" placeholder="Company Name" value="{{ old( 'first_name' ) }}">
													</div>
												</div>
												<div class="form-group row">
													<label for="role_0" class="col-sm-3 col-form-label text-right">Role *</label>
													<div class="col-sm-9">
														<input type="text" class="form-control" id="role_0" name="work_exp_meta[0][role]" placeholder="Role" value="{{ old( 'first_name' ) }}">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-3 col-form-label text-right ">Duration *</label>
													<div class="col-sm-9">
														<div class="row">
															<div class="col-lg-4 date form_datetimepicker">
																<div class="input-group">
																	<input type="text" name="work_exp_meta[0][joined_start]" id="joined_start_0" value="" readonly="readonly" class="form-control ">
																	<div class="input-group-append">
																		<span class="add-on input-group-text"><i class="icon-th far fa-calendar-alt"></i></span>
																	</div>
																</div>
															</div>
															<div class="col-lg-4 date form_datetimepicker">
																<div class="input-group">
																	<input type="text" name="work_exp_meta[0][joined_end]" id="joined_end_0" value="" readonly="readonly" class="form-control ">
																	<div class="input-group-append">
																		<span class="add-on input-group-text"><i class="icon-th far fa-calendar-alt"></i></span>
																	</div>
																</div>
															</div>
															<div class="col-lg-4">
																<div class="input-group">
													      			<select class="custom-select" name="work_exp_meta[0][work_status]" id="work_status_0">
													      				<option value="current">Present</option>
													      				<option value="left">Left</option>
													      			</select>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="form-group row">
													<label for="exp_0" class="col-sm-3 col-form-label text-right">Experience Description</label>
													<div class="col-sm-9">
														<textarea type="text" class="form-control" name="work_exp_meta[0][exp]" id="exp_0"></textarea>
													</div>
												</div>
											</div>
										@else
											@yield('editWork')
										@endif
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="pills-skills" role="tabpanel" aria-labelledby="pills-skills-tab">
							<div class="jc-card">
								<div class="jc-card-header">
				      				<strong class="d-inline">Skills</strong>
				      				<span id="addSkills" class="badge badge-info p-2 float-right text-white"><i class="fas fa-plus"></i></span>
								</div>
								<div class="jc-card-body">
									<div id="new_sets_skills">
										@if ( ucfirst(substr(Route::currentRouteName(), 6) ) == 'Create' )
								      		<div class="sets_of_skills form-row position-relative">
									      		<div class="col-12 col-md-4 col-lg-4 input-group my-1">
									      			<div class="input-group-prepend">
									      				<label class="input-group-text" for="skills_0"><i class="fas fa-laptop-code"></i></label>
									      			</div>
									      			<input type="text" class="form-control" name="skill_meta[0][skills]" id="skills_0" placeholder="Skills">
									      		</div>
												<div class="col-12 col-md-4 col-lg-4 input-group my-1">
													<div class="input-group-prepend">
														<label class="input-group-text" for="profession_0"><i class="fas fa-briefcase"></i></label>
													</div>
													<select class="custom-select" id="profession_0" name="skill_meta[0][profession]">
									      				<option value="beginner">Beginner</option>
									      				<option value="intermediate">Intermediate</option>
									      				<option value="advance">Advanced</option>
													</select>
												</div>
									      		{{-- <div class="col-12 col-lg-1">
									      			<label>&nbsp;</label>
									      			<button type="button" class="btn btn-danger btn-block remove_skills"><i class="fas fa-trash-alt"></i></button>
									      		</div> --}}
								      		</div>
							      		@else
							      			@yield('editSkilss')
							      		@endif
									</div>
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
							<button class="btn btn-success" type="submit" id="user_submit">{{ ( ucfirst(substr(Route::currentRouteName(), 6) ) == 'Create' ) ? 'Add New' : 'Update' }}</button>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
@endsection