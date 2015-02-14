<?php

$error=false;
$pageTitleGood="Blog";
$pageTitleError="Oops!";
$pageTitleNoEntry="Blog entry not found";
$pageTitleNoTag="Tag not found";
$pageDescriptionGood=PAGEDESC;
$pageDescriptionError="Something went wrong.";
$bodyErrorNoEntry="<p>Blog entry not found.</p>";
$bodyErrorNoTag="<p>Tag not found.</p>";
$bodyErrorMajor="<p>Something rather serious has resulted in this error.</p>";

function createTagText($tagString) {
	if ($tagString != "") {
		global $tags;
		$tagArray = explode(",", $tagString);
		$entryTags = '<p class="smaller bold">Tags: ';
		$c = 1;
		foreach ($tagArray as $tagKey => $tagValue) {
			$entryTags .= '<a href="/blog/tag/' . strtolower($tags[$tagValue]) . '">' . $tags[$tagValue] . '</a>';
			if ($c != count($tagArray)) {
				$entryTags .= ', ';
			} else {
				$entryTags .= '</p>';
			}
			$c++;
		}
	} else {
		$entryTags = false;
	}
	return $entryTags;
}

$db = new mysqli(HOSTNAME, USERNAME, DBPASSWORD, DBNAMEBLOG);

if ($db->connect_errno) {
	$error=true;
	$errorTechMsg=$db->connect_error;
	$errorDisplayMsg=$bodyErrorMajor;
	$pageTitle=$pageTitleError;
	$pageDescription=$pageDescriptionError;
} else {
	$sqlEntries="SELECT * FROM `" . USERTABLE1 . "` WHERE live=1 ORDER BY `" . USERTABLE1 . "`.`date` DESC";
	$sqlTags="SELECT * FROM `" . USERTABLE2 . "` ORDER BY `" . USERTABLE2 . "`.`id` ASC";
	if ($result = $db->query($sqlTags)) {
		$tags = array();
		$tags[] = NULL;
		while ($row = $result->fetch_assoc()) {
			$tags[] = $row["name"];
		}
	}
	if (!$result = $db->query($sqlEntries)) {
		$error=true;
		$errorTechMsg=$db->error;
		$errorDisplayMsg=$bodyErrorMajor;
		$pageTitle=$pageTitleError;
		$pageDescription=$pageDescriptionError;
		break;
	} else {
		$currYear = 0;
		$c = 1;
		while ($row = $result->fetch_assoc()) {
			$x = $row["id"];
			$i[$x] = $o[$c] = $x;
			$d[$x] = $row["date"];
			$dY[$x] = date("Y", strtotime($d[$x]));
			$dM[$x] = date("F", strtotime($d[$x]));
			$dDisp[$x] = date("F j, Y", strtotime($d[$x]));
			$t[$x] = $row["title"];
			$l[$x] = $row["titlelink"];
			$b[$x] = $row["body"] . '<i class="leaf"></i>';
			$e[$x] = $row["extract"];
			$g[$x] = $row["tags"];
			if ($dY[$x] != $blogNav[$currYear]["year"]) {
				$currYear++;
				$blogNav[$currYear]["year"]  = $dY[$x];
			}
			$blogNav[$currYear]["months"][$dM[$x]][$l[$x]] = $t[$x];
			$c++;
		}
		switch (BLOGAVENUE) {
			case "main":
				$pageTitle=$pageTitleGood;
				$pageDescription=$pageDescriptionGood;
				break;
			case "entry":
				if (in_array(BLOGENTRY, $l)) {
					$key=array_search(BLOGENTRY, $l);
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
				if (in_array(ucfirst(BLOGTAG), $tags)) {
					$key=array_search(ucfirst(BLOGTAG), $tags);
					$pageTitle=ucfirst(BLOGTAG);
					$pageDescription=$pageDescriptionGood;
					foreach ($g as $k => $v) {
						foreach (explode(",", $v) as $tagKey => $tagValue) {
							if ($key == $tagValue) {
								$tagMatch[] = $k;
							}
						}
					}
				} else {
					$error=true;
					$errorDisplayMsg=$bodyErrorNoTag;
					$pageTitle=$pageTitleNoTag;
					$pageDescription=$pageDescriptionError;
				}
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
	echo '					' . $errorDisplayMsg . '
					<div class="spacer10"></div>
					<a class="btn btn-default" href="/blog" role="button">Blog main</a>
					<a class="btn btn-default" href="/" role="button">Homepage</a>
	';
} else {
	switch (BLOGAVENUE) {
		case "main":
			echo '					<h5>' . $dDisp[$o[1]] . '</h5>
					<a class="blog-link" href="/blog/' . $l[$o[1]] . '"><h2>' . $t[$o[1]] . '</h2></a>
					' . $b[$o[1]] . '
					' . createTagText($g[$o[1]]) . '
					<div class="hr-small"></div>
					<h3>Recent entries:</h3>';
			$r = 2;
			while ($r <= 6) {
				echo '
					<a class="blog-link" href="/blog/' . $l[$o[$r]] . '">
						<div>
							<h5>' . $dDisp[$o[$r]] . '</h5>
							<h4>' . $t[$o[$r]] . '</h4>
							<p>' . $e[$o[$r]] . '</p>
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
			echo '					<h5>' . $dDisp[$key] . '</h5>
					<h2>' . $t[$key]  . '</h2>
					' . $b[$key] . '
					' . createTagText($g[$key]) . '
					<div class="spacer10"></div>
					<a class="btn btn-default" href="/blog" role="button">Blog main</a>
			';
			break;
		case "tag":
			echo '
					<p>Blog entries matching the tag &ldquo;<span class="bold">' . ucfirst(BLOGTAG) . '</span>&rdquo;:</p>
					<div class="hr-small"></div>';
			$r = 1;
			foreach ($tagMatch as $k => $v) {
				echo '
					<a class="blog-link" href="/blog/' . $l[$v] . '">
						<div>
							<h5>' . $dDisp[$v] . '</h5>
							<h4>' . $t[$v] . '</h4>
							<p>' . $e[$v] . '</p>
						</div>
					</a>';
				if ($r < count($tagMatch)) {
					echo '
					<div class="hr-full"></div>';
				}
				$r++;
			}
			echo '
					<div class="spacer10"></div>
					<a class="btn btn-default" href="/blog" role="button">Blog main</a>
			';
			break;
	}
}

?>
					<div class="hr-small visible-xs"></div>
				</div>
				<div id="sidebar" class="<?php echo GRIDSIDEBAR; ?>">
					<div>
						<img src="/images/headshot.jpg" alt="JP" class="img-circle" width="100" height="100">
					</div>
					<div>
						<h4>About</h4>
						<p>Follow me as I write about science, technology, literature, film, and highfalutin philosophical nonsense.</p>
					</div>
					<div class="share">
						<h4>Share</h4>
						<ul class="sideH">
							<li>
								<a class="tweet" title="<?php echo $pageTitle; ?>" href="<?php echo ESCAPEDURL; ?>" via="JasonPetersen" target="_blank">
									<span class="fa-stack">
										<i class="fa fa-circle fa-stack-2x"></i>
										<i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
									</span>
								</a>
							</li>
							<li>
								<a class="fbShare" title="<?php echo $pageTitle; ?>" href="<?php echo ESCAPEDURL; ?>" target="_blank">
									<span class="fa-stack">
										<i class="fa fa-circle fa-stack-2x"></i>
										<i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
									</span>
								</a>
							</li>
							<li>
								<a class="googleShare" title="<?php echo $pageTitle; ?>" href="<?php echo ESCAPEDURL; ?>" target="_blank">
									<span class="fa-stack">
										<i class="fa fa-circle fa-stack-2x"></i>
										<i class="fa fa-google-plus fa-stack-1x fa-inverse"></i>
									</span>
								</a>
							</li>
						</ul>
					</div>
					<div>
						<h4>Connect</h4>
						<ul class="sideV">
							<li><a href="mailto:<?php echo CONTACTEMAIL; ?>"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> Email me</a></li>
						</ul>
					</div>
					<div>
						<h4>All Entries<i class="fa fa-minus-square-o collapse-all" title="Collapse All"></i><i class="fa fa-plus-square-o expand-all" title="Expand All"></i></h4>
						<ul id="blogNav" class="archive_year">
<?php

$n = 0;
foreach ($blogNav as $level1) {
	echo '
							<li class="years">' . $level1["year"] . '
								<ul class="archive_month">';
	foreach ($level1["months"] as $level2key => $level2) {
		echo '
									<li class="months"><span class="mClick"><i class="fa fa-plus-square-o"></i> ' . $level2key . ' (' . count($level2) . ')</span>
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
		</div>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/bottom.php'; ?>
	<!-- additional JS goes here -->
	<script src="/js/blog.js"></script>
	<script src="/js/share.js"></script>
	<script>
		if (<?php echo $error; ?> == true) {
			$('.share').hide();
		}
	</script>
	</body>
</html>
