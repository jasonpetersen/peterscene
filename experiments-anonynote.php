<?php

define("PAGETITLE", "Anonynote | " . SITENAME);
define("PAGEDESC", "A lightweight web app for anonymously saving and organizing notes.");

?>

<!DOCTYPE html>
<html lang="en">
	<head>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/head.php'; ?>
		<link rel="stylesheet" type="text/css" href="/css/notes.css" />
		<link rel="stylesheet" type="text/css" href="/css/bootstrap-colorselector.css" />
	</head>
	<body id="experiments" class="body-bright">
<?php include $_SERVER['DOCUMENT_ROOT'] . '/top.php'; ?>
		<div class="container bucket">
			<div class="status hidden" style="background-color: #eeeeee;">
				<p class="status-msg">&nbsp;</p>
			</div>
		</div>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/bottom.php'; ?>
		<!-- additional JS goes here -->
		<script src="//code.jquery.com/ui/1.11.3/jquery-ui.js"></script>
		<script src="/js/jquery.ui.touch-punch.min.js"></script>
		<script src="/js/bootstrap-colorselector.js"></script>
		<script src="/js/jquery.linkify.min.js"></script>
		<script>
			// define build URL
			var buildURL = "/experiments/anonynote-build";
			// define fade speed
			var speed = 600;
			// prevent default link actions from executing
			$('.bucket').on('click', 'a', function (e) {
				e.preventDefault();
			});
			// do not allow AJAX requests to be cached (because IE is silly)
			$.ajaxSetup({ cache: false });
			// function to create the first dialog window prompting the user to create or edit a notepad
			function buildOpenDialog() {
				$('<div>', {
					class: 'open-dialog'
				}).appendTo('.bucket');
				$('.open-dialog').hide();
				$('<img>', {
					src: '/images/anonynote-title.gif',
					alt: 'Anonynote',
					class: 'img-rounded img-responsive',
					width: '300',
					css: {
						'margin-bottom': '20px'
					}
				}).appendTo('.open-dialog');
				$('<div>', {
					class: 'form-group',
					css: {
						'width': '300px',
						'max-width': '100%'
					}
				}).appendTo('.open-dialog');
				$('<label>', {
					for: 'notepad',
					class: 'control-label',
					text: 'Enter a new or existing notepad name'
				}).appendTo('.form-group');
				$('<input>', {
					type: 'text',
					class: 'form-control notepad-name',
					name: 'notepad',
					maxlength: '20',
					placeholder: 'Case insensitive, 20 character limit',
					value: ''
				}).appendTo('.form-group');
				$('<p>', {
					class: 'text-danger open-error',
					text: ''
				}).appendTo('.form-group');
				$('<button>', {
					id: 'build-notepad',
					type: 'button',
					class: 'btn btn-primary',
					onclick: 'buildNotepad($(\'.notepad-name\').val().toLowerCase(), "fade");',
					text: 'Submit'
				}).appendTo('.open-dialog');
				// listen for enter key
				$('.notepad-name').keyup(function(e){
					if(e.keyCode == 13) {
						$('#build-notepad').click();
					}
				});
				if ($('.active-div').length) {
					$('.active-div').fadeOut(speed, function() {
						$('.active-div').remove();
						$('.open-dialog').fadeIn(speed, function() {
							$('.open-dialog').addClass('active-div');
						});
					});
				} else {
					$('.open-dialog').fadeIn(speed, function() {
						$('.open-dialog').addClass('active-div');
					});
				}
			}
			// call the first dialog window
			buildOpenDialog();
			// function to open the notepad specified by the user
			function buildNotepad(pad, arg) {
				if (pad == "") {
					$('.open-error').html('You must enter something here.');
				} else {
					$('.active-div').css('pointer-events', 'none');
					$.ajax({
						// The URL for the request
						url: buildURL,
						// The data to send (will be converted to a query string)
						data: {
							method: "buildNotepad",
							notepad: pad
						},
						// Whether this is a POST or GET request
						type: "GET",
						// The type of data we expect back
						//dataType : "json",
						// Code to run if the request succeeds;
						// the response is passed to the function
						success: function(result) {
							$('<div>', {
								class: 'notepad-main'
							}).appendTo('.bucket');
							$('.notepad-main').hide();
							$('.notepad-main').html(result);
							// linkify URLs
							$('.notepad-main').linkify({
								tagName: 'a',
								target: '_blank',
								newLine: '\n',
								linkClass: null,
								linkAttributes: null
							});
							// make the notes sortable
							$(function() {
								$('#sortable').sortable({
									cursor: "move",
									handle: ".sort-handle",
									delay: 150,
									distance: 5,
									placeholder: "sortable-placeholder",
									update: function(event, ui) {
										var newOrder = $('#sortable').sortable("toArray");
										reorderEntry(newOrder);
										$('.status-msg').html("Re-ordering...");
									}
								});
								//$('#sortable').disableSelection();
							});
							if (arg == "fade") {
								$('.active-div').fadeOut(speed, function() {
									$('.active-div').remove();
									$('.notepad-main').fadeIn(speed, function() {
										$('.notepad-main').addClass('active-div');
										defineWidths();
									});
								});
							} else {
								$('.active-div').remove();
								$('.notepad-main').show();
								$('.notepad-main').addClass('active-div');
								defineWidths();
							}
						}
						// Code to run if the request fails; the raw request and
						// status codes are passed to the function
						//error: function( xhr, status, errorThrown ) {
						//	alert( "Sorry, there was a problem!" );
						//	console.log( "Error: " + errorThrown );
						//	console.log( "Status: " + status );
						//	console.dir( xhr );
						//}
						// Code to run regardless of success or failure
						//complete: function( xhr, status ) {
							//alert( "The request is complete!" );
						//}
					});
				}
			}
			// function to create the edit note dialog
			function buildEdit(npad, nid) {
				$('.active-div').css('pointer-events', 'none');
				$.ajax({
					url: buildURL,
					data: {
						method: "buildEdit",
						notepad: npad,
						noteid: nid
					},
					type: "GET",
					success: function(result) {
						$('<div>', {
							class: 'edit-note'
						}).appendTo('.bucket');
						$('.edit-note').hide();
						$('.edit-note').html(result);
						// apply the colorselector plugin
						$('#colorselector').colorselector({
							callback: function (value, color, title) {
								$("#note-text").css('background-color', color);
							}
						});
						// end colorselector plugin
						$('.active-div').fadeOut(speed, function() {
							$('.active-div').remove();
							$('.edit-note').fadeIn(speed, function() {
								$('.edit-note').addClass('active-div');
							});
						});
					}
				});
			}
			// function to save a note
			function saveNote(ntpad, ntid) {
				if ($('#note-text').val() == "") {
					$('.note-error').html('You must enter something here.');
				} else {
					$('.active-div').css('pointer-events', 'none');
					$.ajax({
						url: buildURL,
						data: {
							method: "saveNote",
							notepad: ntpad,
							noteid: ntid,
							notetext: $('#note-text').val(),
							notecolor: $('#colorselector').val()
						},
						type: "GET",
						success: function(result) {
							$('.status-msg').html(codeToText(result));
							buildNotepad(ntpad, 'fade');
						}
					});
				}
			}
			// function to delete a note
			function deleteNote(targetid) {
				$('.active-div').css('pointer-events', 'none');
				$('.status-msg').html("Deleting...");
				$.ajax({
					url: buildURL,
					data: {
						method: "deleteNote",
						noteid: targetid
					},
					type: "GET",
					success: function(result) {
						$('#id-' + targetid).fadeOut(speed, function() {
							$('#id-' + targetid).remove();
							if ($('#notes-table >tbody >tr').length == 0) {
								$('#notes-table').remove();
							}
							$('.active-div').css('pointer-events', '');
							$('.status-msg').html(codeToText(result));
						});
					}
				});
			}
			// function to move an entry up or down in the order
			function reorderEntry(orderStr) {
				$('.active-div').css('pointer-events', 'none');
				$.ajax({
					url: buildURL,
					data: {
						method: "reorderEntry",
						notepad: $('#this-notepad').html(),
						noteorder: orderStr
					},
					type: "GET",
					success: function(result) {
						$('.status-msg').html(codeToText(result));
						$('.active-div').css('pointer-events', '');
					}
				});
			}
			// function to fully display a truncated note
			function readMore(whichid) {
				$('#id-'+whichid).find('.note-short').addClass('hidden');
				$('#id-'+whichid).find('.note-full').removeClass('hidden');
			}
			// function to interpret runtime codes as text
			function codeToText(codeid) {
				switch (codeid) {
					case "0":
						return "Something went wrong. Try again?";
						break;
					case "1":
						return "Success!";
						break;
					case "2":
						return "Something went wrong - reordering not saved.";
						break;
				}
			}
			// Define table cell widths. This is necessary for dragging to display correctly.
			function defineWidths() {
				$('td, th').each(function () {
					var cell = $(this);
					cell.width(cell.width());
				});
			}
		</script>
	</body>
</html>
