<?php
	session_start();
	include('destroy_session.php');
	session_start();
	include('check_login.php');
?>

<!DOCTYPE html>
<html>
	<head>
		<title>
			Judge Evaluation Login
		</title>
		<link rel="stylesheet" type="text/css" href="login_admin_styles.css">
	</head>
	<body>
		<h1>Welcome! Please Login:</h1>
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
			Pin:<br>
			<input type="password" name="psw" maxlength="10" >
			<input type="submit" value="Login"><br>
			<span><?php echo $loginError; ?></span>
		</form>
	</body>
</html>
