<?php

//function checkUser(){
	$pin  = 0;
	$loginError = "";
	$userFile = fopen("users.csv","r") or die ("Error! User file is corrupt.");
	$userFound = false;
	while( ! feof($userFile) && isset($_SESSION['pin'])){
		$user = fgetcsv($userFile);
		if($_SESSION["pin"] == $user[0] && $user[1] == 0){
			$userFound = true;
			break;
		}
	}
	fclose($userFile);

	if($userFound == false){
		header("Location: index.php");
	}
//}

?>
