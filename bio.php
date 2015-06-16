<?php

define("PAGETITLE", "The online residence of Jason Petersen");
define("PAGEDESC", "Web developer, videographer, photographer, wordsmith, world traveler, and all-around upstanding gentleman.");

?>

<!DOCTYPE html>
<html lang="en">
	<head>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/head.php'; ?>
	</head>
	<body id="bio" class="body-bright">
<?php include $_SERVER['DOCUMENT_ROOT'] . '/top.php'; ?>
		<div class="container">
			<div class="row">
				<div class="<?php echo GRIDBUCKET; ?> spacious2">
					<span class="pull-left">
						<img src="/images/headshot.jpg" alt="JP" class="img-circle" width="150" height="150">
					</span>
					<p>Way back when, I took my Film &amp; Media Arts degree from Philadelphia to Hollywood and worked as a software engineer for Warner Bros. and Sony Pictures.</p>
					<p>Hard times during the <a href="http://en.wikipedia.org/wiki/Financial_crisis_of_2007%E2%80%9308" target="_blank">financial crisis</a> proved to be a boon for my wandering spirit: I traveled the world for no small amount of time. There are an <a href="https://www.flickr.com/photos/jasonpetersen/sets/" target="_blank">avalanche of photos</a> documenting it.</p>
					<p>In Asia I became caught up in the Tibetan cause and followed my newfound interest in Tibetan Buddhism to Woodstock NY, home of world-renowned <a href="http://www.kagyu.org/" target="_blank">KTD Monastery</a>. I served all IT and videography functions for the large community.</p>
					<p>My latest move&mdash;driven by a continuing passion for spirituality, mindfulness, and community&mdash;took me across the river to the <a href="http://www.eomega.org/" target="_blank">Omega Institute</a>'s sprawling 190-acre campus, in the heart of the Hudson Valley. I work there today as an editor, cameraman, and livestream producer.</p>
					<p>I am also a web developer, dedicated to clean, mobile-first designs.</p>
					<p>And I still make time for filmmaking pursuits&mdash;most recently having spent the prior summer in Thailand editing a documentary, which you can <a href="https://vimeo.com/tormafilm/torma" target="_blank">watch here</a>.</p>
					<div class="hr-small visible-xs"></div>
				</div>
				<div id="sidebar" class="<?php echo GRIDSIDEBAR; ?>">
<?php

$db = new mysqli(HOSTNAME, USERNAME, DBPASSWORD, DBNAMEBLOG);

if (!$db->connect_errno) {
	$sql="SELECT * FROM `" . USERTABLE1 . "` WHERE live=1 ORDER BY `" . USERTABLE1 . "`.`date` DESC LIMIT 1";
	if ($result = $db->query($sql)) {
		while ($row = $result->fetch_assoc()) {
			echo '
					<div id="blogBox" class="hidden-xs">
						<h4>Latest Blog Entry</h4>
						<ul class="side-v">
							<li><span class="ital">' . date("F j, Y", strtotime($row["date"])) . '</span><br />
							<a href="/blog">' . $row["title"] . '</a></li>
						</ul>
					</div>';
		}
	}
}

$db->close();

?>
					<div>
						<h4>Work</h4>
						<ul class="side-v">
							<li><a href="/cv" onclick="window.open('/cv', 'newwindow', 'width=400, height=600, scrollbars=yes'); return false;">Full CV</a></li>
							<li><a href="https://github.com/jasonpetersen" target="_blank">GitHub <i class="fa fa-external-link"></i></a></li>
						</ul>
					</div>
					<div>
						<h4>Social</h4>
						<ul class="side-v">
							<li><a href="https://www.linkedin.com/in/hellojasonpetersen" target="_blank">LinkedIn <i class="fa fa-external-link"></i></a></li>
							<li class="hidden-xs"><a href="https://www.flickr.com/photos/jasonpetersen" target="_blank">Flickr <i class="fa fa-external-link"></i></a></li>
							<li class="visible-xs"><a href="https://m.flickr.com/photos/jasonpetersen" target="_blank">Flickr <i class="fa fa-external-link"></i></a></li>
							<li><a href="https://twitter.com/JasonPetersen" target="_blank">Twitter <i class="fa fa-external-link"></i></a></li>
						</ul>
					</div>
					<div>
						<h4>Contact</h4>
						<ul class="side-v">
							<li><a href="mailto:<?php echo CONTACTEMAIL; ?>"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> Email me</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/bottom.php'; ?>
		<!-- additional JS goes here -->
		<script type="application/ld+json">
		{
			"@context": "http://schema.org",
			"@type": "Person",
			"name": "Jason Petersen",
			"url": "http://peterscene.com",
			"image": "http://peterscene.com/images/headshot.jpg",
			"sameAs": [
				"http://twitter.com/JasonPetersen",
				"http://www.facebook.com/jpetersen13",
				"http://www.linkedin.com/in/hellojasonpetersen",
				"http://www.flickr.com/people/jasonpetersen",
				"http://github.com/jasonpetersen"
			],
			"jobTitle": [
				"Web developer",
				"Videographer",
				"IT professional",
				"Wordsmith"
			],
			"address": {
				"@type": "PostalAddress",
				"addressLocality": "Rhinebeck",
				"addressRegion": "NY",
				"postalCode": "12572"
			}
		}
		</script>
	</body>
</html>
