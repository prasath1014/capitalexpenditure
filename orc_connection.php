<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
$username = "RAYMEDI_RAMRAJ";                  // Use your username
$password = "raymedi_hq";             // and your password
$database = "ramraj-qa.cugyvyz68ru0.ap-south-1.rds.amazonaws.com/ramrajqa";   // and the connect string to connect to your database
$db = oci_connect($username, $password, $database);
if (!$db) {
    $m = oci_error();
    trigger_error('Could not connect to database: '. $m['message'], E_USER_ERROR);
}
?>
    