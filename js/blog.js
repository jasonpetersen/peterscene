var main = function() {
	$('.archive_month ul').hide();
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
};

$(document).ready(main);
