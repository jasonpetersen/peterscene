		<div class="container">
			<div class="row">
				<div class="<?php echo GRIDBUCKET; ?> spacious2">
					<span class="img-with-wrap-left">
						<img src="/images/headshot.jpg" alt="JP" class="img-circle" width="150" height="150">
					</span>
					<p>Way back when, I took my Film &amp; Media Arts degree from Philadelphia to Hollywood and worked as a software engineer for Warner Bros. and Sony Pictures.</p>
					<p>Hard times during the <a href="http://en.wikipedia.org/wiki/Financial_crisis_of_2007%E2%80%9308" target="_blank">financial crisis</a> proved to be a boon for my wandering spirit: I traveled the world for no small amount of time. There are an <a href="https://www.flickr.com/photos/jasonpetersen/sets/" target="_blank">avalanche of photos</a> documenting it.</p>
					<p>In Asia I became caught up in the Tibetan cause and followed my newfound interest in Tibetan Buddhism to Woodstock NY, home of world-renowned <a href="http://www.kagyu.org/" target="_blank">KTD Monastery</a>. I work there today, serving all IT and videography functions for the large community.</p>
					<p>I am also a web developer, dedicated to clean, mobile-first designs.</p>
					<p>And I still make time for filmmaking pursuits&mdash;most recently having spent the prior summer in Thailand editing a documentary, which you can <a href="https://vimeo.com/tormafilm/torma" target="_blank">watch here</a>.</p>
					<div class="hr-small visible-xs"></div>
				</div>
				<div id="sidebar" class="<?php echo GRIDSIDEBAR; ?>">
<?php

$db = new mysqli(HOSTNAME, USERNAME, DBPASSWORD, DBNAME);

if (!$db->connect_errno) {
	$sql="SELECT * FROM `" . USERTABLE . "` WHERE live=1 ORDER BY `" . USERTABLE . "`.`date` DESC LIMIT 1";
	if ($result = $db->query($sql)) {
		while ($row = $result->fetch_assoc()) {
			echo '
					<div id="blogBox" class="hidden-xs">
						<h5>Latest Blog Entry</h5>
						<ul class="sideV">
							<li><span class="ital">' . date("F j, Y", strtotime($row["date"])) . '</span></li>
							<li><a href="/blog">' . $row["title"] . '</a></li>
						</ul>
					</div>';
		}
	}
}

$db->close();

?>
					<div>
						<h5>Work</h5>
						<ul class="sideV">
							<li><a href="/cv" onclick="window.open('/cv', 'newwindow', 'width=400, height=600, scrollbars=yes'); return false;">Full CV</a></li>
							<li><a href="https://github.com/jasonpetersen" target="_blank">GitHub <i class="fa fa-external-link"></i></a></li>
						</ul>
					</div>
					<div>
						<h5>Social</h5>
						<ul class="sideV">
							<li><a href="https://www.linkedin.com/in/hellojasonpetersen" target="_blank">LinkedIn <i class="fa fa-external-link"></i></a></li>
							<li>
								<a class="hidden-xs" href="https://www.flickr.com/photos/jasonpetersen" target="_blank">Flickr <i class="fa fa-external-link"></i></a>
								<a class="visible-xs" href="https://m.flickr.com/photos/jasonpetersen" target="_blank">Flickr <i class="fa fa-external-link"></i></a>
							</li>
							<li><a href="https://twitter.com/JasonPetersen" target="_blank">Twitter <i class="fa fa-external-link"></i></a></li>
						</ul>
					</div>
					<div>
						<h5>Contact</h5>
						<ul class="sideV">
							<li><a href="mailto:<?php echo CONTACTEMAIL; ?>"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> Email me</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
