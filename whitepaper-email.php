<?php
if(isset($_POST['email'])) {
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "hello@racetoken.io";
    $email_subject = "New Whitepaper request";
 
    function died($error) {
        echo $error;
        die();
    }
 
 
    // validation expected data exists
    if(empty($_POST['email'])){
        died('We are sorry, Please enter your email address.');       
    }
 
    //$service_option = $_POST['email']; // required
    $email_from = $_POST['email']; // required
  
    $email_message = "\n\n";
 
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
 
     
 
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "The above user has requested for whitepaper: "."\n";
 
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);  
 
echo "success";
exit;
}
?>