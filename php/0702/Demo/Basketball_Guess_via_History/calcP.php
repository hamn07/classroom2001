<?php 
session_start();
if (!isset($_SESSION["passed"])) {
	die("no stranger.");
	exit;
}

require ("config.php");

$section = 1;
if (isset($_POST["rdoSection"])) {
	$section = $_POST["rdoSection"];
}

$awayScore = "25";
if (isset($_POST["txtAwayScore"])) {
	$awayScore = $_POST["txtAwayScore"];
}

$homeScore = "26";
if (isset($_POST["txtHomeScore"])) {
	$homeScore = $_POST["txtHomeScore"];
}

$line = "-4.5";
if (isset($_POST["txtLine"])) {
  $line = $_POST["txtLine"];
}

$ouLevel = "195.5";
if (isset($_POST["txtOULevel"])) {
	$ouLevel = $_POST["txtOULevel"];
}

$OUResult = "";
$lineResult = "";
if (isset($_POST["btnOK"])) {
	$totalScore = $awayScore + $homeScore;
	$db = new PDO ( "mysql:host=$dbhost;dbname=$dbname;port=3306", $dbuser, $dbpass );
	$db->exec ( "set names utf8" );
	
	
	switch ($section) {
		case 1:
			$stmt = $db->prepare("select sum(case when (AwayScore + HomeScore) > :ouLevel then 1 else 0 end) / count(*) as p from game where (AwayQ1 + HomeQ1) = :Total");
			break;
		case 2:
			$stmt = $db->prepare("select sum(case when (AwayScore + HomeScore) > :ouLevel then 1 else 0 end) / count(*) as p from game where (AwayQ1 + HomeQ1 + AwayQ2 + HomeQ2) = :Total");
			break;
		case 3:
			$stmt = $db->prepare("select sum(case when (AwayScore + HomeScore) > :ouLevel then 1 else 0 end) / count(*) as p from game where (AwayQ1 + HomeQ1 + AwayQ2 + HomeQ2 + AwayQ3 + HomeQ3) = :Total");
			break;
	}
	
	$stmt->bindValue(':ouLevel', $ouLevel, PDO::PARAM_INT);
	$stmt->bindValue(':Total', $totalScore, PDO::PARAM_INT);
	$stmt->execute();
	$row = $stmt->fetch ();
	$OUResult = "<strong>Over: " . $row["p"] . "</strong>";

	switch ($section) {
		case 1:
			$stmt = $db->prepare("select sum(case when AwayScore < (HomeScore + :line) then 1 else 0 end) / count(*) as p from game where AwayQ1 - HomeQ1 = (:awayScore - :homeScore)");
			break;
		case 2:
			$stmt = $db->prepare("select sum(case when AwayScore < (HomeScore + :line) then 1 else 0 end) / count(*) as p from game where (AwayQ1 + AwayQ2) - (HomeQ1 + HomeQ2) = (:awayScore - :homeScore)");
			break;
		case 3:
			$stmt = $db->prepare("select sum(case when AwayScore < (HomeScore + :line) then 1 else 0 end) / count(*) as p from game where (AwayQ1 + AwayQ2 + AwayQ3) - (HomeQ1 + HomeQ2 + HomeQ3) = (:awayScore - :homeScore)");
			break;
	}
	$stmt->bindValue(':line', $line, PDO::PARAM_INT);
	$stmt->bindValue(':awayScore', $awayScore, PDO::PARAM_INT);
	$stmt->bindValue(':homeScore', $homeScore, PDO::PARAM_INT);
	$stmt->execute();
	$row = $stmt->fetch ();
	$lineResult = "<strong>Home Win: " . $row["p"] . "</strong>";
	
	$db = null;
}

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Lab</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php require("script_css.php") ?>
</head>
<body>
<div id="labPage" data-role="page" data-theme="d">
<div data-role="header">
	<h3>Lab</h3>
</div>

<div data-role="content">
<form method="post" action="" data-ajax="false">

	<fieldset data-role="controlgroup" data-type="horizontal">
     	<input type="radio" name="rdoSection" id="rdoSection1" value="1" <?php echo ($section == 1) ? 'checked' : '' ?> />
     	<label for="rdoSection1">Q1</label>

     	<input type="radio" name="rdoSection" id="rdoSection2" value="2" <?php echo ($section == 2) ? 'checked' : '' ?> />
     	<label for="rdoSection2">Q2</label>

     	<input type="radio" name="rdoSection" id="rdoSection3" value="3" <?php echo ($section == 3) ? 'checked' : '' ?> />
     	<label for="rdoSection3">Q3</label>

	</fieldset>

	<div class="ui-grid-a">
		<div class="ui-block-a cell-left">Away: <input type="text" name="txtAwayScore" id="txtAwayScore" placeholder="Away score here" value="<?php echo $awayScore; ?>" /></div>
		<div class="ui-block-b cell-right">Home: <input type="text" name="txtHomeScore" id="txtHomeScore" placeholder="Home score here" value="<?php echo $homeScore; ?>" /></div>
	</div>

	<div class="ui-grid-a">
		<div class="ui-block-a cell-left">
			<label for="txtLine">Line:</label>
			<input type="text" name="txtLine" id="txtLine" placeholder="Line (e.g. -4.5)" value="<?php echo $line; ?>" />
		</div>
		<div class="ui-block-b cell-right">
			<label for="txtOULevel">OU Level:</label>
			<input type="text" name="txtOULevel" id="txtOULevel" placeholder="OU Level (e.g. 195.5)" value="<?php echo $ouLevel; ?>" />
		</div>
	</div>
	
	<input type="submit" name="btnOK" value = "OK" />
</form>
<?php echo $lineResult; ?>
<br>
<?php echo $OUResult; ?>
</div>
	
</div>
<!-- page -->

</body>
</html>
