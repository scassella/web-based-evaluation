<?php
	// print_r("In destroy_session");
	// print_r($_SESSION);

	if (isset($_SESSION)){
		session_unset();
		session_destroy();
		$_SESSION = array();

		// print_r("Destroyed the session.");
  }
?>
