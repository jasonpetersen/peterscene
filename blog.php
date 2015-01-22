<?php

$error=false;
$pageTitleGood="Blog | Jason Petersen";
$pageTitleError="Oops! | Jason Petersen";
$pageTitleNoEntry="Blog entry not found | Jason Petersen";
$pageDescriptionGood="I enjoy writing about science, technology, literature, film, and highfalutin philosophical nonsense.";
$pageDescriptionError="Something went wrong.";
$bodyErrorNoEntry="<p>Blog entry not found.</p>";
$bodyErrorMajor="<p>Something rather serious has resulted in this error.</p>";

$thisURL =  "//$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$escapedURL = htmlspecialchars($thisURL, ENT_QUOTES, 'UTF-8');

$db = new mysqli(HOSTNAME, USERNAME, DBPASSWORD, DBNAME);

if ($db->connect_errno) {
	$error=true;
	$errorTechMsg=$db->connect_error;
	$errorDisplayMsg=$bodyErrorMajor;
	$pageTitle=$pageTitleError;
	$pageDescription=$pageDescriptionError;
} else {
	$sql="SELECT * FROM `" . USERTABLE . "` ORDER BY `" . USERTABLE . "`.`date` DESC";
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
				$b = array(1 => $row["body"]);
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
				$b[] = $row["body"];
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
					$pageTitle=$t[$key] . " | Jason Petersen";
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
		<title><?php echo $pageTitle; ?></title>
		<meta name="description" content="<?php echo $pageDescription; ?>">
	</head>
	<body id="blog" class="body-bright">
		<div id="fb-root"></div>
		<script>(function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) return;
			js = d.createElement(s); js.id = id;
			js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
			fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));</script>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/top.php'; ?>
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-8 spacious2">
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
			echo '
					<h5>' . $dDisp[1] . '</h5>
					<a class="blog-link" href="/blog/' . $l[1] . '"><h2>' . $t[1] . '</h2></a>
					' . $b[1] . '
					<div class="hr-small"></div>
					<h3>Previous entry:</h3>
					<a class="blog-link" href="/blog/' . $l[2] . '">
						<div>
							<h5>' . $dDisp[2] . '</h5>
							<h4>' . $t[2] . '</h4>
							' . $e[2] . '
						</div>
					</a>
				';
			break;
		case "entry":
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
				<div class="col-xs-12 col-sm-3 col-sm-offset-1 sidebar">
					<p><img src="/images/headshot.jpg" alt="JP" class="img-circle" width="100" height="100"></p>
					<div class="spacer10"></div>
					<h5>Share</h5>
					<ul class="sideH">
						<li><a class="twitter-share-button" href="https://twitter.com/share" data-count="none" data-dnt="true" data-via="JasonPetersen">Tweet</a></li>
						<li><div class="fb-share-button" data-href="<?php echo $escapedURL; ?>" data-layout="button"></div></li>
					</ul>
					<h5>Connect</h5>
					<ul class="sideV">
						<li><a href="mailto:<?php echo CONTACTEMAIL; ?>"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> Email me</a></li>
					</ul>
					<h5>All Entries</h5>
					<ul id="blogNav" class="archive_year">
<?php

foreach ($blogNav as $level1) {
	echo '
						<li class="years">' . $level1["year"] . '
							<ul class="archive_month">';
	foreach ($level1["months"] as $level2key => $level2) {
		echo '
								<li class="months"><i class="fa fa-plus-square-o"></i> ' . $level2key . ' (' . count($level2) . ')
									<ul class="archive_posts">';
		foreach ($level2 as $level3key => $level3) {
			if ($_SERVER["REQUEST_URI"] == ("/blog/" . $level3key)) {
				echo '
										<li class="posts current"><a href="/blog/' . $level3key . '">' . $level3 . '</a></li>';
			} else {
				echo '
										<li class="posts"><a href="/blog/' . $level3key . '">' . $level3 . '</a></li>';
			}
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
	<script>
	window.twttr=(function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],t=window.twttr||{};if(d.getElementById(id))return;js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);t._e=[];t.ready=function(f){t._e.push(f);};return t;}(document,"script","twitter-wjs"));
	$('.archive_month ul').hide();
	$('.months').click(function() {
    	$(this).find('ul').slideToggle();
    	if ($(this).find('i').hasClass('fa-plus-square-o')) {
    		$(this).find('i').removeClass('fa-plus-square-o');
    		$(this).find('i').addClass('fa-minus-square-o');
    	} else {
    		$(this).find('i').removeClass('fa-minus-square-o');
    		$(this).find('i').addClass('fa-plus-square-o');
    	}
	});
	</script>
	</body>
</html>
