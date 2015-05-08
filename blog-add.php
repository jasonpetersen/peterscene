<?php

$serverDate = new DateTime();
$readableDate = $serverDate->format('Y-m-d');
$dateField = $readableDate;

$today = "true";
$live = "false";

function validateDate($inputDate, $inputFormat = 'Y-m-d')
{
	$d = DateTime::createFromFormat($inputFormat, $inputDate);
	return $d && $d->format($inputFormat) == $inputDate;
}

if ($_POST["submit"]) {
	$title = addslashes($_POST['title']);
	$titlelink = addslashes($_POST['titlelink']);
	$body = addslashes($_POST['body']);
	$extract = addslashes($_POST['extract']);
	if ($_POST['today'] == "true") {
		$today = "true";
		$date = null;
		$sqlDate = "CURDATE()";
	} else {
		$today = "false";
		$date = $_POST['date'];
		$sqlDate = '\'' . $date . '\'';
		$dateField = $date;
	}
	$tags = implode(",", $_POST['tags']);
	$password = $_POST['password'];
	if ($_POST['live'] == "true") {
		$live = "true";
	} else {
		$live = "false";
	}
	
	// Check if name has been entered
	if (!$_POST['title']) {
		$errTitle = 'Please enter a title for your entry.';
	}
	
	// Check if title link has been entered
	if (!$_POST['titlelink']) {
		$errTitlelink = 'Please enter a title link for your entry.';
	}
	
	//Check if body has been entered
	if (!$_POST['body']) {
		$errBody = 'Please enter something in the body.';
	}
	
	//Check if extract has been entered
	if (!$_POST['extract']) {
		$errExtract = 'Please enter something for the extract.';
	}
	
	//Check if date has been entered properly
	if (validateDate($date) == 1) {
		$validDate = "true";
	} else {
		$validDate = "false";
	}
	if ($today == "false") {
		if (!$_POST['date']  || ($validDate == "false")) {
			$errDate = 'Please enter a valid date.';
		}
	}
	
	//Check if password is correct
	if ($password !== 'pwJP') {
		$errPassword = 'The password is incorrect.';
	}

	// If there are no errors, post the entry
	if (!$errTitle && !$errTitlelink && !$errBody && !$errExtract && !$errDate && !$errPassword) {
		$db = new mysqli(HOSTNAME, USERNAME, DBPASSWORD, DBNAMEBLOG);
		
		if ($db->connect_errno) {
			$result='<div class="alert alert-danger">Error connecting to database: "' . $db->connect_error . '"</div>';
		} else {
			$sql = "INSERT INTO `" . DBNAMEBLOG . "`.`" . USERTABLE1 . "` (`date`, `tags`, `title`, `titlelink`, `body`, `extract`, `live`) VALUES (" . $sqlDate . ", '" . $tags . "', '" . $title . "', '" . $titlelink . "', '" . $body . "', '" . $extract . "', " . $live . ")";
			if (!$result = $db->query($sql)) {
				$result='<div class="alert alert-danger">Error with SQL syntax: "' . $db->error . '"</div>';
			} else {
				$result='<div class="alert alert-success">Success!</div>';
			}
		}
		
		$db->close();
	}
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/head.php'; ?>
	</head>
	<body id="blog" class="body-bright">
<?php include $_SERVER['DOCUMENT_ROOT'] . '/top.php'; ?>
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<form class="form-horizontal" role="form" method="post" action="/blog-add">
						<div class="form-group">
							<label for="title" class="col-sm-2 control-label">Title</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="title" name="title" placeholder="Entry title" value="<?php echo htmlspecialchars($_POST['title']); ?>">
								<?php echo "<p class='text-danger'>$errTitle</p>";?>
							</div>
						</div>
						<div class="form-group">
							<label for="titlelink" class="col-sm-2 control-label">Title link</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="titlelink" name="titlelink" placeholder="Lowercase a-z and hyphens only" value="<?php echo htmlspecialchars($_POST['titlelink']); ?>">
								<?php echo "<p class='text-danger'>$errTitlelink</p>";?>
							</div>
						</div>
						<div class="form-group">
							<label for="body" class="col-sm-2 control-label">Body</label>
							<div class="col-sm-10">
								<textarea class="form-control" rows="10" id="entryBody" name="body"><?php echo htmlspecialchars($_POST['body']);?></textarea>
								<?php echo "<p class='text-danger'>$errBody</p>";?>
							</div>
						</div>
						<div class="form-group">
							<label for="extract" class="col-sm-2 control-label">Body extract</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" maxlength="160" id="extract" name="extract" placeholder="For search engines" value="<?php echo htmlspecialchars($_POST['extract']); ?>">
								<br />
								<p>Total characters: <span id="extractChar">0</span>/160</p>
								<p>Aim for between 150 - 160 characters.</p>
								<?php echo "<p class='text-danger'>$errExtract</p>";?>
							</div>
						</div>
						<div class="form-group">
							<label for="date" class="col-sm-2 control-label">Date</label>
							<div class="col-sm-10">
								<span>Today?&nbsp;&nbsp;</span><input type="checkbox" id="today" name="today" value="true" checked>
								<input type="text" class="form-control" maxlength="10" id="date" name="date" placeholder="YYYY-MM-DD" value="<?php echo $dateField; ?>" disabled="true">
								<br />
								<p>YYYY-MM-DD</p>
								<?php echo "<p class='text-danger'>$errDate</p>";?>
							</div>
						</div>
						<div class="form-group">
							<label for="date" class="col-sm-2 control-label">Tags</label>
							<div class="col-sm-10">
								<?php
								$db = new mysqli(HOSTNAME, USERNAME, DBPASSWORD, DBNAMEBLOG);
								if ($db->connect_errno) {
									echo '<p>Could not retrieve tags from database, which does not bode well for this page functioning at all.</p>';
									exit();
								}
								$sql = "SELECT * FROM `tags`";
								$tagResult = mysqli_query($db,$sql);
								while ($row = $tagResult->fetch_array()) {
									$rows[] = $row;
								}
								foreach ($rows as $row) {
									echo '<span>' . $row["name"] . '&nbsp;&nbsp;</span><input type="checkbox" id="' . strtolower($row["name"]) . '" name="tags[]" value="' . $row["id"] . '" unchecked>&nbsp;&nbsp;&nbsp;&nbsp;';
								}
								$db->close();
								?>
							</div>
						</div>
						<div class="form-group">
							<label for="password" class="col-sm-2 control-label">Password</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="password" name="password" placeholder="">
								<?php echo "<p class='text-danger'>$errPassword</p>";?>
							</div>
						</div>
						<div class="form-group">
							<label for="live" class="col-sm-2 control-label">Live</label>
							<div class="col-sm-10">
								<input type="checkbox" id="live" name="live" value="true" unchecked>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-10 col-sm-offset-2">
								<input id="submit" name="submit" type="submit" value="Publish" class="btn btn-primary">
								<div id="previewBtn" class="btn btn-primary">Preview</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-10 col-sm-offset-2">
								<?php echo $result; ?>
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="hr-full preview-hr" style="display: none;"></div>
			<div class="row">
				<div class="col-xs-12 col-sm-8 spacious2 preview">
				</div>
			</div>
		</div>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/bottom.php'; ?>
	<script>
		var main = function() {
			$("#extractChar").text($("#extract").val().length);
			$("#extract").keyup(function() {
				$("#extractChar").text($("#extract").val().length);
			});
			$("#title").keyup(function() {
				var inputText = $("#title").val();
				var outputText = inputText.toLowerCase().replace(/([~!@#$%^&*()_+=`{}\[\]\|\\:;'<>,.\/? ])+/g, '-').replace(/^(-)+|(-)+$/g,'');
				$("#titlelink").val(outputText);
			});
			$("#today").change(function() {
				$("#date").prop('disabled', $("#today").is(':checked'));
				if ($("#today").is(':checked')) {
					$("#date").val('<?php echo $readableDate; ?>');
				};
			});
			<?php
			if ($today == "false") {
				echo '
				$("#today").prop("checked", false);
				$("#date").prop("disabled", false);
				';
			}
			if ($live == "true") {
				echo '
				$("#live").prop("checked", true);
				';
			}
			?>
			$('#previewBtn').click(function() {
				$('#previewBtn').text('Refresh preview');
				$('#bucket').remove();
				$('.preview-hr').show();
				$('<div/>', {
					id: 'bucket'
				}).appendTo('.preview');
				$('<h2/>', {
					text: $('#title').val()
				}).appendTo('#bucket');
				$('#bucket').append($.parseHTML($('#entryBody').val()));
			});
			//$("form").submit(function( event ) {
			//	event.preventDefault();
			//});
		};
		$(document).ready(main);
	</script>
	</body>
</html>
