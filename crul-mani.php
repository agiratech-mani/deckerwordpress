<?php

/*$ch = curl_init("http://api.twncorp.com:59999/api/los?latitude=40.5749523&longitude=-86.7267740");
//$fp = fopen("example_homepage.txt", "w");

//curl_setopt($ch, CURLOPT_FILE, $fp);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_exec($ch);
 echo 'Curl error: ' . curl_error($ch);
if($errno = curl_errno($ch)) {
    $error_message = curl_strerror($errno);
    echo "cURL error ({$errno}):\n {$error_message}";
    die;
}

curl_close($ch);
echo $result;
//fclose($fp);
if($result == "true")
{
	echo "IF";
}	
else
{
	echo "IF Else";
}*/
$ch = curl_init("http://api.twncorp.com:59999/api/los?latitude=40.5749523&longitude=-86.7267740");

// Send request
curl_exec($ch);

// Check for errors and display the error message
if($errno = curl_errno($ch)) {
    $error_message = curl_strerror($errno);
    echo "cURL error s ({$errno}):\n {$error_message}";
}

// Close the handle
curl_close($ch);

?>