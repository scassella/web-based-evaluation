<?php
	session_start();
  include('check_user.php');
	include('processForm2.php');
?>

<!DOCTYPE html>
<html lang="en">
  <head>
  	<meta charset="utf-8"/>
  	<title>Judge Evaluation Form</title>
    <link rel="stylesheet" href="judge_styles.css" />

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  </head>

  <body>
    <div id="container">
      <h2>Judge Evaluation Form</h2>

			<strong><?php echo $_SESSION["results"][$_SESSION['projIndex']][2]; ?></strong>

      <div id="scoreLegend">
        <strong>Scoring Point System:</strong>
        <p class="legend">5 = Excellent (at the level of an entry-level engineer you would hire)</p>
        <p class="legend">4 = Good (at the level of an accomplished college senior)</p>
        <p class="legend">3 = Average (at the level of a typical college senior)</p>
        <p class="legend">2 = Below Average (not up to the expectations for a college senior)</p>
        <p class="legend">1 = Poor (significant errors or omissions)</p>
        <p class="legend">0 if no appropriate score applies</p>
      </div>

      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <div class="leftCol">
          <label>Judge Name: </label>
					<?php echo "<input type='text' name='name' value='" . $_SESSION["results"][$_SESSION['projIndex']][1] . "' disabled>"; ?>

          <label>Session: </label>
					<?php echo "<input type='text' name='session' value='" . $_SESSION["results"][$_SESSION['projIndex']][3] . "' disabled>"; ?>

          <label>Room number: </label>
					<?php echo "<input type='text' name='room' value='" . $_SESSION["results"][$_SESSION['projIndex']][4] . "' disabled>"; ?>

          <label>Group members: </label>
					<?php echo "<input type='text' name='members' value='" . $_SESSION["results"][$_SESSION['projIndex']][5] . "' disabled>"; ?>

          <label>Advisors: </label>
					<?php echo "<input type='text' name='advisors' value='" . $_SESSION["results"][$_SESSION['projIndex']][6] . "' disabled>"; ?>
        </div>

        <div class="section">
          <h3>Design Project</h3>
          <div class="leftCol">
            <label>Technical Accuracy: </label>
						<!-- <input type="number" min=0 max=5 name="technicalAccuracy"> -->
						<?php echo "<input type='number' min=0 max=5 name='technicalAccuracy' value='" . $_SESSION["results"][$_SESSION['projIndex']][7] . "' required>"; ?>

            <label>Creativity and Innovation: </label>
						<!-- <input type="number" min=0 max=5 name="creativityAndInnovation"> -->
						<?php echo "<input type='number' min=0 max=5 name='creativityAndInnovation' value='" . $_SESSION["results"][$_SESSION['projIndex']][8] . "' required>"; ?>

            <label>Supporting Analytical Work: </label>
						<!-- <input type="number" min=0 max=5 name="supportingAnalyticalWork"> -->
						<?php echo "<input type='number' min=0 max=5 name='supportingAnalyticalWork' value='" . $_SESSION["results"][$_SESSION['projIndex']][9] . "' required>"; ?>

            <label>Methodical Design Process Demonstrated: </label>
						<!-- <input type="number" min=0 max=5 name="designProcess"> -->
						<?php echo "<input type='number' min=0 max=5 name='designProcess' value='" . $_SESSION["results"][$_SESSION['projIndex']][10] . "' required>"; ?>
          </div>

          <div class="rightCol">
            <label>Addresses Project Complexity Appropriately: </label>
						<!-- <input type="number" min=0 max=5 name="projectComplexity"> -->
						<?php echo "<input type='number' min=0 max=5 name='projectComplexity' value='" . $_SESSION["results"][$_SESSION['projIndex']][11] . "' required>"; ?>

            <label>Expectation of Completion: </label>
						<!-- <input type="number" min=0 max=5 name="completion"> -->
						<?php echo "<input type='number' min=0 max=5 name='completion' value='" . $_SESSION["results"][$_SESSION['projIndex']][12] . "' required>"; ?>

            <label>Design and Analysis of Tests: </label>
						<!-- <input type="number" min=0 max=5 name="designAndAnalysis"> -->
						<?php echo "<input type='number' min=0 max=5 name='designAndAnalysis' value='" . $_SESSION["results"][$_SESSION['projIndex']][13] . "' required>"; ?>

            <label>Quality of Response During Q&amp;A: </label>
						<!-- <input type="number" min=0 max=5 name="qa"> -->
						<?php echo "<input type='number' min=0 max=5 name='qa' value='" . $_SESSION["results"][$_SESSION['projIndex']][14] . "' required>"; ?>

          </div>
        </div>

        <div class="section">
          <h3>Presentation</h3>
          <div class="leftCol">
            <label>Organization: </label>
						<!-- <input type="number" min=0 max=5 name="organization"> -->
						<?php echo "<input type='number' min=0 max=5 name='organization' value='" . $_SESSION["results"][$_SESSION['projIndex']][15] . "' required>"; ?>

            <label>Use of Allotted Time: </label>
						<!-- <input type="number" min=0 max=5 name="allottedTime"> -->
						<?php echo "<input type='number' min=0 max=5 name='allottedTime' value='" . $_SESSION["results"][$_SESSION['projIndex']][16] . "' required>"; ?>
          </div>

          <div class="rightCol">
            <label>Visual Aids: </label>
						<!-- <input type="number" min=0 max=5 name="visualAids"> -->
						<?php echo "<input type='number' min=0 max=5 name='visualAids' value='" . $_SESSION["results"][$_SESSION['projIndex']][17] . "' required>"; ?>

            <label>Confidence and Poise: </label>
						<!-- <input type="number" min=0 max=5 name="poise"> -->
						<?php echo "<input type='number' min=0 max=5 name='poise' value='" . $_SESSION["results"][$_SESSION['projIndex']][18] . "' required>"; ?>

          </div>
        </div>

        <div class="section">
          <strong>Total Score (Sum of Design Project and Presentation Totals): <span id="score">0</span></strong>
        </div>

        <div class="section">
          <h3 class="">Please note each of the following considerations that were addressed by the presentation: </h3>

          <div class="leftCol">
            <input type="checkbox" name="considerations[]" value="economic" <?php echo $_SESSION["results"][$_SESSION['projIndex']][19];?>>economic<br>
            <input type="checkbox" name="considerations[]" value="ethical" <?php echo $_SESSION["results"][$_SESSION['projIndex']][20];?>>ethical<br>
            <input type="checkbox" name="considerations[]" value="enviromental" <?php echo $_SESSION["results"][$_SESSION['projIndex']][21];?>>enviromental<br>
            <input type="checkbox" name="considerations[]" value="health and safety" <?php echo $_SESSION["results"][$_SESSION['projIndex']][22];?>>health and safety<br>
          </div>
          <div class="rightCol">
            <input type="checkbox" name="considerations[]" value="sustainability" <?php echo $_SESSION["results"][$_SESSION['projIndex']][23];?>>sustainability<br>
            <input type="checkbox" name="considerations[]" value="social" <?php echo $_SESSION["results"][$_SESSION['projIndex']][24];?>>social<br>
            <input type="checkbox" name="considerations[]" value="manufacturability" <?php echo $_SESSION["results"][$_SESSION['projIndex']][25];?>>manufacturability<br>
            <input type="checkbox" name="considerations[]" value="political" <?php echo $_SESSION["results"][$_SESSION['projIndex']][26];?>>political<br>
          </div>
        </div>

        <div class="section">
          <h3>Comments (Optional):</h3>
          <textarea name="comments" rows="10" cols="105"><?php echo $_SESSION["results"][$_SESSION['projIndex']][27];?> </textarea>
        </div>

        <input id="submit" type="submit" value="Submit">

      </form>
    </div>
  </body>

	<script type="text/javascript">
		var selector = "input[type=number]";
		$(selector).change(function() {
			var count = 0;
			$(selector).each(function(){
			   if($(this).val() != "") count+=parseInt($(this).val());
			});
			document.getElementById("score").innerHTML = count;
		});

		//Calculate on page load
		$(function() {
			var count = 0;
			$(selector).each(function(){
				 if($(this).val() != "") count+=parseInt($(this).val());
			});
			document.getElementById("score").innerHTML = count;
		});
	</script>
</html>
