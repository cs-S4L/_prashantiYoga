$('.cmsEditField').click(function() {
	$('.cmsLightbox').fadeIn();
	var clickedField = $(this).attr('data-field');
	$('#cmsEditIframe').attr('src', baseUrl + 'cmsEdit/?field=' + clickedField);
});

function closeIframe(action, form = null, method = null, url = null) {

	switch (action) {
		case 'abort':
			$('.cmsLightbox').fadeOut();
			break;

		case 'submit':
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

