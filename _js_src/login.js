/*

	Include all needed Scripts

 */

//@codekit-prepend includes/jquery.min.js
//@codekit-prepend includes/functions.js
//


$('#login').submit(function(e) {
	var form = $(this);
	var url = form.attr('action');
	var method = form.attr('method');
	e.preventDefault();

	$.ajax({
		type: method,
		url: url,
        data: form.serialize(), // serializes the form's elements.
        success: function(data)
       	{
      	    console.log(data); // show response from the php script.
      	    if (data == 1) {
      	    	window.location = "/_prashantiYoga";
      	    } else {
      	    	form.addClass('invalid');
      	    }
       	}
    });

});