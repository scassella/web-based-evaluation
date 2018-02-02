<?php

	$pin  = 0;
	$loginError = "";
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$pin = ($_POST["psw"]);
		$userFile = fopen("users.csv","r") or die ("Error! User file is corrupt.");
		$userFound = false;
		while( ! feof($userFile)){
			$user = fgetcsv($userFile);
			if($pin == $user[0]){
				$userFound = true;
				$_SESSION['pin'] = $pin;
				$_SESSION['submissionRecorded'] = "";
				$_SESSION['gotResults'] = False;

				$userType = $user[1];
				print_r("done!");
				break;
			}

		}
		fclose($userFile);
		if($userFound == false){
			$loginError = "Error! Invalid Pin.";
		}else{
			if($userType == 0){
				// header("Location: judgeForm.php");
				header("Location: selectProject.php");
			}else{
				header("Location: admin.php");
			}
			exit();
		}
	}

?>
