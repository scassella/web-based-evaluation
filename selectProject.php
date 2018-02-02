<?php
	session_start();
  include('check_user.php');
	include('getResults.php');

	$projectIndex = null;
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$projectIndex = $_POST["selectProject"];
		$_SESSION["projIndex"] = $projectIndex;

		$_SESSION['submissionRecorded'] = "";
		header("Location: judgeForm.php");
	}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
  	<meta charset="utf-8"/>
  	<title>Judge Evaluation Form</title>
    <link rel="stylesheet" href="judge_styles.css" />
  </head>

  <body>
    <div id="container">
			<h2>Welcome, <?php echo $_SESSION["results"][0][1] ?></h2>
      <h2>Select Project</h2>

      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <div class="centerCol">
          <label>Select Project: </label>
          <select id="selectProject" name="selectProject">
						<?php
							for ($i = 0; $i < count($_SESSION["results"]); $i++) {
								echo "<option value='" . $i . "'>" . $_SESSION["results"][$i][2] . "</option>";
							}
						?>
          </select>

					<input id="submit" type="submit" value="Submit">
        </div>
      </form>

			<?php echo "<p>" . $_SESSION["submissionRecorded"] . "</p>"; ?>
    </div>
  </body>
</html>
