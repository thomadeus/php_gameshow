<?php

	include 'util.php';
	session_handler();

	// check for errors in user's data

	$state = $data['state'];
	if ($state == 'newgame') {
		header('Location: new-game.php');
		exit();
	} else if ($state == 'continue' || $state == 'winner') {
		header('Location: winner.php');
		exit();
	} else {
		header('Location: gameplay.php');
		exit();
	}

?>