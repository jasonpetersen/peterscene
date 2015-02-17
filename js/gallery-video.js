/*
 * Bootstrap Image Gallery JS Demo 3.0.1
 * https://github.com/blueimp/Bootstrap-Image-Gallery
 *
 * Copyright 2013, Sebastian Tschan
 * https://blueimp.net
 *
 * Licensed under the MIT license:
 * http://www.opensource.org/licenses/MIT
 */

/*jslint unparam: true */
/*global blueimp, $ */

$(function () {
	//'use strict';
	
	$('#fullscreen-checkbox').on('change', function () {
		var fullscreen = $(this).is(':checked');
		$('#blueimp-gallery').data('fullScreen', $(this).is(':checked'));
		$('#fullscreen-btn').toggleClass('btn-danger', !fullscreen);
		$('#fullscreen-btn').toggleClass('btn-success', fullscreen);
		if (fullscreen == true) {
			$('#fsBtnTxt').html('Fullscreen On');
		} else {
			$('#fsBtnTxt').html('Fullscreen Off');
		}
	});
	
	$('#video-gallery-button').on('click', function (event) {
		event.preventDefault();
		blueimp.Gallery([
			{
				title: 'Torma',
				href: 'http://vimeo.com/112184942',
				type: 'text/html',
				vimeo: '112184942',
				poster: '/images/torma.jpg'
			},
			{
				title: 'KTD Monastery Giving Tuesday Campaign',
				href: 'http://www.youtube.com/watch?v=VWeyNW-gIrA',
				type: 'text/html',
				youtube: 'VWeyNW-gIrA',
				poster: '/images/giving-tuesday.jpg'
			},
			{
				title: 'Family Day at KTD Monastery',
				href: 'http://www.youtube.com/watch?v=x_ONeOTJyZM',
				type: 'text/html',
				youtube: 'x_ONeOTJyZM',
				poster: '/images/family-day.jpg'
			},
			{
				title: 'Sang Puja: a cleansing smoke offering',
				href: 'http://www.youtube.com/watch?v=kS4QhgUSk08',
				type: 'text/html',
				youtube: 'kS4QhgUSk08',
				poster: '/images/sang-puja.jpg'
			},
			{
				title: 'Rent Check',
				href: 'http://www.youtube.com/watch?v=Gls9fmhHCFE',
				type: 'text/html',
				youtube: 'Gls9fmhHCFE',
				poster: '/images/rent-check.jpg'
			}
		], $('#blueimp-gallery').data());
	});

});
