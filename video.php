<!DOCTYPE html>
<html lang="en">
	<head>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/head.php'; ?>
		<link rel="stylesheet" href="/royalslider/royalslider.css">
		<link rel="stylesheet" href="/royalslider/skins/default/rs-default.css">
		<title><?php echo NONTEMPLATETITLE; ?></title>
		<meta name="description" content="<?php echo NONTEMPLATEDESC; ?>">
		<style>
			#video-gallery {
				width: 100%;
			}
			
			.videoGallery .rsTmb {
				padding: 20px;
			}
			
			.videoGallery .rsThumbs .rsThumb {
				width: 220px;
				height: 80px;
				border-bottom: 1px solid #2E2E2E;
			}
			
			.videoGallery .rsThumbs {
				width: 220px;
				padding: 0;
			}
			
			.videoGallery .rsThumb:hover {
				background: #000;
			}
			
			.videoGallery .rsThumb.rsNavSelected {
				background-color: #b73336;
				border-bottom:-color #b73336;
			}
			
			.sampleBlock {
				left: 3%; 
				top: 1%; 
				width: 100%;
				max-width: 400px;
			}
			
			.rsVideoContainer {
				width:100%; 
				height:100%; 
				overflow:hidden; 
				display:block; 
				float:left; 
			}
			
			@media screen and (min-width: 0px) and (max-width: 500px) {
				.videoGallery .rsTmb {
					padding: 6px 8px;
				}
				.videoGallery .rsTmb h5 {
					font-size: 12px;
					line-height: 17px;
				}
				.videoGallery .rsThumbs.rsThumbsVer {
					width: 100px;
					padding: 0;
				}
				.videoGallery .rsThumbs .rsThumb {
					width: 100px;
					height: 47px;
				}
				.videoGallery .rsTmb span {
					display: none;
				}
				.videoGallery .rsOverflow,
				.royalSlider.videoGallery {
					height: 300px !important;
				}
				.sampleBlock {
					font-size: 14px;
				}
			}
		</style>
	</head>
	<body id="video" class="body-bright">
<?php include $_SERVER['DOCUMENT_ROOT'] . '/top.php'; ?>
		<div class="container">
			<div class="row">
				<div class="<?php echo GRIDBUCKET; ?> spacious2">
					<!-- actual slider code -->
					<div id="video-gallery" class="royalSlider videoGallery rsDefault">
						<a class="rsImg" data-rsVideo="http://vimeo.com/112184942" href="/images/torma.jpg">
							<div class="rsTmb">
								<h5>Torma</h5>
								<span>Feature documentary</span>
							</div>
						</a>
						<a class="rsImg" data-rsVideo="https://www.youtube.com/watch?v=VWeyNW-gIrA" href="/images/giving-tuesday.jpg">
							<div class="rsTmb">
								<h5>Giving Tuesday</h5>
								<span>Fundraising video</span>
							</div>
						</a>
						<a class="rsImg" data-rsVideo="https://www.youtube.com/watch?v=x_ONeOTJyZM" href="/images/family-day.jpg">
							<div class="rsTmb">
								<h5>Family Day at KTD</h5>
								<span>Promotional/fundraising</span>
							</div>
						</a>
						<a class="rsImg" data-rsVideo="https://www.youtube.com/watch?v=kS4QhgUSk08" href="/images/sang-puja.jpg">
							<div class="rsTmb">
								<h5>Sang Puja</h5>
								<span>Archival</span>
							</div>
						</a>
						<a class="rsImg" data-rsVideo="https://www.youtube.com/watch?v=Gls9fmhHCFE" href="/images/rent-check.jpg">
							<div class="rsTmb">
								<h5>Rent Check</h5>
								<span>Sketch comedy</span>
							</div>
						</a>
						<!--<div class="rsContent">
							<a class="rsImg" data-rsVideo="https://vimeo.com/31240369" href="http://b.vimeocdn.com/ts/210/393/210393954_640.jpg">
								<div class="rsTmb">
									<h5>I Believe I Can Fly</h5>
									<span>by sebastien montaz-rosset</span>
								</div>
							</a>
							<h3 class="rsABlock sampleBlock">Animated block.</h3>
						</div>-->
					</div>
					<!-- end slider code -->
					<div class="hr-small visible-xs"></div>
				</div>
				<div id="sidebar" class="<?php echo GRIDSIDEBAR; ?>">
					<p><img src="/images/hal.jpg" alt="HAL 9000" class="img-circle" width="100" height="100"></p>
					<div class="spacer10"></div>
					<h5>More Resources</h5>
					<ul class="sideV">
						<li><a href="https://www.youtube.com/user/jpetersen13/videos" target="_blank">YouTube Channel <i class="fa fa-external-link"></i></a></li>
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
		<script src="/royalslider/jquery.royalslider.min.js"></script>
		<script>
			jQuery(document).ready(function($) {
				$('#video-gallery').royalSlider({
					arrowsNav: false,
					fadeinLoadedSlide: true,
					controlNavigationSpacing: 0,
					controlNavigation: 'thumbnails',
					thumbs: {
						autoCenter: false,
						fitInViewport: true,
						orientation: 'vertical',
						spacing: 0,
						paddingBottom: 0
					},
					keyboardNavEnabled: true,
					imageScaleMode: 'fill',
					imageAlignCenter:true,
					slidesSpacing: 0,
					loop: false,
					loopRewind: true,
					numImagesToPreload: 3,
					video: {
						autoHideArrows:true,
						autoHideControlNav:false,
						autoHideBlocks: true
					}, 
					autoScaleSlider: true, 
					autoScaleSliderWidth: 960,	 
					autoScaleSliderHeight: 450,

					/* size of all images http://help.dimsemenov.com/kb/royalslider-jquery-plugin-faq/adding-width-and-height-properties-to-images */
					imgWidth: 640,
					imgHeight: 360
				});
			});
		</script>
	</body>
</html>
