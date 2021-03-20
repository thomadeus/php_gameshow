<?php
    include 'util.php';
    session_handler();
    #session_start();
    // $_SESSION["score"] = 0;
    // $_SESSION["questions"] = get_questions();
    // $_SESSION["current_q"] = array_pop($_SESSION["questions"]);
    $username = $_SESSION["username"];
    $new["state"] = "running";
    $new["score"] = 0;
    $question_stack = get_questions();
    $current_q = array_pop($question_stack);

    write_user_data($username, $new);
    store_question_stack($username, $question_stack);
    store_current_question($username, $current_q);

    header("Location: gameplay.php");
    exit();
?>