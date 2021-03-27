<?php
    include 'util.php';
?>
<!DOCTYPE html>
<html>
<title>WINNER </title>
<head> </head>

<link href="game.css" type="text/css" rel="stylesheet" />
<style>
body {
	font-family: Verdana;
	color: white;
	background-image: url("balloons1.jpg");
    background-repeat: no-repeat;
	background-size: 100% 100%;
	background-attachment: fixed;
}
h1 {
	color: white;
	text-align: center;
	-webkit-text-stroke: 0.5px gold;
}
h2,h3 {
	color: white;
	text-align: center;
}
.main {
	position: relative;
}
img {
	position: absolute;
	top: 0;
	width: 348px;
	height: 650px;
	z-index: -1;
}
.playb {
	display: block;
	border: 3px solid steelblue;
	background-color: maroon;
	opacity: 0.8;
    width: 600px;
	left: 200px;
	margin: auto;
}
.playb:hover {
  background-color: lightsteelblue;
  color: white;
  transition-duration: 0.4s;
  cursor: pointer;
}
.playb:active {
  background-color: navy;
  color: black;
  box-shadow: 0 3px #666;
  transform: translateY(4px);
}
.playb2 {
	display: block;
	border: 3px solid maroon;
	background-color: goldenrod;
	opacity: 0.8;
    width: 250px;
	left: 200px;
	margin: auto;
}
.playb2:hover {
  background-color: violet;
  color: white;
  transition-duration: 0.4s;
  cursor: pointer;	
}
.playb2:active {
  background-color: purple;
  color: black;
  box-shadow: 0 3px #666;
  transform: translateY(4px);
}
.rightb {
	position: absolute;
	top: 0;
	right: 0;
	width: 348px;
	height: 650px;
	z-index: -1;
}
</style>

<body>
<div class="main">
<img src="confetti.gif" />
<div class="rightb"><img src="confetti.gif"/></div>
<br>
<h1 style="color:goldenrod">YOU DID IT!</h1>
<br><br>
<h1>You ARE smarter than a 5th grader!</h1>
<br><br>
<div class="playb"><a href="new-game.php" style="text-decoration:none; color: inherit;"><h2> Play Again!</h2></div>
<br><br>
<div class="playb"><a href="leaderboards.php" style="text-decoration:none; color: inherit;"><h2> Go To Leaderboard</h2></a></div>
<br><br>
<div class="playb2"><a href="index.php" style="text-decoration:none; color: inherit;"><h3> Back To Main Menu</h3></a></div>

<br><br><br>
<p style="text-align: center; font-size: 10pt;">Results and page (C) Copyright blabla Inc.</p>
<br>

</div>
</body>
</html>