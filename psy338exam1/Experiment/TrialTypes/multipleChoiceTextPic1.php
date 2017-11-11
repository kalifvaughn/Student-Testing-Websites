<?php
    /**
     * To use this trial type, use multiple entries in the Text column of the
     * procedure file to create the question and the possible responses.
     *
     * For example, if your text column contains:
     *     Which choice is best?|First|Second|Third
     * participants will have the choices "First", "Second", and "Third" for
     * the question "Which choice is best?"
     *
     * As usual, separate entries in the Text column are separated by the pipe
     * character |, which you can use by holding Shift and pressing the
     * backslash character \.  
     */
    $compTime = 5;                  // time in seconds to use for 'computer' timing
    
    $texts = explode('|', $text);
    foreach ($texts as &$t) {
        $t = trim($t);
    }
    unset($t);
 ?>
    <style>
        label       { display: table-row; }
        label > div { display: table-cell; }
        .McOuter    { text-align: center; }
        .McInner    { display: inline-block; text-align: left; }
    </style>
	<?php $pic1 = "images/pic1.jpg";
echo show($pic1); ?>
    <div class="McOuter">
        <div class="McInner">
            <?php
                echo array_shift($texts);
                foreach ($texts as $txt) {
                    ?><label><div><input type="radio" name="Response" value="<?= $txt ?>" /></div><div><?= $txt ?></div></label><?php
                }
            ?>
            <div><input class="button button-trial-advance" id="FormSubmitButton" type="submit" value="Submit" disabled/></div>
        </div>
    </div>
<script>
var $radioButtons = $("input:radio");

$radioButtons.change(function(){
    var anyRadioButtonHasValue = false;
    
    $radioButtons.each(function(){
        if(this.checked){
            anyRadioButtonHasValue = true;
            return false;
        }
    });
    
    if(anyRadioButtonHasValue){
        $("input[id='FormSubmitButton']").removeAttr("disabled");
    }
    else{
        // else is kind of redundant unless you somehow can clear the radio button value
        $("input[id='FormSubmitButton']").attr("disabled", "");
    }
});
</script>