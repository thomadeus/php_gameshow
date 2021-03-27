<?php
    include 'util.php';
    $leaderboard = read_leaderboard();
    $leaderboard_keys = array_keys($leaderboard);
    $leaderboard_values = array_values($leaderboard);

?>
<!DOCTYPE html>
<html>
<title> Leaderboards</title>
<head> </head>

<link href="game.css" type="text/css" rel="stylesheet" />

<style>
body {
font-family: Verdana;
background-image: url("congrats8.jpg");
background-repeat: no-repeat;
background-size: 100% 100%;
background-position: center;
background-attachment: fixed;
}
h1 {
	text-align: center;
	color: red;
	-webkit-text-stroke: 0.5px crimson;
	font-size: 33pt;
}
.main {
	position: relative;
}
img {
	position: absolute;
	top: 0;
	z-index: -1;
}
.goright {
	position: absolute;
	top: 0;
	right: 250;
	width: 348px;
	height: 650px;
	z-index: -1;
}
table {
  border-spacing: 15px;
  font-size: 16pt;
  color: indigo;
}
a:link {
  color: maroon;
}

</style>
<body>
<div class="main">
<img src="sparkle3.gif">
<div class="goright"><img src="sparkle3.gif"></div>
<div class="headline">
<h1> Top Smarties</h1>
</div>

<br>
<div class="leadboard"> <div class="leadusers1"><h2>Users</h2></div>
<br>
 <div class="leadusers2"><h2>Score</h2> </div>
 
 <table style="width:92%; margin-top: -70px; margin-left:60px;">
	<tr>
		<td> BOBBY </td>
		<td> 500 </td>
	</tr>
	<tr>
		<td> ELIZABETH </td>
        <td> 300 </td>
	</tr>
	<tr>
				<td> <?$leaderboard_keys[0]; ?> </td>
                <td> <?$leaderboard_values[0]; ?> </td>
	</tr>
	<tr>
				<td> <?$leaderboard_keys[1];?> </td>
                <td> <?$leaderboard_values[1]; ?> </td>
	</tr>

</table>
 </div>
 <br>
 <div class="mm"><a href="index.php"><h2> Back To Main Menu</h2></a></div>
 
</div>

<br><br><br><br>
    <p style="text-align: center; margin-top: 100; font-size: 10pt;">Results and page (C) Copyright blabla Inc.</p>
<br>

</body>
</html>