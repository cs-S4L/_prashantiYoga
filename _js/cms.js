$('.cmsEditField').click(function() {
	var clickedField = $(this).attr('data-field');
	var clickedOrder = $(this).attr('data-order');
	var clickedAction = $(this).attr('data-action');
	var link = baseUrl + 'cmsEdit/?field='+clickedField+'&order='+clickedOrder+'&action='+clickedAction;
	$('.cmsLightbox').fadeIn();

	$('#cmsEditIframe').attr('src', link);
});

$('.cmsImageUploadButton').click(function() {
	var link = baseUrl + 'imgUpload/';
	$('.cmsLightbox').fadeIn();

	$('#cmsEditIframe').attr('src', link);
});

function closeIframe(action, form = null, method = null, url = null) {

	switch (action) {
		case 'abort':
			$('.cmsLightbox').fadeOut();
			break;

		case 'submit':
      	case 'delete':
			$('.cmsLightbox').fadeOut();
			if (form && method && url) {
				$.ajax({
					type: method,
					url: url,
		        	data: form, // serializes the form's elements.
			        success: function(data)
			        {
			      	    console.log(data); // show response from the php script.
			      	    if (data == 1) {
			      	    	window.location.reload();
			      	    } else {
			      	    	//console.log(data); // show response from the php script.
			      	    }
			      	}
		      	});
			} else {
				alert('Error. Missing Data from Form');
			}
	    break;

	    default:
	    	alert('Error. Unknown action');
	}
}

