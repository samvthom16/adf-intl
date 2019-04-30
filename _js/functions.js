function topDropdowns() {
	jQuery('.with-sub > a').click(function(e) {
		if(jQuery(this).parent('.with-sub').is('.visible')) {
			jQuery('.with-sub').removeClass('visible');
		} else {
			jQuery('.with-sub').removeClass('visible');
			jQuery(this).parent('.with-sub').addClass('visible');
		}
		e.preventDefault();
		e.stopPropagation();
	});
	jQuery(document).on("click", function(){
		jQuery('.with-sub').removeClass('visible');
	});
}
function navOpen() {
	jQuery('.nav-toggle').click(function(e) {
		e.preventDefault();
		jQuery('.site-header').addClass('show-nav');
	});
}
function navClose() {
	jQuery('.nav-close').click(function(e) {
		e.preventDefault();
		jQuery('.site-header').removeClass('show-nav');
	});
}
function dropdowns() {
	jQuery('.dd-trigger').click(function(e) {
		e.preventDefault();
		/*jQuery(this).parent('.dropdown').toggleClass('open');
		jQuery(this).siblings('ul').slideToggle(200);*/
		if(jQuery(this).parent('.dropdown').is('.open')) {
			jQuery('.dropdown').removeClass('open');
			jQuery(this).siblings('ul').slideUp(200);
		} else {
			jQuery('.dropdown').removeClass('open');
			jQuery(this).parent('.dropdown').addClass('open');
			jQuery(this).siblings('ul').slideDown(200);
		}
		e.preventDefault();
		e.stopPropagation();
	});
	jQuery(document).on("click touchend", function(){
		jQuery('.open ul').slideUp();
		jQuery('.dropdown').removeClass('open');

	});
}

function tweetButton() {
	var url = window.location.href;
	jQuery('.entry-content blockquote').each(function() {
		text = encodeURIComponent(jQuery(this).text());
		twitter = '<div class="tweet"><a href = "https://twitter.com/share?ref_src=twsrc%5Etfw" data-text="'+jQuery(this).text()+'" data-url="'+url+'" data-via="adfintl" class="twitter-share-button">Tweet</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script></div>';
		jQuery(this).append(twitter);
	});
}
function catDropdown() {
	jQuery('.cat-dropdown').click(function(e) {
		e.preventDefault();
		jQuery(this).parent('.archive-dropdown').toggleClass('expanded');
		//jQuery(this).siblings('ul').slideToggle(200);
	});
}
function tabSelection() {
	jQuery('.tabs').on("_after", function() {
		if(jQuery(this).children('ul').children('li:last').is('.active')) {
			jQuery(this).children('ul').children('li:first').addClass('visible');
		} else {
			jQuery(this).children('ul').children('li:first').removeClass('visible');
		}
	});
}
function pictureGallery() {
	jQuery('.pic-list a').click(function(e) {
		e.preventDefault();
		src = jQuery(this).data('src');
		caption = jQuery(this).data('caption');
		jQuery(this).parents('.picture-gallery').find('.pic-main img').attr('src',src);
		if(caption) {
			jQuery(this).parents('.picture-gallery').find('.pic-caption').text(caption);
		} else {
			jQuery(this).parents('.picture-gallery').find('.pic-caption').text('');
		}
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
function articleHeights() {
	var currentHeight = 0;
	var maxHeight = 0;
	jQuery('.article-list').each(function() {
		var currentHeight = 0;
		var maxHeight = 0;
		jQuery('li a', this).each(function() {
			currentHeight = jQuery(this).outerHeight();
			if(currentHeight > maxHeight) {
				maxHeight = currentHeight;
				}
			});
		jQuery('li a', this).css('height', maxHeight);
	});
}
function boxHeight() {
	var currentHeight = 0;
	var maxHeight = 0;
	jQuery('.three-boxes').each(function() {
		var currentHeight = 0;
		var maxHeight = 0;
		jQuery('li', this).each(function() {
			currentHeight = jQuery(this).outerHeight();
			if(currentHeight > maxHeight) {
				maxHeight = currentHeight;
			}
		});
		jQuery('li', this).css('height', maxHeight);
	});
}
function smoothscroll() {
	jQuery('a[href*="#section"]')
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
function subscribeLabel() {
	jQuery('.newsletter .email-field input').keyup(function(e) {
		jQuery(this).parents('.ginput_container').siblings('.gfield_label').css('display','none');
	});
}
function toTop() {
	var target = jQuery("#content").offset().top,
	timeout = null;
	jQuery(window).scroll(function () {
	    if (!timeout) {
	        timeout = setTimeout(function () {
	            console.log('scroll');
	            clearTimeout(timeout);
	            timeout = null;
	            if (jQuery(window).scrollTop() >= target) {
	                jQuery('#trigger-top').addClass('active');
	            } else {
					jQuery('#trigger-top').removeClass('active');
				}
	        }, 250);
	    }
	});
}
function showModule() {
	jQuery('.show-hidden').click(function(e) {
		jQuery(this).parents('[id*="section"]').next('.hidden-module').slideToggle();
		e.preventDefault();
	});
}
jQuery(document).ready(function() {
	var vw = jQuery(window).width();
	if (vw > 800) {

	}
	toTop();
	smoothscroll();
	hideCookie();
	topDropdowns();
	navOpen();
	navClose();
	dropdowns();
	jQuery('.fitvids').fitVids();
	tweetButton();
	catDropdown();
	jQuery('.tabs').tabslet();
	tabSelection();
	pictureGallery();
	modalVideo();
	closeModal();
	subscribeLabel();
	showModule();
});

jQuery(window).load(function() {
	articleHeights();
	boxHeight();
});

jQuery(window).resize(function() {
	var vw = jQuery(window).width();
	if (vw < 800) {

	}
});
