function langSwitcher() {
	jQuery('#lang-trigger').click(function (e) {
		jQuery(this).siblings('ul').slideToggle();
		jQuery(this).parent().toggleClass('expanded');
		e.preventDefault();
	});
}
function showPetition() {
	jQuery('#petition-trigger, #sticky-petition, a[href="#sign"]').click(function (e) {
		jQuery('.overlay').addClass('overlay-show');
		jQuery(this).addClass('overlay-showing');
		e.preventDefault();
	});
}
function modalVideo() {
	var beginEmbed = '<div class="fitvids"><iframe width="560" height="315" src="https://www.youtube.com/embed/';
	var endEmbed = '?rel=0&autoplay=1" frameborder="0" allowfullscreen></iframe></div>';
	jQuery('a[data-video]').click(function(e) {
		var whichVideo = jQuery(this).data('video');
		var videoEmbed = beginEmbed + whichVideo + endEmbed;
		jQuery('.overlay-video').html(videoEmbed);
		jQuery('.fitvids').fitVids();
		jQuery('.overlay').addClass('video-show');
		e.preventDefault();
	});
}
function closeModal() {
	//Click outside content
	/*jQuery('.overlay').click(function (e) {
		jQuery('.overlay-content').removeClass('overlay-show');
		jQuery('#petition-trigger, #sticky-petition').removeClass('overlay-showing');
		e.preventDefault();
	});*/
	//Esc Key
	jQuery(document).keyup(function(e) {
		if (e.keyCode === 27) {
			jQuery('.overlay').removeClass('overlay-show');
			jQuery('.overlay').removeClass('video-show');
			jQuery('.overlay-video').html('');
			jQuery('#petition-trigger, #sticky-petition').removeClass('overlay-showing');
		}
	});
	//Click close
	jQuery('.overlay-close, .overlay-hide').click(function (e) {
		jQuery('.overlay').removeClass('overlay-show');
		jQuery('.overlay').removeClass('video-show');
		jQuery('.overlay-video').html('');
		jQuery('#petition-trigger, #sticky-petition').removeClass('overlay-showing');
		e.preventDefault();
	});
}
function triggerAbout() {
	jQuery('#about-trigger').click(function(e) {
		jQuery(this).toggleClass('expanded');
		jQuery('.about-adf').slideToggle();
		e.preventDefault();
	});
}
function scrollSticky() {
	if(jQuery('#petition-trigger').length) {
		var oP = jQuery('#petition-trigger').offset().top;
		jQuery(window).scroll(function() {
			var hT = jQuery('#petition-trigger').offset().top,
			hH = jQuery('#petition-trigger').outerHeight(),
			wH = jQuery(window).height(),
			wS = jQuery(this).scrollTop() - wH;
			if (wS > (hT-wH) && (hT > wS) && (wS+wH > hT+hH)){
				jQuery('#sticky-petition').addClass('sticky');

			}
			if( jQuery(this).scrollTop() < oP) {
				jQuery('#sticky-petition').removeClass('sticky');
			}
		});
	} else {
		if(jQuery('#sticky-petition').length) {
			jQuery('#sticky-petition').addClass('sticky');
		}
	}
}
function smoothscroll() {
	jQuery('a[href*="#"]').not('[href="#"]')
	.click(function(event) {
		// On-page links
	    if (
			location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
			&&
			location.hostname == this.hostname
	    ) {
			// Figure out element to scroll to
			var target = jQuery(this.hash);
			target = target.length ? target : jQuery('[name=' + this.hash.slice(1) + ']');
			// Does a scroll target exist?
			if (target.length) {
				// Only prevent default if animation is actually gonna happen
				event.preventDefault();
				jQuery('html, body').animate({
				  scrollTop: target.offset().top - 20
				}, 1000, function() {
					// Callback after animation
					// Must change focus!
					var $target = jQuery(target);
					$target.focus();
					if ($target.is(":focus")) { // Checking if the target was focused
			            return false;
					} else {
			            $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
			            $target.focus(); // Set focus again
					};
		        });
			}
	    }
	});
}
function showDeclaration() {
	jQuery('#trigger-declaration').click(function (e) {
		e.preventDefault();
		jQuery('.full-declaration').slideDown();
		jQuery(this).css('display','none');
		jQuery('#declaration').css('padding-bottom',0);
	});
}
function hideDeclaration() {
	jQuery('#hide-declaration').click(function (e) {
		e.preventDefault();
		jQuery('.full-declaration').slideUp();
		jQuery('#trigger-declaration').css('display','inline-block');
		jQuery('#declaration').css('padding-bottom','4em');
	});
}
function moreStories() {
	jQuery('#show_more').click(function (e) {
		e.preventDefault();
		jQuery(this).css('visibility','hidden');
		jQuery('#more-story').slideDown();
	});
}
function hideCookie() {
	var hidebanner = Cookies.get('hideBanner');
	if(hidebanner) {
		jQuery('.cookie-bar').css('display','none');
	}
	jQuery('.close-cookie').click(function(e) {
		e.preventDefault();
		jQuery('.cookie-bar').css('display','none');
		Cookies.set('hideBanner', 'true', { expires: 1 });
	});
}
jQuery(document).ready(function() {
	langSwitcher();
	triggerAbout();
	closeModal();
	showPetition();
	scrollSticky();
	jQuery('.fitvids').fitVids();
	smoothscroll();
	showDeclaration();
	hideDeclaration();
	moreStories();
	hideCookie();
	modalVideo();
});
