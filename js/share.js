var main = function() {
	$('a.tweet').click(function(e){
		//We tell our browser not to follow that link
		e.preventDefault();
		//We get the URL of the link
		var loc = $(this).attr('href');
		//We get the title of the link
		var title = escape($(this).attr('page-title'));
		//We get the referrer of the link (me)
		var referrer = escape($(this).attr('via'));
		//We trigger a new window with the Twitter dialog, in the middle of the page
		window.open('http://twitter.com/share?url=' + loc + '&via=' + referrer + '&text=' + title, 'newwindow', 'height=450, width=550, top='+($(window).height()/2 - 225) +', left='+$(window).width()/2 +', toolbar=0, location=0, menubar=0, directories=0, scrollbars=0');
	});
	$('a.fbShare').click(function(e){
		e.preventDefault();
		var loc = $(this).attr('href');
		var title = escape($(this).attr('page-title'));
		window.open('http://www.facebook.com/sharer/sharer.php?u=' + loc + '&title=' + title, 'newwindow', 'height=450, width=550, top='+($(window).height()/2 - 225) +', left='+$(window).width()/2 +', toolbar=0, location=0, menubar=0, directories=0, scrollbars=0');
	});
	$('a.googleShare').click(function(e){
		e.preventDefault();
		var loc = $(this).attr('href');
		window.open('https://plus.google.com/share?url=' + loc, 'newwindow', 'height=450, width=550, top='+($(window).height()/2 - 225) +', left='+$(window).width()/2 +', toolbar=0, location=0, menubar=0, directories=0, scrollbars=0');
	});
	
};

$(document).ready(main);
