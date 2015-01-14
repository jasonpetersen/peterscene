<!DOCTYPE html>
<html lang="en">
	<head>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/head.php'; ?>
		<title>Blog | Jason Petersen</title>
		<meta name="description" content="I enjoy writing about science, technology, literature, film, and highfalutin philosophical nonsense.">
	</head>
	<body id="blog" class="body-bright">
<?php include $_SERVER['DOCUMENT_ROOT'] . '/top.php'; ?>
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-8 spacious2">
<?php

$hostname="localhost";
$username="jpete13_sql";
$dbpassword="C@3rlion";
$dbname="jpete13_blog";
$usertable="entries";

$db = new mysqli($hostname, $username, $dbpassword, $dbname);

if ($db->connect_errno) {
	echo '<p>Error connecting to database: \"' . $db->connect_error . '\"</p>';
} else {
	$sql = "SELECT * FROM `" . $usertable . "` ORDER BY `" . $usertable . "`.`date` DESC";
	if (!$result = $db->query($sql)) {
		echo '<p>Error with SQL query: \"' . $db->error . '\"</p>';
	} else {
		$i = 0;
		while ($row = $result->fetch_assoc()) {
			$i++;
			if ($i == 1) {
				echo '
					<h5>' . date("F j, Y", strtotime($row['date'])) . '</h5>
					<a class="blog-link" href="/blog/' . $row["titlelink"] . '"><h2>' . $row["title"] . '</h2></a>
					' . $row['body'] . '
				';
			} else {
				echo '
					<div class="hr-full"></div>
					<a class="blog-link" href="/blog/' . $row["titlelink"] . '">
						<div>
							<h5>' . date("F j, Y", strtotime($row['date'])) . '</h5>
							<h4>' . $row["title"] . '</h4>
							' . $row['extract'] . '
						</div>
					</a>
				';
			}
		}
	}
}

$db->close();

?>
					<div class="hr-small visible-xs"></div>
				</div>
				<div class="col-xs-12 col-sm-3 col-sm-offset-1 sidebar">
<?php include $_SERVER['DOCUMENT_ROOT'] . '/sidebar-blog.php'; ?>
				</div>
			</div>
		</div>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/bottom.php'; ?>
	</body>
</html>
