/*

	Include all needed Scripts

 */

//@codekit-prepend includes/jquery.min.js
//@codekit-prepend includes/functions.js

$('.linkWrapper a').click(function() {
  $('#register').slideToggle(200, function() {
    $('html, body').animate(
      {
        scrollTop: ($(this).offset().top),
      },
      500,
      'linear'
    );
  });
});

$('#login').submit(function(e) {
	var form = $(this);
	var url = form.attr('action');
	var method = form.attr('method');

  form.removeClass('inactiveUser');
  form.removeClass('invalid');

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
      	    } else if (data == 2) {
                form.addClass('inactiveUser');
            } else {
      	    	form.addClass('invalid');
      	    }
       	}
    });

});

$('#register').submit(function(e) {
  var form = $(this);
  var url = form.attr('action');
  var method = form.attr('method');

  form.removeClass('inactiveUser');
  form.removeClass('invalid');

  e.preventDefault();

  $.ajax({
    type: method,
    url: url,
        data: form.serialize(), // serializes the form's elements.
        success: function(data)
        {
          var dataObj = JSON.parse(data);
            if (dataObj.status == 1) {
              alert('Registrierung erfolgreich');
              window.location = "/_prashantiYoga";
            } else if (dataObj.status == 0) {
              errObj = form.find('.errorMessage.invalid');
              errObj.html(dataObj.message);
              
              form.addClass('invalid');
            } else {
              form.addClass('invalid');
            }
        }
    });

});