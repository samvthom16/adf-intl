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
function modalVideo() {
	var beginEmbed = '<div class="fitvids"><iframe width="560" height="315" src="https://www.youtube.com/embed/';
	var endEmbed = '?rel=0&autoplay=1" frameborder="0" allowfullscreen></iframe></div>';
	jQuery('a[data-video]').click(function(e) {
		var whichVideo = jQuery(this).data('video');
		var videoEmbed = beginEmbed + whichVideo + endEmbed;
		jQuery('.overlay-content').html(videoEmbed);
		jQuery('.fitvids').fitVids();
		jQuery('.overlay-content').addClass('overlay-show');
		e.preventDefault();
	});
}
function closeModal() {
	//Click outside content
	jQuery('.overlay').click(function () {
		jQuery('.overlay-content').removeClass('overlay-show');
		jQuery('.overlay-content').html('');
		return false;
	});
	//Esc Key
	jQuery(document).keyup(function(e) {
		if (e.keyCode === 27) {
			jQuery('.overlay-content').removeClass('overlay-show');
			jQuery('.overlay-content').html('');
		}
	});
}

function showInfo() {
    jQuery('#to-info').click(function (e) {
        if(jQuery('.donation-amounts input').is(':checked')) {
            jQuery('.for-amount, #to-info').css('display','none');
            jQuery('.for-info').slideDown();
            jQuery('#to-payment').css('display','block');
        }
        e.preventDefault();
    });
}
function showPayment() {
    jQuery('#to-payment').click(function (e) {
        jQuery('.for-info, #to-payment').css('display','none');
        jQuery('.for-payment').slideDown();
        jQuery('#donate-form input[type=submit]').css('display','block');
        e.preventDefault();
    });
}
function smoothscroll() {
	jQuery('.banner-content a[href*="#"], .top-navigation a[href*="#"]')
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
function readMore() {
	jQuery('#read-more').click(function(e) {
		jQuery('.more').slideToggle();
		jQuery(this).toggleClass('expanded');
		e.preventDefault();
	});
}
function showProject() {
	jQuery('a[data-story]').click(function(e) {
		var story = jQuery(this).data('story');
		jQuery('.story').slideUp();
		jQuery('#'+story).slideDown();
		jQuery('#close-story').css('display','block');
		jQuery('html, body').animate({
	        'scrollTop' : jQuery('.story').offset().top
	    });
		e.preventDefault();
	});
	jQuery('#close-story').click(function(e) {
		jQuery('.story').slideUp();
		jQuery(this).css('display','none');
		e.preventDefault();
	});
}
jQuery(document).ready(function() {
    hideCookie();
    modalVideo();
    closeModal();
    showInfo();
    showPayment();
	smoothscroll();
	readMore();
	showProject();
});
