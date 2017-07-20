<?php
if($post->ID!=6){
	exit ("Do not access this file directly.");
}
?>
<div id="solution-matching">
    <div id="q1">
        <p class="top"></p>
        <p class="middle three-across">
            <a class="unselected" id="individual">An Individual</a>
            <a class="unselected" id="group">A Group/Team</a>
            <a class="unselected" id="other">Other</a>
        </p>
        <p class="bottom"></p>
    </div>

    <div id="individual-block">
        <div class="q2 individual questions">
            <p class="top"></p>
            <p class="middle three-across">
                <a class="unselected" id="i-p-2"><span>This individual is at the executive level (VP or above)</span></a>
                <a class="unselected" id="i-p-8">This individual is at the Manager/Director level</a>
                <a class="unselected" id="i-p-13">This individual is at the Employee level</a>
            </p>
            <p class="bottom"></p>
        </div>
        <div class="q4 individual questions">
            <p>This best describes what we're trying to achieve:</p>
            <p class="top"></p>
            <p class="middle three-across">
                <a class="unselected" id="i-d-cti">(i)Brief description of benefits of Communicate to Influence. Lorem ipsum dolore site amet ducente non dividenae non pro.</a>
                <a class="unselected" id="i-d-dmtsm">Brief description of benefits of Decker Made to Stick Messageing. Lorem ipsum dolore site amet ducente non dividenae non pro.</a>
                <a class="unselected" id="i-d-consult">Brief description of benefits of consultative work. Lorem ipsum dolore site amet ducente non dividenae non pro.</a>
            </p>
            <p class="bottom"></p>
        </div>
        <div class="q5 individual questions">
            <a id="individual-cti">(i)The program that best matches your needs is CTI</a>
            <a id="individual-dmtsm">(i)The program that best matches your needs is DMTSM</a>
            <a id="individual-platinum">(i)Platinum wording....</a>
        </div>
    </div>

    <div id="group-block">
        <div class="q2 group questions">
            <p>The group/team is:</p>
            <p class="top"></p>
            <p class="middle five-across">
                <a class="unselected" id="g-p-2">2 to 7 people</a>
                <a class="unselected" id="g-p-8">8 to 12 people</a>
                <a class="unselected" id="g-p-13">13 to 50 people</a>
                <a class="unselected" id="g-p-51">51 to 150 people</a>
                <a class="unselected" id="g-p-150">Over 150 people</a>
            </p>
            <p class="bottom"></p>
        </div>
        <div class="q3 group questions">
            <p class="top"></p>
            <p class="middle four-across">
                <a class="unselected" id="g-n-comm">The group/team needs communication training.</a>
                <a class="unselected" id="g-n-includecomm">We would like to include communication training as a part of a larger company event.</a>
                <a class="unselected" id="g-n-speaker">We would like to book a speaker for our company event.</a>
                <a class="unselected" id="g-n-other">Other</a>
            </p>
            <p class="bottom"></p>
        </div>
        <div class="q4 group questions">
            <p>This best describes what we're trying to achieve:</p>
            <p class="top"></p>
            <p class="middle three-across">
                <a class="unselected" id="g-d-cti">(g)Brief description of benefits of Communicate to Influence. Lorem ipsum dolore site amet ducente non dividenae non pro.</a>
                <a class="unselected" id="g-d-dmtsm">Brief description of benefits of Decker Made to Stick Messageing. Lorem ipsum dolore site amet ducente non dividenae non pro.</a>
                <a class="unselected" id="g-d-consult">Brief description of benefits of consultative work. Lorem ipsum dolore site amet ducente non dividenae non pro.</a>
            </p>
            <p class="bottom"></p>
        </div>
        <div class="q5 group questions">
            <a id="group-cti">(g)The program that best matches your needs is CTI</a>
            <a id="group-dmtsm">(g)The program that best matches your needs is DMTSM</a>
            <a id="group-consult">(g)Submit your contact details and someone will contact you about your event.</a>
            <a id="group-other">(g)Please provide a brief description of your needs, including an email and/or phone number and someone will contact you within 24 hours.</a>
        </div>
    </div>
</div>


<script type="text/javascript">

$(document).ready(function(){

    $('#individual-block').hide();
    $('#group-block').hide();
    $('.questions').hide();

    $('#q1 a').bind("click",function(e){
        $('.questions').hide();

        $('#solution-matching a').attr("class", "unselected");
        $(this).attr("class", "selected");

        var type = $(this).attr('id');
        $('#'+type+'-block').show();
        $('#'+type+'-block .q2').show();
    });

    $('.q2 a').bind("click",function(e){
        $('.q3').hide();
        $('.q4').hide();
        $('.q5').hide();

        $('.q2 a').attr("class", "unselected");
        $('.q3 a').attr("class", "unselected");
        $('.q4 a').attr("class", "unselected");

        $(this).attr("class", "selected");

        var type = $(this).closest("div").attr('class').split(" ")[1];

        if(type=="individual"){
            // if it's an individual question, skip q3
            $('#'+type+'-block .q4').show();
        } else {
            $('#'+type+'-block .q3').show();
        }
    });

    $('.q3 a').bind("click",function(e){
        var type = $(this).closest("div").attr('class').split(" ")[1];

        if($(this).attr("id")=="g-n-other"){
            //if they select 'other' skip over 4 and go straight to final answer
            $('.q4').hide();

            $('.q3 a').attr("class", "unselected");
            $(this).attr("class", "selected");

            $('.q5').show();
            $('.q5 a').hide();
            var result = $(this).attr("id").split('n-')[1];
            $('#'+type+'-block .q5 a#'+type+'-'+result).show();

        } else {
            $('.q5').hide();

            $('.q3 a').attr("class", "unselected");
            $('.q4 a').attr("class", "unselected");
            $(this).attr("class", "selected");

            $('#'+type+'-block .q4').show();
        }
    });

    $('.q4 a').bind("click",function(e){
        $('.q4 a').attr("class", "unselected");
        $(this).attr("class", "selected");

        var type = $(this).closest("div").attr('class').split(" ")[1];
        $('#'+type+'-block .q5').show();

        $('.q5 a').hide();
        var result = $(this).attr("id").split('d-')[1];
        $('#'+type+'-block .q5 a#'+type+'-'+result).show();
    });
});
</script>