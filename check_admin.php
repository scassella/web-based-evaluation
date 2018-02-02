<?php

//function checkUser(){
	$pin  = 0;
	$loginError = "";
	$userFile = fopen("users.csv","r") or die ("Error! User file is corrupt.");
	$userFound = false;
	while( ! feof($userFile) && isset($_SESSION['pin'])){
		$user = fgetcsv($userFile);
		if($_SESSION["pin"] == $user[0] && $user[1] == 1){//1 for admin
			$userFound = true;
			break;
		}
	}

	if($userFound == false){
		header("Location: index.php");
	}

	fclose($userFile);
//}

?>
