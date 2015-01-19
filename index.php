<?php

error_reporting(0);

define("HOSTNAME", "localhost");
define("USERNAME", "jpete13_sql");
define("DBPASSWORD", "C@3rlion");
define("DBNAME", "jpete13_blog");
define("USERTABLE", "entries");

$mainTitle="The online residence of Jason Petersen";
$defaultDesc="Web developer, videographer, photographer, wordsmith, world traveler, and all-around upstanding gentleman.";

$errorTitle="Oops! | Jason Petersen";
$errorDesc="Something went wrong.";

if ($_GET['id'] == "") {
	$template=true;
	$id="bio";
	$title=$mainTitle;
	$desc=$defaultDesc;
} else {
	switch(strtolower($_GET['id'])) {
		case "bio":
			$template=true;
			$id="bio";
			$title=$mainTitle;
			$desc=$defaultDesc;
			break;
		case "cv":
			$template=false;
			$id="cv";
			$title="CV | Jason Petersen";
			$desc=$defaultDesc;
			define("NONTEMPLATETITLE", $title);
			define("NONTEMPLATEDESC", $desc);
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
			$title="Add entry | Jason Petersen";
			$desc="Adjectives on the typewriter, he moves his words like a prizefighter.";
			define("NONTEMPLATETITLE", $title);
			define("NONTEMPLATEDESC", $desc);
			break;
		case "photos":
			$template=false;
			$id="photos";
			$title="Photos | Jason Petersen";
			$desc="I look at the world through a camera lens, whether I'm holding a camera or not. Peruse my latest photographic exploits.";
			define("NONTEMPLATETITLE", $title);
			define("NONTEMPLATEDESC", $desc);
			break;
		case "404":
			$template=true;
			$id="404";
			$title=$errorTitle;
			$desc=$errorDesc;
			break;
		default:
			if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/' . strtolower($_GET['id']) . '.php')) {
				$template=true;
				$id=strtolower($_GET['id']);
				$title=ucfirst(strtolower($_GET['id'])) . " | Jason Petersen";
				$desc=$defaultDesc;
			} else {
				$template=true;
				$id="404";
				$title=$errorTitle;
				$desc=$errorDesc;
			}
			break;
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
