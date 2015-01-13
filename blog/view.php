<?php
// Report simple running errors
//error_reporting(E_ERROR | E_WARNING | E_PARSE);

$pageTitle="Oops!";
$pageDescription="";
$error="<p>Blog entry does not exist.</p>";
$errorDisplay="<p>I might have goofed.</p><p>You might have goofed.</p><p>The net result is the same: I have no content for you.</p>";

$hostname="localhost";
$username="jpete13_sql";
$dbpassword="C@3rlion";
$dbname="jpete13_blog";
$usertable="entries";

$db = new mysqli($hostname, $username, $dbpassword, $dbname);

if ($db->connect_errno) {
	$error="<p>Error connecting to database: \"" . $db->connect_error . "\"</p>";
} else {
	$sql = "SELECT * FROM " . $usertable;
	if (!$result = $db->query($sql)) {
		$error="<p>Error with SQL query: \"" . $db->error . "\"</p>";
	} else {
		while ($row = $result->fetch_assoc()) {
			if ($row['titlelink'] == $_GET["id"]) {
				$error=false;
				$entryDate=$row['date'];
				$displayDate=date("F j, Y", strtotime($row['date']));
				$entryTitle=$row['title'];
				$pageTitle=$row['title'] . " | Jason Petersen";
				$entryBody=$row['body'];
				$pageDescription=$row['extract'];
			}
		}
	}
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

if ($error != false) {
	echo '
					' . $errorDisplay . '
					<a class="btn btn-default" href="/blog" role="button">Blog main</a>
					<a class="btn btn-default" href="/" role="button">Homepage</a>
	';
	
} else {
	echo '
					<h5>' . $displayDate . '</h5>
					<h3>' . $entryTitle  . '</h3>
					' . $entryBody . '
					<a class="btn btn-default" href="/blog" role="button">Blog main</a>
	';
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
