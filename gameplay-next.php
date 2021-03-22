<?php 
    include "util.php";
    session_handler();
    echo $current_question["answer"];
    echo $_POST["choice"];
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
        <?php
            if(isset($_POST["choice"]) && ($_POST["choice"] == $current_question["answer"])){
                $data["state"] = "runnning";
                $data["score"] = $data["score"] += (int)$current_question["points"];
                #echo $data["score"];
                $current_question = array_pop($question_stack);
                write_user_data($username, $data);
                print_r($question_stack);
                store_question_stack($username, $question_stack);
                store_current_question($username, $current_question);
                
            }
            if((isset($_POST["choice"]) && ($_POST["choice"] != $current_question["answer"]))){
            }
        ?>
    <div id="tool_bar">
        <div class="tb_item"> Score: <?php echo $data["score"];?></div>
        <div class="tb_item"> Logout </div>
        <div class="tb_item"> Main menu </div>
    </div>
        
    <div id="game_board">
       
        <form action="gameplay-next" method="POST">
            <div class="question"><?php print_r($current_question["question"]);?></div>
            <div id="choice_box">
                <input type="submit" class="red" name="choice" value="<?php echo $current_question["choice1"];?>"/>
                <input type="submit" class="yellow" name="choice" value="<?php echo $current_question["choice2"];?>"/>
                <input type="submit" class="blue" name="choice" value="<?php echo $current_question["choice3"];?>"/>
                <input type="submit" class="green" name="choice" value="<?php echo $current_question["choice4"];?>"/>
            </div>
            
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