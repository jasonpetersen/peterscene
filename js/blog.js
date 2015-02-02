var main = function() {
    //re-position the leaf to be within the last element of the blog entry
    $('.leaf').appendTo($('.leaf').prev());
    //the months are hidden by default in the CSS, but show the current month
    $('.current').parent().show();
    $('.current').parent().parent().find('i').removeClass('fa-plus-square-o');
    $('.current').parent().parent().find('i').addClass('fa-minus-square-o');
    //make the all entries clicking work
	$('.mClick').click(function() {
    	$(this).parent().find('ul').toggle();
    	if ($(this).find('i').hasClass('fa-plus-square-o')) {
    		$(this).find('i').removeClass('fa-plus-square-o');
    		$(this).find('i').addClass('fa-minus-square-o');
    	} else {
    		$(this).find('i').removeClass('fa-minus-square-o');
    		$(this).find('i').addClass('fa-plus-square-o');
    	}
	});
    //make the expand all/collapse all buttons work
    $('.collapse-all').click(function() {
        $('.archive_posts').hide();
        $('.mClick').find('i').removeClass('fa-minus-square-o');
        $('.mClick').find('i').addClass('fa-plus-square-o');
    });
    $('.expand-all').click(function() {
        $('.archive_posts').show();
        $('.mClick').find('i').removeClass('fa-plus-square-o');
        $('.mClick').find('i').addClass('fa-minus-square-o');
    });
};

$(document).ready(main);
