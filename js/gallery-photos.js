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
		['http://farm6.staticflickr.com/5567/14188942431_1fe04d8663', 'Posing for a photo. Oahu, HI'],
		['http://farm9.staticflickr.com/8504/8415773560_9ac02590b8', 'JBG. Annecy, France.'],
		['http://farm9.staticflickr.com/8472/8415781582_bca67ab09f', 'The Eiffel Tower. Paris, France.'],
		['http://farm9.staticflickr.com/8229/8415771198_0f8856bcb2', 'Statue at the Louvre. Paris, France.'],
		['http://farm9.staticflickr.com/8360/8288616074_33ed7d7f81', 'Rupas at Gyuto Monastery. Sidhbari, India.'],
		['http://farm9.staticflickr.com/8495/8287677181_20a25e765c', 'A dog named Lion. Bir, India.'],
		['http://farm9.staticflickr.com/8067/8287723983_301eaa1f77', 'Childhood. Bir, India.'],
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
		['http://farm7.staticflickr.com/6041/5910942467_e8218d7c83', 'Grand decay. Athens, Greece.'],
		['http://farm7.staticflickr.com/6009/5883425693_6966a596d1', 'Man and nature. Naxos, Greece.'],
		['http://farm6.staticflickr.com/5302/5883434359_73cf94bb28', 'The cat\'s abode. Naxos, Greece.'],
		['http://farm4.staticflickr.com/3338/5824302612_01696686ab', 'Julia and Tosca. Goreme, Turkey.'],
		['http://farm6.staticflickr.com/5040/5820736870_fc711231ab', 'Reaching for the heavens. Goreme, Turkey.'],
		['http://farm3.staticflickr.com/2802/5800714174_00d38b6ce2', 'Pathway to paradise. Istanbul, Turkey.'],
		['http://farm3.staticflickr.com/2759/5799541847_87b4fc10b5', 'Birth. Nis, Serbia.'],
		['http://farm6.staticflickr.com/5146/5800083318_f411c37e76', 'Spring in dusk. Nis, Serbia.'],
		['http://farm6.staticflickr.com/5030/5758803735_3e7b82004f', 'Urban decay. Sarajevo, Bosnia.'],
		['http://farm6.staticflickr.com/5108/5758743425_4c4cd4184e', 'New friends. Sarajevo, Bosnia.'],
		['http://farm3.staticflickr.com/2464/5758620381_86444f8bb3', 'Minh takes a jump. Mostar, Bosnia.'],
		['http://farm3.staticflickr.com/2216/5733470815_a956f05835', 'Taking it all in. Hvar, Croatia.'],
		['http://farm4.staticflickr.com/3466/5734034458_a11be184eb', 'The watch. Hvar, Croatia.'],
		['http://farm4.staticflickr.com/3533/5716326204_c711c725fe', 'Reaching for heaven. Zadar, Croatia.'],
		['http://farm3.staticflickr.com/2423/5699088447_d53b223a3b', 'The astronomical clock tower. Prague, Czech Republic.'],
		['http://farm6.staticflickr.com/5104/5672950226_d3d2c0cc6d', 'The Salt King. Krakow, Poland.'],
		['http://farm6.staticflickr.com/5230/5672441481_e2c5f3b4b8', 'Breaking through. Krakow, Poland.'],
		['http://farm6.staticflickr.com/5267/5654654302_e7b0e71987', 'Parliament. Budapest, Hungary.'],
		['http://farm6.staticflickr.com/5262/5644150712_8033c82a4c', 'Alien. Koh Chang, Thailand.'],
		['http://farm6.staticflickr.com/5189/5643618169_d6e790b382', 'Sunset from the bluffs. Koh Chang, Thailand.'],
		['http://farm6.staticflickr.com/5304/5550006108_3ea277fdb5', 'Waiting. Inle, Myanmar.'],
		['http://farm6.staticflickr.com/5307/5550050190_1888583a6c', 'A small cyclone. Bagan, Myanmar.'],
		['http://farm6.staticflickr.com/5060/5549654799_133b7a01b9', 'Buddha. Bagan, Myanmar.'],
		['http://farm6.staticflickr.com/5310/5549255197_04987158c9', 'A beer, a bridge, and a sunset. Amarapura, Myanmar.'],
		['http://farm6.staticflickr.com/5295/5549283203_8788873e85', 'Friends. Myanmar.'],
		['http://farm6.staticflickr.com/5016/5477376287_17c40af8b2', 'Carrying the flame. Kathmandu, Nepal.'],
		['http://farm6.staticflickr.com/5248/5377864421_102e21de85', 'Fear. Pokhara, Nepal.'],
		['http://farm6.staticflickr.com/5166/5271301016_5e4f56ec9f', 'A splash of color in the gloom. Pai, Thailand.'],
		['http://farm6.staticflickr.com/5242/5256994831_d019f387c3', 'Flaking gold leaf. Chiang Mai, Thailand.'],
		['http://farm6.staticflickr.com/5043/5245546672_a5a88563d0', 'Horse in shadow. Lopburi, Thailand.'],
		['http://farm6.staticflickr.com/5246/5244130012_d6afdedc3f', 'Angkor Wat at dawn. Angkor, Cambodia.'],
		['http://farm6.staticflickr.com/5005/5244315160_e6851203cf', 'A snippet of Angkor. Angkor, Cambodia.']
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

});
