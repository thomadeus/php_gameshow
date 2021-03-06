  
<?php

    include 'util.php';
    #session_handler();
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (preg_match("/^$/", $username) || preg_match("/^$/", $password)) {
        header("Location: signup.php?err=3");
        exit();
    }

    if (!preg_match('/^[a-zA-Z0-9]+$/', $username)) {
        header('Location: signup.php?err=2');
        exit();
    }

    if (file_exists(get_user_file_location($username))) {
        header('Location: signup.php?err=1');
        exit();
    }

    write_new_account_info($username, $password);

    $new["state"] = "running";
    $new["score"] = 0;
    session_start();
    $_SESSION['username'] = $username;
    write_user_data($username, $new);

    $question_stack = get_questions();
    $current_question = array_pop($question_stack);
    store_question_stack($username, $question_stack);
    store_current_question($username, $current_question);

    header('Location: gameplay.php');
    exit();
?>
