(function($){
  
  /**settings-form*/
  $('#optionsForm').on('submit', function(event){
    event.preventDefault();
    var type = 'PUT';
    var url = $(this).data('href');

    $.ajax({
      url: url,
      method: type,
      data: $(this).serialize(),
      dataType: 'json',
      beforeSend:function(){
        $('#option_btn').attr('disabled','disabled');
      },
      success: function(data){
        if (data.error) {
            var error_html = '';
            for(var count = 0; count < data.error.length; count++)
            {
              error_html += '<p>'+data.error[count]+'</p>';
            }
            $('#opt_result').html('<div class="alert alert-danger">'+error_html+'</div>');
        }else{
          $('#opt_result').html('<div class="alert alert-success">'+data.success+'</div>');
        }
        $('#option_btn').attr('disabled', false);
      }
    });
  });
})(jQuery);