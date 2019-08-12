@extends('admin.users.create')

@section('editMethod')
	{{ method_field('PUT') }}
@endsection

@if ( count( $userMeta ) > 0 )
	@php
		$socialCounter = 0;
	@endphp
	<!--basic-info-->
	@foreach ($userMeta as $userMeta)
		@section('editID', $userMeta->id)
		@section( 'editFName', $userMeta->first_name )
		@section( 'editLName', $userMeta->last_name )
		@php
			$genderM = ( $userMeta->gender == "male"  ) ? "selected" : ""; 
			$genderF = ( $userMeta->gender == "female"  ) ? "selected" : ""; 
		@endphp
		@section( 'editGenderM', $genderM)
		@section( 'editGenderF', $genderF)
		@section( 'birthday', $userMeta->birthday)
		@section( 'age', $userMeta->age)
		@section( 'address', $userMeta->address)
		@section( 'contact_number', $userMeta->contact_number)
		@section( 'bio', $userMeta->bio)

		<!--social-media-->
		@php
			$sm_un = unserialize( $userMeta->social_meta );
			$args = array( 'fb' => 'Facebook', 'tw' => 'Twitter', 'ig' => 'Instagram', 'gplus' => 'Google Plus', 'yt' => 'Youtube','lnk' => 'Linkid' );
			$tarr = array( '_blank' => 'New Tab', '_self' => 'Self' );
			$ar = array();
			$target = array();
			$sm_count = 0;
		@endphp
		@section('socialmedia')
			@if ( count( $sm_un ) )
				@foreach ($sm_un as $key => $sm)
					@php
						$brand = $sm['sm_brand'];
						$link = $sm['sm_link'];
						$target = $sm['sm_target'];
					@endphp
					<div class="sets_of_sm form-row position-relative">
						<div class="col-4 input-group my-1">
			      			<div class="input-group-prepend">
			      				<span class="input-group-text" id="basic-addon2"><i class="fas fa-share-alt"></i></span>
			      			</div>
							<select class="form-control" name="social_meta[{{ $sm_count }}][sm_brand]" aria-describedby="basic-addon2">
								@foreach ($args as $keys => $arg)
									<option value="{{ $keys }}" {{ ( $brand === $keys ) ? 'selected': '' }} >{{ $arg }}</option>
								@endforeach
							</select>
						</div>
			      		<div class="col-4 input-group my-1">
			      			<div class="input-group-prepend">
			      				<span class="input-group-text" id="basic-addon3"><i class="fas fa-link"></i></span>
			      			</div>
			      			<input type="text" class="form-control" name="social_meta[{{ $sm_count }}][sm_link]" aria-describedby="basic-addon3" value="{{ $link }}">
			      		</div>
			      		<div class="col-3 input-group my-1">
			      			<div class="input-group-prepend">
			      				<span class="input-group-text" id="basic-addon4"><i class="fas fa-columns"></i></span>
			      			</div>
			      			<select class="form-control" name="social_meta[{{ $sm_count }}][sm_target]" aria-describedby="basic-addon4">
			      				@foreach ($tarr as $tKey => $tVal)
			      					<option value="{{ $tKey }}" {{ ( $target === $tKey ) ? 'selected': '' }}>{{ $tVal }}</option>
			      				@endforeach
			      			</select>
			      		</div>
			      		@if ( $sm_count > 0 )
			      			<div class="col-1 my-1"><button type="button" class="btn btn-danger btn-block remove"><i class="fas fa-trash-alt"></i></button></div>
			      		@endif
		      		</div>
		      		@php
		      			$sm_count++;
		      		@endphp
				@endforeach
			@endif
		@endsection

		<!--Education-tertiary-->
		@section('tertiary')
	  		@php
	  			$tertiaries = unserialize( $userMeta->tertiary_meta );
	  			$counter = 0;
				$qual_args = array(
					'none' 			=> 'Select Qualification',
					'hsd' 			=> 'High School Diploma',
					'vd_scc' 		=> 'Vocational Diploma / Short Course Certificate',
					'bcdegree' 		=> 'Bachelor\'s/College Degree',
					'pgd_master' 	=> 'Post Graduate Diploma / Master\'s Degree',
					'license' 		=> 'Professional License (Passed Board/Bar/Professional License Exam)',
					'doctorate' 	=> 'Doctorate Degree'
				);
	  			$qualify = array();
	  		@endphp
			@if ( count( $tertiaries ) )
				@foreach ($tertiaries as $atKey => $un)
					@php
						$univ 		= $un['university'];
						$major 		= $un['u_major'];
						$sch_yr		= $un['u_year_end'];
						$address	= $un['u_address'];
						$qualify	= $un['u_qualify'];
						$cls = ( $counter > 0 ) ? 'col-lg-5' : 'col-lg-6';
					@endphp
		      		<div class="sets_of_tertiary my-3 pb-2 position-relative">
		      			@if ( $counter > 0 )
		      				<hr class="hr my-2">
		      			@endif
			      		<div class="form-row form-group">
				      		<div class="col-12 col-lg-4">
				      			<label for="university_{{ $counter }}">Institute/University</label>
				      			<input type="text" class="form-control" name="tertiary_meta[{{ $counter }}][university]" id="university_{{ $counter }}" value="{{ $univ }}">
				      		</div>
				      		<div class="col-12 col-lg-4">
				      			<label for="u_major_{{ $counter }}">Major</label>
				      			<input type="text" class="form-control" name="tertiary_meta[{{ $counter }}][u_major]" id="u_major_{{ $counter }}" value="{{ $major }}">
				      		</div>
							<div class="col-12 col-lg-4 input-append date form_datetimepicker">
								<label for="u_year_end_{{ $counter }}">School Year End</label>
								<div class="input-group">
								    <input type="text" class="form-control" name="tertiary_meta[{{ $counter }}][u_year_end]" id="u_year_end_{{ $counter }}" value="{{ $sch_yr }}" readonly>
								    <div class="input-group-append">
								    	<span class="add-on input-group-text"><i class="icon-th far fa-calendar-alt"></i></span>
								    </div>
								</div>
							</div>
			      		</div>
			      		<div class="form-row form-group">
				      		<div class="col-12 col-lg-6">
				      			<label for="u_address_{{ $counter }}">Address</label>
				      			<input type="text" class="form-control" name="tertiary_meta[{{ $counter }}][u_address]" id="u_address_{{ $counter }}" value="{{ $address }}">
				      		</div>
				      		<div class="col-12 {{ $cls }}">
				      			<label for="u_qualify_0">Qualification</label>
				      			<select type="text" class="form-control" name="tertiary_meta[{{ $counter }}][u_qualify]" id="u_qualify_0">
					      			@foreach ($qual_args as $qKey => $qVal)
					      				<option value="{{ $qKey }}" {{ ( $qualify === $qKey ) ? 'selected' : '' }}>{{ $qVal }}</option>
					      			@endforeach
					      		</select>
				      		</div>
						</div>
						@if ( $counter > 0 )
							<div class="position-absolute" style="right: 0;bottom: 25px;"><button class="btn btn-danger remove_t1"><i class="fas fa-trash-alt"></i></button></div>
						@endif						
		      		</div>
		      		@php
		      			 $counter++;
		      		@endphp
				@endforeach
			@endif
		@endsection

		<!--Education-secondary-->
		@section('secondary')
	  		@php
	  			$secondaries = unserialize( $userMeta->secondary_meta );
	  		@endphp
	  		@if ( count( $secondaries ) )
	  			@foreach ($secondaries as $sec)
	  				@php
			  			$high_school = $sec[0];
			  			$hs_address = $sec[1];
			  			$end_of_hs = $sec[2];
	  				@endphp
		      		<div class="form-group">
		      			<label for="secondary_meta[0][]">Institute/School</label>
		      			<input type="text" class="form-control" name="secondary_meta[0][]" value="{{ $high_school }}">
		      		</div>
		      		<div class="form-row form-group">
			      		<div class="col-12 col-lg-6">
			      			<label for="secondary_meta[0][]">Address</label>
			      			<input type="text" class="form-control" name="secondary_meta[0][]" value="{{ $hs_address }}">
			      		</div>
						<div class="col-12 col-lg-6 input-append date form_datetimepicker">
							<label for="secondary_meta[0][]">School Year</label>
							<div class="input-group">
							    <input type="text" class="form-control" name="secondary_meta[0][]" value="{{ $end_of_hs  }}" readonly>
							    <div class="input-group-append">
							    	<span class="add-on input-group-text"><i class="icon-th far fa-calendar-alt"></i></span>
							    </div>
							</div>
						</div>
					</div>
	  			@endforeach
	  		@endif
		@endsection

		<!--Work-Exp-->
		@section('work')
			@php
				$workUn = unserialize( $userMeta->work_exp_meta );
				$work_status = array( 'current' => 'Present', 'left' => 'Left');
				$workCount = 0;
			@endphp
			@if ( count( $workUn ) )
				@foreach ($workUn as $workItem)
				{{-- {{ dd( $workItem ) }} --}}
	      		<div class="sets_of_wexp position-relative my-3 pb-2">
		      		<div class="form-row form-group">
			      		<div class="col-12 col-lg-4">
			      			<label for="position_0">Position</label>
			      			<input type="text" class="form-control" name="work_exp_meta[{{ $workCount }}][]" value="{{ $workItem[0] }}" id="position_{{ $workCount }}">
			      		</div>
			      		<div class="col-12 col-lg-4">
			      			<label for="company_{{ $workCount }}">Company Name</label>
			      			<input type="text" class="form-control" name="work_exp_meta[{{ $workCount }}][]" value="{{ $workItem[1] }}" id="company_{{ $workCount }}">
			      		</div>
			      		<div class="col-12 col-lg-4">
			      			<label for="role_{{ $workCount }}">Role</label>
			      			<input type="text" class="form-control" name="work_exp_meta[{{ $workCount }}][]" value="{{ $workItem[2] }}" id="role_{{ $workCount }}">
			      		</div>
		      		</div>
		      		<div class="form-row form-group align-items-center">
						<div class="col-4 col-lg-5 input-append date form_datetimepicker">
		      				<label for="joined_start_{{ $workCount }}">Join Start</label>
							<div class="input-group">
							    <input type="text" class="form-control" name="work_exp_meta[{{ $workCount }}][]" value="{{ $workItem[3] }}" readonly id="joined_start_{{ $workCount }}">
							    <div class="input-group-append">
							    	<span class="add-on input-group-text"><i class="icon-th far fa-calendar-alt"></i></span>
							    </div>
							</div>
						</div>
						<div class="col-4 col-lg-5 input-append date form_datetimepicker">
		      				<label for="joined_end_{{ $workCount }}">Join End</label>
							<div class="input-group">
							    <input type="text" class="form-control" name="work_exp_meta[{{ $workCount }}][]" value="{{ $workItem[4] }}" readonly id="joined_end_{{ $workCount }}">
							    <div class="input-group-append">
							    	<span class="add-on input-group-text"><i class="icon-th far fa-calendar-alt"></i></span>
							    </div>
							</div>
						</div>
			      		<div class="col-4 col-lg-2">
			      			<label for="work_status_{{ $workCount }}">Status</label>
			      			<select class="form-control" name="work_exp_meta[{{ $workCount }}][work_status]" id="work_status_{{ $workCount }}">
			      				@foreach ($work_status as $wKey => $wVal)
			      					<option value="{{ $wKey }}" {{ ( $workItem['work_status'] === $wKey ) ? 'selected' : '' }}>{{ $wVal }}</option>
			      				@endforeach
			      			</select>
			      		</div>
		      		</div>
		      		<div class="form-row form-group">
			      		<div class="col-12">
			      			<label for="exp_{{ $workCount }}">Experience Description</label>
			      			<textarea type="text" class="form-control" name="work_exp_meta[{{ $workCount }}][]" id="exp_{{ $workCount }}">{{ $workItem[5] }}</textarea>
			      		</div>
		      		</div>			      			
	      		</div>
					@php
						$workCount++;
					@endphp
				@endforeach
			@endif
		@endsection

		<!--Skills-->
		@section('skill')
	  		@php
	  			$skills_meta = unserialize( $userMeta->skills_meta );
	  			$skills_count = 0;
	  			$prof_args = array( 'beginner' => 'Beginner','intermediate' => 'Intermediate','advance' => 'Advanced' );
	  		@endphp
	  		@if ( count( $skills_meta ) )
	  			@foreach ($skills_meta as $qkey => $skills)
		  			@php
		  				$prof_ar = $skills['profession'];
		  			@endphp
		      		<div class="sets_of_skills form-row form-group position-relative">
			      		<div class="col-12 col-lg-6">
			      			<input type="text" class="form-control" name="skill_meta[{{ $skills_count }}][skills]" value="{{ $skills['skills'] }}">
			      		</div>
			      		<div class="col-12 col-lg-5">
			      			<select class="form-control" name="skill_meta[{{ $skills_count }}][profession]">
			      				@foreach ($prof_args as $qkeys => $profVal)		      				
			      				 <option value="{{ $qkeys }}" {{ ( $prof_ar === $qkeys ) ? 'selected': '' }} >{{ $profVal }}</option>
			      				@endforeach
			      			</select>
			      		</div>
			  			@if (  $skills_count > 0 )
				      		<div class="col-12 col-lg-1">
				      			<button type="button" class="btn btn-danger btn-block remove_skills"><i class="fas fa-trash-alt"></i></button>
				      		</div>
			  			@endif
		      		</div>
		      		@php
		      			$skills_count++;
		      		@endphp
	  			@endforeach
	  		@endif
		@endsection
		<!--Skills-End-->
	@endforeach
@else
	<p>Sorry No Item</p>
@endif


