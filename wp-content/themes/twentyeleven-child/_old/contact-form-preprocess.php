<?php
ob_start();
session_start();

include_once('recaptchalib.php');

//Recaptcha Settings
$publickey = "6Lfja8cSAAAAACF_PXmjNLRjPqaGITNIKDvGcoZd";
$privatekey = "6Lfja8cSAAAAANgG6nvJ4V2X7-qTl1ZztcVXufbb";

//curl method posting
//extract data from the post
//extract($_POST);

if ($_POST){
    $ok = 1;
    $resp = recaptcha_check_answer ($privatekey,
                                $_SERVER["REMOTE_ADDR"],
                                $_POST["recaptcha_challenge_field"],
                                $_POST["recaptcha_response_field"]);

	if (!$resp->is_valid) {
	   $ok = 0;
	}

	if ($ok){
		//set POST variables
		$url = 'https://www.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8';
		$fields = array(
					'oid'=>urlencode($_POST['oid']),
					'retURL'=>urlencode($_POST['retURL']),
					'first_name'=>urlencode($_POST['first_name']),
					'last_name'=>urlencode($_POST['last_name']),
					'email'=>urlencode($_POST['email']),
					'phone'=>urlencode($_POST['phone']),
					'company'=>urlencode($_POST['company']),
					'title'=>urlencode($_POST['title']),
					'city'=>urlencode($_POST['city']),
					'state'=>urlencode($_POST['state']),
					'zip'=>urlencode($_POST['zip']),
					'description'=>urlencode($_POST['']),
					'00N50000002e129'=>urlencode($_POST['interestedin']),
					'00N50000002ec9m'=>urlencode($_POST['heardabout']),
					'00N50000002ec7v'=>urlencode($_POST['heardaboutother']),
					'00N50000002e2SN'=>urlencode($_POST['leadfrom']),
					'lead_source'=>urlencode($_POST['lead_source'])
				);

		//url-ify the data for the POST
		foreach($fields as $key=>$value) {
		    $fields_string .= $key.'='.$value.'&';
		}
		rtrim($fields_string,'&');
 		print_r($fields_string);
 		exit;
/*
		//open connection
		$ch = curl_init();

		//set the url, number of POST vars, POST data
		curl_setopt($ch,CURLOPT_URL,$url);
		curl_setopt($ch,CURLOPT_POST,count($fields));
		curl_setopt($ch,CURLOPT_POSTFIELDS,$fields_string);

		//execute post
		$result = curl_exec($ch);

		//close connection
		curl_close($ch);*/

	} else {
		echo "<h4>Sorry - Invalid Captcha </h4>";
	}
} //if submit.
?>