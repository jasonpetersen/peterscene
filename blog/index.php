<!DOCTYPE html>
<html lang="en">
	<head>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/head.php'; ?>
		<title>Blog | Jason Petersen</title>
		<meta name="description" content="Adjectives on the typewriter. He moves his words like a prizefighter.">
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

if($db->connect_errno > 0){
	die('Unable to connect to database [' . $db->connect_error . ']');
}

$sql = <<<SQL
	SELECT *
	FROM $usertable
SQL;

if(!$result = $db->query($sql)){
	die('There was an error running the query [' . $db->error . ']');
}

while($row = $result->fetch_assoc()){
	echo '<h2>'.date("F j, Y", strtotime($row['date'])).'</h2>';
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
