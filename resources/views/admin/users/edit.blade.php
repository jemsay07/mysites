@extends('admin.users.create')

@section('editMethod')
	{{ method_field('PUT') }}
@endsection

@if ( count( $userMeta ) )

	@foreach ($userMeta as $userItem)

		<!--all-of-the-array-->
		@php
			/** social-var*/
			$argender = array( 'male' => 'Male', 'female' => 'Female' );
			$sm_unser = unserialize( $userItem->social_meta );
			$args = array( 'fb' => 'Facebook', 'tw' => 'Twitter', 'ig' => 'Instagram', 'gplus' => 'Google Plus', 'yt' => 'Youtube','lnk' => 'Linkedin' );
			$tarr = array( '_blank' => 'New Tab', '_self' => 'Self' );
			$ar = array();
			$target = array();
			$sm_count = 0;

			/** tertiary-var*/
			$tertiaries = unserialize( $userItem->tertiary_meta );
			$tCount = 0;
			$qual_args = array('none' => 'Select Qualification','hsd' => 'High School Diploma','vd_scc' => 'Vocational Diploma / Short Course Certificate','bcdegree' => 'Bachelor\'s/College Degree','pgd_master' => 'Post Graduate Diploma / Master\'s Degree','license' => 'Professional License (Passed Board/Bar/Professional License Exam)','doctorate' => 'Doctorate Degree');
			$grade_args = array('none' => '','gpa' => 'Grade Point Average (GPA)','inc' => 'Incomplete','on_going' => 'On-going',);
  			$qualify = array();
  			$grade = array();

  			/** secondary-var*/
  			$secondaries = unserialize( $userItem->secondary_meta );
  			$secCount = 0;

  			/** work-var*/
  			$work = unserialize( $userItem->work_exp_meta );
  			$workStatusArgs = array( 'current' => 'Present', 'left' => 'Left' );
  			$workCount = 0;

  			/** skills-var*/
  			$skills = unserialize( $userItem->skills_meta );
  			$skilsProfesionArgs = array( 'beginner' => 'Beginner','intermediate' => 'Intermediate','advance' => 'Advanced' );
  			$skillsCount = 0;

		@endphp

		@section('editID', '/' . $userItem->id )

		<!--basic-info-->
		@section( 'editID', $userItem->id )
		@section( 'editFName', $userItem->first_name )
		@section( 'editLName', $userItem->last_name )
		@section( 'editGender')
			@foreach ($argender as $genderKey => $genderValue)
				<option value="{{ $genderKey }}" {{ ( $genderKey == $userItem->gender ) ? 'selected' : '' }} >{{ $genderValue }}</option>
			@endforeach
		@endsection
		@section( 'editBirthday', $userItem->birthday)
		@section( 'editAge', $userItem->age)
		@section( 'editAddress', $userItem->address)
		@section( 'editContactNumber', $userItem->contact_number)
		@section( 'editEmail', $user->email)
		@section( 'editBio', $userItem->bio)

		<!--social-info-->
		@section('editSocialMedia')
			@if ( count( $sm_unser ) )
				@foreach ($sm_unser as $key => $sm)
					@php
						$brand = $sm['sm_brand'];
						$link = $sm['sm_link'];
						$target = $sm['sm_target'];
					@endphp
					<div class="sets_of_sm form-row position-relative">
						<div class="col-12 col-md-4 col-lg-4 input-group my-1">
							<div class="input-group-prepend">
								<span class="input-group-text" id="sm_brand_0"><i class="fas fa-share-alt"></i></span>
							</div>
							<select class="custom-select" name="social_meta[{{ $sm_count }}][sm_brand]" aria-describedby="sm_brand_0">
								@foreach ($args as $keys => $value)
									<option value="{{ $keys }}" {{ ( $brand === $keys ) ? 'selected': '' }} >{{ $value }}</option>
								@endforeach
							</select>
						</div>
			      		<div class="col-12 col-md-4 col-lg-4 input-group my-1">
			      			<div class="input-group-prepend">
			      				<span class="input-group-text" id="sm_link_0"><i class="fas fa-link"></i></span>
			      			</div>
			      			<input type="text" class="form-control" name="social_meta[{{ $sm_count }}][sm_link]" aria-describedby="sm_link_0" value="{{ $link }}">
			      		</div>
			      		<div class="{{ ( $sm_count > 0 ) ? 'col-12 col-md-3 col-lg-3' : 'col-12 col-md-4 col-lg-4' }} input-group my-1">
			      			<div class="input-group-prepend">
			      				<span class="input-group-text" id="sm_target_0"><i class="fas fa-columns"></i></span>
			      			</div>
			      			<select class="custom-select" name="social_meta[{{ $sm_count }}][sm_target]" aria-describedby="sm_target_0">
			      				@foreach ($tarr as $tKey => $tValue)
			      					<option value="{{ $tKey }}" {{ ( $target === $tKey ) ? 'selected': '' }}>{{ $tValue }}</option>
			      				@endforeach
			      			</select>
			      		</div>
			      		@if ( $sm_count > 0 )
			      			<div class="col-12 col-md-1 col-lg-1 my-1"><button type="button" class="btn btn-danger btn-block remove"><i class="fas fa-trash-alt"></i></button></div>
			      		@endif
					</div>
		      		@php
		      			$sm_count++;
		      		@endphp
				@endforeach
			@endif
		@endsection

		<!--tertiary-info-->
		@section('editTertiary')
			@if ( count( $tertiaries ) > 0)
				@foreach ($tertiaries as $tKey => $tValue)
					@php
						$univ 		= $tValue['university'];
						$course 	= $tValue['course_uni'];
						$major 		= $tValue['major_uni'];
						$sch_yr		= $tValue['grad_end_uni'];
						$address	= $tValue['address_uni'];
						$qualify	= $tValue['qualify_uni'];
						$grade		= $tValue['grade_uni'];
						$cls = ( $tCount > 0 ) ? 'col-lg-5' : 'col-lg-6';
					@endphp
					<div class="sets_of_tertiary my-3 pb-2">
						<div class="form-group row">
							<label for="university_{{ $tCount }}" class="col-sm-3 col-form-label text-right">Institute/University *</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="university_{{ $tCount }}" name="tertiary[{{ $tCount }}][university]" placeholder="Institute/University" value="{{ $univ }}">
							</div>
						</div>
						<div class="form-group row">
							<label for="qualify_uni_{{ $tCount }}" class="col-sm-3 col-form-label text-right">Qualification *</label>
							<div class="col-sm-9">
				      			<select class="custom-select" name="tertiary[{{ $tCount }}][qualify_uni]" id="qualify_uni_{{ $tCount }}">
				      				@foreach ($qual_args as $qKey => $qVal)
					      				<option value="{{ $qKey }}" {{ ( $qualify === $qKey ) ? 'selected' : '' }}>{{ $qVal }}</option>
					      			@endforeach
				      			</select>
							</div>
						</div>
						<div class="form-group row">
							<label for="course_uni_{{ $tCount }}" class="col-sm-3 col-form-label text-right">Course *</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="course_uni_{{ $tCount }}" name="tertiary[{{ $tCount }}][course_uni]" placeholder="Course" value="{{ $course }}">
							</div>
						</div>
						<div class="form-group row">
							<label for="major_uni_{{ $tCount }}" class="col-sm-3 col-form-label text-right">Major</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="major_uni_{{ $tCount }}" name="tertiary[{{ $tCount }}][major_uni]" placeholder="Major"  value="{{ $major }}">
							</div>
						</div>
						<div class="form-group row date form_datetimepicker">
							<label for="grad_end_uni_{{ $tCount }}" class="col-sm-3 col-form-label text-right">Graduation Date *</label>
							<div class="col-sm-9">
								<div class="input-group">
								    <input type="text" class="form-control" name="tertiary[{{ $tCount }}][grad_end_uni]" id="grad_end_uni_{{ $tCount }}" value="{{ $sch_yr }}" readonly>
								    <div class="input-group-append">
								    	<span class="add-on input-group-text"><i class="icon-th far fa-calendar-alt"></i></span>
								    </div>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="address_uni_{{ $tCount }}" class="col-sm-3 col-form-label text-right">Location *</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="address_uni_{{ $tCount }}" name="tertiary[{{ $tCount }}][address_uni]" placeholder="Address" value="{{ $address }}">
							</div>
						</div>
						<div class="form-group row">
							<label for="grade_uni_{{ $tCount }}" class="col-sm-3 col-form-label text-right">Grade</label>
							<div class="col-sm-9">
				      			<select class="custom-select" name="tertiary[{{ $tCount }}][grade_uni]" id="grade_uni_{{ $tCount }}">
				      				@foreach ($grade_args as $gradeKey => $gradeValue)
				      					<option value="{{ $gradeKey }}" {{ ( $gradeKey == $grade ) ? 'selected' : '' }}>{{ $gradeValue }}</option>
				      				@endforeach
				      			</select>
							</div>
						</div>
					</div>
		      		@php
		      			$tCount++;
		      		@endphp
				@endforeach
			@endif
		@endsection

		<!--secondary-info-->
		@section('editSecondary')
			<div class="sets_of_secondary my-3 pb-2">
				@if ( count( $secondaries ) > 0 )
					@foreach ( $secondaries as $sec)
						@php
				  			$hschool = $sec['high_school'];
				  			$hs_address = $sec['hs_address'];
				  			$end_of_hs = $sec['grad_of_hs'];
						@endphp
						<div class="form-group row">
							<label for="school_{{ $secCount }}" class="col-sm-3 col-form-label text-right ">Institute/School *</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="school_{{ $secCount }}" name="secondary_meta[{{ $secCount }}][high_school]" placeholder="Institute/University" value="{{ $hschool }}">
							</div>
						</div>
						<div class="form-group row">
							<label for="hs_address_{{ $secCount }}" class="col-sm-3 col-form-label text-right ">Address *</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="hs_address_{{ $secCount }}" name="secondary_meta[{{ $secCount }}][hs_address]" placeholder="Institute/University Address" value="{{ $hs_address }}">
							</div>
						</div>
						<div class="form-group row date form_datetimepicker">
							<label for="grad_of_hs{{ $secCount }}" class="col-sm-3 col-form-label text-right">Graduation Date *</label>
							<div class="col-sm-9">
								<div class="input-group">
								    <input type="text" class="form-control" name="secondary_meta[{{ $secCount }}][grad_of_hs]" id="grad_of_hs{{ $secCount }}" value="{{ $end_of_hs }}" readonly>
								    <div class="input-group-append">
								    	<span class="add-on input-group-text"><i class="icon-th far fa-calendar-alt"></i></span>
								    </div>
								</div>
							</div>
						</div>
						@php
							$secCount++;
						@endphp
					@endforeach
				@endif
			</div>
		@endsection

		<!--work-info-->
		@section('editWork')
			@if ( count( $work ) > 0 )
				@foreach ($work as $wKey => $wValue)
					@php
						$position = $wValue['position'];
						$company = $wValue['company'];
						$role = $wValue['role'];
						$start = $wValue['joined_start'];
						$end = $wValue['joined_end'];
						$status = $wValue['work_status'];
						$desc = $wValue['exp'];
					@endphp
					<div class="sets_of_wexp position-relative my-3 pb-2">
						<div class="form-group row">
							<label for="position_{{ $workCount }}" class="col-sm-3 col-form-label text-right">Position Title *</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="position_{{ $workCount }}" name="work_exp_meta[{{ $workCount }}][position]" placeholder="Position Title" value="{{ $position }}">
							</div>
						</div>
						<div class="form-group row">
							<label for="company_{{ $workCount }}" class="col-sm-3 col-form-label text-right">Company Name *</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="company_{{ $workCount }}" name="work_exp_meta[{{ $workCount }}][company]" placeholder="Company Name" value="{{ $company }}">
							</div>
						</div>
						<div class="form-group row">
							<label for="role_{{ $workCount }}" class="col-sm-3 col-form-label text-right">Role *</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="role_{{ $workCount }}" name="work_exp_meta[{{ $workCount }}][role]" placeholder="Role" value="{{ $role }}">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-3 col-form-label text-right ">Duration *</label>
							<div class="col-sm-9">
								<div class="row">
									<div class="col-lg-4 date form_datetimepicker">
										<div class="input-group">
											<input type="text" name="work_exp_meta[{{ $workCount }}][joined_start]" id="joined_start_{{ $workCount }}" value="{{ $start }}" readonly="readonly" class="form-control ">
											<div class="input-group-append">
												<span class="add-on input-group-text"><i class="icon-th far fa-calendar-alt"></i></span>
											</div>
										</div>
									</div>
									<div class="col-lg-4 date form_datetimepicker">
										<div class="input-group">
											<input type="text" name="work_exp_meta[{{ $workCount }}][joined_end]" id="joined_end_{{ $workCount }}" value="{{ $end }}" readonly="readonly" class="form-control ">
											<div class="input-group-append">
												<span class="add-on input-group-text"><i class="icon-th far fa-calendar-alt"></i></span>
											</div>
										</div>
									</div>
									<div class="col-lg-4">
										<div class="input-group">
							      			<select class="custom-select" name="work_exp_meta[{{ $workCount }}][work_status]" id="work_status_{{ $workCount }}">
												@foreach ($workStatusArgs as $wStatusKey => $wStatusValue)
													<option value="{{ $wStatusKey }}" {{ ( $wStatusKey === $status ) ? 'selected' : '' }}>{{ $wStatusValue }}</option>
												@endforeach
							      			</select>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="exp_{{ $workCount }}" class="col-sm-3 col-form-label text-right">Experience Description</label>
							<div class="col-sm-9">
								<textarea type="text" class="form-control" name="work_exp_meta[{{ $workCount }}][exp]" id="exp_{{ $workCount }}">{{ $desc }}</textarea>
							</div>
						</div>
					</div>
					@php
						$workCount++;
					@endphp
				@endforeach
			@endif
		@endsection

		<!--skills-info-->
		@section('editSkilss')
			@if ( count( $skills ) > 0)
				@foreach ($skills as $skillKey => $skillValue)
					@php
						$skills 	= $skillValue['skills'];
						$profession = $skillValue['profession'];
					@endphp				
					<div class="sets_of_skills form-row position-relative">
			      		<div class="col-12 col-md-6 col-lg-6 input-group my-1">
			      			<div class="input-group-prepend">
			      				<label class="input-group-text" for="skills_{{ $skillsCount }}"><i class="fas fa-laptop-code"></i></label>
			      			</div>
			      			<input type="text" class="form-control" name="skill_meta[{{ $skillsCount }}][skills]" id="skills_{{ $skillsCount }}" placeholder="Skills" value="{{ $skills }}">
			      		</div>
						<div class="{{ ( $skillsCount > 0 ) ? 'col-12 col-md-5 col-lg-5' : 'col-12 col-md-6 col-lg-6' }} input-group my-1">
							<div class="input-group-prepend">
								<label class="input-group-text" for="profession_{{ $skillsCount }}"><i class="fas fa-briefcase"></i></label>
							</div>
							<select class="custom-select" id="profession_{{ $skillsCount }}" name="skill_meta[{{ $skillsCount }}][profession]">
								@foreach ($skilsProfesionArgs as $profKeys => $profValue)
									<option value="{{ $profKeys }}" {{ ( $profKeys == $profession ) ? 'selected' : '' }}>{{ $profValue }}</option>
								@endforeach
							</select>
						</div>
						@if ( $skillsCount > 0 )
							<div class="col-12 col-md-1 col-lg-1 my-1">
								<button type="button" class="btn btn-danger btn-block remove_skills"><i class="fas fa-trash-alt"></i></button>
							</div>
						@endif
					</div>
					@php
						$skillsCount++;
					@endphp
				@endforeach
			@endif
		@endsection
	@endforeach
@endif