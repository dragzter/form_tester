<?php

$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require_once( $parse_uri[0] . 'wp-load.php' );


$fname = test_the_input($_POST['firstname']);
$lname = test_the_input($_POST['lastname']);
$phone = test_the_input($_POST['phone']);
$email = test_the_input($_POST['email']);

function test_the_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$err = "";

if (isset($_POST['dbsubmit'])) {

    global $wpdb;

    $table = 'wp_email_signup';
    $format = array('%s','%s','%s','%s');

    $result = $wpdb->insert($table, array(
        'firstName'     => $fname,
        'lastName'      => $lname,
        'phone'         => $phone,
        'email'         => $email
    ), $format);

}

if ($result) {

    $output = 'Insertion successful';
    
    
} else {
    $err = 'Insertion failed';
}

$datas = [
    'firstName'     => $fname,
    'lastName'      => $lname,
    'phone'         => $phone,
    'email'         => $email,
    'error'         => $err,
    'output'        => $output,
    'result'        => $result,

];
echo json_encode($datas);
echo $output;

