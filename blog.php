<?php

$error=false;
$pageTitleGood="Blog";
$pageTitleError="Oops!";
$pageTitleNoEntry="Blog entry not found";
$pageDescriptionGood=PAGEDESC;
$pageDescriptionError="Something went wrong.";
$bodyErrorNoEntry="<p>Blog entry not found.</p>";
$bodyErrorMajor="<p>Something rather serious has resulted in this error.</p>";

$db = new mysqli(HOSTNAME, USERNAME, DBPASSWORD, DBNAME);

if ($db->connect_errno) {
	$error=true;
	$errorTechMsg=$db->connect_error;
	$errorDisplayMsg=$bodyErrorMajor;
	$pageTitle=$pageTitleError;
	$pageDescription=$pageDescriptionError;
} else {
	$sql="SELECT * FROM `" . USERTABLE . "` WHERE live=1 ORDER BY `" . USERTABLE . "`.`date` DESC";
	if (!$result = $db->query($sql)) {
		$error=true;
		$errorTechMsg=$db->error;
		$errorDisplayMsg=$bodyErrorMajor;
		$pageTitle=$pageTitleError;
		$pageDescription=$pageDescriptionError;
		break;
	} else {
		$i = 0;
		$currYear = 1;
		while ($row = $result->fetch_assoc()) {
			$i++;
			if ($i == 1) {
				$d = array(1 => $row["date"]);
				$dY = array(1 => date("Y", strtotime($d[1])));
				$dM = array(1 => date("F", strtotime($d[1])));
				$dDisp = array(1 => date("F j, Y", strtotime($d[1])));
				$t = array(1 => $row["title"]);
				$l = array(1 => $row["titlelink"]);
				$b = array(1 => $row["body"] . '<i class="leaf"></i>');
				$e = array(1 => $row["extract"]);
				$blogNav = array();
				$blogNav[$currYear] = array("year" => $dY[1]);
				$blogNav[$currYear]["months"] = array();
				$blogNav[$currYear]["months"][$dM[1]] = array($l[1] => $t[1]);
			} else {
				$d[] = $row["date"];
				$dY[] = date("Y", strtotime($d[$i]));
				$dM[] = date("F", strtotime($d[$i]));
				$dDisp[] = date("F j, Y", strtotime($d[$i]));
				$t[] = $row["title"];
				$l[] = $row["titlelink"];
				$b[] = $row["body"] . '<i class="leaf"></i>';
				$e[] = $row["extract"];
				if ($dY[$i] != $blogNav[$currYear]["year"]) {
					$currYear++;
					$blogNav[$currYear] = array("year" => $dY[$i]);
					$blogNav[$currYear]["months"] = array();
					$blogNav[$currYear]["months"][$dM[$i]] = array($l[$i] => $t[$i]);
				} else {
					if (!array_key_exists($dM[$i], $blogNav[$currYear]["months"])) {
						$blogNav[$currYear]["months"][$dM[$i]] = array($l[$i] => $t[$i]);
					} else {
						$blogNav[$currYear]["months"][$dM[$i]][$l[$i]] = $t[$i];
					}
				}
			}
		}
		switch (BLOGAVENUE) {
			case "main":
				$pageTitle=$pageTitleGood;
				$pageDescription=$pageDescriptionGood;
				break;
			case "entry":
				if (in_array(BLOGENTRY, $l)) {
					$key = array_search(BLOGENTRY, $l);
					$pageTitle=$t[$key];
					$pageDescription=$e[$key];
				} else {
					$error=true;
					$errorDisplayMsg=$bodyErrorNoEntry;
					$pageTitle=$pageTitleNoEntry;
					$pageDescription=$pageDescriptionError;
				}
				break;
			case "tag":
				//
				break;
		}
	}
}		

$db->close();

?>

<!DOCTYPE html>
<html lang="en">
	<head>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/head.php'; ?>
		<title><?php echo $pageTitle; ?> | Jason Petersen</title>
		<meta name="description" content="<?php echo $pageDescription; ?>">
	</head>
	<body id="blog" class="body-bright">
<?php include $_SERVER['DOCUMENT_ROOT'] . '/top.php'; ?>
		<div class="container">
			<div class="row">
				<div class="<?php echo GRIDBUCKET; ?> spacious2">
<?php

if ($error == true) {
	echo '
					' . $errorDisplayMsg . '
					<a class="btn btn-default" href="/blog" role="button">Blog main</a>
					<a class="btn btn-default" href="/" role="button">Homepage</a>
	';
} else {
	switch (BLOGAVENUE) {
		case "main":
			$thisTitle = $t[1];
			echo '
					<h5>' . $dDisp[1] . '</h5>
					<a class="blog-link" href="/blog/' . $l[1] . '"><h2>' . $t[1] . '</h2></a>
					' . $b[1] . '
					<div class="hr-small"></div>
					<h3>Recent entries:</h3>';
			$r = 2;
			while ($r <= 6) {
				echo '
					<a class="blog-link" href="/blog/' . $l[$r] . '">
						<div>
							<h5>' . $dDisp[$r] . '</h5>
							<h4>' . $t[$r] . '</h4>
							' . $e[$r] . '
						</div>
					</a>';
				if ($r != 6) {
					echo '
					<div class="hr-full"></div>';
				}
				$r++;
			}
			break;
		case "entry":
			$thisTitle = $t[$key];
			echo '
					<h5>' . $dDisp[$key] . '</h5>
					<h2>' . $t[$key]  . '</h2>
					' . $b[$key] . '
					<a class="btn btn-default" href="/blog" role="button">Blog main</a>
			';
			break;
		case "tag":
			//
			break;
	}
}

?>
					<div class="hr-small visible-xs"></div>
				</div>
				<div id="sidebar" class="<?php echo GRIDSIDEBAR; ?>">
					<p><img src="/images/headshot.jpg" alt="JP" class="img-circle" width="100" height="100"></p>
					<div class="spacer10"></div>
					<h5>About</h5>
					<p>Follow me as I write about science, technology, literature, film, and highfalutin philosophical nonsense.</p>
					<h5>Share</h5>
					<ul class="sideH">
						<li>
							<a class="tweet" title="<?php echo $thisTitle; ?>" href="<?php echo ESCAPEDURL; ?>" via="JasonPetersen" target="_blank">
								<span class="fa-stack">
									<i class="fa fa-circle fa-stack-2x"></i>
									<i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
								</span>
							</a>
						</li>
						<li>
							<a class="fbShare" title="<?php echo $thisTitle; ?>" href="<?php echo ESCAPEDURL; ?>" target="_blank">
								<span class="fa-stack">
									<i class="fa fa-circle fa-stack-2x"></i>
									<i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
								</span>
							</a>
						</li>
						<li>
							<a class="googleShare" title="<?php echo $thisTitle; ?>" href="<?php echo ESCAPEDURL; ?>" target="_blank">
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
					<h5>All Entries</h5>
					<ul id="blogNav" class="archive_year">
<?php

$n = 0;
foreach ($blogNav as $level1) {
	echo '
						<li class="years">' . $level1["year"] . '
							<ul class="archive_month">';
	foreach ($level1["months"] as $level2key => $level2) {
		echo '
								<li class="months"><i class="fa fa-plus-square-o"></i> ' . $level2key . ' (' . count($level2) . ')
									<ul class="archive_posts">';
		foreach ($level2 as $level3key => $level3) {
			$postClass = "posts";
			if (($n == 0) && (BLOGAVENUE == "main")) {
				$postClass .= " current";
			} else if ($_SERVER["REQUEST_URI"] == ("/blog/" . $level3key)) {
				$postClass .= " current";
			}
			echo '
										<li class="' . $postClass . '"><a href="/blog/' . $level3key . '">' . $level3 . '</a></li>';
			$n++;
		}
		echo '
									</ul>
								</li>';
	}
	echo '
							</ul>
						</li>
';
}

?>
					</ul>
				</div>
			</div>
		</div>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/bottom.php'; ?>
	<!-- additional JS goes here -->
	<script src="/js/blog.js"></script>
	<script src="/js/share.js"></script>
	</body>
</html>
