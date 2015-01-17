<?php
if ($_GET['id'] == "") {
	$template=true;
	$id="bio";
	$title="The online residence of Jason Petersen";
	$desc="Web developer, videographer, photographer, wordsmith, world traveler, and all-around upstanding gentleman.";
} else {
	switch(strtolower($_GET['id'])) {
		case "bio":
			$template=true;
			$id="bio";
			$title="The online residence of Jason Petersen";
			$desc="Web developer, videographer, photographer, wordsmith, world traveler, and all-around upstanding gentleman.";
			break;
		case "cv":
			$template=false;
			$id="cv";
			break;
		case "purpose":
			$template=true;
			$id="purpose";
			$title="Purpose | Jason Petersen";
			$desc="The 'why' is more important than the 'what'. Read why this site exists at all.";
			break;
		case "blog":
			$template=false;
			$id="blog";
			define("HOSTNAME", "localhost");
			define("USERNAME", "jpete13_sql");
			define("DBPASSWORD", "C@3rlion");
			define("DBNAME", "jpete13_blog");
			define("USERTABLE", "entries");
			if ($_GET['entry'] != "") {
				define("BLOGAVENUE", "entry");
				define("BLOGENTRY", strtolower($_GET['entry']));
			} else if ($_GET['tag'] != "") {
				define("BLOGAVENUE", "tag");
				define("BLOGTAG", strtolower($_GET['tag']));
			} else {
				define("BLOGAVENUE", "main");
			}
			break;
		case "blog-add":
			$template=false;
			$id="blog-add";
			break;
		default:
			$template=true;
			$id="404";
			$title="Oops! | Jason Petersen";
			$desc="Something went wrong.";
	}
}

if ($template == false) {
	include $_SERVER['DOCUMENT_ROOT'] . '/' . $id . '.php';
	exit;
} else {
	echo '
<!DOCTYPE html>
<html lang="en">
	<head>
	';
	include $_SERVER['DOCUMENT_ROOT'] . '/head.php';
	echo '
		<title>' . $title . '</title>
		<meta name="description" content="' . $desc . '">
	</head>
	<body id="' . $id . '" class="body-bright">
	';
	include $_SERVER['DOCUMENT_ROOT'] . '/top.php';
	include $_SERVER['DOCUMENT_ROOT'] . '/' . $id . '.php';
	include $_SERVER['DOCUMENT_ROOT'] . '/bottom.php';
	echo '
	</body>
</html>
	';
}

?>
