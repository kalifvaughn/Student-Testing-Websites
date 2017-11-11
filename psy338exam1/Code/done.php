<?php
/*  Collector
    A program for running experiments on the web
    Copyright 2012-2014 Mikey Garcia & Nate Kornell
 */
    require 'initiateCollector.php';
    
 
    
    // turn off error reporting for debug mode
    if (array_key_exists('Debug', $_SESSION)) {
        if ($_SESSION['Debug'] == FALSE) {
            error_reporting(0);
        }
    }
    
    
    // Set the page message
    if ($nextExperiment == FALSE) {
        $title   = 'Done!';
        $message = '<h1>You may close your browser now.</h1><p><h2>Come back and test yourself soon! Goodbye!</h2>';
        if ($mTurkMode == TRUE) {
            $message .= '<h3>Your verification code is: ' . $verification . '-' . $_SESSION['ID'] .'</h3>';
        }
    } else {
        $title    = 'Quick Break';
        $message  = '<h2>Experiment will resume in 5 seconds.</h2>';
        $nextLink = 'http://' . $nextExperiment;
        $username = $_SESSION['Debug'] ? $debugName . ' ' . $_SESSION['Username'] : $_SESSION['Username'];
        echo '<meta http-equiv="refresh" content="5; url=' . $nextLink . 'Code/login.php?Username='
            . urlencode($username) . '&Condition=Auto&ID=' . $_SESSION['ID'] . '">';
    }
    
    
    if (isset($_SESSION['finishedTrials'])) {
        // calculate total duration of experiment session
        $duration = time() - strtotime($_SESSION['Start Time']);
        $durationFormatted = $duration;
        $hours   = floor($durationFormatted/3600);
        $minutes = floor( ($durationFormatted - $hours*3600)/60);
        $seconds = $durationFormatted - $hours*3600 - $minutes*60;
        if ($hours   < 10 ) { $hours   = '0' . $hours;   }
        if ($minutes < 10 ) { $minutes = '0' . $minutes; }
        if ($seconds < 10 ) { $seconds = '0' . $seconds; }
        $durationFormatted = $hours . ':' . $minutes . ':' . $seconds;
        
        
        #### Record info about the person ending the experiment to status finish file
        $data = array(
                        'Username'              => $_SESSION['Username'],
                        'ID'                    => $_SESSION['ID'],
                        'Date'                  => date('c'),
                        'Duration'              => $duration,
                        
                        'Duration_Formatted'    => $durationFormatted,
                        'Session'               => $_SESSION['Session'],
                        'Condition_Number'      => $_SESSION['Condition']['Number'],
                        'Inclusion Notes'       => 'Left Blank',
                        );
        arrayToLine($data, $statusEndPath);
        
        
        ######## Save the $_SESSION array as a JSON string
        $ExpOverFlag = $_SESSION['Trials'][ ($_SESSION['Position']) ]['Procedure']['Item'];
        // if you haven't finished all sessions yet
        if ($ExpOverFlag != 'ExperimentFinished') {           
            $_SESSION['Position']++;                        // increment counter so next session will begin after the *NewSession* (if multisession)
            $_SESSION['Session']++;                         // increment session # so next login will be correctly labeled as the next session
            $_SESSION['ID'] = rand_string();                // generate a new ID (for next login)
            $_SESSION['finishedTrials'] = FALSE;            // will stop them from skipping to done.php during next session
            $_SESSION['LastFinish'] = time();
        }
        
        $jsonSession = json_encode($_SESSION);              // encode the entire $_SESSION array as a json string
        
        $jsonDIR  = $_rootF . $dataF . $dataSubFolder . $jsonF;
        $jsonPath = $jsonDIR . $_SESSION['Username'] . '.json';
        
        if (!is_dir($jsonDIR)) {                            // make the folder if it doesn't exist
            mkdir($jsonDIR, 0777, true);
        }
        $jsonHandle = fopen($jsonPath, 'w');                // open the file for writing, zero out any previous data
        fwrite($jsonHandle, $jsonSession);                  // write the current state of $_SESSION
        fclose($jsonHandle);
        #######
    }
    
    
    $_SESSION = array();                        // clear out all session info
    session_destroy();                          // destroy the session so it doesn't interfere with any future experiments
    
    
    #### TO-DO ####
    /*
     * Write code that looks at previous logging in activity and gives recommendations as to whether or not to include someone
     * ideas:
     *        if someone has logged in more than once, flag them
     *        if someone has 1 login and no ends then say they're likely good
     *        if someone already has 1 finish then say so
     */
    
    
    require $_codeF . 'Header.php';
?>
	<div class="cframe-content">
		<?php echo $message; ?>
	</div>
<?php
    require $_codeF . 'Footer.php';
?>