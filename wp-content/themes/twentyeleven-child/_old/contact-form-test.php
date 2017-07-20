<?php
if($post->ID!=24){
	//exit ("Do not access this file directly.");
}
include_once('contact-form-preprocess.php');
?>
<script type="text/javascript">
	$(function() {
		var contactRequired = $('#contactform .required');

		$('#contactform').submit(function(e){
			$('#errorReport').hide();
			var valid = true;
			$('#contactform input').removeClass('error');
			$('#contactform input.required').each(function(){
				if($(this).val()==''){
					var name = $(this).attr('name');
					$(this).addClass('error');
					$('#contactform .'+name).addClass('error');
					valid = false;
				}
			});
			$('#contactform select').removeClass('error');
			$('#contactform select.required').each(function(){
				if($(this).val()==''){
					var name = $(this).attr('name');
					$(this).addClass('error');
					$('#contactform .'+name).addClass('error');
					valid = false;
				}
			});
			if (valid == false){
				$('#errorReport').show();
				e.preventDefault();
				return false;
			}else{
				return true;
			}
		});
	});
</script>

<form action="#" method="POST" id="contactform">

<input type=hidden name="oid" value="00D300000000jcx">
<input type=hidden name="retURL" value="http://decker.com/thank-you/">

<p> <small><span class="req">*</span> <em>Required fields</em></small> </p>
<p style="display:none" id="errorReport"><strong class="txt_error">Please check the highlighted fields.</strong></p>

<!--  ----------------------------------------------------------------------  -->
<!--  NOTE: These fields are optional debugging elements. Please uncomment    -->
<!--  these lines if you wish to test in debug mode.                          -->
<!--  <input type="hidden" name="debug" value=1>                              -->
<!--  <input type="hidden" name="debugEmail"                                  -->
<!--  value="ben@deckercommunications.com">                                   -->
<!--  ----------------------------------------------------------------------  -->

<div class="left">
    <label for="first_name">First Name <span class="req">*</span></label><input  id="first_name" maxlength="40" name="first_name" size="20" type="text" class="required" />
</div>
<div class="right">
    <label for="last_name">Last Name <span class="req">*</span></label><input  id="last_name" maxlength="80" name="last_name" size="20" type="text" class="required" />
</div>

<div class="left">
    <label for="email">Email <span class="req">*</span></label><input  id="email" maxlength="80" name="email" size="20" type="text" class="required" />
</div>
<div class="right">
    <label for="phone">Phone</label><input  id="phone" maxlength="40" name="phone" size="20" type="text" />
</div>

<div class="left">
    <label for="company">Company <span class="req">*</span></label><input  id="company" maxlength="40" name="company" size="20" type="text" class="required" />
</div>
<div class="right">
    <label for="title">Title </label><input  id="title" maxlength="40" name="title" size="20" type="text" />
</div>

<div class="left">
    <label for="city">City</label><input  id="city" maxlength="40" name="city" size="20" type="text" />
</div>
<div class="right">
    <label for="state">State/Province</label><input  id="state" maxlength="20" name="state" size="20" type="text" />
</div>

<label for="zip">Zip</label><input  id="zip" maxlength="20" name="zip" size="20" type="text" /></p>

<label for="description">A brief description of your needs</label>
<textarea name="description"></textarea>
<br /><br />

<p><label>What program(s) are you interested in?:</label> (use alt-click or control-click to select multiple programs)</p>
<select  id="00N50000002e129" multiple="multiple" size="6" name="interestedin" title="What Program are you interested in?">
<option value="Decker Made to Stick Messaging">Decker Made to Stick Messaging</option>
<option value="Communicate to Influence">Communicate to Influence</option>
<option value="Platinum Executive Coaching">Platinum Executive Coaching</option>
<option value="Next Level advanced programs">Next Level advanced programs</option>
<option value="Communicate with Service">Communicate with Service</option>
<option value="Need more information">Need more information</option>
</select>
<br /><br />

<p><label>How did you hear about us?: <span class="req">*</span></label></p><br />
<select  id="00N50000002ec9m" name="heardabout" title="How did you hear about us? (Select)" class="required">
<option value="">--select--</option>
<option value="Referral from colleague/mentor/friend">Referral from colleague/mentor/friend</option>
<option value="Internet search">Internet search</option>
<option value="Bert Decker&#39;s book: You&#39;ve Got to Be Believed to Be Heard">Bert Decker&#39;s book: <em>You&#39;ve Got to Be Believed to Be Heard</em></option>
<option value="Attended a previous program/saw a keynote speech">Attended a previous program/saw a keynote speech</option>
<option value="Interest in Made to Stick">Interest in Made to Stick</option>
<option value="Other">Other</option>
</select>
<br /><br />

<p>If other, please describe how:
<input  id="00N50000002ec7v" maxlength="60" name="heardaboutother" size="20" type="text" /></p>

<p>Verify this Code:
<!-- Captcha//-->
<?php echo recaptcha_get_html($publickey);?>
<!-- Captcha //-->
</p>

<!--lead type-->
<input type="hidden" name="leadfrom" id="00N50000002e2SN" value="Internet?" />
<input type="hidden" name="lead_source" id="lead_source" value="Inbound - Web" />

<br /><br />
<input type="submit" name="submit" value="Send Message" />

</form>
