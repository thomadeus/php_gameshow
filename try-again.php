<?php
    include 'util.php';
    session_handler();
?>
<!DOCTYPE html>
<html>
<title>YOU LOSE!</title>
<head> </head>
<link href="game.css" type="text/css" rel="stylesheet" />

<style>
body {
color: white;
font-family: Verdana;
background-image: url("yousuck.jpg");
background-repeat: no-repeat;
background-size: 100% 100%;
background-attachment: fixed;
}
h1,h2,h3 {
	text-align: center;
}
img {
	position: absolute;
	z-index: -1;
	height: ;
	width: 600px;
	top: 80;
}
.main {
	position: relative;
}

</style>

<body>
<div class="main">

<br>
<h1>You are NOT smarter than a 5th grader!</h1>
<br><br><br><br>
<div class="tryb1"><a href="new-game.php"style="text-decoration:none; color: inherit";><h3> Try Again!</h3></a></div>
<br><br><br>
<div class="tryb2"><a href="index.php"style="text-decoration:none; color: inherit;"><h3> Back to Main Menu</h3></a></div>
<br> <img src="crowd3.gif" />
<div class="crowdr"><img src="crowd3.gif" /></div>
<div class="crowdr2"><img src="crowd3.gif" /></div>
</div>
<br>
<p style="text-align: center; margin-top: 225; font-size: 10pt;">Results and page (C) Copyright blabla Inc.</p>
<br>



</body>
</html>