<?php
define("RECAPTCHA_V3_SECRET_KEY", '6LcD2YwiAAAAAGRmKJTrWnsMaUX-rtt8ASIH7XEk');
 
 
$token = $_POST['token'];

 
// call curl to POST request
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,"https://www.google.com/recaptcha/api/siteverify");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array('secret' => RECAPTCHA_V3_SECRET_KEY, 'response' => $token)));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);
$arrResponse = json_decode($response, true);
 
// verify the response
if($arrResponse["success"] == '1'  && $arrResponse["score"] >= 0.5) {
    // valid submission
    // go ahead and do necessary stuff
	 echo '<h2>Thanks for posting comment</h2>';
      header('Location: http://google.com');
            exit;
} else {
		echo '<h2>You are spammer ! Get the @$%K out</h2>';
    // spam submission
    // show error message
}