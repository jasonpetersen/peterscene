<?php

define("PAGETITLE", "Experiments | " . SITENAME);
define("PAGEDESC", "A playground of code.");

?>

<!DOCTYPE html>
<html lang="en">
	<head>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/head.php'; ?>
	</head>
	<body id="experiments" class="body-bright">
<?php include $_SERVER['DOCUMENT_ROOT'] . '/top.php'; ?>
		<div class="container">
			<div class="row">
				<div class="<?php echo GRIDBUCKET; ?>">
					<div class="row spacious1">
						<div class="col-xs-7 col-sm-8 col-md-9">
							<h3>Anonynote</h3>
							<p class="ital">A lightweight web app for maintaining and organizing notes.</p>
							<p><a href="/experiments/anonynote">Launch app</a> <i class="fa fa-hand-o-right"></i></p>
						</div>
						<div class="col-xs-5 col-sm-4 col-md-3 text-right">
							<img src="/images/anonynote.gif" alt="Anonynote" class="img-thumbnail" style="max-height: 100px;">
						</div>
					</div>
					<div class="row spacious2">
						<div class="col-xs-12">
							<div class="hr-small"></div>
							<p>The idea was to create a lightweight web app for maintaining and organizing notes&mdash;no logins, no passwords. Quick and easy. Amongst other uses, my thought was to have a space for storing unmemorizable textual information that I could quickly copy and paste from.</p>
							<p>I was inspired by a website called <a href="http://www.dispostable.com/" target="_blank">Dispostable</a>, which I have long been a patron of. It allows you to access any email inbox at the dispostable.com domain&mdash;perfect as a substitute for giving a questionable site your real email. You cannot password protect these email accounts. Your only protection is that no one knows which account you're using. There's no directory. In essence, your email address <span class="ital">is</span> your password.</p>
							<p>So it is with <span class="bold">Anonynote</span>. You create a notepad and fill it with notes. Color code it and arrange it to your taste. Anyone can open the same notepad you've created, but, there's no directory. No one knows your notepad name except you. As long as it isn't completely generic, the odds of someone stumbling upon it are slim.</p>
							<p>I encourage you to try it, and if you like it, put it to use. I do!</p>
							<div class="hr-small visible-xs"></div>
						</div>
					</div>
				</div>
				<div id="sidebar" class="<?php echo GRIDSIDEBAR; ?>">
					<div>
						<img src="/images/headshot.jpg" alt="JP" class="img-circle" width="100" height="100">
					</div>
					<div>
						<h4>About</h4>
						<p><?php echo STOCKPLUG; ?></p>
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
	</body>
</html>
