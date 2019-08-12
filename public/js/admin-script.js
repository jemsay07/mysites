(function($){

	/**
	 *  For Social Media
	 */
  var item_counter = 0;	

  var appendItem = function ( type, limit, btn_id, wrap_class){
    var item_id = '';
    var item_class = '';
    var item = '';
    var wrap_length = $(wrap_class).length;

    console.log(wrap_length);

    if (wrap_length == 1 ) {
      item_counter = 1;
    }else{
      item_counter = wrap_length+1;
    }
    

    /**Social Media*/
    if ( type === 'social_media' ) {
      item +='<div class="sets_of_sm form-row position-relative">';
        item +='<div class="col-4 input-group my-1">';
          item +='<div class="input-group-prepend">';
            item +='<span class="input-group-text" id="basic-addon2"><i class="fas fa-share-alt"></i></span>';
          item +='</div>';
          item +='<select class="form-control" name="social_meta[' + item_counter + '][sm_brand]" aria-describedby="basic-addon2">';
            item +='<option value="fb">Facebook</option>';
            item +='<option value="tw">Twitter</option>';
            item +='<option value="ig">Instagram</option>';
            item +='<option value="gplus">Google Plus</option>';
            item +='<option value="yt">Youtube</option>';
            item +='<option value="lnk">Linkid</option>';
          item +='</select>';
        item +='</div>';
        item +='<div class="col-4 input-group my-1">';
          item +='<div class="input-group-prepend">';
            item +='<span class="input-group-text" id="basic-addon3"><i class="fas fa-link"></i></span>';
          item +='</div>';
          item +='<input type="text" class="form-control" name="social_meta[' + item_counter + '][sm_link]" aria-describedby="basic-addon3">';
        item +='</div>';
        item +='<div class="col-3 input-group my-1">';
          item +='<div class="input-group-prepend">';
            item +='<span class="input-group-text" id="basic-addon4"><i class="fas fa-columns"></i></span>';
          item +='</div>';
          item +='<select class="form-control" name="social_meta[' + item_counter + '][sm_target]" aria-describedby="basic-addon4">';
            item +='<option value="_blank">New Tab</option>';
            item +='<option value="_self">Self</option>';
          item +='</select>';
        item +='</div>';
        item +='<div class="col-1 my-1"><button type="button" class="btn btn-danger btn-block remove"><i class="fas fa-trash-alt"></i></button></div>';
      item +='</div>';
      item_id = '#new_sets_sm';
      item_class = '.sets_of_sm';
    }

    /**Tertiary*/
    if (type === 'tertiary_meta') {
      item += '<div class="sets_of_tertiary my-3 pb-2 position-relative">';
      item += '<hr class="hr my-2">';
        item += '<div class="form-row form-group">';
          item += '<div class="col-12 col-lg-4">';
            item += '<label for="university_' + item_counter + '">Institute/University</label>';
            item += '<input type="text" class="form-control" name="tertiary_meta[' + item_counter + '][university]" id="university_' + item_counter + '">';
          item += '</div>';
          item += '<div class="col-12 col-lg-4">';
            item += '<label for="u_major_' + item_counter + '">Major</label>';
            item += '<input type="text" class="form-control" name="tertiary_meta[' + item_counter + '][u_major]" id="u_major_' + item_counter + '">';
          item += '</div>';
          item += '<div class="col-12 col-lg-4 input-append date form_datetimepicker">';
            item += '<label for="u_year_end_' + item_counter + '">School Year End</label>';
            item += '<div class="input-group">';
              item += '<input type="text" class="form-control" name="tertiary_meta[' + item_counter + '][u_year_end]" value="" readonly id="u_year_end_' + item_counter + '">';
              item += '<div class="input-group-append">';
                item += '<span class="add-on input-group-text"><i class="icon-th far fa-calendar-alt"></i></span>';
              item += '</div>';
            item += '</div>';
          item += '</div>';
        item += '</div>';
         item += '<div class="form-row form-group">';
          item += '<div class="col-12 col-lg-6">';
            item += '<label for="u_address_' + item_counter + '">Address</label>';
            item += '<input type="text" class="form-control" name="tertiary_meta[' + item_counter + '][u_address]" id="u_address_' + item_counter + '">';
          item += '</div>';
          item += '<div class="col-12 col-lg-5">';
            item += '<label for="u_qualify_' + item_counter + '">Qualification</label>';
            item += '<select type="text" class="form-control" name="tertiary_meta[' + item_counter + '][u_qualify]" id="u_qualify_' + item_counter + '">';
              item += '<option value="none">Select Qualification</option>';
              item += '<option value="hsd">High School Diploma</option>';
              item += '<option value="vd_scc">Vocational Diploma / Short Course Certificate</option>';
              item += '<option value="bcdegree">Bachelor\'s/College Degree</option>';
              item += '<option value="pgd_master">Post Graduate Diploma / Master\'s Degree</option>';
              item += '<option value="license">Professional License (Passed Board/Bar/Professional License Exam)</option>';
              item += '<option value="doctorate">Doctorate Degree</option>';
            item += '</select>';
          item += '</div>';
        item += '</div>';
        item += '<div class="position-absolute" style="right: 0;bottom: 25px;">';
          item += '<button class="btn btn-danger remove_t1"><i class="fas fa-trash-alt"></i></button>';
        item += '</div>';
      item += '</div>';

      item_id = '#new_tertiary';
      item_class = '.sets_of_tertiary';
    }

        /**Working Exp*/
    if (type === 'work_exp_meta') {
        item += '<div class="sets_of_wexp position-relative my-3 pb-2">';
          item += '<hr class="hr my-2">';
          item += '<div class="form-row form-group">';
            item += '<div class="col-12 col-lg-4">';
              item += '<label for="position_' + item_counter + '">Position</label>';
              item += '<input type="text" class="form-control" name="work_exp_meta[' + item_counter + '][position]" id="position_' + item_counter + '">';
            item += '</div>';
            item += '<div class="col-12 col-lg-4">';
              item += '<label for="company_' + item_counter + '">Company Name</label>';
              item += '<input type="text" class="form-control" name="work_exp_meta[' + item_counter + '][company]" id="company_' + item_counter + '">';
            item += '</div>';
            item += '<div class="col-12 col-lg-4">';
              item += '<label for="role_' + item_counter + '">Role</label>';
              item += '<input type="text" class="form-control" name="work_exp_meta[' + item_counter + '][role]" id="role_' + item_counter + '">';
            item += '</div>';
          item += '</div>';
          item += '<div class="form-row form-group align-items-center">';
            item += '<div class="col-4 col-lg-5 input-append date form_datetimepicker">';
              item += '<label for="joined_start_' + item_counter + '">Join Start</label>';
              item += '<div class="input-group">';
                item += '<input type="text" class="form-control" name="work_exp_meta[' + item_counter + '][joined_start]" value="" readonly for="joined_start_' + item_counter + '">';
                item += '<div class="input-group-append">';
              item += '<span class="add-on input-group-text"><i class="icon-th far fa-calendar-alt"></i></span>';
              item += '</div>';
            item += '</div>';
          item += '</div>';
          item += '<div class="col-4 col-lg-5 input-append date form_datetimepicker">';
            item += '<label for="joined_end_' + item_counter + '">Join End</label>';
              item += '<div class="input-group">';
                item += '<input type="text" class="form-control" name="work_exp_meta[' + item_counter + '][joined_end]" value="" readonly id="joined_end_' + item_counter + '">';
                item += '<div class="input-group-append">';
                  item += '<span class="add-on input-group-text"><i class="icon-th far fa-calendar-alt"></i></span>';
                item += '</div>';
              item += '</div>';
            item += '</div>';
            item += '<div class="col-4 col-lg-2">';
              item += '<label for="work_status_' + item_counter + '">Status</label>';
              item += '<select class="form-control" name="work_exp_meta[' + item_counter + '][work_status]" id="work_status_' + item_counter + '">';
                item += '<option value="current">Present</option>';
                item += '<option value="left">Left</option>';
              item += '</select>';
            item += '</div>';
        item += '</div>';
        item += '<div class="form-row form-group">';
          item += '<div class="col-12 col-lg-11">';
            item += '<label for="exp_' + item_counter + '">Experience Description</label>';
            item += '<textarea type="text" class="form-control" name="work_exp_meta[' + item_counter + '][exp]" id="exp_' + item_counter + '"></textarea>';
          item += '</div>';
        item += '</div>';
        item += '<div class="position-absolute" style="right: 0;bottom:45px;"><button type="button" class="btn btn-danger remove_t2" ><i class="fas fa-trash-alt"></i></button></div>';
        
        // item += '</div>';
      item += '</div>';

      item_id = '#new_sets_wexp';
      item_class = '.sets_of_wexp';
    }

    if ( type === 'skills_meta' ) {

      item += '<div class="sets_of_skills form-row form-group position-relative">';
         item += '<div class="col-12 col-lg-6">';
           item += '<input type="text" class="form-control" name="skill_meta[' + item_counter + '][skills]">';
         item += '</div>';
          item += '<div class="col-12 col-lg-5">';
            item += '<select class="form-control" name="skill_meta[' + item_counter + '][profession]">';
              item += '<option value="beginner">Beginner</option>';
              item += '<option value="intermediate">Intermediate</option>';
              item += '<option value="advance">Advanced</option>';
            item += '</select>';
         item += '</div>';
        item += '<div class="col-12 col-lg-1">';
          item += '<button type="button" class="btn btn-danger btn-block remove_skills"><i class="fas fa-trash-alt"></i></button>';
        item += '</div>';
      item += '</div>';

      item_id = '#new_sets_skills';
      item_class = '.sets_of_skills';
    }

    var elem = $( item_id + ' ' + item_class ).length;

    if ( elem < limit ) {
      $(btn_id).prop("disabled",false);
      $(item_id).append(item);
      item_counter++;
      // console.log(item_counter);
    }else{
      $(btn_id).prop("disabled",true);
    }
    $('.form_datetimepicker').datetimepicker({
      format: 'MM dd,yyyy',
          autoclose: true,
          todayBtn: true,
          pickerPosition: "bottom-right",
    });
  }

  /**Add Social Media Item */
  $('#addSocial').on('click', function(e){
    appendItem( 'social_media', 6, '#addSocial', '.sets_of_sm' );
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
  $('#addTertiary').on('click', function(e){
    var btn_id = $(this);
    appendItem( 'tertiary_meta', 5, btn_id, '.sets_of_tertiary' );
  });
  /**Delete Tertiary Item */
  $('body').on('click', '.remove_t1', function(){
    var last = $( '.sets_of_tertiary' ).length;
    
    $('#addTertiary').prop("disabled",false);
    $(this).parent().parent().remove();
    // console.log(item_counter);
    // if (last == nega) {
    //   $(this).prop("disabled",true);
    // }
  });

  /**Add Working Exp Item */
  $('#addWorkExp').on('click', function(e){
    var btn_id = $(this);
    appendItem( 'work_exp_meta', 3, btn_id, '.sets_of_wexp' );
  });
  /**Delete Working Exp Item */
  $('body').on('click', '.remove_t2', function(){
    var last = $( '.sets_of_wexp' ).length;
    
    $('#addWorkExp').prop("disabled",false);
    $(this).parent().parent().remove();
    // console.log(item_counter);
    // if (last == nega) {
    //   $(this).prop("disabled",true);
    // }
  });

  /**Add Skills Item */
  $('#addSkills').on('click', function(e){
    var btn_id = $(this);
    appendItem( 'skills_meta', 50, btn_id, '.sets_of_skills' );
  });
  /**Delete Skills Item */
  $('body').on('click', '.remove_skills', function(){
    var last = $( '.sets_of_skills' ).length;
    
    $('#addSkills').prop("disabled",false);
    $(this).parent().parent().remove();
    // console.log(item_counter);
    // if (last == nega) {
    //   $(this).prop("disabled",true);
    // }
  });

  $('.form_datetimepicker').datetimepicker({
    format: 'MM dd,yyyy',
        autoclose: true,
        todayBtn: true,
        pickerPosition: "bottom-right",
  });

})(jQuery);


