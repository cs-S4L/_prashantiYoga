//@codekit-prepend includes/jquery.min.js
//@codekit-prepend includes/jquery.backstretch.min.js
//@codekit-prepend includes/functions.js

$('.cmsEdit').submit(function(e) {
	var form = $(this);
	var url = form.attr('action');
	var method = form.attr('method');

	e.preventDefault();

	parent.closeIframe('submit', form.serialize(), method, url);
});

$('#abort').click(function(){
	parent.closeIframe('abort');
});