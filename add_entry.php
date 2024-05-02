<?php 
include('header.php');
include('connection.php');
error_reporting(0);
include("session.php");
//insert the data 
if(isset($_POST['btn_save'])){
	//if(($_POST['po_reqs_no'] !='' && $_POST['po_date'] !='' && $_POST['po_store'] !='' && $_POST['po_city'] !='' && $_POST['po_area'] !='' && $_POST['po_state'] !='' && $_POST['po_sm'] !='' && $_POST['po_cm_am'] !='' && $_POST['po_zm_agm'] !='' && $_POST['po_sgm'] !='' && $_POST['po_eq_type'] !='' && $_POST['po_vendor_name'] !='' && $_POST['po_specification'] !='' && $_POST['po_make'] !='' && $_POST['po_model'] !='' && $_POST['po_capacity'] !='' && $_POST['po_capacity'] !='' && $_POST['po_details'] !='' && $_POST['po_payment_terms'] !='' && $_POST['po_wranty'] !='' && $_POST['po_immediate_regular'] !='' && $_POST['po_sanction_non_sanction'] !='' && $_POST['po_requested_sm_asm'] !='')){
	$po_date=$_POST['po_date'];
  $addsugcatephoto=$_FILES['po_attachment']['name'];
$addsubphoto="Capital_Expenditur_image/".$addsugcatephoto;
    move_uploaded_file($_FILES["po_attachment"]["tmp_name"],$addsubphoto);
 
date_default_timezone_set('Asia/Kolkata');
     $date = date("Y-m-d");
     $log_time = date('Y-m-d h:i:s A');

$add=oci_parse($db,"INSERT INTO RAYMEDI_RAMRAJ.CAPITAL_EXPENDITURE_REQUEST (CREQ_NO,	DREQ_DATE,	CSTORE,	CCITY,	CAREA,	CSTATE,	CSTORE_MANAGER,	CCM_AM,	CZM_AGM,	CSGM,	CEQUIPMENT_TYPE,	CVENDOR_NAME,	CSPECIFICATION,	CMAKE,	CMODEL,	CCAPACITY,	CREQUIREMENT_DESCRIPTION,	CPAYMENT_TERMS,	CWARRANTY,	CIMMEDIATE_REGULAR,	CSANCTIONED,CREQUESTED_BY,CATTACHMENT,CQTY,NAPPROXIMATE_VALUE) 
                    values('".$_POST['po_reqs_no']."',TO_DATE('$po_date', 'YYYY-MM-DD HH24:MI:SS'),'".$_POST['po_store']."','".$_POST['po_city']."','".$_POST['po_area']."','".$_POST['po_state']."','".$_POST['po_sm']."','".$_POST['po_cm_am']."','".$_POST['po_zm_agm']."','".$_POST['po_sgm']."','".$_POST['po_eq_type']."','".$_POST['po_vendor_name']."','".$_POST['po_specification']."','".$_POST['po_make']."','".$_POST['po_model']."','".$_POST['po_capacity']."','".$_POST['po_details']."','".$_POST['po_payment_terms']."','".$_POST['po_wranty']."','".$_POST['po_immediate_regular']."','".$_POST['po_sanction_non_sanction']."','".$_POST['po_requested_sm_asm']."','$addsubphoto','".$_POST['po_qty']."','".$_POST['po_aps_valuw']."')");
                        $add_data=oci_execute($add);

if($add_data)
{

echo "<script>alert('Success ! Your request submitted to AM/CM  for Approval')</script>";

 header('refresh:0;url=index.php');

}
else{

echo "<script>alert('Alert ! Capital Expenditure Creation failed')</script>";

 header('refresh:0;url=index.php');

}//}else {
       // echo "<script>alert('Alert ! Kindly Check Some Details Has Not Enter Porperly')</script>";
    //}
}?>