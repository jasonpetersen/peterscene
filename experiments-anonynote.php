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
		<div class="container">
			<div class="status">
				<span class="status-msg"></span>
			</div>
			<div class="bucket"></div>
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
			// function to update status window
			function updateStatus(statusTxt) {
				// create timestamp
				var now = new Date();
				var time = [ now.getHours(), now.getMinutes(), now.getSeconds() ];
				// If seconds and minutes are less than 10, add a zero
				for ( var i = 1; i < 3; i++ ) {
					if ( time[i] < 10 ) {
						time[i] = "0" + time[i];
					}
				}
				$('.status-msg').html(time.join(":") + " " + statusTxt + "<br />" + $('.status-msg').html());
			}
			// function to create the first dialog window prompting the user to create or edit a notepad
			function buildOpenDialog() {
				updateStatus("Building home page");
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
					updateStatus("Scrubbing prior notepad");
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
						dataType : "html",
						// Code to run before the request begins
						beforeSend: function() {
							$('.active-div').css('pointer-events', 'none');
							updateStatus("Loading notepad...");
						},
						// Code to run if the request succeeds
						success: function(result) {
							updateStatus("Notepad '" + pad + "' loaded successfully!");
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
						},
						// Code to run if the request fails
						error: function(xhr, status, errorThrown) {
							$('.active-div').css('pointer-events', '');
							updateStatus("Error loading notepad: " + errorThrown);
						}
						// Code to run regardless of success or failure
						//complete: function(xhr, status) {
						//	updateStatus("Status: " + status);
						//}
					});
				}
			}
			// function to create the edit note dialog
			function buildEdit(npad, nid) {
				$.ajax({
					url: buildURL,
					data: {
						method: "buildEdit",
						notepad: npad,
						noteid: nid
					},
					type: "GET",
					dataType : "html",
					beforeSend: function() {
						$('.active-div').css('pointer-events', 'none');
						updateStatus("Building edit window...");
					},
					success: function(result) {
						updateStatus("Edit window built successfully!");
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
					},
					error: function(xhr, status, errorThrown) {
						$('.active-div').css('pointer-events', '');
						updateStatus("Error building edit window: " + errorThrown);
					}
				});
			}
			// function to save a note
			function saveNote(ntpad, ntid) {
				if ($('#note-text').val() == "") {
					$('.note-error').html('You must enter something here.');
				} else {
					$.ajax({
						url: buildURL,
						data: {
							method: "saveNote",
							notepad: ntpad,
							noteid: ntid,
							notetext: encodeURIComponent($('#note-text').val()),
							notecolor: $('#colorselector').val()
						},
						type: "GET",
						dataType : "html",
						beforeSend: function() {
							$('.active-div').css('pointer-events', 'none');
							updateStatus("Saving note...");
						},
						success: function(result) {
							updateStatus("Note saved successfully!");
							buildNotepad(ntpad, 'fade');
						},
						error: function(xhr, status, errorThrown) {
							$('.active-div').css('pointer-events', '');
							updateStatus("Error saving note: " + errorThrown);
						}
					});
				}
			}
			// function to delete a note
			function deleteNote(targetid) {
				$.ajax({
					url: buildURL,
					data: {
						method: "deleteNote",
						noteid: targetid
					},
					type: "GET",
					dataType : "html",
					beforeSend: function() {
						$('.active-div').css('pointer-events', 'none');
						updateStatus("Deleting note...");
					},
					success: function(result) {
						$('#id-' + targetid).fadeOut(speed, function() {
							$('#id-' + targetid).remove();
							if ($('#notes-table >tbody >tr').length == 0) {
								$('#notes-table').remove();
							}
							$('.active-div').css('pointer-events', '');
							updateStatus("Note successfully deleted!");
						});
					},
					error: function(xhr, status, errorThrown) {
						$('.active-div').css('pointer-events', '');
						updateStatus("Error deleting note: " + errorThrown);
					}
				});
			}
			// function to move an entry up or down in the order
			function reorderEntry(orderStr) {
				$.ajax({
					url: buildURL,
					data: {
						method: "reorderEntry",
						notepad: $('#this-notepad').html(),
						noteorder: orderStr
					},
					type: "GET",
					dataType : "html",
					beforeSend: function() {
						$('.active-div').css('pointer-events', 'none');
						updateStatus("Reordering notes...");
					},
					success: function(result) {
						updateStatus("Notes reordered successfully!");
					},
					error: function(xhr, status, errorThrown) {
						updateStatus("Error reordering notes: " + errorThrown);
					},
					complete: function() {
						$('.active-div').css('pointer-events', '');
					}
				});
			}
			// function to fully display a truncated note
			function readMore(whichid) {
				$('#id-'+whichid).find('.note-short').addClass('hidden');
				$('#id-'+whichid).find('.note-full').removeClass('hidden');
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
