<?php
if(isset($_POST['email'])) {
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "hello@racetoken.io";
    $email_subject = "NEW Project Proposer Entry";
 
    function died($error) {
        echo $error;
        die();
    }
 
 
    // validation expected data exists
    if(empty($_POST['project_location'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }
 
     
 
    $project_location = $_POST['project_location']; // required
    // $development_status = $_POST['development_status']; // required
    // $project_size = $_POST['project_size']; // required
    // $equity = $_POST['equity']; // not required
    // $loan_requirement = $_POST['loan_requirement']; // required
    // $cashflow_months = $_POST['cashflow_months']; // required
    $email_from = $_POST['email']; // required
 
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  // if(!preg_match($email_exp,$email_from)) {
  //   $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  //   died($error_message);
  // }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
  
    $email_message = "Form details below.\n\n";
 
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
 
     
 
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Where is your project located?: ".clean_string($project_location)."\n";
    // $email_message .= "Is it an existing building or a new development: ".clean_string($development_status)."\n";
    // $email_message .= "What is the size of your project: ".clean_string($project_size)."\n";
    // $email_message .= "What is the equity required for your project?: ".clean_string($equity)."\n";
    // $email_message .= "What is the debt/loan requirement for your project?: ".clean_string($loan_requirement)."\n";
    // $email_message .= "In how many months will your project have positive cashflow?: ".clean_string($cashflow_months)."\n";
 
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);  
 
echo "success";
exit;
}
?>