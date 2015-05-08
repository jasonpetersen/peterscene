<?php

define("PAGETITLE", "Oops! | " . SITENAME);
define("PAGEDESC", "Something went wrong.");

?>

<!DOCTYPE html>
<html lang="en">
	<head>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/head.php'; ?>
	</head>
	<body id="error" class="body-bright">
<?php include $_SERVER['DOCUMENT_ROOT'] . '/top.php'; ?>
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-5 spacious2">
					<p>I might have goofed.</p>
					<p>You might have goofed.</p>
					<p>The net result is the same: all I have for you is this silly drawing.</p>
					<a class="btn btn-default" href="/" role="button">Homepage</a>
					<div class="spacer20"></div>
				</div>
				<div class="col-xs-12 col-sm-7">
					<img src="/images/404.gif" alt="404" class="img-responsive">
				</div>
			</div>
		</div>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/bottom.php'; ?>
		<!-- additional JS goes here -->
	</body>
</html>
