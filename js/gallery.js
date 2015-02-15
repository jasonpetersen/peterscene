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

	/*// Load recent photos from flickr:
	$.ajax({
		url: 'https://api.flickr.com/services/rest/',
		data: {
			format: 'json',
			method: 'flickr.people.getPublicPhotos',
			api_key: 'f6df78a7a3c8d3ae6bc1e6b5f07ee03b',
			user_id: '53810078@N07'
		},
		dataType: 'jsonp',
		jsonp: 'jsoncallback'
	}).done(function (result) {
		var linksContainer = $('#links'),
			baseUrl;
		// Add the demo images as links with thumbnails to the page:
		$.each(result.photos.photo, function (index, photo) {
			baseUrl = 'http://farm' + photo.farm + '.static.flickr.com/' +
			   photo.server + '/' + photo.id + '_' + photo.secret;
			$('<a/>')
				.append($('<img>').prop('src', baseUrl + '_s.jpg'))
				.prop('href', baseUrl + '_b.jpg')
				.prop('title', photo.title)
				.attr('data-gallery', '')
				.appendTo(linksContainer);
		});
	});*/
	// call select photos and build them into the links div
	var photoDisp = [
		['http://farm4.staticflickr.com/3941/14972341353_dabdd94bf4', 'Hudson Valley panorama. Woodstock, NY.'],
		['http://farm4.staticflickr.com/3943/15592493405_ff11386b55', 'A successful hike. Woodstock, NY.'],
		['http://farm8.staticflickr.com/7467/15864210630_23d683a3a7', 'A soulful gaze. Willow, NY.'],
		['http://farm4.staticflickr.com/3939/15589811491_324b38a6e7', 'Vanderbilt Mansion. Hyde Park, NY.'],
		['http://farm4.staticflickr.com/3936/14971756474_71fe7fea51', 'A storm brews. Woodstock, NY.'],
		['http://farm8.staticflickr.com/7470/15475814260_71f2b42b50', 'Michael H. Woodstock, NY.'],
		['http://farm3.staticflickr.com/2810/11439275644_74ac136778', 'A cheerful doorman. Woodstock, NY.'],
		['http://farm8.staticflickr.com/7414/16332221866_019f7cd91b', 'A misty snow-covered sunset. Woodstock, NY.'],
		['http://farm3.staticflickr.com/2899/14637195778_6737fa1eac', 'Gridlock. Bangkok, Thailand.'],
		['http://farm4.staticflickr.com/3835/14944609542_3832b8e716', 'Near sunset. Chiang Mai, Thailand.'],
		['http://farm6.staticflickr.com/5587/15069211645_7783b3a66b', 'View from the top floor. Chiang Mai, Thailand.'],
		['http://farm6.staticflickr.com/5160/14212387413_e01206dab5', 'Spiraling branches. Honolulu, HI.'],
		['http://farm8.staticflickr.com/7435/14005690057_8b09d09482', 'Monks at play. Oahu, HI.'],
		['http://farm6.staticflickr.com/5567/14188942431_1fe04d8663', 'Striking a pose. Oahu, HI'],
		['http://farm9.staticflickr.com/8504/8415773560_9ac02590b8', 'JBG. Annecy, France.'],
		['http://farm9.staticflickr.com/8472/8415781582_bca67ab09f', 'The Eiffel Tower. Paris, France.'],
		['http://farm9.staticflickr.com/8229/8415771198_0f8856bcb2', 'Statue at the Louvre. Paris, France.'],
		['http://farm9.staticflickr.com/8360/8288616074_33ed7d7f81', 'Rupas at Gyuto Monastery. Sidhbari, India.'],
		['http://farm9.staticflickr.com/8495/8287677181_20a25e765c', 'A dog named Lion. Bir, India.'],
		['http://farm9.staticflickr.com/8067/8287723983_301eaa1f77', 'Childhood'],
		['http://farm9.staticflickr.com/8214/8287729982_e6660461b9', 'Sunset above McLeod Ganj. Dharamcot, India.'],
		['http://farm9.staticflickr.com/8218/8287772570_a9c0c0a109', 'Reading in the dying light. McLeod Ganj, India.'],
		['http://farm9.staticflickr.com/8214/8286693903_4d9778382f', 'Lighting lamps at the Tsuglagkhang Temple. McLeod Ganj, India.'],
		['http://farm9.staticflickr.com/8350/8287655652_8ef16c4874', 'Above the town. Manali, India.'],
		['http://farm9.staticflickr.com/8048/8150443082_5bbc1e5036', 'The Taj Mahal. Agra, India.'],
		['http://farm8.staticflickr.com/7028/6660552987_bca3ea5431', 'Mani and Pearce. Los Angeles, CA.'],
		['http://farm7.staticflickr.com/6077/6088068345_55b13860a8', 'Thea and Maggie. Tam Dao, Vietnam.'],
		['http://farm7.staticflickr.com/6065/6062228410_9c5bf99689', 'Rice paddy. Mai Chau, Vietnam.'],
		['http://farm7.staticflickr.com/6191/6062014735_5f7ebfa6a6', 'A long way to the top. Mai Chau, Vietnam.'],
		['http://farm7.staticflickr.com/6210/6087952635_ca9881535d', 'Looming above the concert hall. Hanoi, Vietnam.'],
		['http://farm7.staticflickr.com/6062/6088459520_d4c480cc72', 'Silhouettes of the East. Hanoi, Vietnam.'],
		['http://farm7.staticflickr.com/6077/6061467975_c89f24b48d', 'The tribe mingles. Hanoi, Vietnma.'],
		['http://farm7.staticflickr.com/6142/5950703927_3ac2501d5e', 'The bride and groom. Larnaca, Cyprus.'],
		['http://farm7.staticflickr.com/6022/5951061554_3aeb4da632', 'Harry H. Larnaca, Cyprus.'],
		['http://farm7.staticflickr.com/6014/5951029140_38666b5439', 'What! Cyprus.'],
		['http://farm7.staticflickr.com/6040/5912398832_642c7a6fe1', 'Marionette and kids. Athens, Greece.'],
		['http://farm7.staticflickr.com/6041/5910942467_e8218d7c83', 'Grand decay. Athens, Greece.']
	];
	var linksContainer = $('#links'), u;
	$.each(photoDisp, function (index, value) {
		var u = value[0];
		var t = value[1];
		$('<a/>')
			.append($('<img>').prop('src', u + '_s.jpg'))
			.prop('href', u + '_b.jpg')
			.prop('title', t)
			.attr('data-gallery', '')
			.appendTo(linksContainer);
	});
	
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

	$('#image-gallery-button').on('click', function (event) {
		event.preventDefault();
		blueimp.Gallery($('#links a'), $('#blueimp-gallery').data());
	});
	
	$('#video-gallery-button').on('click', function (event) {
		event.preventDefault();
		blueimp.Gallery([
			{
				title: 'Sintel',
				href: 'http://media.w3.org/2010/05/sintel/trailer.mp4',
				type: 'video/mp4',
				poster: 'http://media.w3.org/2010/05/sintel/poster.png'
			},
			{
				title: 'Big Buck Bunny',
				href: 'http://upload.wikimedia.org/wikipedia/commons/7/75/' +
					'Big_Buck_Bunny_Trailer_400p.ogg',
				type: 'video/ogg',
				poster: 'http://upload.wikimedia.org/wikipedia/commons/thumb/7/70/' +
					'Big.Buck.Bunny.-.Opening.Screen.png/' +
					'800px-Big.Buck.Bunny.-.Opening.Screen.png'
			},
			{
				title: 'Elephants Dream',
				href: 'http://upload.wikimedia.org/wikipedia/commons/transcoded/8/83/' +
					'Elephants_Dream_%28high_quality%29.ogv/' +
					'Elephants_Dream_%28high_quality%29.ogv.360p.webm',
				type: 'video/webm',
				poster: 'http://upload.wikimedia.org/wikipedia/commons/thumb/9/90/' +
					'Elephants_Dream_s1_proog.jpg/800px-Elephants_Dream_s1_proog.jpg'
			},
			{
				title: 'LES TWINS - An Industry Ahead',
				href: 'http://www.youtube.com/watch?v=zi4CIXpx7Bg',
				type: 'text/html',
				youtube: 'zi4CIXpx7Bg',
				poster: 'http://img.youtube.com/vi/zi4CIXpx7Bg/0.jpg'
			},
			{
				title: 'KN1GHT - Last Moon',
				href: 'http://vimeo.com/73686146',
				type: 'text/html',
				vimeo: '73686146',
				poster: 'http://b.vimeocdn.com/ts/448/835/448835699_960.jpg'
			}
		], $('#blueimp-gallery').data());
	});

});
