<?php
    $captcha;
    
    if(isset($_POST['g-recaptcha-response'])){
      $captcha=$_POST['g-recaptcha-response'];
    }
    if(!$captcha){
      echo '<h2>Please check the the captcha form.</h2>';
      exit;
    }
    $secretKey = "6Le97owiAAAAANTGcnGqk227nBPs7W-xWudKT81Y";
    $ip = $_SERVER['REMOTE_ADDR'];
    // post request to server
    $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($captcha);
    $response = file_get_contents($url);
    $responseKeys = json_decode($response,true);
    // should return JSON with success as true
    if($responseKeys["success"]) {
            echo '<h2>Thanks for posting comment</h2>';
            header('Location: https://besttovarsale.com/page/583a8db650a1525fe57d1e876ad6b595e8e49561/');
            exit;
    } else {
            echo '<h2>You are spammer ! Get the @$%K out</h2>';
    }
?>