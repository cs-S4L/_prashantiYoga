var navShowDistance = $('.heroimage').offset().top + $('.heroimage').height();
var navElement = $('.navi');
var navAnimationDuration = 300;

function scrollTo(element) {
	$('html, body').animate(
		{
			scrollTop: element.offset().top-navElement.height(),
		},
		500,
		'linear'
	)
}

function hideShowNavi() {
	if ($(window).scrollTop() > navShowDistance) {
		navElement.slideDown(navAnimationDuration);
	}
	else {
		navElement.slideUp(navAnimationDuration);
	}
}

hideShowNavi();

// Navi Code
$('.hamburger').click(function() {
	$(this).toggleClass('is-active');
	$('.navi ul').slideToggle();
});

$('.navi ul li').click(function() {
	let target = $('#' + $(this).attr('data-target'));

	scrollTo(target);
	$('.navi ul').slideToggle();
	$('.hamburger').toggleClass('is-active');
});

$(window).bind('scroll', function() {
	hideShowNavi();
});



// Gallery Code
$('#openGallery').click(function() {
	let gallery = $('.gallery');
	let large = $('.large', gallery);
	let thumbs = $('.thumbs', gallery);
	let innerHtml = large.html();

	console.log('fade In');

	thumbs.append(innerHtml);

	gallery.fadeIn();

	navElement.slideUp(navAnimationDuration);

	large.slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		arrows: true,
		fade: false,
		asNavFor: thumbs,
		adaptiveHeight: false,
	});
	
	thumbs.slick({
		slidesToShow: 2,
		slidesToScroll: 1,
		asNavFor: large,
		arrows: true,
		dots: false,
		centerMode: true,
		focusOnSelect: true,
		adaptiveHeight: false,
		centerPadding: 0,
		responsive: [
		{
			breakpoint: 720,
			settings: {
				slidesToShow: 3
			}
		}
		]
	});
});

$('.gallery .close').click(function () {
	let gallery = $('.gallery');

	gallery.fadeOut();
	hideShowNavi();
});

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


// $('.heroimage').backstretch();

// $('.heroimage').backstretch([
// 	{ width: 720, url: "img/img_heroimage.png" },
// 	{ width: 0, url: "img/img_heroimageSmall_.png" },
// ]);