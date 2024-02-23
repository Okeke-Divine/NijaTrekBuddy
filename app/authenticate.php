<?php

	$session_user_id = (int) @$_SESSION['session_user_id'];
	if(empty($session_user_id)){
		header("location: /?view=login&reason=mustAuthenticate");
		die();
	}

?>