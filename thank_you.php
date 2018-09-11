<?php

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
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format"; 
    }
  }
    
  if (empty($_POST["website"])) {
    $website = "";
  } else {
    $website = test_input($_POST["website"]);
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
      $websiteErr = "Invalid URL"; 
    }
  }

  if (!empty($_POST["message"])) {
    $comment = test_input($_POST["message"]);
    
  } else {
    $comment = "";
  }

}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

// $message = $_POST["message"];
// $website = $_POST["website"];
// $name = $_POST["name"];
// $email = $_POST['email'];


$to = 'vladimir.mujakovic@gmail.com';
$subject = "Test Mail";
$txt = "this is a test";
$headers .= "Reply-To: ". $to ." \r\n";
$headers .= "Return-Path: ".$to." \r\n";
$headers .= "From: \"\Vladimir Mujakovic\" <".$to."> \r\n";
$headers .= "Organization: AdMachines\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
$headers .= "Content-Transfer-Encoding: binary";
$headers .= "X-Priority: 3\r\n";
$headers .= "X-Mailer: PHP". phpversion() ."\r\n";


mail($to,$subject,$comment,$headers);
// echo 'handled';

// echo "<h2>Your Input:</h2>";
// echo "Name: ".$name. ' ' . $nameErr;
// echo "<br>";
// echo "Email: ".$email . ' ' . $emailErr;
// echo "<br>";
// echo "Message: ". $comment;
// echo "<br>";
// echo "Website: ".$website . ' ' . $websiteErr;

$datas = [$name, $email, $comment, $website];

echo json_encode($datas);