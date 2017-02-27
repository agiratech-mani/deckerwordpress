<?php
if($post->ID!=6){
	exit ("Do not access this file directly.");
}
?>

<script type="text/javascript">
	$(function() {
		//var contactRequired = $('#contactform-i .required');

		$('#contactform-i').submit(function(e){
			$('#errorReport').hide();
			var valid = true;
			$('#contactform-i input').removeClass('error');
			$('#contactform-i input.required').each(function(){
				if($(this).val()==''){
					var name = $(this).attr('name');
					$(this).addClass('error');
					$('#contactform-i .'+name).addClass('error');
					valid = false;
				}
			});
			$('#contactform-i select').removeClass('error');
			$('#contactform-i select.required').each(function(){
				if($(this).val()==''){
					var name = $(this).attr('name');
					$(this).addClass('error');
					$('#contactform-i .'+name).addClass('error');
					valid = false;
				}
			});
			if (valid == false){
				$('.errorReport').show();
				e.preventDefault();
				return false;
			}else{
				return true;
			}
		});

		$('#contactform-g').submit(function(e){
			$('#errorReport').hide();
			var valid = true;
			$('#contactform-g input').removeClass('error');
			$('#contactform-g input.required').each(function(){
				if($(this).val()==''){
					var name = $(this).attr('name');
					$(this).addClass('error');
					$('#contactform-g .'+name).addClass('error');
					valid = false;
				}
			});
			$('#contactform-g select').removeClass('error');
			$('#contactform-g select.required').each(function(){
				if($(this).val()==''){
					var name = $(this).attr('name');
					$(this).addClass('error');
					$('#contactform-g .'+name).addClass('error');
					valid = false;
				}
			});
			if (valid == false){
				$('.errorReport').show();
				e.preventDefault();
				return false;
			}else{
				return true;
			}
		});

		$('#contactform-o').submit(function(e){
			$('#errorReport').hide();
			var valid = true;
			$('#contactform-o input').removeClass('error');
			$('#contactform-o input.required').each(function(){
				if($(this).val()==''){
					var name = $(this).attr('name');
					$(this).addClass('error');
					$('#contactform-o .'+name).addClass('error');
					valid = false;
				}
			});
			$('#contactform-o select').removeClass('error');
			$('#contactform-o select.required').each(function(){
				if($(this).val()==''){
					var name = $(this).attr('name');
					$(this).addClass('error');
					$('#contactform-o .'+name).addClass('error');
					valid = false;
				}
			});
			if (valid == false){
				$('.errorReport').show();
				e.preventDefault();
				return false;
			}else{
				return true;
			}
		});
	});
</script>
<?php

$salesforce_form = '
<!-- salesforce form -->
    <input type=hidden name="oid" value="00D300000000jcx">
    <input type=hidden name="retURL" value="http://decker.com/thank-you/">

    <p> <small><span class="req">*</span> <em>Required fields</em></small> </p>
    <p style="display:none;" class="errorReport"><strong class="txt_error">Please check the highlighted fields.</strong></p>

    <!--  ----------------------------------------------------------------------  -->
    <!--  NOTE: These fields are optional debugging elements.  Please uncomment   -->
    <!--  these lines if you wish to test in debug mode.                          -->
    <!--  <input type="hidden" name="debug" value=1>                              -->
    <!--  <input type="hidden" name="debugEmail" value="lfisher_1@yahoo.com">     -->
    <!--  ----------------------------------------------------------------------  -->
    <p><label for="first_name" class="first_name">First Name <span class="req">*</span></label> <input  id="first_name" maxlength="40" name="first_name" size="36" type="text" class="required" /></p>
    <p><label for="last_name" class="last_name">Last Name <span class="req">*</span></label> <input  id="last_name" maxlength="80" name="last_name" size="36" type="text" class="required" /></p>
    <p><label for="email" class="email">Email <span class="req">*</span></label> <input  id="email" maxlength="80" name="email" size="36" type="text" class="required" /></p>
    <p><label for="phone">Phone</label> <input  id="phone" maxlength="40" name="phone" size="36" type="text" /></p>
    <p><label for="company" class="company">Company  <span class="req">*</span></label> <input  id="company" maxlength="40" name="company" size="36" type="text" class="required" /></p>
    <p><label for="title">Title <span class="req">*</span></label> <input  id="title" maxlength="40" name="title" size="36" type="text" class="required" /></p>
    <p><label for="city">City</label> <input  id="city" maxlength="40" name="city" size="36" type="text" /></p>
    <p><label for="state">State/Province</label> <input  id="state" maxlength="20" name="state" size="34" type="text" /></p>
    <p><label for="zip">Zip</label> <input  id="zip" maxlength="20" name="zip" size="36" type="text" /></p>

    <div style="display:none;">
        <!--what are you interested in? -->
        <select  id="00N50000002e129" name="00N50000002e129" title="What Program are you interested in?">
            <option value="Decker Made to Stick Messaging">Decker Made to Stick Messaging</option>
            <option value="Communicate to Influence">Communicate to Influence</option>
            <option value="Platinum Executive Coaching">Platinum Executive Coaching</option>
            <option value="Next Level advanced programs">Next Level advanced programs</option>
            <option value="Communicate with Service">Communicate with Service</option>
            <option value="Need more information">Need more information</option>
        </select>

        <p><label>This training is for:</label><br />
            <input type="text" id="choice-q1-desc" name="This_training_is_for__c" size="36" value="" readonly /><br />
            <input type="text" id="choice-q2-desc" name="This_training_is_for_Q2__c" size="36" value="" readonly /><br />
            <input type="text" id="choice-q3-desc" name="This_training_is_for_Q3__c" size="36" value="" readonly /><br />
        </p>
    </div>

    <p><label>Brief description of your needs</label>
        <textarea name="description"></textarea>
    </p>

    <p><label>How did you hear about us?: <span class="req">*</span></label><br />
    <select id="00N50000002ec9m" name="00N50000002ec9m" title="How did you hear about us? (Select)" class="required" style="width:363px;">
    <option value="">--select--</option>
    <option value="Referral from colleague/mentor/friend">Referral from colleague/mentor/friend</option>
    <option value="Internet search">Internet search</option>
    <option value="Bert Decker&#39;s book: You&#39;ve Got to Be Believed to Be Heard">Bert Decker&#39;s book: <em>You&#39;ve Got to Be Believed to Be Heard</em></option>
    <option value="Attended a previous program/saw a keynote speech">Attended a previous program/saw a keynote speech</option>
    <option value="Interest in Made to Stick">Interest in Made to Stick</option>
    <option value="Other">Other</option>
    </select>
    </p>

    <p>If other, please describe how:
    <input  id="00N50000002ec7v" maxlength="60" name="00N50000002ec7v" size="20" type="text" /></p>

    <!--lead type-->
    <input type="hidden" name="00N50000002e2SN" id="00N50000002e2SN" value="Internet?" />
    <input type="hidden" name="lead_source" id="lead_source" value="Inbound - Web - Solution Matching Tool" />

    <p><input type="submit" value="Send Message" name="submit" class="button" id="submit" /></p>
';
?>

<form id="reference" style="display:none;">
    <input type="hidden" id="choice-q1" name="q1" value="" />
    <input type="hidden" id="choice-q2" name="q2" value="" />
    <input type="hidden" id="choice-q3" name="q3" value="" />
    <input type="hidden" id="choice-q4" name="q4" value="" />
</form>

<div id="solution-matching">
    <div id="q1">
        <div class="choices">
            <p class="top"></p>
            <div class="middle three-across">
                <p class="unselected" id="individual"><a>An Individual</a></p>
                <p class="unselected" id="group"><a>A Group/Team</a></p>
                <p class="unselected" id="other"><a>Other</a></p>
            </div>
            <p class="bottom"></p>
        </div>
    </div>

    <div id="individual-block">
        <div class="q2 questions">
            <div class="choices">
                <p class="top"></p>
                <div class="individual middle three-across">
                    <p class="unselected" id="i-p-platinum"><a>This individual is at the executive level (VP or above)</a></p>
                    <p class="unselected" id="i-p-mngr"><a>This individual is at the Manager / Director level</a></p>
                    <p class="unselected" id="i-p-emp"><a>This individual is at the Employee level</a></p>
                </div>
                <p class="bottom"></p>
            </div>
        </div>
        <div class="q4 questions">
            <p class="desc">This best describes what we're trying to achieve:</p>
            <div class="choices">
                <p class="top"></p>
                <div class="individual middle three-across tall">
                    <p class="unselected" id="i-d-cti"><a>Become a more confident, credible, and influential speaker. Focus on communication behaviors and content structure.</a></p>
                    <p class="unselected" id="i-d-dmtsm"><a>Learn an easy-to-use methodology for messaging and storytelling that will help your ideas stand out and gain traction.</a></p>
                    <p class="unselected" id="i-d-consult"><a>Design a communication training program that fits your team's specific needs and challenges.</a></p>
                </div>
                <p class="bottom"></p>
            </div>
        </div>
        <div class="q5 individual results">
            <p class="top"></p>
            <div class="individual middle">
                <p class="result" id="individual-cti">The program that best matches your needs is <span class="highlight">Decker Communicate to Influence&trade;</span>.
                    <br /><a href="<?php echo get_permalink(167);?>">Learn More ></a>
                    <br /><a href="<?php echo get_permalink(3989);?>">Register Now ></a></p>
                <p class="result" id="individual-dmtsm">The program that best matches your needs is <span class="highlight">Decker Made to Stick Messaging</span>.
                    <br /><a href="<?php echo get_permalink(169);?>">Learn More ></a>
                    <br /><a href="<?php echo get_permalink(3989);?>">Register Now ></a></p>
                <!--<p class="result" id="individual-consult">Submit your contact details and someone will contact you about your event.</p>-->
                <p class="result" id="individual-consult">The solution that best matches your needs is one-on-one tailored executive coaching focused on becoming a more confident, credible, and influential leader.</p>

                <p>Submit your contact details and someone will contact you.</p>

                <form action="https://www.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8" method="POST" id="contactform-i">
                    <?php echo $salesforce_form;?>
                </form>
            </div>
            <p class="bottom"></p>
        </div>
    </div>

    <div id="group-block">
        <div class="q2 questions">
            <p class="desc">The group/team is:</p>
            <div class="choices">
                <p class="top"></p>
                <div class="group middle five-across">
                    <p class="unselected" id="g-p-2"><a>2 to 7 people</a></p>
                    <p class="unselected" id="g-p-8"><a>8 to 12 people</a></p>
                    <p class="unselected" id="g-p-13"><a>13 to 50 people</a></p>
                    <p class="unselected" id="g-p-51"><a>51 to 150 people</a></p>
                    <p class="unselected" id="g-p-150"><a>Over 150 people</a></p>
                </div>
                <p class="bottom"></p>
            </div>
        </div>
        <div class="q3 questions">
            <div class="choices">
                <p class="top"></p>
                <div class="group middle four-across">
                    <p class="unselected" id="g-n-comm"><a>The group/team needs communication training.</a></p>
                    <p class="unselected" id="g-n-includecomm"><a>We would like to include communication training as a part of a larger company event.</a></p>
                    <p class="unselected" id="g-n-speaker"><a>We would like to book a speaker for our company event.</a></p>
                    <p class="unselected" id="g-n-other"><a>Other</a></p>
                </div>
                <p class="bottom"></p>
            </div>
        </div>
        <div class="q4 group questions">
            <p class="desc">This best describes what we're trying to achieve:</p>
            <div class="choices">
                <p class="top"></p>
                <div class="group middle three-across tall">
                    <p class="unselected" id="g-d-cti"><a>Become a more confident, credible, and influential speaker. Focus on communication behaviors and content structure. </a></p>
                    <p class="unselected" id="g-d-dmtsm"><a>Learn an easy-to-use methodology for messaging and storytelling that will help your ideas stand out and gain traction.</a></p>
                    <p class="unselected" id="g-d-consult"><a>Design a communication training program that fits your team's specific needs and challenges.</a></p>
                </div>
                <p class="bottom"></p>
            </div>
        </div>
        <div class="q5 group results">
            <p class="top"></p>
            <div class="group middle">
                <p class="result" id="group-cti">The program that best matches your needs is <span class="highlight">Decker Communicate to Influence&trade;</span>.
                    <br /><a href="<?php echo get_permalink(266);?>">Learn More ></a>
                    <br /><a href="<?php echo get_permalink(3989);?>">Register Now ></a>
                    <br /><br />Submit your contact details and someone will contact you about your event.
                </p>
                <p class="result" id="group-dmtsm">The program that best matches your needs is <span class="highlight">Decker Made to Stick Messaging</span>.
                    <br /><a href="<?php echo get_permalink(268);?>">Learn More ></a>
                    <br /><a href="<?php echo get_permalink(3989);?>">Register Now ></a>
                    <br /><br />Submit your contact details and someone will contact you about your event.
                </p>
                <p class="result" id="group-consult">Submit your contact details and someone will contact you about your event.</p>
                <p class="result" id="group-other">Please provide a brief description of your needs, including an email and/or phone number and someone will contact you within 24 hours.</p>

                <form action="https://www.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8" method="POST" id="contactform-g">
                    <?php echo $salesforce_form;?>
                </form>
            </div>
            <p class="bottom"></p>
        </div>
    </div>

    <div id="other-block">
        <div class="q5 other results">
            <p class="top"></p>
            <div class="other middle">
                <p class="result" id="other-other">Please provide a brief description of your needs, including an email and/or phone number and someone will contact you within 24 hours.</p>

                <form action="https://www.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8" method="POST" id="contactform-o">
                    <?php echo $salesforce_form;?>
                </form>
            </div>
            <p class="bottom"></p>
        </div>
    </div>
</div>


<script type="text/javascript">

$(document).ready(function(){

    $('#individual-block').hide();
    $('#group-block').hide();
    $('.questions').hide();
    $('.results').hide();

    $('#q1 div.middle p').bind("click",function(e){
        $('.questions').hide();
        $('.results').hide();

        $('#q1 div.middle p').attr("class", "unselected");
        $('.q2 div.middle p').attr("class", "unselected");
        $('.q3 div.middle p').attr("class", "unselected");
        $('.q4 div.middle p').attr("class", "unselected");
        $(this).attr("class", "selected");

        var type = $(this).attr('id');
        $("input#choice-q1").val(type);
        $("input#choice-q1-desc").val($(this).text());

        if(type=="other"){
            //if they select 'other' first skip over all other questions and go straight to final answer
            $('.q2').hide();
            $('.q3').hide();
            $('.q4').hide();

            $('#'+type+'-block').show();
            $('#'+type+'-block .q5').show();

            $('.q5 p.result').hide();
            $('#'+type+'-block .q5 p#'+type+'-other').show();

            //clear other previous choices
            $("input#choice-q2").val('');
            $("input#choice-q3").val('');
            $("input#choice-q4").val('');
            $("input#choice-q2-desc").val('');
            $("input#choice-q3-desc").val('');

        } else {
            $('#'+type+'-block').show();
            $('#'+type+'-block .q2').show();
        }
    });

    $('.q2 div.middle p').bind("click",function(e){
        $('.q3').hide();
        $('.q4').hide();
        $('.q5').hide();

        $('.q2 div.middle p').attr("class", "unselected");
        $('.q3 div.middle p').attr("class", "unselected");
        $('.q4 div.middle p').attr("class", "unselected");

        $(this).attr("class", "selected");
        $("input#choice-q2").val($(this).attr("id"));
        $("input#choice-q2-desc").val($(this).text());

        var type = $(this).closest("div").attr('class').split(" ")[0];

        if(type=="individual"){
            // if it's an individual question, skip q3
            $('#'+type+'-block .q4').show();
        } else {
            $('#'+type+'-block .q3').show();
        }
    });

    $('.q3 div.middle p').bind("click",function(e){
        var type = $(this).closest("div").attr('class').split(" ")[0];

        $('.q3 div.middle p').attr("class", "unselected");
        $('.q4 div.middle p').attr("class", "unselected");
        $(this).attr("class", "selected");
        $("input#choice-q3").val($(this).attr("id"));
        $("input#choice-q3-desc").val($(this).text());

        var groupsize = 1;
        if(type=="group"){
            var groupsize = $("input#choice-q2").val().split("g-p-")[1];
        }

        // in these cases, skip question 4 and go straight to result
        if(groupsize >=51 || $(this).attr("id")=="g-n-speaker" || $(this).attr("id")=="g-n-other"){

            $('.q4').hide();

            $('#'+type+'-block .q5').show();

            $('.q5 p.result').hide();
            //var result = $(this).attr("id").split('d-')[1];
            if($(this).attr("id")=="g-n-other"){
                $('#'+type+'-block .q5 p#'+type+'-other').show();
            } else {
                $('#'+type+'-block .q5 p#'+type+'-consult').show();
            }

        } else {
            $('.q5').hide();

            $('#'+type+'-block .q4').show();
        }
    });

    $('.q4 div.middle p').bind("click",function(e){
        $('.q4 div.middle p').attr("class", "unselected");
        $(this).attr("class", "selected");
        $("input#choice-q4").val($(this).attr("id"));
        //$("input#choice-q4-desc").val($(this).text());

        var type = $(this).closest("div").attr('class').split(" ")[0];
        $('#'+type+'-block .q5').show();

        $('.q5 p.result').hide();
        var result = $(this).attr("id").split('d-')[1];
        $('#'+type+'-block .q5 p#'+type+'-'+result).show();

        $('select#00N50000002e129 option').attr('selected', false);

        if(result=="dmtsm"){
            //$("input#00N50000002e129").val("Decker Made to Stick Messaging");
            $('select#00N50000002e129 option[value="Decker Made to Stick Messaging"]').attr('selected', 'selected');
        } else if(result=="cti"){
            $('select#00N50000002e129 option[value="Communicate to Influence"]').attr('selected', 'selected');
        } else if(type=="individual" && result=="consult"){
            $('select#00N50000002e129 option[value="Platinum Executive Coaching"]').attr('selected', 'selected');
        } else {
            $('select#00N50000002e129 option[value="Need more information"]').attr('selected', 'selected');
        }
    });
});
</script>