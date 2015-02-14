<?php

$colors[1] = array('name' => 'White', 'hex' => 'ffffff');
$colors[2] = array('name' => 'Gray', 'hex' => 'f3f3f3');
$colors[3] = array('name' => 'Red', 'hex' => 'ffdddd');
$colors[4] = array('name' => 'Orange', 'hex' => 'fff6dd');
$colors[5] = array('name' => 'Yellow', 'hex' => 'feffdd');
$colors[6] = array('name' => 'Green', 'hex' => 'dfffdd');
$colors[7] = array('name' => 'Cyan', 'hex' => 'ddffff');
$colors[8] = array('name' => 'Blue', 'hex' => 'dde2ff');
$colors[9] = array('name' => 'Purple', 'hex' => 'f4ddff');

$method = $_GET['method'];

$db = new mysqli(HOSTNAME, USERNAME, DBPASSWORD, DBNAMEEXP);

if ($db->connect_errno) {
	echo '<p>Database error. <a href="/experiments/notes">Maybe reload</a>?</p>';
} else {
	switch ($method) {
		case "buildNotepad":
			$pad = addslashes($_GET['notepad']);
			echo '<a href="#" onclick="buildOpenDialog();"><i class="fa fa-long-arrow-left"></i> Create or edit another notepad</a>
				<h2>Notepad: &ldquo;' . stripslashes($pad) . '&rdquo;</h2>
				<span id="this-notepad" class="hidden">' . stripslashes($pad) . '</span>
				<button type="button" class="btn btn-primary" onclick="buildEdit(\'' . $pad . '\');">
					<i class="fa fa-plus"></i> Add note
				</button>
				';
			$sql="SELECT * FROM `notes` WHERE notepad='" . $pad . "' ORDER BY `notes`.`org` DESC";
			$result = $db->query($sql);
			if (mysqli_num_rows($result) > 0) {
				echo '<div class="spacer20"></div>
				<table id="notes-table" class="table table-bordered table-condensed">
					<thead>
						<tr>
							<th class="col-one">Actions</th>
							<th class="col-two">Note</th>
						</tr>
					</thead>
					<tbody id="sortable">
				';
				while ($row = $result->fetch_assoc()) {
					$note = $noteFull = htmlspecialchars($row["text"]);
					if (strlen($note) > 200) {
						// truncate string
						$noteCut = substr($note, 0, 200);
						// make sure it ends in a word
						$note = substr($noteCut, 0, strrpos($noteCut, ' ')).'... <a href="#" title="Read more" onclick="readMore(' . $row["id"] . ');">(<span class="ital">read more</span>)</a>';
					}
					echo '<tr id="id-' . $row["id"] . '" style="background-color: #' . $row["color"] . '">
							<td>
								<a href="#" class="sort-handle" title="Drag to re-order">
									<span class="fa-stack">
										<i class="fa fa-circle fa-stack-2x"></i>
										<i class="fa fa-arrows-v fa-stack-1x fa-inverse"></i>
									</span>
								</a>
								<a href="#" title="Edit" onclick="buildEdit(\'' . $pad . '\', ' . $row["id"] . ');">
									<span class="fa-stack">
										<i class="fa fa-circle fa-stack-2x"></i>
										<i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
									</span>
								</a>
								<a href="#" title="Delete" onclick="deleteNote(' . $row["id"] . ');">
									<span class="fa-stack">
										<i class="fa fa-circle fa-stack-2x"></i>
										<i class="fa fa-times fa-stack-1x fa-inverse"></i>
									</span>
								</a>
							</td>
							<td>
								<span class="noteShort">' . $note . '</span>
								<span class="noteFull hidden">' . $noteFull . '</span>
							</td>
						</tr>
					';
				}
				echo '</tbody>
				</table>';
			}
			break;
		case "buildEdit":
			$pad = addslashes($_GET['notepad']);
			$id = $_GET['noteid'];
			if ($id != "") {
				$sql="SELECT * FROM `notes` WHERE id='" . $id . "' LIMIT 1";
				$result = $db->query($sql);
				while ($row = $result->fetch_assoc()) {
					$i = $row["id"];
					$n = $row["notepad"];
					$o = $row["org"];
					$c = $row["color"];
					$t = $row["text"];
				}
			}
			echo '<span class="bold">Color:&nbsp;</span>
				<div style="display: inline-block;">
					<select id="colorselector">';
			foreach ($colors as $arr) {
				if ($arr["hex"] != $c) {
					echo '<option value="' . $arr["hex"] . '" data-color="#' . $arr["hex"] . '">' . $arr["name"] . '</option>';
				} else {
					echo '<option value="' . $arr["hex"] . '" data-color="#' . $arr["hex"] . '" selected="selected">' . $arr["name"] . '</option>';
				}
			}
			if (!isset($c)) {
				$c = 'ffffff';
			}
			echo '
					</select>
				</div>
				<div class="spacer10"></div>
				<form>
					<div class="form-group">
						<label for="note-text" class="sr-only">Note</label>
						<textarea class="form-control" rows="10" id="note-text" name="note-text" placeholder="Enter your note here." style="background-color: #' . $c . '">';
			if (isset($t)) {
				echo $t;
			}
			echo '</textarea>
							<p class="text-danger note-error"></p>
					</div>';
			$param = "'" . $pad . "'";
			if (isset($i)) {
				$param .= ", " . $i;
			}
			echo '<button type="button" class="btn btn-success" onclick="saveNote(' . $param . ');">
						<i class="fa fa-check"></i> Save note
					</button>
					<button type="button" class="btn btn-danger" onclick="buildNotepad(\'' . $pad . '\', \'fade\');">
						<i class="fa fa-times"></i> Cancel
					</button>
				</form>
			';
			break;
		case "saveNote":
			$pad = addslashes($_GET['notepad']);
			$text = addslashes($_GET['notetext']);
			$color = $_GET['notecolor'];
			if ($_GET['noteid'] == "") {
				$sql1="SELECT MAX(`org`) FROM `notes` WHERE notepad='" . $pad . "'";
				if ($result = $db->query($sql1)) {
					while ($row = $result->fetch_assoc()) {
						$org = $row['MAX(`org`)'] + 1;
					}
				} else {
					$org = 1;
				}
				$sql2="INSERT INTO `" . DBNAMEEXP . "`.`notes` (`id`, `notepad`, `org`, `color`, `text`) VALUES (NULL, '" . $pad . "', '" . $org . "', '" . $color . "', '" . $text . "')";
				if ($result = $db->query($sql2)) {
					echo "1";
				} else {
					echo "0";
				}
			} else {
				$id = $_GET['noteid'];
				$sql="UPDATE `" . DBNAMEEXP . "`.`notes` SET `color`='" . $color . "', `text`='" . $text . "' WHERE `notes`.`id`=" . $id . "";
				if ($result = $db->query($sql)) {
					echo "1";
				} else {
					echo "0";
				}
			}
			break;
		case "deleteNote":
			$id = $_GET['noteid'];
			$sql="DELETE FROM `notes` WHERE id='" . $id . "'";
			if ($result = $db->query($sql)) {
				echo "1";
			} else {
				echo "0";
			}
			break;
		case "reorderEntry":
			$pad = addslashes($_GET['notepad']);
			$orderStr = $_GET['noteorder'];
			$err = 0;
			foreach ($orderStr as $idKey => $idValue) {
				$i = str_replace("id-", "", $idValue);
				$o = count($orderStr) - $idKey;
				$sql="UPDATE `" . DBNAMEEXP . "`.`notes` SET `org`='" . $o . "' WHERE `notes`.`id`=" . $i . "";
				if ($result = $db->query($sql)) {
					//
				} else {
					$err++;
				}
			}
			if ($err != 0) {
				echo "2";
			} else {
				echo "1";
			}
			break;
	}
}

$db->close();

?>
