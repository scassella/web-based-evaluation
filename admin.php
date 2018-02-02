<?php
	session_start();
	include('check_admin.php');

?>
<!DOCTYPE html>
<html>
	<head>
		<title>
			Admin Page
		</title>
		<link rel="stylesheet" type="text/css" href="login_admin_styles.css">
	</head>
	<script>

	</script>
	<body>
		<h1>Admin Page</h1>
		<br>
		<br>
		Advisor Report
		<form method="post" action=advisor_report.php>
		<select name="advisor" id="advisor">
			<?php
				include('generate_advisor_list.php');
	foreach($uniqueAdv as $adv){ ?>
			 <option value="<?=$adv ?>"><?= $adv ?></option>
			<?php
			}
		?>
</select>
<input type="submit" value="Download Advisor Report"/>
</form>
<br>
Session Report
<form method="post" action=session_report.php>
         <select name="sesID" id="sesID">
             <?php
                  include('generate_session_list.php');
      foreach($uniqueSes as $ses){ ?>
               <option value="<?=$ses ?>"><?= $ses ?></option>
              <?php
              }
          ?>
  </select>
 <input onclick="myFunction()" type="submit" value="Download Session Report"/>
 </form>
</body>

</html>
