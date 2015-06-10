<?php

  if( isset( $_POST ) ){
    foreach($_POST as $text){
      $text = str_replace('<', '$lt;', $text);
      $text = trim(str_replace('>', '$gt;', $text));
    }
    $message = "Thank you for your interest in my work.  You'll find an overview of the estimate you created.";
    if( $_POST['sendTo'] != 'user' ){
      $message .= "  I'll contact you as soon as possible.";
    }
    $message .= "<table cellpadding='5'>
                  <tbody>
                    <tr>
                      <td>Name</td>
                      <td>".$_POST['inquiryName']."</td>
                    </tr>
                    <tr>
                      <td>Email</td>
                      <td>".$_POST['inquiryEmail']."</td>
                    </tr>";
                    if( $_POST['inquiryNotes'] ){
                      $message .= "<tr>
                                     <td>Notes</td>
                                     <td>".str_replace("\'", "&#39;", $_POST['inquiryNotes'])."</td>
                                   </tr>";
                    }
                    foreach( $_POST['answers'] as $a ){
                      $answer = explode('|', $a);
                      $message .= "<tr>
                                     <td>$".intval($_POST['wage'])*intval($answer[1])."</td>
                                     <td>".$answer[0]."</td>
                                   </tr>";
                    }
                    $message .= "<tr>
                                   <td>".$_POST['total']."</td>
                                   <td><b>Estimate Total</b></td>
                                 </tr>
                               </tbody>
                             </table>";
    if( $_POST['inquiryName'] && $_POST['inquiryEmail'] ){
      $myName = 'Nathaniel Bockoven';
      $myEmail = 'nathaniel@codedappeal.com';
      $bcc = 'nbockoven@gmail.com';
      if( $_POST['sendTo'] == 'nate' ){
        $toEmail = $myEmail;
      }
      else{
        $toEmail = $_POST['inquiryEmail'];
      }
      $subject = 'Estimate from Nathaniel Bockoven';

      // To send HTML mail, the Content-type header must be set
      $headers  = 'MIME-Version: 1.0' . "\r\n";
      $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
      // Additional headers
      $headers .= 'From: '.$_POST['inquiryName'].' <'.$_POST['inquiryEmail'].'>' . "\r\n";
      $headers .= 'Bcc: '.$bcc. "\r\n";
      // Mail it
      $isSent = mail($toEmail, $subject, $message, $headers);
    }
    else{
      $isSent = false;
      echo 'did not submit; false';
      die();
    }
  }
?>
