(function($){

	/**Add Social Media Item */
  var social_counter = 1;
  $('#addSocial').on('click', function(e){

      var social_id = '#new_sets_sm';
      var social_class = '.sets_of_sm';
      var social_elem = $( social_id + ' ' + social_class ).length;

      var social_item ='<div class="sets_of_sm form-row position-relative">';
          social_item +='<div class="col-12 col-md-4 col-lg-4 input-group my-1">';
            social_item +='<div class="input-group-prepend">';
              social_item +='<label class="input-group-text" for="sm_brand_' + social_counter + '"><i class="fas fa-share-alt"></i></label>';
            social_item +='</div>';
            social_item +='<select class="custom-select" name="social_meta[' + social_counter + '][sm_brand]" id="sm_brand_' + social_counter + '">';
              social_item +='<option value="fb">Facebook</option>';
              social_item +='<option value="tw">Twitter</option>';
              social_item +='<option value="ig">Instagram</option>';
              social_item +='<option value="gplus">Google Plus</option>';
              social_item +='<option value="yt">Youtube</option>';
              social_item +='<option value="lnk">Linkedin</option>';
            social_item +='</select>';
          social_item +='</div>';
          social_item +='<div class="col-12 col-md-4 col-lg-4 input-group my-1">';
            social_item +='<div class="input-group-prepend">';
              social_item +='<label class="input-group-text" for="sm_link_' + social_counter + '"><i class="fas fa-link"></i></label>';
            social_item +='</div>';
            social_item +='<input type="text" class="form-control" name="social_meta[' + social_counter + '][sm_link]" id="sm_link_' + social_counter + '">';
          social_item +='</div>';
          social_item +='<div class="col-12 col-md-3 col-lg-3 input-group my-1">';
            social_item +='<div class="input-group-prepend">';
              social_item +='<label class="input-group-text" for="sm_target_' + social_counter + '"><i class="fas fa-columns"></i></label>';
            social_item +='</div>';
            social_item +='<select class="custom-select" name="social_meta[' + social_counter + '][sm_target]" id="sm_target_' + social_counter + '">';
              social_item +='<option value="_blank">New Tab</option>';
              social_item +='<option value="_self">Self</option>';
            social_item +='</select>';
          social_item +='</div>';
          social_item +='<div class="col-12 col-md-1 col-lg-1 my-1"><button type="button" class="btn btn-danger btn-block remove"><i class="fas fa-trash-alt"></i></button></div>';
        social_item +='</div>';

      //set a limit
      if ( social_elem < 10 ) {
        $(this).prop( 'disabled', false );
        $(social_id).append(social_item);
        social_counter++;
      }else{
        $(this).prop( 'disabled', true );
      }
  });

  /**Delete Social Media Item */
  $('body').on('click', '.remove', function(){
    var last = $( '.sets_of_sm' ).length;

    $('#addSocial').prop("disabled",false);
    $(this).parent().parent().remove();
    // console.log(item_counter);
    // if (last == nega) {
    //   $(this).prop("disabled",true);
    // }
  });

  /**Add Tertiary Item */
  var tertiary_counter = 1;
  $('#addTertiary').on('click', function(e){
    e.preventDefault();

    var tertiary_id = '#new_tertiary';
    var tertiary_class = '.sets_of_tertiary';
    var tertiary_elem = $( tertiary_id + ' ' + tertiary_class ).length;

    var tertiary_item = '<div class="sets_of_tertiary my-3 pb-2 position-relative">';
      tertiary_item += '<div class="form-group row">';
        tertiary_item += '<label for="university' + tertiary_counter + '" class="col-sm-3 col-form-label text-right">Institute/University *</label>';
        tertiary_item += '<div class="col-sm-9">';
          tertiary_item += '<input type="text" class="form-control" id="university' + tertiary_counter + '" name="tertiary[' + tertiary_counter + '][university]" placeholder="Institute/University">';
        tertiary_item += '</div>';
      tertiary_item += '</div>';
      tertiary_item += '<div class="form-group row">';
        tertiary_item += '<label for="qualify_uni' + tertiary_counter + '" class="col-sm-3 col-form-label text-right">Qualification *</label>';
        tertiary_item += '<div class="col-sm-9">';
          tertiary_item += '<select class="custom-select" name="tertiary[' + tertiary_counter + '][qualify_uni]" id="qualify_uni' + tertiary_counter + '">';
            tertiary_item += '<option value="none">Select Qualification</option>';
            tertiary_item += '<option value="hsd">High School Diploma</option>';
            tertiary_item += '<option value="vd_scc">Vocational Diploma / Short Course Certificate</option>';
            tertiary_item += '<option value="bcdegree">Bachelor\'s/College Degree</option>';
            tertiary_item += '<option value="pgd_master">Post Graduate Diploma / Master\'s Degree</option>';
            tertiary_item += '<option value="license">Professional License (Passed Board/Bar/Professional License Exam)</option>';
            tertiary_item += '<option value="doctorate">Doctorate Degree</option>';
          tertiary_item += '</select>';
        tertiary_item += '</div>';
      tertiary_item += '</div>';
      tertiary_item += '<div class="form-group row">';
        tertiary_item += '<label for="course_uni' + tertiary_counter + '" class="col-sm-3 col-form-label text-right">Course *</label>';
        tertiary_item += '<div class="col-sm-9">';
          tertiary_item += '<input type="text" class="form-control" id="course_uni' + tertiary_counter + '" name="tertiary[' + tertiary_counter + '][course_uni]" placeholder="Course">';
        tertiary_item += '</div>';
      tertiary_item += '</div>';
      tertiary_item += '<div class="form-group row">';
        tertiary_item += '<label for="major_uni' + tertiary_counter + '" class="col-sm-3 col-form-label text-right">Major</label>';
        tertiary_item += '<div class="col-sm-9">';
          tertiary_item += '<input type="text" class="form-control" id="major_uni' + tertiary_counter + '" name="tertiary[' + tertiary_counter + '][major_uni]" placeholder="Major">';
        tertiary_item += '</div>';
      tertiary_item += '</div>';
      tertiary_item += '<div class="form-group row date form_datetimepicker">';
        tertiary_item += '<label for="grad_end_uni' + tertiary_counter + '" class="col-sm-3 col-form-label text-right">Graduation Date *</label>';
        tertiary_item += '<div class="col-sm-9">';
          tertiary_item += '<div class="input-group">';
            tertiary_item += '<input type="text" class="form-control" name="tertiary[' + tertiary_counter + '][grad_end_uni]" id="grad_end_uni' + tertiary_counter + '" value="" readonly>';
            tertiary_item += '<div class="input-group-append">';
              tertiary_item += '<span class="add-on input-group-text"><i class="icon-th far fa-calendar-alt"></i></span>';
            tertiary_item += '</div>';
          tertiary_item += '</div>';
        tertiary_item += '</div>';
      tertiary_item += '</div>';
      tertiary_item += '<div class="form-group row">';
        tertiary_item += '<label for="address_uni' + tertiary_counter + '" class="col-sm-3 col-form-label text-right">Location *</label>';
        tertiary_item += '<div class="col-sm-9">';
          tertiary_item += '<input type="text" class="form-control" id="address_uni' + tertiary_counter + '" name="tertiary[' + tertiary_counter + '][address_uni]" placeholder="Address">';
        tertiary_item += '</div>';
      tertiary_item += '</div>';
      tertiary_item += '<div class="form-group row">';
        tertiary_item += '<label for="grade_uni' + tertiary_counter + '" class="col-sm-3 col-form-label text-right">Grade</label>';
        tertiary_item += '<div class="col-sm-9">';
          tertiary_item += '<select class="custom-select" name="tertiary[' + tertiary_counter + '][grade_uni]" id="grade_uni' + tertiary_counter + '">';
            tertiary_item += '<option value="none"></option>';
            tertiary_item += '<option value="gpa">Grade Point Average (GPA)</option>';
            tertiary_item += '<option value="inc">Incomplete</option>';
            tertiary_item += '<option value="on_going">On-going</option>';
          tertiary_item += '</select>';
        tertiary_item += '</div>';
      tertiary_item += '</div>';
      tertiary_item += '<div class="form-group row">';
        tertiary_item += '<label class="col-sm-3 col-form-label text-right">Action</label>';
        tertiary_item += '<div class="col-sm-9">';
          tertiary_item += '<button class="btn btn-danger btn-sm remove_t1"><i class="fas fa-trash-alt"></i></button>';
        tertiary_item += '</div>';
      tertiary_item += '</div>';
    tertiary_item += '</div>';

    //set a limit
    if ( tertiary_elem < 10 ) {
      $(this).attr('disabled','disabled');
      $(tertiary_id).append(tertiary_item);
      tertiary_counter++;
    }else{
      $(this).attr('disabled','');
    }

    $('.form_datetimepicker').datetimepicker({
      format: 'MM dd,yyyy',
          autoclose: true,
          todayBtn: true,
          pickerPosition: "bottom-right",
    });
  });

  /**Delete Tertiary Item */
  $('body').on('click', '.remove_t1', function(e){
    var last = $( '.sets_of_tertiary' ).length;
    
    $('#addTertiary').prop("disabled",false);
    $(this).parent().parent().parent().remove();
  });

  /**Add Working Exp Item */
  var work_counter = 1;
  $('#addWorkExp').on('click', function(e){
    e.preventDefault();

    var work_id = '#new_sets_wexp';
    var work_class = '.sets_of_wexp';
    var work_elem = $( work_id + ' ' + work_class ).length;

    var work_item = '<div class="sets_of_wexp position-relative my-3 pb-2">';
      work_item += '<div class="form-group row">';
        work_item += '<label for="position' + work_counter + '" class="col-sm-3 col-form-label text-right">Position</label>';
        work_item += '<div class="col-sm-9">';
          work_item += '<input type="text" class="form-control" id="position' + work_counter + '" name="work_exp_meta[' + work_counter + '][position]" placeholder="Position">';
        work_item += '</div>';
      work_item += '</div>';
      work_item += '<div class="form-group row">';
        work_item += '<label for="company' + work_counter + '" class="col-sm-3 col-form-label text-right">Company Name</label>';
        work_item += '<div class="col-sm-9">';
          work_item += '<input type="text" class="form-control" id="company' + work_counter + '" name="work_exp_meta[' + work_counter + '][company]" placeholder="Company Name">';
        work_item += '</div>';
      work_item += '</div>';
      work_item += '<div class="form-group row">';
        work_item += '<label for="role' + work_counter + '" class="col-sm-3 col-form-label text-right">Role</label>';
        work_item += '<div class="col-sm-9">';
          work_item += '<input type="text" class="form-control" id="role' + work_counter + '" name="work_exp_meta[' + work_counter + '][role]" placeholder="Role">';
        work_item += '</div>';
      work_item += '</div>';
      work_item += '<div class="form-group row">';
        work_item += '<label class="col-sm-3 col-form-label text-right ">Duration</label>';
        work_item += '<div class="col-sm-9">';
          work_item += '<div class="row">';
            work_item += '<div class="col-lg-4 date form_datetimepicker">';
              work_item += '<div class="input-group">';
                work_item += '<input type="text" name="work_exp_meta[' + work_counter + '][joined_start]" id="joined_start' + work_counter + '" value="" readonly="readonly" class="form-control ">';
                work_item += '<div class="input-group-append">';
                  work_item += '<span class="add-on input-group-text"><i class="icon-th far fa-calendar-alt"></i></span>';
                work_item += '</div>';
              work_item += '</div>';
            work_item += '</div>';
            work_item += '<div class="col-lg-4 date form_datetimepicker">';
              work_item += '<div class="input-group">';
                work_item += '<input type="text" name="work_exp_meta[' + work_counter + '][joined_end]" id="joined_end' + work_counter + '" value="" readonly="readonly" class="form-control ">';
                work_item += '<div class="input-group-append">';
                  work_item += '<span class="add-on input-group-text"><i class="icon-th far fa-calendar-alt"></i></span>';
                work_item += '</div>';
              work_item += '</div>';
            work_item += '</div>';
            work_item += '<div class="col-lg-4">';
              work_item += '<div class="input-group">';
                work_item += '<select class="custom-select" name="work_exp_meta[' + work_counter + '][work_status]" id="work_status' + work_counter + '">';
                  work_item += '<option value="current">Present</option>';
                  work_item += '<option value="left">Left</option>';
                work_item += '</select>';
              work_item += '</div>';
            work_item += '</div>';
          work_item += '</div>';
        work_item += '</div>';
      work_item += '</div>';
      work_item += '<div class="form-group row">';
        work_item += '<label for="exp' + work_counter + '" class="col-sm-3 col-form-label text-right">Experience Description</label>';
        work_item += '<div class="col-sm-9">';
          work_item += '<textarea type="text" class="form-control" name="work_exp_meta[' + work_counter + '][exp]" id="exp' + work_counter + '"></textarea>';
        work_item += '</div>';
      work_item += '</div>';
      work_item += '<div class="form-group row">';
        work_item += '<label class="col-sm-3 col-form-label text-right">Action</label>';
        work_item += '<div class="col-sm-9">';
          work_item += '<button type="button" class="btn btn-danger remove_t2" ><i class="fas fa-trash-alt"></i></button>';
        work_item += '</div>';
      work_item += '</div>';
    work_item += '</div>';

    //set a limit
    if ( work_elem < 10 ) {
      $(this).attr('disabled','disabled');
      $(work_id).append(work_item);
      work_counter++;
    }else{
      $(this).attr('disabled','');
    }

    $('.form_datetimepicker').datetimepicker({
      format: 'MM dd,yyyy',
          autoclose: true,
          todayBtn: true,
          pickerPosition: "bottom-right",
    });

  });

  /**Delete Working Exp Item */
  $('body').on('click', '.remove_t2', function(){
    var last = $( '.sets_of_wexp' ).length;
    
    $('#addWorkExp').prop("disabled",false);
    $(this).parent().parent().parent().remove();
  });



  /**Add Skills Item */
  var skills_counter = 1;
  $('#addSkills').on('click', function(e){
    e.preventDefault();

    var skills_id = '#new_sets_skills';
    var skills_class = '.sets_of_skills';
    var skills_elem = $( skills_id + ' ' + skills_class ).length;

    var skills_item = '<div class="sets_of_skills form-row position-relative">';
        skills_item += '<div class="col-12 col-md-6 col-lg-6 input-group my-1">';
          skills_item += '<div class="input-group-prepend">';
            skills_item += '<label class="input-group-text" for="skills_' + skills_counter + '"><i class="fas fa-laptop-code"></i></label>';
          skills_item += '</div>';
          skills_item += '<input type="text" class="form-control" name="skill_meta[' + skills_counter + '][skills]" id="skills_' + skills_counter + '" placeholder="Skills">';
        skills_item += '</div>';
        skills_item += '<div class="col-12 col-md-5 col-lg-5 input-group my-1">';
          skills_item += '<div class="input-group-prepend">';
            skills_item += '<label class="input-group-text" for="profession_' + skills_counter + '"><i class="fas fa-briefcase"></i></label>';
          skills_item += '</div>';
          skills_item += '<select class="custom-select" id="profession_' + skills_counter + '" name="skill_meta[' + skills_counter + '][profession]">';
            skills_item += '<option value="beginner">Beginner</option>';
            skills_item += '<option value="intermediate">Intermediate</option>';
            skills_item += '<option value="advance">Advanced</option>';
          skills_item += '</select>';
        skills_item += '</div>';
        skills_item += '<div class="col-12 col-md-1 col-lg-1 my-1">';
          skills_item += '<button type="button" class="btn btn-danger btn-block remove_skills"><i class="fas fa-trash-alt"></i></button>';
        skills_item += '</div>';
      skills_item += '</div>';

    //set a limit
    if ( skills_elem < 20 ) {
      $(this).attr('disabled','disabled');
      $(skills_id).append(skills_item);
      skills_counter++;
    }else{
      $(this).attr('disabled','');
    }
  });

  /**Delete Skills Item */
  $('body').on('click', '.remove_skills', function(){
    var last = $( '.sets_of_skills' ).length;
    
    $('#addSkills').prop("disabled",false);
    $(this).parent().parent().remove();
  });


  $('.form_datetimepicker').datetimepicker({
    format: 'MM dd,yyyy',
        autoclose: true,
        todayBtn: true,
        pickerPosition: "bottom-right",
  });


  /**user-form*/
  $('#form_store').on('submit', function(e){

    e.preventDefault();

    var url = $(this).data('href');
    var type = 'POST';

    $.ajax({
      url: url,
      method: type,
      data: $(this).serialize(),
      dataType:'json',
      beforeSend: function(){
        $('#user_submit').attr('disabled','disabled');
      },
      success:function( res ){
        if ( res.error ) {
          var error_output = '';
          
          for ( count = 0; count < res.error.length; count++ ){
            error_output += '<li>' + res.error[count] + '</li>';
          }

          $('#user_result').html('<ul class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>' + error_output + '</ul>');

        }else{
          $('#user_result').html('<ul class="alert alert-success alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">×</a><li>' + res.success + '</li></ul>');
        }
        $('#user_submit').attr('disabled', false);
      }
    });

  });
})(jQuery);