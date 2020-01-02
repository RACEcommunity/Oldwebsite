<?php
if(isset($_POST['email'])) {
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "hello@racetoken.io";
    $email_subject = "NEW Service Provider Entry";
 
    function died($error) {
        echo $error;
        die();
    }
 
 
    // validation expected data exists
    if(empty($_POST['service_option'])){
        died('We are sorry, Please select the service option.');       
    }
 
    $service_option = $_POST['service_option']; // required
    $email_from = $_POST['email']; // required
  
    $email_message = "Form details below.\n\n";
 
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
 
     
 
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Selected service option: ".clean_string($service_option)."\n";
 
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);  
 
echo "success";
exit;
}
?>