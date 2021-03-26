<?php  
    include "util.php";
    session_handler();
    // echo $current_question["answer"];
    // echo $_POST["choice"];

    #CORRECT CASE
    if( (isset($_POST["choice"])) && ($_POST["choice"] == $current_question["answer"])){
        $data["state"] = "runnning";
        $data["score"] = $data["score"] += (int)$current_question["points"];
        #echo $data["score"];
        echo "correct";

        #ANSWERED ALL QUESTIONS CORRECTLY
        if(count($question_stack) == 0){
            $data["state"] = "winner";
            $data["score"] = $data["score"];
            write_user_data($username, $data);
            submit_score($username, $data["score"]);
            header('Location: winner.php');
            exit();
        }

        #GET NEXT QUESTION AND PROCEED
        $current_question = array_pop($question_stack);
        write_user_data($username, $data);
        store_question_stack($username, $question_stack);
        store_current_question($username, $current_question);
        header('Location: gameplay.php');
        exit();
    }
    #INCORRECT CASE
    if( (isset($_POST["choice"])) && ($_POST["choice"] != $current_question["answer"])){
        #go to lost game retry page
        submit_score($username, $data["score"]);
        echo "wrong choice";
        header('Location: try-again.php');
        exit();
    }

    #TOOL BAR BUTTON CASES
    if(isset($_POST["tb_button"])){
        if($_POST["tb_buttn"] == "Main menu"){
            header('Location: index.php');
            exit();
        }
        else{
            header('Location: logout.php');
            exit();
        }

    }
?>