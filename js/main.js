// Vars
var navElement = $('.navi');
var navAnimationDuration = 300;
let gallery = $('.gallery');
let galleryImageLarge = $('.large', gallery);
let galleryImageThumbs = $('.thumbs', gallery);
let disclaimerCookie;



// Functions
function scrollTo(element, offset = 0) {
	$('html, body').animate(
		{
			scrollTop: (element.offset().top-navElement.height() -20),
		},
		500,
		'linear'
	)
}

function hideShowNavi() {
	let topPosition = $('.heroimage').offset().top;
	let offset = $('.heroimage').height() - 50;
	let navShowDistance = topPosition + offset;

	if ($(window).scrollTop() > navShowDistance) {
		navElement.slideDown({
			start: function () {
				$(this).css({
					display: "flex"
				})
			},
			duration: navAnimationDuration
		});
	}
	else {
		navElement.slideUp(navAnimationDuration);
	}
}

function initGallery() {
	let innerHtml = galleryImageLarge.html();

	galleryImageThumbs.append(innerHtml);

	galleryImageLarge.not('.slick-initialized').slick({
		lazyLoad: 'ondemand',
		slidesToShow: 1,
		slidesToScroll: 1,
		arrows: true,
		fade: false,
		asNavFor: galleryImageThumbs,
		adaptiveHeight: true,
		infinite: false,
		speed: 400,
		prevArrow: $('.wrapper-large .prev', gallery),
		nextArrow: $('.wrapper-large .next', gallery)
	});
	
	galleryImageThumbs.not('.slick-initialized').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		swipeToSlide: true,
		// asNavFor: large,
		arrows: true,
		dots: false,
		centerMode: true,
		focusOnSelect: true,
		adaptiveHeight: false,
		infinite: false,
		speed: 100,
		mobileFirst: true,
		prevArrow: $('.wrapper-thumbs .prev', gallery),
		nextArrow: $('.wrapper-thumbs .next', gallery),

		responsive: [
		{
			breakpoint: 720,
			settings: {
				slidesToShow: 4,
				arrows: true,
			}
		},
		]
	});

	$('li', galleryImageThumbs).click(function() {
		let index = $(this).attr('data-slick-index');

		galleryImageLarge.slick('slickGoTo', index);
	});
} // initGallery

function openGallery() {
	gallery.fadeIn();

	initGallery();

	navElement.slideUp(navAnimationDuration);
	navElement.removeClass('active');
	$(window).unbind("scroll");
}

function closeGallery() {
	let gallery = $('.gallery');

	gallery.fadeOut();
	hideShowNavi();
	$(window).bind('scroll', function() {
		hideShowNavi();
	});
}

function setCookie(cname, cvalue, exdays) {
  var d = new Date();
  d.setTime(d.getTime() + (exdays*24*60*60*1000));
  var expires = "expires="+ d.toUTCString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
  var name = cname + "=";
  var decodedCookie = decodeURIComponent(document.cookie);
  var ca = decodedCookie.split(';');
  for(var i = 0; i <ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}





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






