(function($){
	$('#upload_media').on('submit', function(e){
		e.preventDefault();
		var url = $(this).data('href');

		$.ajax({
			method: 'POST',
			url: url,
			data:new FormData(this),
			dataType: 'JSON',
			contentType: false,
			cache: false,
			processData: false,
			success:function(res){
				$('#message').css('display', 'block');
				$('#message').html(res.message);
				$('#message').addClass(res.class_name);
				$('#attachment_upload').html(res.uploaded_image);
			}
		});
	});
})(jQuery);