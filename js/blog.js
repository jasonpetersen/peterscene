var main = function() {
    //the months are hidden by default in the CSS, but show the current month
    $('.current').parent().show();
    $('.current').parent().parent().find('i').removeClass('fa-plus-square-o');
    $('.current').parent().parent().find('i').addClass('fa-minus-square-o');
    //make the clicking work
	$('.months').click(function() {
    	$(this).find('ul').toggle();
    	if ($(this).find('i').hasClass('fa-plus-square-o')) {
    		$(this).find('i').removeClass('fa-plus-square-o');
    		$(this).find('i').addClass('fa-minus-square-o');
    	} else {
    		$(this).find('i').removeClass('fa-minus-square-o');
    		$(this).find('i').addClass('fa-plus-square-o');
    	}
	});
	//re-position the leaf to be within the last element of the blog entry
	$('.leaf').appendTo($('.leaf').prev());
};

$(document).ready(main);
