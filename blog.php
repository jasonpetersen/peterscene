<?php
$error=false;
$pageTitleGood="Blog | Jason Petersen";
$pageTitleError="Oops! | Jason Petersen";
$pageTitleNoEntry="Blog entry not found | Jason Petersen";
$pageDescriptionGood="I enjoy writing about science, technology, literature, film, and highfalutin philosophical nonsense.";
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
}

switch (BLOGAVENUE) {
	case "main":
		$pageTitle=$pageTitleGood;
		$pageDescription=$pageDescriptionGood;
		$sql="SELECT * FROM `" . USERTABLE . "` ORDER BY `" . USERTABLE . "`.`date` DESC";
		break;
	case "entry":
		$sql="SELECT * FROM " . USERTABLE;
		if (!$result = $db->query($sql)) {
			$error=true;
			$errorTechMsg=$db->error;
			$errorDisplayMsg=$bodyErrorMajor;
			$pageTitle=$pageTitleError;
			$pageDescription=$pageDescriptionError;
		} else {
			// Default to error. Overwrite if information found.
			$error=true;
			$errorDisplayMsg=$bodyErrorNoEntry;
			$pageTitle=$pageTitleNoEntry;
			$pageDescription=$pageDescriptionError;
			while ($row = $result->fetch_assoc()) {
				if ($row['titlelink'] == BLOGENTRY) {
					$error=false;
					$errorDisplayMsg=null;
					$entryDate=$row['date'];
					$displayDate=date("F j, Y", strtotime($row['date']));
					$entryTitle=$row['title'];
					$pageTitle=$row['title'] . " | Jason Petersen";
					$entryBody=$row['body'];
					$pageDescription=$row['extract'];
				}
			}
		}
		break;
	case "tag":
		//
		break;
}

echo '
<!DOCTYPE html>
<html lang="en">
	<head>
';
include $_SERVER['DOCUMENT_ROOT'] . '/head.php';
echo '
		<title>' . $pageTitle . '</title>
		<meta name="description" content="' . $pageDescription . '">
	</head>
	<body id="blog" class="body-bright">
';
include $_SERVER['DOCUMENT_ROOT'] . '/top.php';
echo '
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-8 spacious2">
';

if ($error == true) {
	echo '
					' . $errorDisplayMsg . '
					<a class="btn btn-default" href="/blog" role="button">Blog main</a>
					<a class="btn btn-default" href="/" role="button">Homepage</a>
	';
} else {
	switch (BLOGAVENUE) {
		case "main":
			if (!$result = $db->query($sql)) {
				$error=true;
				$errorTechMsg=$db->error;
				$errorDisplayMsg=$bodyErrorMajor;
				echo '
					' . $errorDisplayMsg . '
					<a class="btn btn-default" href="/blog" role="button">Blog main</a>
					<a class="btn btn-default" href="/" role="button">Homepage</a>
				';
				break;
			} else {
				$i = 0;
				while ($row = $result->fetch_assoc()) {
					$i++;
					if ($i == 1) {
						echo '
					<h5>' . date("F j, Y", strtotime($row["date"])) . '</h5>
					<a class="blog-link" href="/blog/' . $row["titlelink"] . '"><h2>' . $row["title"] . '</h2></a>
					' . $row['body'] . '
						';
					} else {
						echo '
					<div class="hr-full"></div>
					<a class="blog-link" href="/blog/' . $row["titlelink"] . '">
						<div>
							<h5>' . date("F j, Y", strtotime($row["date"])) . '</h5>
							<h4>' . $row["title"] . '</h4>
							' . $row["extract"] . '
						</div>
					</a>
						';
					}
				}
			}
			break;
		case "entry":
			echo '
					<h5>' . $displayDate . '</h5>
					<h2>' . $entryTitle  . '</h2>
					' . $entryBody . '
					<a class="btn btn-default" href="/blog" role="button">Blog main</a>
			';
			break;
		case "tag":
			//
	}
}

echo '
					<div class="hr-small visible-xs"></div>
				</div>
				<div class="col-xs-12 col-sm-3 col-sm-offset-1 sidebar">
';
include $_SERVER['DOCUMENT_ROOT'] . '/sidebar-blog.php';
echo '
				</div>
			</div>
		</div>
';
include $_SERVER['DOCUMENT_ROOT'] . '/bottom.php';
echo '
	</body>
</html>
';

$db->close();

?>
