<?php
  $name    = $_POST['inputName'];
  $email   = $_POST['inputEmail'];
  $message = $_POST['inputMessage'];
  $num1    = $_POST['inputRandNum1'];
  $num2    = $_POST['inputRandNum2'];
  $num3    = $_POST['inputAnswer'];

  //injection and spam protection; check for proper characters
  foreach($_POST as $text){
    $text = str_replace('<', '$lt;', $text);
    $text = str_replace('>', '$gt;', $text);
  }

  $numbers = array('zero', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine', 'ten');

  $num1 = array_search($num1, $numbers);
  $num2 = array_search($num2, $numbers);

  if($name && $email && $message && $num1 + $num2 == $num3){
    $myName = 'Nathaniel Bockoven';
    $myEmail = 'nathaniel@gmail.com';

    $subject = 'Message sent from my Portfolio';

    // To send HTML mail, the Content-type header must be set
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    // Additional headers
    $headers .= 'From: '.$name.' <'.$email.'>' . "\r\n";
    // Mail it
    $isSent = mail($myEmail, $subject, $message, $headers);
  }
  else{
    $isSent = false;
    echo 'did not submit; false';
    die();
  }
?>
