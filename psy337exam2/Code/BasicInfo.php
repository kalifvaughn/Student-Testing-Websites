<?php
/*  Collector
    A program for running experiments on the web
    Copyright 2012-2014 Mikey Garcia & Nate Kornell
 */
    require 'initiateCollector.php';
	
    $title = 'Basic Information';
    require $_codeF . 'Header.php';
?>
<div class="main-contain">
	<h2 class="textcenter">Basic Information</h2>

	<form name="Demographics" class="collector-form collector-form-extra" action="BasicInfoData.php" method="post" autocomplete="off">

		<div class="field">
			<legend>What is your gender?</legend>
			<input type="radio"   value="Male"     class="radio"    name="Gender"    />    Male     <br />
			<input type="radio"   value="Female"   class="radio"    name="Gender"    />    Female   <br />
		</div>

		<div class="field">
			<p>What is your age?</p>
			<input type="text" value="" name="Age" autocomplete="off" class="forceNumeric" />
		</div>

		<div class="field">
			<p>Which of the following best describes your highest achieved education level?</p>
			<select name="Education">
				<option selected="selected">Select Level</option>
				<option>    Some High School                            </option>
				<option>    High School Graduate                        </option>
				<option>    Some college, no degree                     </option>
				<option>    Associates degree                           </option>
				<option>    Bachelors degree                            </option>
				<option>    Graduate degree (Masters, Doctorate, etc.)  </option>
			</select>
		</div>

		<div class="field">
			<p>Are you Hispanic?</p>
			<input    type="radio"    name="Hispanic"    value="Yes" />    Yes    <br />
			<input    type="radio"    name="Hispanic"    value="No"  />    No     <br />
		</div>

		<div class="field">
			<p>Which of the following best describes your ethnicity?</p>
			<select name="Race">
				<option selected="selected">Select Level</option>
				<option>	American Indian/Alaskan Native		</option>
				<option>	Asian/Pacific Islander				</option>
				<option>	Black           					</option>
				<option>	White                       		</option>
				<option>	Other/unknwon						</option>
			</select>
		</div>

		<div class="field">
			<p>Do you speak English fluently?</p>
			<input    type="radio"    name="English"    value="Fluent"        />    Yes, I am fluent in English     <br />
			<input    type="radio"    name="English"    value="Non-Fluent"    />    No, I am not fluent in English  <br />
		</div>
        
		<div class="field">
			<p>What age did you start learning English? If English is your first language, please put 0.</p>
			<input type="text" value="" name="AgeEnglish" autocomplete="off"/>
		</div>

		<div class="field">
			<p>In what country do you live?</p>
			<input type="text" value="" name="Country" size="30"    autocomplete="off" />
		</div>
		
		<div class="field">
			<p>If you live in the United States of America, which state do you live in?</p>
			<select name="State">
				<option selected="selected">Select State</option>
				<option>Alabama			</option>
				<option>Alaska			</option>
				<option>Arizona			</option>
				<option>Arkansas		</option>
				<option>California		</option>
				<option>Colorado		</option>
				<option>Connecticut		</option>
				<option>Delaware		</option>
				<option>Florida			</option>
				<option>Georgia			</option>
				<option>Hawaii			</option>
				<option>Idaho			</option>
				<option>Illinois		</option>
				<option>Indiana			</option>
				<option>Iowa			</option>
				<option>Kansas			</option>
				<option>Kentucky		</option>
				<option>Louisiana		</option>
				<option>Maine			</option>
				<option>Maryland		</option>
				<option>Massachusetts	</option>
				<option>Michigan		</option>
				<option>Minnesota		</option>
				<option>Mississippi		</option>
				<option>Missouri		</option>
				<option>Montana			</option>
				<option>Nebraska		</option>
				<option>Nevada			</option>
				<option>New Hampshire	</option>
				<option>New Jersey		</option>
				<option>New Mexico		</option>
				<option>New York		</option>
				<option>North Carolina	</option>
				<option>North Dakota	</option>
				<option>Ohio			</option>
				<option>Oklahoma		</option>
				<option>Oregon			</option>
				<option>Pennsylvania	</option>
				<option>Rhode Island	</option>
				<option>South Carolina	</option>
				<option>South Dakota	</option>
				<option>Tennessee		</option>
				<option>Texas			</option>
				<option>Utah			</option>
				<option>Vermont			</option>
				<option>Virginia		</option>
				<option>Washington		</option>
				<option>West Virginia	</option>
				<option>Wisconsin		</option>
				<option>Wyoming			</option>
			</select>
		</div>

		<!-- ## SET ##  Use this area to provide the equivalent of an informed consent form -->
		<div class="consent">
			<h3 class="consent-legend">Informed Consent:</h3>
			<textarea rows="20" cols="45" readonly wrap="physical">You are invited to take part in a research study on learning and remembering facts. Please read this form carefully before agreeing to take part in the study. What the study is about: The purpose of this study is to learn more about how memory works and how people think memory works. What we will ask you to do: If you agree to be in this study, you will complete a computerized procedure in which you learn and try to remember information, such as vocabulary words, word pairs, and general information questions. The experiment's expected duration was displayed at the top of the page that linked you to this page. We might email you at a later date to ask you to participate in a second session, for which you will be compensated separately. Risks and benefits: We do not anticipate any risks to you participating in this study other than those encountered in daily life. You may benefit from learning some facts, but we do not promise any direct benefits to you. Compensation: You will be paid the amount listed at the top of this page. Taking part is voluntary: Taking part in this study is completely voluntary. If you decide to take part, you are free to withdraw at any time. Simply close your web browser or direct it away from the experiment. Your answers will be confidential. The records of this study will be kept private. In any report we make public we will not include any information that will make it possible to identify you. Only the researchers will have access to the research records. While no website can completely guarantee data security, we will keep your information as secure as possible. If you have questions: If you have any questions about this study you may contact Williams College Professor Nate Kornell at nate.kornell@williams.edu or at 413-597-4486. If you have any questions or concerns regarding your rights as a subject in this study, you may contact the Chair of the Institutional Review Board (IRB) at 413/597-2240 or Kenneth.K.Savitsky@williams.edu. You may print a copy of this consent form for your records. Requirements for participation: You must be 18 years of age or older to participate. Statement of Consent: If you have read and understand the above statements, and you are 18 years of age or older, please click the Submit button below to indicate your consent to participate in this study. 
		</textarea>
		</div>

		<div class="consent textcenter">
			<input class="button" type="submit" value="Submit Basic Info" />
		</div>
	</form>
</div>
<?php
    require $_codeF . 'Footer.php';