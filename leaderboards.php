
<?php
    include 'util.php';
    $leaderboard = read_leaderboard();
    $leaderboard_keys = array_keys($leaderboard);
    $leaderboard_values = array_values($leaderboard);

?>
<!DOCTYPE html>
<html>

<head>
    <title>Leaderboards</title>
    <link href="./game.css" type="text/css" rel="stylesheet" />
</head>

<body class="login-body">
<div class="leaderboard">
		<table>
    		<tr>
        		<th colspan=2>Smarties</th>
    		</tr>
    		<tr>
				<td> <?=$leaderboard_keys[0] ?> </td>
                <td> <?=$leaderboard_values[0] ?> </td>
			</tr>
			<tr>
				<td> <?=$leaderboard_keys[1] ?> </td>
                <td> <?=$leaderboard_values[1] ?> </td>
			</tr>
        </table>
    <div><a href="index.php">Main Menu<br></a></div>
</div>

    <br>
    <p>Results and page (C) Copyright blabla Inc.</p>
    <br>
</body>

</html>