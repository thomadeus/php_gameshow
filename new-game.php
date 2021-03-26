<?php
    include 'util.php';
    session_handler();
    #session_start();
 
    $username = $_SESSION["username"];
    $new["state"] = "running";
    $new["score"] = 0;
    $question_stack = get_questions();
    $current_question = array_pop($question_stack);

    write_user_data($username, $new);
    store_question_stack($username, $question_stack);
    store_current_question($username, $current_question);

    header("Location: gameplay.php");
    exit();
?>