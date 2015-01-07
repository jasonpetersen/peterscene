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
	'use strict';

	$('#fullscreen-checkbox').on('change', function () {
		var fullscreen = $(this).is(':checked');
		$('#blueimp-gallery').data('fullScreen', $(this).is(':checked'));
		$('#fullscreen-btn').toggleClass('btn-danger', !fullscreen);
		$('#fullscreen-btn').toggleClass('btn-success', fullscreen);
	});

	$('#image-gallery-button').on('click', function (event) {
		event.preventDefault();
		blueimp.Gallery($('#links a'), $('#blueimp-gallery').data());
	});

});
