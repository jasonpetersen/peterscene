<!DOCTYPE html>
<html lang="en">
	<head>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/head.php'; ?>
		<link rel="stylesheet" href="/css/blueimp-gallery.min.css">
		<link rel="stylesheet" href="/css/bootstrap-image-gallery.min.css">
	</head>
	<body id="video" class="body-bright">
<?php include $_SERVER['DOCUMENT_ROOT'] . '/top.php'; ?>
		<div class="container">
			<div class="row">
				<div class="<?php echo GRIDBUCKET; ?>">
					<div class="spacious2">
						<h3>Video portfolio</h3>
						<p>A film major by education, but a student of cinema <span class="ital">in perpetuam</span>. I am deeply versed in the craft, with an emphasis on editing and camera work.</p>
						<p>Click the headings below to learn more about my recent projects.<span class="hidden-xs"> Alternatively, browse through my work in a Lightbox using the buttons below.</span></p>
					</div>
					<form class="form-inline hidden-xs">
						<div class="form-group">
							<button id="video-gallery-button" type="button" class="btn btn-primary">
								<i class="glyphicon glyphicon-film"></i>
								Launch Video Lightbox
							</button>
						</div>
						<div class="btn-group" data-toggle="buttons">
							<label id="fullscreen-btn" class="btn btn-danger">
								<i class="glyphicon glyphicon-fullscreen"></i>
								<input id="fullscreen-checkbox" type="checkbox"> <span id="fsBtnTxt">Fullscreen Off</span>
							</label>
						</div>
					</form>
					<div class="spacer20 hidden-xs"></div>
					<!-- The Bootstrap Image Gallery lightbox, should be a child element of the document body -->
					<div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls" data-you-tube-click-to-play="false" data-vimeo-click-to-play="false" data-use-bootstrap-modal="false">
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
					<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
						<div class="panel panel-default">
							<a class="panel-heading-wrap" href="#video-1" data-toggle="collapse" data-parent="#accordion" aria-expanded="true" aria-controls="video-1">
								<div class="panel-heading" role="tab" id="heading-1">
									<h4 class="panel-title">Torma</h4>
								</div>
							</a>
							<div id="video-1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading-1">
								<div class="panel-body">
									<div class="row">
										<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
											<h4>Torma</h4>
											<ul class="no-bullet">
												<li><span class="ital">Feature-length documentary</span></li>
												<li>Year: 2014</li>
												<li>Producer: Yeshe Wangmo (Mary Young)</li>
												<li>Editor: <a href="http://www.livingfilms.com/partners/georg-peter-muller/" target="_blank">Georg Peter M&uuml;ller&nbsp;<i class="fa fa-external-link"></i></a></li>
												<li>Produced at <span class="bold">Living Films</span> in Thailand: <a href="http://www.livingfilms.com/" target="_blank">livingfilms.com&nbsp;<i class="fa fa-external-link"></i></a></li>
												<li>Official website: <a href="http://tormafilm.com/" target="_blank">tormafilm.com&nbsp;<i class="fa fa-external-link"></i></a></li>
											</ul>
										</div>
										<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
											<div class="spacer20 visible-xs visible-sm"></div>
											<div class="embed-responsive embed-responsive-16by9">
												<iframe class="embed-responsive-item" src="http://player.vimeo.com/video/112184942?byline=0&portrait=0" frameborder="no" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
											</div>
										</div>
									</div>
									<div class="row spacious2">
										<div class="col-xs-12">
											<div class="hr-small"></div>
											<p>I spent much of 2014 working on <span class="ital">Torma</span>, first as an editor, and later, when post-production moved to Thailand, as an Associate Producer and Technical Consultant. I was one of three people in the editing room shaping the film into its final form.</p>
											<p>I offered my technical expertise in the opening and closing animations, done in After Effects. The source material required considerable prep work, including frame rate conversion, which I executed. I also performed Quality Control on the finished product.</p>
											<p>I am involved in distribution on an ongoing basis. I produced both the DVD and the Vimeo encode, and have set up public screenings. Everything you need to know about seeing this film can be found at the official website, <a href="http://tormafilm.com/" target="_blank">tormafilm.com</a>.</p>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="panel panel-default">
							<a class="panel-heading-wrap collapsed" href="#video-2" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="video-2">
								<div class="panel-heading" role="tab" id="heading-2">
									<h4 class="panel-title">KTD Monastery Giving Tuesday Campaign</h4>
								</div>
							</a>
							<div id="video-2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading-2">
								<div class="panel-body">
									<div class="row">
										<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
											<h4>KTD Monastery Giving Tuesday Campaign</h4>
											<ul class="no-bullet">
												<li><span class="ital">Fundraising</span></li>
												<li>Year: 2014</li>
												<li>Client: Development Officer Anne Hulett</li>
												<li>Organization website: <a href="http://www.kagyu.org/" target="_blank">kagyu.org&nbsp;<i class="fa fa-external-link"></i></a></li>
												<li>Learn more: <a href="http://www.givingtuesday.org/" target="_blank">givingtuesday.org&nbsp;<i class="fa fa-external-link"></i></a></li>
											</ul>
										</div>
										<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
											<div class="spacer20 visible-xs visible-sm"></div>
											<div class="embed-responsive embed-responsive-16by9">
												<iframe class="embed-responsive-item" src="http://www.youtube.com/embed/VWeyNW-gIrA?rel=0" frameborder="no" allowfullscreen></iframe>
											</div>
										</div>
									</div>
									<div class="row spacious2">
										<div class="col-xs-12">
											<div class="hr-small"></div>
											<p>The initial idea that was presented to me was to simply get sound bites from the residents at KTD Monastery to help fundraise. But as I started filming, it quickly occurred to me that the B-roll was more personable and endearing. I continued filming rehearsed speech, but secretly put more effort into making the residents laugh.</p>
											<p>This video spoke to me early in the editing&mdash;it was clear what the structure had to be. I start by establishing the rehearsed nature of the video, punctuated by a moment a silence, as though to say, "where is this going?" Then there's a "good rehearsal" to bridge the gap between (basically) outtakes and the next few interviews, which have polished deliveries. Finally, I reward the viewer for entertaining those interviews by offering more goofy material.</p>
											<p>An effective fundraising video connects with people on an emotional level. What I wanted in the end was to show the true character of the organization and the people who keep it running.</p>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="panel panel-default">
							<a class="panel-heading-wrap collapsed" href="#video-3" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="video-3">
								<div class="panel-heading" role="tab" id="heading-3">
									<h4 class="panel-title">Family Day at KTD Monastery</h4>
								</div>
							</a>
							<div id="video-3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading-3">
								<div class="panel-body">
									<div class="row">
										<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
											<h4>Family Day at KTD Monastery</h4>
											<ul class="no-bullet">
												<li><span class="ital">Promotional</span></li>
												<li>Year: 2014</li>
												<li>Client: Development Officer Anne Hulett</li>
												<li>Organization website: <a href="http://www.kagyu.org/" target="_blank">kagyu.org&nbsp;<i class="fa fa-external-link"></i></a></li>
												<li>Learn more: <a href="http://www.bodhikids.org/" target="_blank">bodhikids.org&nbsp;<i class="fa fa-external-link"></i></a></li>
											</ul>
										</div>
										<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
											<div class="spacer20 visible-xs visible-sm"></div>
											<div class="embed-responsive embed-responsive-16by9">
												<iframe class="embed-responsive-item" src="http://www.youtube.com/embed/x_ONeOTJyZM?rel=0" frameborder="no" allowfullscreen></iframe>
											</div>
										</div>
									</div>
									<div class="row spacious2">
										<div class="col-xs-12">
											<div class="hr-small"></div>
											<p>The handheld camerawork on display here is meant to put the viewer in the shoes of the kids. The camera wanders up and down, side to side, and with more than a few rack-focuses. It's always wandering, like the attention span of a child.</p>
											<p>That was the only aspect of this video I was confident about upfront. I really struggled in the editing with what this video wanted to be. It was supposed to be for fundraising, but I felt like I was shoehorning it to that purpose.</p>
											<p>I eventually put together a fundraising version I was happy with, but I think this alternate version, which acts as a promotional piece, plays better.</p>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="panel panel-default">
							<a class="panel-heading-wrap collapsed" href="#video-4" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="video-4">
								<div class="panel-heading" role="tab" id="heading-4">
									<h4 class="panel-title">Sang Puja: a cleansing smoke offering</h4>
								</div>
							</a>
							<div id="video-4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading-4">
								<div class="panel-body">
									<div class="row">
										<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
											<h4>Sang Puja: a cleansing smoke offering</h4>
											<ul class="no-bullet">
												<li><span class="ital">Archival</span></li>
												<li>Year: 2014</li>
												<li>Client: KTD Monastery</li>
												<li>Organization website: <a href="http://www.kagyu.org/" target="_blank">kagyu.org&nbsp;<i class="fa fa-external-link"></i></a></li>
												<li>Learn more: <a href="http://www.kkcw.org/html/firepuja.html" target="_blank">kkcw.org&nbsp;<i class="fa fa-external-link"></i></a></li>
											</ul>
										</div>
										<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
											<div class="spacer20 visible-xs visible-sm"></div>
											<div class="embed-responsive embed-responsive-16by9">
												<iframe class="embed-responsive-item" src="http://www.youtube.com/embed/kS4QhgUSk08?rel=0" frameborder="no" allowfullscreen></iframe>
											</div>
										</div>
									</div>
									<div class="row spacious2">
										<div class="col-xs-12">
											<div class="hr-small"></div>
											<p>This is an on-the-ground perspective of a Tibetan Buddhist practice performed at KTD Monastery each year on Losar&mdash;the Tibetan New Year. This is not an instructional video; there is no voice over or on-screen text to help you understand what you're watching. I had never experienced this practice before&mdash;I didn't know what was happening&mdash;and neither does the viewer. The point of view is from my own eyes.</p>
											<p>The last shot, which I linger on for a good amount of time, was an after-thought later in the day when it was all over and everyone had gone home. There was so much activity centered around that hearth... then it had ended, and all that remained were the smoldering ashes. It was a perfect example of the Buddhist idea of the impermanence of all things.</p>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="panel panel-default">
							<a class="panel-heading-wrap collapsed" href="#video-5" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="video-5">
								<div class="panel-heading" role="tab" id="heading-5">
									<h4 class="panel-title">Rent Check</h4>
								</div>
							</a>
							<div id="video-5" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading-5">
								<div class="panel-body">
									<div class="row">
										<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
											<h4>Rent Check</h4>
											<ul class="no-bullet">
												<li><span class="ital">Sketch comedy</span></li>
												<li>Year: 2010</li>
												<li>Client: <a href="http://aaronandzik.com/" target="_blank">Aaron Andzik&nbsp;<i class="fa fa-external-link"></i></a></li>
												<li>Makeup: <a href="http://www.jessegeearts.com/" target="_blank">Jesse Gee&nbsp;<i class="fa fa-external-link"></i></a></li>
												<li>Original upload: <a href="http://www.funnyordie.com/videos/85d81756e4/rent-check" target="_blank">funnyordie.com&nbsp;<i class="fa fa-external-link"></i></a></li>
											</ul>
										</div>
										<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
											<div class="spacer20 visible-xs visible-sm"></div>
											<div class="embed-responsive embed-responsive-16by9">
												<iframe class="embed-responsive-item" src="http://www.youtube.com/embed/Gls9fmhHCFE?rel=0" frameborder="no" allowfullscreen></iframe>
											</div>
										</div>
									</div>
									<div class="row spacious2">
										<div class="col-xs-12">
											<div class="hr-small"></div>
											<p>Friends of mine in Los Angeles were involved in sketch comedy. I was the director of photography on this shoot, and served as editor.</p>
											<p>It's textbook cinematography: when events are still grounded, the camera is grounded. As soon as Aaron knocks out his roommate with the beer bottle, the camera goes handheld. Both characters have their respective sides of the frame and never cross.</p>
											<p>There's some minor digital trickery to sell the stabbing and the slicing.</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="hr-small visible-xs"></div>
				</div>
				<div id="sidebar" class="<?php echo GRIDSIDEBAR; ?>">
					<div>
						<img src="/images/kubrick.jpg" alt="Kubrick" class="img-circle" width="100" height="100">
					</div>
					<div>
						<h4>More Resources</h4>
						<ul class="side-v">
							<li><a href="https://www.youtube.com/user/jpetersen13/videos" target="_blank">YouTube Channel <i class="fa fa-external-link"></i></a></li>
						</ul>
					</div>
					<div>
						<h4>Connect</h4>
						<ul class="side-v">
							<li><a href="mailto:<?php echo CONTACTEMAIL; ?>"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> Email me</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/bottom.php'; ?>
		<!-- additional JS goes here -->
		<script src="/js/jquery.blueimp-gallery.min.js"></script>
		<script src="/js/bootstrap-image-gallery.min.js"></script>
		<script src="/js/gallery-video.js"></script>
		<script>
			$(function() {
				$('#accordion').accordion();
			});
		</script>
	</body>
</html>
