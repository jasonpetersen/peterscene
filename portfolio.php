<!DOCTYPE html>
<html lang="en">
	<head>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/head.php'; ?>
		<title><?php echo PAGETITLE; ?></title>
		<meta name="description" content="<?php echo PAGEDESC; ?>">
	</head>
	<body id="portfolio" class="body-bright">
<?php include $_SERVER['DOCUMENT_ROOT'] . '/top.php'; ?>
		<div class="container">
			<div class="row">
				<div class="<?php echo GRIDBUCKET; ?>">
					<div class="spacious2">
						<h3>Web portfolio</h3>
					</div>
					<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
						<div class="panel panel-default">
							<a class="panel-heading-wrap" href="#project-1" data-toggle="collapse" data-parent="#accordion" aria-expanded="true" aria-controls="project-1">
								<div class="panel-heading" role="tab" id="heading-1">
									<h4 class="panel-title">Redline Motorsports</h4>
								</div>
							</a>
							<div id="project-1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading-1">
								<div class="panel-body">
									<div class="row">
										<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
											<h4>Redline Motorsports</h4>
											<ul class="no-bullet">
												<li><span class="ital">Automotive parts and service</span></li>
												<li>Location: North Wales, PA</li>
												<li>URL: <a href="https://www.redlinemoto.com" target="_blank">redlinemoto.com&nbsp;<i class="fa fa-external-link"></i></a></li>
												<li>Dates: 2012 - present</li>
											</ul>
										</div>
										<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
											<div class="spacer20 visible-xs visible-sm"></div>
											<img src="/images/redlinemoto.jpg" class="img-responsive img-rounded" width="800" height="450" alt="redlinemoto.com">
										</div>
									</div>
									<div class="row spacious2">
										<div class="col-xs-12">
											<div class="hr-small"></div>
											<p>I have managed the Redline Motorsports online identity since 2007, from branding, to design, to sales.</p>
											<p>This latest incarnation of the website is built for e-commerce. To date, total sales exceed $45,000, and that is with a limited advertising budget. In addition, the success of this website has driven sales on other platforms, including Amazon and eBay.</p>
											<p>The company continues to grow and I look forward to being a creative force behind their online expansion. The next step is integrating Redline's various business ventures into a single online hub, as well as redesigning for a mobile-first presentation.</p>
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
						<img src="/images/matrix.jpg" alt="Code" class="img-circle" width="100" height="100">
					</div>
					<div>
						<h4>More Resources</h4>
						<p>Stop by my <a href="/experiments">Experiments</a> page to see what coding endeavors I'm pursuing in my free time.</p>
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
		<script>
			$(function() {
				$('#accordion').accordion();
			});
		</script>
	</body>
</html>
