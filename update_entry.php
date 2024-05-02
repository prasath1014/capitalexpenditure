<?php
include('connection.php');
include("session.php");
error_reporting(0);
?>
			<?php
			
			
			if( $role==182 || $role==183 || $role==3){
	   if(isset($_POST['Update_Details']))
{
	date_default_timezone_set('Asia/Kolkata');
     $date = date("Y-m-d");
     $log_time = date('Y-m-d h:i:s A');								
$up_date= $_POST['up_date'];

   if(($_POST['edit_vendor_name'] !='' && $_POST['edit_modal'] !='' && $_POST['edit_spcifi'] !='' && $_POST['edit_crd_date'] !='')){
     
             
$task_update = oci_parse($db,"UPDATE
	RAYMEDI_RAMRAJ.CAPITAL_EXPENDITURE_REQUEST rdg
SET
	CVENDOR_NAME = '". $_POST['edit_vendor_name']."',
	CMODEL = '". $_POST['edit_modal']."',
	CSPECIFICATION = '". $_POST['edit_spcifi']."',
	DRECOMMENDED_DATE=TO_DATE('$up_date', 'YYYY-MM-DD HH24:MI:SS'),
	CRECOMMEDED_BY = '$login_session',
	CRECOMMENDED_BY_STATUS='".$_POST['edit_approved']."'
	
WHERE
	IUNIQ_ROW_ID = '$tck_no'");
    $result = oci_execute($task_update);

if($result)
{

echo "<script>alert('Success ! Status Has Updated')</script>";

header('refresh:0;url=approval.php');

}
else{

echo "<script>alert('Alert ! Status  Updated Has Failed')</script>";

header('lcoation:approval.php');

}
   }else{

    echo "<script>alert('Alert ! Status  Updated Has Failed')</script>";
    
    header('lcoation:approval.php');
    
    }
}}elseif($role==161){
	if(isset($_POST['Update_Details']))
{
	date_default_timezone_set('Asia/Kolkata');
     $date = date("Y-m-d");
     $log_time = date('Y-m-d h:i:s A');								
$up_date= $_POST['up_date'];
$tck_no=  $_POST['edit_row_id'];
									

   if(($_POST['edit_vendor_name'] !='' && $_POST['edit_modal'] !='' && $_POST['edit_spcifi'] !='' && $_POST['edit_crd_date'] !='')){
     
             
$task_update = oci_parse($db,"UPDATE
	RAYMEDI_RAMRAJ.CAPITAL_EXPENDITURE_REQUEST rdg
SET
	CVENDOR_NAME = '". $_POST['edit_vendor_name']."',
	CMODEL = '". $_POST['edit_modal']."',
	CSPECIFICATION = '". $_POST['edit_spcifi']."',
	DSANCTIONED_DATE=TO_DATE('$up_date', 'YYYY-MM-DD HH24:MI:SS'),
	CSANCTIONED_BY = '$login_session',
	CSANCTIONED_STATUS='".$_POST['edit_approved']."'
	
WHERE
	IUNIQ_ROW_ID = '$tck_no'");
    $result = oci_execute($task_update);

if($result)
{

echo "<script>alert('Success ! Status Has Updated')</script>";

header('refresh:0;url=approval.php');

}
else{

echo "<script>alert('Alert ! Status  Updated Has Failed')</script>";

header('lcoation:approval.php');

}
   }else{

    echo "<script>alert('Alert ! Status  Updated Has Failed')</script>";
    
    header('lcoation:approval.php');
    
    }
}
}elseif($role==181 || $role==207){
	if(isset($_POST['Update_Details']))
{
	date_default_timezone_set('Asia/Kolkata');
     $date = date("Y-m-d");
     $log_time = date('Y-m-d h:i:s A');								
$up_date= $_POST['up_date'];
$tck_no=  $_POST['edit_row_id'];
									

   if(($_POST['edit_vendor_name'] !='' && $_POST['edit_modal'] !='' && $_POST['edit_spcifi'] !='' && $_POST['edit_crd_date'] !='')){
     
             
$task_update = oci_parse($db,"UPDATE
	RAYMEDI_RAMRAJ.CAPITAL_EXPENDITURE_REQUEST rdg
SET
	CVENDOR_NAME = '". $_POST['edit_vendor_name']."',
	CMODEL = '". $_POST['edit_modal']."',
	CSPECIFICATION = '". $_POST['edit_spcifi']."',
	DAGM_HOD_DATE=TO_DATE('$up_date', 'YYYY-MM-DD HH24:MI:SS'),,
	CAPPROVED_BY = '$login_session',
	CAGM_ZM_APPROVED_STATUS='".$_POST['edit_approved']."'
	
WHERE
	IUNIQ_ROW_ID = '$tck_no'");
    $result = oci_execute($task_update);

if($result)
{

echo "<script>alert('Success ! Status Has Updated')</script>";

header('refresh:0;url=approval.php');

}
else{

echo "<script>alert('Alert ! Status  Updated Has Failed')</script>";

header('lcoation:approval.php');

}
   }else{

    echo "<script>alert('Alert ! Status  Updated Has Failed')</script>";
    
    header('lcoation:approval.php');
    
    }
}
}elseif($role==101){
	if(isset($_POST['Update_Details']))
{
	date_default_timezone_set('Asia/Kolkata');
     $date = date("Y-m-d");
     $log_time = date('Y-m-d h:i:s A');								
$up_date= $_POST['up_date'];
$tck_no=  $_POST['edit_row_id'];
									

   if(($_POST['edit_vendor_name'] !='' && $_POST['edit_modal'] !='' && $_POST['edit_spcifi'] !='' && $_POST['edit_crd_date'] !='')){
     
             
$task_update = oci_parse($db,"UPDATE
	RAYMEDI_RAMRAJ.CAPITAL_EXPENDITURE_REQUEST rdg
SET
	CVENDOR_NAME = '". $_POST['edit_vendor_name']."',
	CMODEL = '". $_POST['edit_modal']."',
	CSPECIFICATION = '". $_POST['edit_spcifi']."',
	COFF_PROCESSED_DATE=TO_DATE('$up_date', 'YYYY-MM-DD HH24:MI:SS'),
	COFF_PROCESSED_BY = '$login_session',
	COFF_PROCESSED_STATUS='".$_POST['edit_approved']."'
	
WHERE
	IUNIQ_ROW_ID = '$tck_no'");
    $result = oci_execute($task_update);

if($result)
{

echo "<script>alert('Success ! Status Has Updated')</script>";

header('refresh:0;url=approval.php');

}
else{

echo "<script>alert('Alert ! Status  Updated Has Failed')</script>";

header('lcoation:approval.php');

}
   }else{

    echo "<script>alert('Alert ! Status  Updated Has Failed')</script>";
    
    header('lcoation:approval.php');
    
    }
}
}elseif($role==141){
	if(isset($_POST['Update_Details']))
{
$tck_no=  $_POST['edit_row_id'];
	date_default_timezone_set('Asia/Kolkata');
     $date = date("Y-m-d");
     $log_time = date('Y-m-d h:i:s A');								
$up_date= $_POST['up_date'];
$tck_no=  $_POST['edit_row_id'];
									

   if(($_POST['edit_vendor_name'] !='' && $_POST['edit_modal'] !='' && $_POST['edit_spcifi'] !='' && $_POST['edit_crd_date'] !='')){
     
             
$task_update = oci_parse($db,"UPDATE
	RAYMEDI_RAMRAJ.CAPITAL_EXPENDITURE_REQUEST rdg
SET
	CVENDOR_NAME = '". $_POST['edit_vendor_name']."',
	CMODEL = '". $_POST['edit_modal']."',
	CSPECIFICATION = '". $_POST['edit_spcifi']."',
	COFF_APPROVED_DATE=TO_DATE('$up_date', 'YYYY-MM-DD HH24:MI:SS'),
	COFF_APPROVED_BY = '$login_session',
	CADMIN_PROCESSED_BY_STATUS='".$_POST['edit_approved']."'
	
WHERE
	IUNIQ_ROW_ID = '$tck_no'");
    $result = oci_execute($task_update);

if($result)
{

echo "<script>alert('Success ! Status Has Updated')</script>";

header('refresh:0;url=approval.php');

}
else{

echo "<script>alert('Alert ! Status  Updated Has Failed')</script>";

header('lcoation:approval.php');

}
   }else{

    echo "<script>alert('Alert ! Status  Updated Has Failed')</script>";
    
    header('lcoation:approval.php');
    
    }
}
}elseif($role==4){
	if(isset($_POST['Update_Details']))
{
	date_default_timezone_set('Asia/Kolkata');
     $date = date("Y-m-d");
     $log_time = date('Y-m-d h:i:s A');								
$up_date= $_POST['up_date'];
$tck_no=  $_POST['edit_row_id'];
									

   if(($_POST['edit_vendor_name'] !='' && $_POST['edit_modal'] !='' && $_POST['edit_spcifi'] !='' && $_POST['edit_crd_date'] !='')){
     
             
$task_update = oci_parse($db,"UPDATE
	RAYMEDI_RAMRAJ.CAPITAL_EXPENDITURE_REQUEST rdg
SET
	CVENDOR_NAME = '". $_POST['edit_vendor_name']."',
	CMODEL = '". $_POST['edit_modal']."',
	CSPECIFICATION = '". $_POST['edit_spcifi']."',
	COFF_AUTHORISED_DATE=TO_DATE('$up_date', 'YYYY-MM-DD HH24:MI:SS'),
	COFF_AUTHORISED_BY = '$login_session',
	CSGM_APPROVED_STATUS='".$_POST['edit_approved']."'
	
WHERE
	IUNIQ_ROW_ID = '$tck_no'");
    $result = oci_execute($task_update);

if($result)
{

echo "<script>alert('Success ! Status Has Updated')</script>";

header('refresh:0;url=approval.php');

}
else{

echo "<script>alert('Alert ! Status  Updated Has Failed')</script>";

header('lcoation:approval.php');

}
   }else{

    echo "<script>alert('Alert ! Status  Updated Has Failed')</script>";
    
    header('lcoation:approval.php');
    
    }
}
}elseif($role==121){
	if(isset($_POST['Update_Details']))
{
	date_default_timezone_set('Asia/Kolkata');
     $date = date("Y-m-d");
     $log_time = date('Y-m-d h:i:s A');								
$up_date= $_POST['up_date'];
$tck_no=  $_POST['edit_row_id'];
									

   if(($_POST['edit_vendor_name'] !='' && $_POST['edit_modal'] !='' && $_POST['edit_spcifi'] !='' && $_POST['edit_crd_date'] !='')){
     
             
$task_update = oci_parse($db,"UPDATE
	RAYMEDI_RAMRAJ.CAPITAL_EXPENDITURE_REQUEST rdg
SET
	CVENDOR_NAME = '". $_POST['edit_vendor_name']."',
	CMODEL = '". $_POST['edit_modal']."',
	CSPECIFICATION = '". $_POST['edit_spcifi']."',
	COFF_PAYMENT_DATE=TO_DATE('$up_date', 'YYYY-MM-DD HH24:MI:SS'),
	COFF_PAYMENT_BY = '$login_session',
	CPAYMENT_APPROVED_STATUS ='".$_POST['edit_approved']."'
	WHERE
	IUNIQ_ROW_ID = '$tck_no'");
    $result =oci_execute($task_update);

if($result)
{

echo "<script>alert('Success ! Status Has Updated')</script>";

header('refresh:0;url=approval.php');

}
else{

echo "<script>alert('Alert ! Status  Updated Has Failed')</script>";

header('lcoation:approval.php');

}
   }else{

    echo "<script>alert('Alert ! Status  Updated Has Failed')</script>";
    
    header('lcoation:approval.php');
    
    }
}
}else{
	if(isset($_POST['Update_Details']))
{
echo "<script>alert('Alert ! Your Have No Access To Approve')</script>";
header('refresh:0;url=approval.php');
}}
?>