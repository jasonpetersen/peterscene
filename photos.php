<!DOCTYPE html>
<html lang="en">
	<head>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/head.php'; ?>
		<link rel="stylesheet" href="/css/blueimp-gallery.min.css">
		<link rel="stylesheet" href="/css/bootstrap-image-gallery.min.css">
		<title><?php echo NONTEMPLATETITLE; ?></title>
		<meta name="description" content="<?php echo NONTEMPLATEDESC; ?>">
	</head>
	<body id="photos" class="body-bright">
<?php include $_SERVER['DOCUMENT_ROOT'] . '/top.php'; ?>
		<div class="container">
			<div class="row">
				<div class="<?php echo GRIDBUCKET; ?> spacious2">
					<h3>Life as a photoshoot</h3>
					<p>I look at the world through a camera lens, whether I'm holding a camera or not. I frame the world I see, cutting away the periphery to focus on a well-composed window. The play of light, shadow, and color&mdash;the juxtaposition of foreground and background&mdash;the angle and the tilt&mdash;I see life constantly at play with my sensibilities as a photographer.</p>
					<h3>Recent photos</h3>
					<form class="form-inline">
						<!--<div class="form-group">
							<button id="video-gallery-button" type="button" class="btn btn-success btn-lg">
								<i class="glyphicon glyphicon-film"></i>
								Launch Video Gallery
							</button>
						</div>-->
						<div class="form-group">
							<button id="image-gallery-button" type="button" class="btn btn-primary btn-lg">
								<i class="glyphicon glyphicon-picture"></i>
								Launch Image Gallery
							</button>
						</div>
						<div class="btn-group hidden-xs" data-toggle="buttons">
							<label id="fullscreen-btn" class="btn btn-danger btn-lg">
								<i class="glyphicon glyphicon-fullscreen"></i>
								<input id="fullscreen-checkbox" type="checkbox"> <span id="fsBtnTxt">Fullscreen Off</span>
							</label>
						</div>
					</form>
					<br>
					<!-- The container for the list of manual images -->
					<div id="links">
						<!--<div class="row">
							<div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
								<a href="/images/404.gif" title="404" data-gallery>
									<img class="img-thumbnail" src="/images/404.gif" alt="404">
								</a>
							</div>
						</div>-->
					</div>
					<br>
					<!-- The Bootstrap Image Gallery lightbox, should be a child element of the document body -->
					<div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls">
						<!-- The container for the modal slides -->
						<div class="slides"></div>
						<!-- Controls for the borderless lightbox -->
						<h3 class="title"></h3>
						<a class="prev">‹</a>
						<a class="next">›</a>
						<a class="close">×</a>
						<a class="play-pause"></a>
						<ol class="indicator hidden-xs"></ol>
						<!-- The modal dialog, which will be used to wrap the lightbox content -->
						<div class="modal fade">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" aria-hidden="true">&times;</button>
										<h4 class="modal-title"></h4>
									</div>
									<div class="modal-body next"></div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default pull-left prev">
											<i class="glyphicon glyphicon-chevron-left"></i>
											Previous
										</button>
										<button type="button" class="btn btn-primary next">
											Next
											<i class="glyphicon glyphicon-chevron-right"></i>
										</button>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="hr-small visible-xs"></div>
				</div>
				<div id="sidebar" class="<?php echo GRIDSIDEBAR; ?>">
					<p><img src="/images/prague.jpg" alt="Prague metro" class="img-circle" width="100" height="100"></p>
					<div class="spacer10"></div>
					<h5>My Flickr page</h5>
					<ul class="sideV">
						<li>
							<a class="hidden-xs" href="https://www.flickr.com/photos/jasonpetersen" target="_blank">Photostream <i class="fa fa-external-link"></i></a>
							<a class="visible-xs" href="https://m.flickr.com/photos/jasonpetersen" target="_blank">Photostream <i class="fa fa-external-link"></i></a>
						</li>
						<li>
							<a class="hidden-xs" href="https://www.flickr.com/photos/jasonpetersen/sets/" target="_blank">Albums <i class="fa fa-external-link"></i></a>
							<a class="visible-xs" href="https://m.flickr.com/photos/jasonpetersen/sets/" target="_blank">Albums <i class="fa fa-external-link"></i></a>
						</li>
					</ul>
					<h5>Connect</h5>
					<ul class="sideV">
						<li><a href="mailto:<?php echo CONTACTEMAIL; ?>"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> Email me</a></li>
					</ul>
				</div>
			</div>
		</div>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/bottom.php'; ?>
		<!-- additional JS goes here -->
		<script src="/js/jquery.blueimp-gallery.min.js"></script>
		<script src="/js/bootstrap-image-gallery.min.js"></script>
		<script src="/js/gallery.js"></script>
	</body>
</html>
