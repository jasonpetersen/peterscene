<?php

error_reporting(0);

define("SITENAME", "Jason Petersen");
define("CONTACTEMAIL", "someone@somewhere.com");
define("STOCKPLUG", "I'm Jason Petersen, a web developer, videographer, IT professional, and wordsmith living in Poughkeepsie, NY.");

define("THISURL", "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
define("ESCAPEDURL", htmlspecialchars(THISURL, ENT_QUOTES, 'UTF-8'));

define("GRIDBUCKET", "col-xs-12 col-sm-8");
define("GRIDSIDEBAR", "col-xs-12 col-sm-3 col-sm-offset-1");

define("HOSTNAME", "localhost");
define("USERNAME", "1111111");
define("DBPASSWORD", "2222222");
define("DBNAMEBLOG", "3333333");
define("DBNAMEEXP", "4444444");
define("USERTABLE1", "5555555");
define("USERTABLE2", "6666666");

$myExperiments[] = "anonynote";
$myExperiments[] = "anonynote-build";

if ($_GET['id'] == "") {
	$pageID = "bio";
} else {
	$request = strtolower($_GET['id']);
	if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/' . $request . '.php')) {
		switch($request) {
			case "bio":
			case "cv":
			case "purpose":
			case "blog-add":
			case "portfolio":
			case "video":
			case "photos":
			case "sitemap":
			case "404":
				$pageID = $request;
				break;
			case "blog":
				$pageID = "blog";
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
			case "experiments":
				if ($_GET['route'] != "") {
					$expRoute = strtolower($_GET['route']);
					$n = 0;
					foreach ($myExperiments as $x) {
						if (($x == $expRoute) && (file_exists($_SERVER['DOCUMENT_ROOT'] . '/experiments-' . $expRoute . '.php'))) {
							$pageID = "experiments-" . $expRoute;
							$n++;
						}
					}
					if ($n == 0) {
						$pageID = "404";
					}
				} else {
					$pageID = "experiments";
				}
				break;
			default:
				$pageID = "404";
				break;
		}
	} else {
		$pageID = "404";
	}
}

include $_SERVER['DOCUMENT_ROOT'] . '/' . $pageID . '.php';

?>
