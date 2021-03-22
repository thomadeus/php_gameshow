<?php 
    
    include "util.php";
    session_handler();

    // $questions = $data["questions"];
    // $currQ = $data["current_question"];
    // $score = $data["score"];
    #print_r($current_question);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="game.css">
    <title>Gameplay</title>
</head>
<body>
    <div id="tool_bar">
        <div class="tb_item"> Score: <?php echo $data["score"];?></div>
        <form action="toolbar.php" method="POST">
            <input type="submit" class="tb_item tb_h" name="tb_button" value="Logout"/>
            <input type="submit" class="tb_item tb_h" name="tb_button" value="Main Menu"/>
             <!-- <div class="tb_item"> Logout </div>
             <div class="tb_item"> Main menu </div> -->
        </form>
    </div>

    <div id="game_board">
        <form action="gameplay-submit.php" method="POST">
            <div class="question"><?php print_r($current_question["question"]);?></div>
            <div id="choice_box">
                <input type="submit" class="choice red" name="choice" value="<?php echo $current_question["choice1"];?>"/>
                <input type="submit" class="choice yellow" name="choice" value="<?php echo $current_question["choice2"];?>"/>
                <input type="submit" class="choice blue" name="choice" value="<?php echo $current_question["choice3"];?>"/>
                <input type="submit" class="choice green" name="choice" value="<?php echo $current_question["choice4"];?>"/>
            </div>
        </form>
    </div>
</body>
</html>