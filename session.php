<?php
include( 'orc_connection.php' );
   session_start();
   $user_check = $_SESSION['login_user'];
   $role=  $_SESSION['userType'];
   $ses_sql = "SELECT * FROM RAYMEDI_RAMRAJ.TICKET_USER tu   WHERE username = '$user_check' ";
   $result = oci_parse($db,$ses_sql);
   oci_execute($result);
     while($row = oci_fetch_array($result))
     {
   $login_session = $row[0];
   $role=$row[2];
   $log_id=$row[5];
  }
   
   if(!isset($_SESSION['login_user'])){
      header("location:index.php");
      die();
   }
?>