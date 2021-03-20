<?php 
    
    include("util.php");
    
    session_handler();
    #session_start();
    
    // $questions = $data["questions"];
    // $currQ = $data["current_question"];
    // $score = $data["score"];
    print_r($current_question);
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="game.css">
    <title>Document</title>
</head>
<body>
    <div id="tool_bar">
    </div>

    <div id="game_board">
        <form action="gameplay-next" method="POST">
            <div class="question"><?php print_r($current_question);?></div>
        </form>
        
        <!-- <div class="flex_item red"><a href="g5subjects.php">5th Grade Subject </a></div>
        <div class="flex_item red"><a href="g5subjects.php">5th Grade Subject </a></div>
        <div class="flex_item yellow"><a href="g4subjects.php"> 4th Grade Subject </a></div>
        <div class="flex_item yellow"><a href="g4subjects.php"> 4th Grade Subject </a></div>
        <div class="flex_item blue"><a href="g3subjects.php"> 3rd Grade Subject</a></div>
        <div class="flex_item blue"><a href="g3subjects.php"> 3rd Grade Subject</a></div>
        <div class="flex_item purple"><a href="g2subjects.php">2nd Grade Subject</a></div>
        <div class="flex_item purple"><a href="g2subjects.php">2nd Grade Subject</a></div>
        <div class="flex_item green"><a href="g1subjects.php">1st Grade Subject</a></div>
        <div class="flex_item green"><a href="g1subjects.php">1st Grade Subject</a></div> -->
    </div>
</body>
</html>