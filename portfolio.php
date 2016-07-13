<?php

define("PAGETITLE", "Web portfolio | " . SITENAME);
define("PAGEDESC", "I am a web developer, dedicated to clean, mobile-first designs. Explore my body of work here.");

?>

<!DOCTYPE html>
<html lang="en">
	<head>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/head.php'; ?>
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
							<a class="panel-heading-wrap" href="#project-1" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="project-1">
								<div class="panel-heading" role="tab" id="heading-1">
									<h4 class="panel-title">Albany KTC</h4>
								</div>
							</a>
							<div id="project-1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading-1">
								<div class="panel-body">
									<div class="row">
										<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
											<h4>Albany KTC</h4>
											<ul class="no-bullet">
												<li><span class="ital">New York-based non-profit</span></li>
												<li>Location: Albany, NY</li>
												<li>URL: <a href="http://albanyktc.org/" target="_blank">albanyktc.org&nbsp;<i class="fa fa-external-link"></i></a></li>
												<li>Date: 2016</li>
											</ul>
										</div>
										<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
											<div class="spacer20 visible-xs visible-sm"></div>
											<img src="/images/albanyktc.jpg" class="img-responsive img-rounded" width="800" height="450" alt="albanyktc.org">
										</div>
									</div>
									<div class="row spacious2">
										<div class="col-xs-12">
											<div class="hr-small"></div>
											<p>Albany KTC, a non-profit Dharma center teaching authentic Tibetan Buddhism, contacted me about a website overhaul. They had gone through several web developers in the past, and what they were then operating with was a bizarre hybrid of a WordPress site and a great deal of custom code.</p>
											<p>I sifted through everything and consolidated it under WordPress. This job was equal parts archaeology and janitorial work, as well as updating for responsive design. I enjoyed the challenge!</p>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="panel panel-default">
							<a class="panel-heading-wrap" href="#project-2" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="project-2">
								<div class="panel-heading" role="tab" id="heading-2">
									<h4 class="panel-title">Redline Motorsports</h4>
								</div>
							</a>
							<div id="project-2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading-2">
								<div class="panel-body">
									<div class="row">
										<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
											<h4>Redline Motorsports</h4>
											<ul class="no-bullet">
												<li><span class="ital">Automotive parts and service</span></li>
												<li>Location: North Wales, PA</li>
												<li>URL: <a href="https://www.redlinemoto.com" target="_blank">redlinemoto.com&nbsp;<i class="fa fa-external-link"></i></a></li>
												<li>Dates: 2012 - 2015</li>
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
											<p>I managed Redline Motorsports' online identity since 2007, from branding, to design, to sales.</p>
											<p>This latest incarnation of the website was built for e-commerce. To date, total sales exceeded $45,000, and that was with a limited advertising budget. In addition, the success of this website drove sales on other platforms, including Amazon and eBay.</p>
											<p>The company continues to grow and evolve. I am happy to have contributed to their success and look forwarded to seeing what they get into next.</p>
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
