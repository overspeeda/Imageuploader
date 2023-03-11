<?php

if (isset($_POST['reg_user'])) {

  $email = ($_POST['email']);
  $username = ($_POST['username']);
  
  //send confirmation email to user
  $to       = $email;
  $subject  = 'Testing sendmail.exe';
  $message  = "<a> salamat $username yow wot wassap mofo </a>
               <a href = 'http://localhost/Testing/verify.php?vkey=$vkey'> pindot mo to </a>";
  $headers  = 'From: etesting044@gmail.com' . "\r\n" .
              'MIME-Version: 1.0' . "\r\n" .
              'Content-type: text/html; charset=utf-8';
  mail($to, $subject, $message, $headers);

}

?>