<?php

$thisURL =  "//$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$escapedURL = htmlspecialchars($thisURL, ENT_QUOTES, 'UTF-8');

?>

<!DOCTYPE html>
<html lang="en">
	<head>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/head.php'; ?>
		<link rel="stylesheet" href="/royalslider/royalslider.css">
		<link rel="stylesheet" href="/royalslider/skins/default/rs-default.css">
		<title><?php echo NONTEMPLATETITLE; ?></title>
		<meta name="description" content="<?php echo NONTEMPLATEDESC; ?>">
	</head>
	<body id="video" class="body-bright">
<?php include $_SERVER['DOCUMENT_ROOT'] . '/top.php'; ?>
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-8">
					<!-- royal slider code begin -->
					<div id="video-gallery" class="royalSlider videoGallery rsDefault">
						<a class="rsImg" data-rsVideo="http://vimeo.com/112184942" href="/images/torma.jpg">
							<div class="rsTmb">
								<h5>Torma</h5>
								<span>Feature-length documentary</span>
							</div>
                            <div class="rsCaption spacious2">
								<h3>Torma (2014)</h3>
								<p>I spent much of 2014 working on <span class="ital">Torma</span>, first as an editor, and later, when post-production moved to Thailand, as an Associate Producer and Technical Consultant. I was one of three people in the editing room shaping the film into its final form.</p>
								<p>You can see my work most directly in the opening and closing animations, done in After Effects. I also spent considerable time agonizing over the many frame rate conversion processes needed to make this footage presentable (the production has a storied history going back to 2008, with multiple DPs and cameras involved). In terms of storytelling, if you're not familiar with Tibetan Buddhism and nonetheless find this film accessible, I fought for that.</p>
								<p>I did the DVD authoring, as well as the encode for Vimeo. Everything you need to know about seeing this film can be found at the official website, <span class="bold">tormafilm.com</span>.</p>
								<p>I remain involved in distribution on an ongoing basis.</p>
                            </div>
						</a>
						<a class="rsImg" data-rsVideo="http://www.youtube.com/embed/VWeyNW-gIrA" href="/images/giving-tuesday.jpg">
							<div class="rsTmb">
								<h5>Giving Tuesday</h5>
								<span>Fundraising</span>
							</div>
                            <div class="rsCaption spacious2">
								<h3>KTD Monastery Giving Tuesday Campaign (2014)</h3>
								<p>The initial idea that was presented to me was to simply get sound bites from the residents at KTD Monastery to help fundraise. But as I started filming, it quickly occurred to me that the B-roll was more personable and endearing. I continued filming rehearsed speech, but secretly put more effort into making the residents laugh.</p>
								<p>This video spoke to me early in the editing&mdash;it was clear what the structure had to be. I start by establishing the rehearsed nature of the video, punctuated by a moment a silence, as though to say, "where is this going?" Then there's a "good rehearsal" to bridge the gap between (basically) outtakes and the next few interviews, which have polished deliveries. Finally, reward the viewer for sitting through that serious talk by getting a little more goofy.</p>
                            </div>
						</a>
						<a class="rsImg" data-rsVideo="http://www.youtube.com/embed/x_ONeOTJyZM" href="/images/family-day.jpg">
							<div class="rsTmb">
								<h5>Family Day at KTD</h5>
								<span>Promotional</span>
							</div>
                            <div class="rsCaption spacious2">
								<h3>Family Day at KTD Monastery (2014)</h3>
								<p>The handheld camerawork on display here is meant to put the viewer in the shoes of the kids. The camera wanders up and down, side to side, and with more than a few rack-focuses. It's always wandering, like the attention span of a kid.</p>
								<p>That was the only aspect of the this video I was confident about upfront. I really struggled in the editing with what this video wanted to be. It was supposed to be for fundraising, but I felt like I was shoehorning it to that purpose.</p>
								<p>I eventually put together a fundraising version I was happy with, but I think this alternate version, which acts as a promotional piece, plays better.</p>
                            </div>
						</a>
						<a class="rsImg" data-rsVideo="http://www.youtube.com/embed/kS4QhgUSk08" href="/images/sang-puja.jpg">
							<div class="rsTmb">
								<h5>Sang Puja</h5>
								<span>Archival</span>
							</div>
                            <div class="rsCaption spacious2">
								<h3>Sang Puja: a cleansing smoke offering (2014)</h3>
								<p>This is a fly-on-the-wall perspective of a Tibetan Buddhist practice performed at KTD Monastery each year on Losar&mdash;the Tibetan New Year. This is not an instructional video; there is no voice over or on-screen text to help you understand what you're watching. I had never experienced this practice before&mdash;I didn't know what was happening&mdash;and neither does the viewer. The point of view is from my own eyes.</p>
								<p>The last shot, which I linger on for a good amount of time, was an after-thought later in the day when it was all over and everyone had gone home. There was so much activity centered around that hearth... then it had ended, and all that remained were the smoldering ashes. It was a perfect example of the Buddhist idea of the impermanence of all things.</p>
                            </div>
						</a>
						<a class="rsImg" data-rsVideo="http://www.youtube.com/embed/Gls9fmhHCFE" href="/images/rent-check.jpg">
							<div class="rsTmb">
								<h5>Rent Check</h5>
								<span>Sketch comedy</span>
							</div>
                            <div class="rsCaption spacious2">
								<h3>Rent Check (2010)</h3>
								<p>Friends of mine in Los Angeles were involved in sketch comedy. I DPed this shoot, and served as editor.</p>
								<p>It's pretty by-the-numbers cinematography: when events are still grounded, the camera is grounded. As soon as Aaron knocks out his roommate with the beer bottle, the camera goes handheld. Both characters have their respective sides of the frame and never cross.</p>
								<p>There's some minor digital trickery to sell the stabbing and the slicing. If you can't tell, I consider it a job well done.</p>
                            </div>
						</a>
					</div>
                    <div class="spacer20"></div>
                    <div class="descriptionBox"></div>
					<!-- royal slider code end -->
					<div class="hr-small visible-xs visible-sm"></div>
				</div>
				<div id="sidebar" class="col-xs-12 col-sm-12 col-md-3 col-md-offset-1">
					<p><img src="/images/kubrick.jpg" alt="Kubrick" class="img-circle" width="100" height="100"></p>
					<div class="spacer10"></div>
					<h5>More Resources</h5>
					<ul class="sideV">
						<li><a href="https://www.youtube.com/user/jpetersen13/videos" target="_blank">YouTube Channel <i class="fa fa-external-link"></i></a></li>
					</ul>
					<h5>Share</h5>
					<ul class="sideH">
						<li>
							<a class="tweet" title="<?php echo NONTEMPLATETITLE; ?>" href="http:<?php echo $escapedURL; ?>" via="JasonPetersen" target="_blank">
								<span class="fa-stack">
									<i class="fa fa-circle fa-stack-2x"></i>
									<i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
								</span>
							</a>
						</li>
						<li>
							<a class="fbShare" title="<?php echo NONTEMPLATETITLE; ?>" href="http:<?php echo $escapedURL; ?>" target="_blank">
								<span class="fa-stack">
									<i class="fa fa-circle fa-stack-2x"></i>
									<i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
								</span>
							</a>
						</li>
						<li>
							<a class="googleShare" title="<?php echo NONTEMPLATETITLE; ?>" href="http:<?php echo $escapedURL; ?>" target="_blank">
								<span class="fa-stack">
									<i class="fa fa-circle fa-stack-2x"></i>
									<i class="fa fa-google-plus fa-stack-1x fa-inverse"></i>
								</span>
							</a>
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
		<script src="/js/share.js"></script>
		<script src="/royalslider/jquery.royalslider.min.js"></script>
        <script src="/royalslider/dev/modules/jquery.rs.global-caption.js"></script>
		<script>
			jQuery(document).ready(function($) {
				$('#video-gallery').royalSlider({
					fullscreen: {
						enabled: true,
						nativeFS: true
					},
					controlNavigation: 'thumbnails',
					autoScaleSlider: true, 
					autoScaleSliderWidth: 960,     
					autoScaleSliderHeight: 640,
                    autoHeight: true,
					loop: true,
					imageScaleMode: 'fit',
					navigateByClick: true,
					numImagesToPreload: 2,
					arrowsNav: true,
					arrowsNavAutoHide: true,
					arrowsNavHideOnTouch: true,
					keyboardNavEnabled: true,
					fadeinLoadedSlide: true,
					globalCaption: true,
					globalCaptionInside: false,
					thumbs: {
						appendSpan: true,
						firstMargin: true,
						paddingBottom: 4
					},
					deeplinking: {
						// deep linking options go gere
						enabled: true,
                        change: true,
						prefix: 'id-'
					}
				});
                $('.rsGCaption').appendTo('.descriptionBox')
			});
		</script>
	</body>
</html>
