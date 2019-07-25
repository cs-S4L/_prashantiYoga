/*

	Include all needed Scripts

 */

//@codekit-prepend includes/jquery.min.js
//@codekit-prepend includes/jquery.backstretch.min.js
//@codekit-prepend includes/slick.min.js
//@codekit-prepend includes/functions.js


// Vars
var navElement = $('.navi');
var navAnimationDuration = 300;
let gallery = $('.gallery');
let galleryImageLarge = $('.large', gallery);
let galleryImageThumbs = $('.thumbs', gallery);
let disclaimerCookie;


// Navi Code
hideShowNavi();

$('.hamburger').click(function() {
	$(this).toggleClass('is-active');
	$('.navi ul').slideToggle();
});

$('.navi ul li').click(function() {
	let target = $('#' + $(this).attr('data-target'));
	let hamburger = $('.hamburger');

	scrollTo(target);

	if (hamburger.is(":visible")) {
		$('.navi ul').slideToggle();
	}
	hamburger.toggleClass('is-active');
});

$('.logo') .click(function() {
	scrollTo($('.heroimage'));
});

$(window).bind('scroll', function() {
	hideShowNavi();
});



// Gallery Code
$('.openGallery').click(function() {
	openGallery();
});

$('.gallery .close').click(function () {
	closeGallery();
});



// Datenschutz + Impressum Code
$('#datenschutz').click(function() {
	let datenschutz = $('#section_datenschutz');

	datenschutz.slideToggle();
	$('#section_impressum').slideUp();

	scrollTo(datenschutz);
});

$('#impressum').click(function() {
	let impressum = $('#section_impressum');

	impressum.slideToggle();
	$('#section_datenschutz').slideUp();
	
	scrollTo(impressum);
});




//Cookie Disclaimer
disclaimerCookie = getCookie('cookieDisclaimer');

if (disclaimerCookie) {
	$('.cookieDisclaimer').removeClass('active');
}

$('#cookieDisclaimer').click(function() {
	setCookie('cookieDisclaimer', 'true', 365);

	$('.cookieDisclaimer').removeClass('active');
});






