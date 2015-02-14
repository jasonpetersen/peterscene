<?php

error_reporting(0);

define("CONTACTEMAIL", "contact@peterscene.com");
define("STOCKPLUG", "I'm Jason Petersen, a web developer, videographer, IT professional, and wordsmith living in Woodstock, NY.");

define("THISURL", "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
define("ESCAPEDURL", htmlspecialchars(THISURL, ENT_QUOTES, 'UTF-8'));

define("GRIDBUCKET", "col-xs-12 col-sm-8");
define("GRIDSIDEBAR", "col-xs-12 col-sm-3 col-sm-offset-1");

define("HOSTNAME", "localhost");
define("USERNAME", "jpete13_sql");
define("DBPASSWORD", "C@3rlion");
define("DBNAMEBLOG", "jpete13_blog");
define("DBNAMEEXP", "jpete13_experiments");
define("USERTABLE1", "entries");
define("USERTABLE2", "tags");

$mainTitle="The online residence of Jason Petersen";
$defaultDesc="Web developer, videographer, photographer, wordsmith, world traveler, and all-around upstanding gentleman.";

$errorTitle="Oops! | Jason Petersen";
$errorDesc="Something went wrong.";

$myExperiments[] = "anonynote";
$myExperiments[] = "anonynote-build";

if ($_GET['id'] == "") {
	$template=true;
	define("PAGEID", "bio");
	define("PAGETITLE", $mainTitle);
	define("PAGEDESC", $defaultDesc);
} else {
	if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/' . strtolower($_GET['id']) . '.php')) {
		switch(strtolower($_GET['id'])) {
			case "bio":
				$template=true;
				define("PAGEID", "bio");
				define("PAGETITLE", $mainTitle);
				define("PAGEDESC", $defaultDesc);
				break;
			case "cv":
				$template=false;
				define("PAGEID", "cv");
				define("PAGETITLE", "CV | Jason Petersen");
				define("PAGEDESC", $defaultDesc);
				break;
			case "purpose":
				$template=true;
				define("PAGEID", "purpose");
				define("PAGETITLE", "Purpose | Jason Petersen");
				define("PAGEDESC", "The 'why' is more important than the 'what'. Read why this site exists at all.");
				break;
			case "blog":
				$template=false;
				define("PAGEID", "blog");
				define("PAGETITLE", "Blog | Jason Petersen");
				define("PAGEDESC", "Follow me as I write about science, technology, literature, film, and highfalutin philosophical nonsense.");
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
				define("PAGEID", "blog-add");
				define("PAGETITLE", "Add entry | Jason Petersen");
				define("PAGEDESC", "Adjectives on the typewriter, he moves his words like a prizefighter.");
				break;
			case "portfolio":
				$template=true;
				define("PAGEID", "portfolio");
				define("PAGETITLE", "Portfolio | Jason Petersen");
				define("PAGEDESC", $defaultDesc);
				break;
			case "video":
				$template=false;
				define("PAGEID", "video");
				define("PAGETITLE", "Video | Jason Petersen");
				define("PAGEDESC", "A film major by education, but a student of cinema 'in perpetuam'. I am deeply versed in the craft, with an emphasis on editing and camera work.");
				break;
			case "photos":
				$template=false;
				define("PAGEID", "photos");
				define("PAGETITLE", "Photos | Jason Petersen");
				define("PAGEDESC", "I look at the world through a camera lens, whether I'm holding a camera or not. Peruse my latest photographic exploits.");
				break;
			case "experiments":
				if ($_GET['route'] != "") {
					define("EXPROUTE", strtolower($_GET['route']));
					$n = 0;
					foreach ($myExperiments as $x) {
						if (($x == EXPROUTE) && (file_exists($_SERVER['DOCUMENT_ROOT'] . '/experiments-' . EXPROUTE . '.php'))) {
							$template=false;
							define("PAGEID", "experiments-" . EXPROUTE);
							define("BODYID", "experiments");
							define("PAGETITLE", ucfirst(EXPROUTE) . " | Jason Petersen");
							define("PAGEDESC", $defaultDesc);
							$n++;
						}
					}
					if ($n == 0) {
						$template=true;
						define("PAGEID", "404");
						define("BODYID", "error");
						define("PAGETITLE", $errorTitle);
						define("PAGEDESC", $errorDesc);
					}
				} else {
					$template=true;
					define("PAGEID", "experiments");
					define("PAGETITLE", "Experiments | Jason Petersen");
					define("PAGEDESC", $defaultDesc);
				}
				break;
			case "404":
			default:
				$template=true;
				define("PAGEID", "404");
				define("BODYID", "error");
				define("PAGETITLE", $errorTitle);
				define("PAGEDESC", $errorDesc);
				break;
		}
	} else {
		$template=true;
		define("PAGEID", "404");
		define("BODYID", "error");
		define("PAGETITLE", $errorTitle);
		define("PAGEDESC", $errorDesc);
	}
}

if (!defined("BODYID")) {
	define("BODYID", PAGEID);
}

if ($template == false) {
	include $_SERVER['DOCUMENT_ROOT'] . '/' . PAGEID . '.php';
	exit;
} else {
	echo '<!DOCTYPE html>
<html lang="en">
	<head>
';
	include $_SERVER['DOCUMENT_ROOT'] . '/head.php';
	echo '		<title>' . PAGETITLE . '</title>
		<meta name="description" content="' . PAGEDESC . '">
	</head>
	<body id="' . BODYID . '" class="body-bright">
';
	include $_SERVER['DOCUMENT_ROOT'] . '/top.php';
	include $_SERVER['DOCUMENT_ROOT'] . '/' . PAGEID . '.php';
	include $_SERVER['DOCUMENT_ROOT'] . '/bottom.php';
	echo '	</body>
</html>
';
}

?>
