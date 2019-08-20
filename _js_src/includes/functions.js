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

function initGallery(gallery) {
	let galleryImageLarge = $('.large', gallery);
	let galleryImageThumbs = $('.thumbs', gallery);
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

function openGallery(gallery) {
	gallery.fadeIn();

	initGallery(gallery);

	navElement.slideUp(navAnimationDuration);
	navElement.removeClass('active');
	$(window).unbind("scroll");
}

function closeGallery(gallery) {
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