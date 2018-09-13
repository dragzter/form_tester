<?php

$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require_once( $parse_uri[0] . 'wp-load.php' );

$nameErr = $emailErr = $websiteErr = "";
$name = $email = $comment = $website = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  
 if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters allowed"; 
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is cannot be empty";
  } else {
    $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format, use (name@domain.com)"; 
    }
  }
    
  if (empty($_POST["website"])) {
    $website = ""; 
  } else {
    $website = test_input($_POST["website"]);
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
      $websiteErr = "Invalid URL, please use www.example.com format"; 
    }
  }

  if (!empty($_POST["message"])) {
    $comment = test_input($_POST["message"]);
  } else {
    $comment = "";
    $commentErr = "Message is required";
  }

}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$to = 'vlad@admachines.com';
$subject = "Test Mail";
$txt = "this is a test";

$headers .= "Reply-To: ". $to ." \r\n";
$headers .= "Return-Path: ".$to." \r\n";
$headers .= "From: \"".$to."\" <".$to."> \r\n";
$headers .= "Organization: AdMachines\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
$headers .= "Content-Transfer-Encoding: binary";
$headers .= "X-Priority: 3\r\n";
$headers .= "X-Mailer: PHP". phpversion() ."\r\n";

if (empty($emailErr) && empty($nameErr) && !empty($comment)) {
    wp_mail($to,$subject,$comment,$headers);
    $result = true;
} else {
    $result = false;
}

$datas = [
    "name"            => $name, 
    "email"           => $email, 
    "message"         => $comment, 
    "website"         => $website, 
    "nameError"       => $nameErr, 
    "emailError"      => $emailErr, 
    "websiteError"    => $websiteErr,
    "messageError"    => $commentErr, 
    "mailStatus"      => $result,
    
];

echo json_encode($datas);