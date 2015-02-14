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
    var photoDisp = [];
    photoDisp[0]=[];
    photoDisp[0]['baseurl']='http://farm8.staticflickr.com/7414/16332221866_019f7cd91b';
    photoDisp[0]['title']='A misty snow-covered sunset';
    photoDisp[1]=[];
    photoDisp[1]['baseurl']='http://farm3.staticflickr.com/2899/14637195778_6737fa1eac';
    photoDisp[1]['title']='Bangkok traffic';
    photoDisp[2]=[];
    photoDisp[2]['baseurl']='http://farm4.staticflickr.com/3835/14944609542_3832b8e716';
    photoDisp[2]['title']='Near sunset in Chiang Mai';
    photoDisp[3]=[];
    photoDisp[3]['baseurl']='http://farm6.staticflickr.com/5587/15069211645_7783b3a66b';
    photoDisp[3]['title']='Chiang Mai residence view';
    photoDisp[4]=[];
    photoDisp[4]['baseurl']='http://farm6.staticflickr.com/5160/14212387413_e01206dab5';
    photoDisp[4]['title']='Honolulu tree';
    photoDisp[5]=[];
    photoDisp[5]['baseurl']='http://farm8.staticflickr.com/7435/14005690057_8b09d09482';
    photoDisp[5]['title']='Monks at play on Oahu';
    photoDisp[6]=[];
    photoDisp[6]['baseurl']='http://farm6.staticflickr.com/5567/14188942431_1fe04d8663';
    photoDisp[6]['title']='Striking a pose';
    photoDisp[7]=[];
    photoDisp[7]['baseurl']='http://farm9.staticflickr.com/8504/8415773560_9ac02590b8';
    photoDisp[7]['title']='Annecy, France';
    photoDisp[8]=[];
    photoDisp[8]['baseurl']='http://farm9.staticflickr.com/8472/8415781582_bca67ab09f';
    photoDisp[8]['title']='The Eiffel Tower';
    photoDisp[9]=[];
    photoDisp[9]['baseurl']='http://farm9.staticflickr.com/8229/8415771198_0f8856bcb2';
    photoDisp[9]['title']='Statue at the Louvre';
    photoDisp[10]=[];
    photoDisp[10]['baseurl']='http://farm9.staticflickr.com/8360/8288616074_33ed7d7f81';
    photoDisp[10]['title']='Rupas at Gyuto Monastery in India';
    photoDisp[11]=[];
    photoDisp[11]['baseurl']='http://farm9.staticflickr.com/8495/8287677181_20a25e765c';
    photoDisp[11]['title']='A dog named Lion. Bir, India.';
    photoDisp[12]=[];
    photoDisp[12]['baseurl']='http://farm9.staticflickr.com/8067/8287723983_301eaa1f77';
    photoDisp[12]['title']='Childhood';
    var linksContainer = $('#links'), u;
    $.each(photoDisp, function (index1, value1) {
        var u = value1['baseurl'];
        var t = value1['title'];
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
