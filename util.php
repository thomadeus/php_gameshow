<?php
    function get_questions() {
        $quiz = array(array());
        array_pop($quiz);
        $qs = file("./QA.txt");
        for($i = 0; $i<count($qs); $i++){
            $info = explode(",", $qs[$i]);
            $quiz["q".$i]["question"] = $info[0];
            $quiz["q".$i]["points"] = $info[1];
            $quiz["q".$i]["answer"] = $info[2];
            $quiz["q".$i]["choice1"] = $info[3];
            $quiz["q".$i]["choice2"] = $info[4];
            $quiz["q".$i]["choice3"] = $info[5];
            $quiz["q".$i]["choice4"] = $info[6];
        }
        return $quiz;
    }


    // $quiz = array(array());
    // array_pop($quiz);
    // $qs = file("./QA.txt");
    // for($i = 0; $i<count($qs); ++$i){
    //     $info = explode(",", $qs[$i]);
    //     $quiz["q".$i]["question"] = $info[0];
    //     $quiz["q".$i]["points"] = $info[1];
    //     $quiz["q".$i]["answer"] = $info[2];
    //     $quiz["q".$i]["choice1"] = $info[3];
    //     $quiz["q".$i]["choice2"] = $info[4];
    //     $quiz["q".$i]["choice3"] = $info[5];
    // }
    // print_r($quiz);
    // $curr = array_pop($quiz);
    // echo "<br> <br> <br>";
    // print_r($curr["question"]);
    // echo "<br> <br> <br>";
    // $curr = array_pop($quiz);
    // print_r($curr["question"]);
    // $curr = array_pop($quiz);
    // print_r($curr["question"]);

    // define('TENQS', "q1,q2,q3,q4,q5,q6,q7,q8,q9,q10");
    // foreach(explode(',', TENQS) as $key => $array) {
    //     foreach(explode(',', ))
    // }
    // $questions[] = array();
    // $questions_file = file("./QA.txt");
    // foreach($questions_file as $line)
    // {
    //     $info = explode(",", $line);
    //     #print_r($info);
    //     $questions[]["question"] = $info[0];
    //     $questions[]["points"] = $info[1];
    //     $questions[]["answer"] = $info[2];
    //     $questions[]["choice1"] = $info[3];
    //     $questions[]["choice2"] = $info[4];
    //     $questions[]["choice3"] = $info[5];
    // }
    // $test["questions"] = $questions;
    // print_r($test);
    // echo "<br> <br>";
    // $currQ = array_pop($test);
    
    // #$currQ = array_pop($test["questions"]);
    // #$currQ = array_pop($test);
    // print_r($currQ);

    // function session_handler() {
    //     global $username, $data;  // must be global to exist after function terminates
	// 	#session_save_path("session");  // important fix to work with codd server
	// 	session_start();
	// 	$username = $_SESSION['username'];
	// 	$data = read_user_data($username);
    // }
    
    function session_handler() {
        global $username, $data, $question_stack, $current_question;  // must be global to exist after function terminates
		#session_save_path("session");  // important fix to work with codd server
		session_start();
		$username = $_SESSION['username'];
		$data = read_user_data($username);
        $question_stack = get_question_stack($username);
        $current_question = get_current_question($username);
        #print_r($current_question);
        #echo $username;
    }
     
    function read_user_data($username): array {

		$file_contents = file_get_contents(get_user_file_location($username));
		$array = explode(PHP_EOL, $file_contents);

		foreach ($array as $item) {
			$split = explode(':', $item);
			$output[$split[0]] = $split[1] ?? null;
		}

		return $output;

	}

    function write_user_data($username, $data) {
		
		$output_string = "";
		
		foreach ($data as $key => $value) {
			if ($key != "") $output_string = $output_string . PHP_EOL . $key . ':' . $value;
		}
		file_put_contents(get_user_file_location($username), $output_string);
	}

    function store_question_stack($username, $stack) {
        file_put_contents(get_question_stack_loc($username), serialize($stack));
    }

    function store_current_question($username, $current) {
        file_put_contents(get_current_loc($username), serialize($current));
    }

    function get_question_stack($username) {
        $recovered = file_get_contents(get_question_stack_loc($username));
        $recoveredArray = unserialize($recovered);
        return $recoveredArray;
    }

    function get_current_question($username) {
        $recovered = file_get_contents(get_current_loc($username));
        $recoveredArray = unserialize($recovered);
        return $recoveredArray;
    }
   

	function write_new_account_info($username, $password) {

		$save_to_file = PHP_EOL . $username . ':' . $password;
		file_put_contents('passwords.txt', $save_to_file, FILE_APPEND);
	}
    
    function get_question_stack_loc($username) {
        return 'users/'. $username . 'stack.txt';
    }

    function get_current_loc($username) {
        return 'users/'. $username . 'current.txt';
    }

    function get_user_file_location($username) {
		return 'users/' . $username . '.txt';
	}

    
	function write_leaderboard($username, $score) {

		$output_string = "";
		$array = array($username => $score);
		foreach ($array as $key => $value) {
			$output_string = $output_string . PHP_EOL . $key . ':' . $value;
		}

		file_put_contents('leaderboards.txt', $output_string, FILE_APPEND);

	}

	function submit_score($username, $score) {

		$leaderboard = file('leaderboards.txt');

		$last_key = array_key_last($leaderboard);
		if ($leaderboard[$last_key] < $score) {
			$leaderboard[$username] = $score;
			arsort($leaderboard);
			$last_key = array_key_last($leaderboard);
			unset($leaderboard[$last_key]);
			write_leaderboard($username, $score);
		}
		
	}


	function read_leaderboard(): array {

		if (file_exists('leaderboards.txt')) {

			$file_contents = file_get_contents('leaderboards.txt');
			$scores = explode(PHP_EOL, $file_contents);
			foreach ($scores as $score) {
        		$score = explode(":", $score);
        		$score_list[$score[0]] = $score[1];
			}

			arsort($score_list);  // sores values numerically

			return $score_list;

		} else {
			
			return [];
		}
		
	}

    	// BELOW: PASSWORD FILE FUNCTIONS

	function check_password($username, $password): bool {

		$file_contents = file_get_contents('passwords.txt');
		$raw_text = explode(PHP_EOL, $file_contents);

		foreach ($raw_text as $line) {

			$split = explode(':', $line);
			if ($split[0] == $username) {

				if ($split[1] == $password) {
					return true;
				} else {
					return false;
				}

			}

		}

		return false;

	}


?>