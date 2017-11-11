<?php
	$compTime = 8;					// time in seconds to use for 'computer' timing

	$firstTrialType = trim(strtolower($currentTrial['Procedure']['Trial Type']));
	// picture trial version of feedback
    if ($text === '') { $text = 'The correct answer was:'; }
?>
	
<?php
	$cues = explode('|', $cue);
		$answers = explode('|', $answer);
		foreach( $cues as $i => $thisCue ) {
			$thisAnswer = $answers[$i];
		}
?>
   
<?php   
		?><h2><?php echo $text . '<strong>  ' . $thisAnswer . '</strong>'; ?></h2><?php
?>

<?php echo $thisCue; ?>

    <div class="precache textcenter">
        <input class="button button-trial-advance" id="FormSubmitButton" type="submit" value="Next" />
    </div>