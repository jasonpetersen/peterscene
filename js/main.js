var main = function() {
	// The back-to-top link is hidden by default. Show it if the document size is 2x or more of the window size.
	function displayTopLink() {
		if (($(document).height() / $(window).height()) > 2) {
			if ($('#backToTop').is(":hidden")) $('#backToTop').show();
		} else {
			if ($('#backToTop').is(":visible")) $('#backToTop').hide();
		}
	}
	$(window).resize(displayTopLink);
	displayTopLink();
	// Animate the back-to-top action
	$('#backToTop a').click(function (e) {
		e.preventDefault();
		$('body,html').animate({
			scrollTop: 0
		}, 800);
		return false;
	});
};

$(document).ready(main);
