<?php
include( "orc_connection.php" );
include('session.php');
$from_date=$_GET['from_date'];
$outlet_name=$_GET['outlet_name'];
$to_date=$_GET['to_date'];

?>
 
 <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Ramraj Cotton </title>
 
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
   </head>
<body>

 <section class="content">
      <div class="container-fluid">

            <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">

                    <thead class="btn-info">
					<tr>
                        											<th>S.no</th>
																	<th>View</th>
																	<th>Store</th>
																	<th>City</th>
																	<th>Area</th>
																	<th>State</th>
																	<th>Store_Manager</th>
																	<th>CM_AM</th>
																      <th>RM</th>
																	<th>ZM_AGM</th>
																	<th>SGM</th>
																	<th>Equipment_Type</th>
																	<th>Make</th>
																	<th>Vendor_Name</th>
																	
																	
																	
																	
											
										
                                    </tr>
                    </thead>
                    <tbody>
                        <?php
						if($_GET['outlet_name']=="ALL")
{
    $qry_result = oci_parse($db,"SELECT
*
FROM
	RAYMEDI_RAMRAJ.CAPITAL_EXPENDITURE_REQUEST rdg
WHERE rdg.DREQ_DATE>= TO_DATE('$from_date 00:00:00', 'YYYY-MM-DD HH24:MI:SS') 
AND rdg.DREQ_DATE <= TO_DATE('$to_date 00:00:00', 'YYYY-MM-DD HH24:MI:SS')");
 
oci_execute($qry_result);
 
$sl=1;
while($row=oci_fetch_array($qry_result)){ 
?>
<tr>
 <td><?php echo $sl;?></td>
                        <td><a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#<?php echo "b" .$sl; ?>">
                        <i class="fas fa-folder">
                        </i>
                        View
                    </a>

                                                                
                                <div class="modal fade" id="<?php echo "b" .$sl; ?>">
                                <div class="modal-dialog modal-xl">
                                  <div class="modal-content">
								  
								
                                    <div class="modal-header">

                                      <div class="modal-body">

                                <!-- /.card-header -->
                                <div class="card-body">
                                  <form name="form1" method="post" action="index.php">
<div class="container-fluid ">
    <div class="row">
        <div class="col-md-12 text-center py-5">


            <table align="center" class="table col-md-10  border py-5">
                <tr>
                    <td>
                        <div class="row ">
                            <div class="col-md-2 text-center"><img style="height:60;" class="brand-image"
                                    src="logo.png" alt="logo"></div>
                            <div class="col-md-10 text-center py-3 h4">Capital Expenditure Request Form</div>
                        </div>
                    </td>
                </tr>

                <tr style="background-color: #d0e6c7;">
                    <td>
                        <div class="row ">
                            <div class="col-md-12 text-center ">
                                <h4>STORE REQUIRMENT WITH HEADS DETAILS</h4>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="row">
                                    <div class="col-md-3"><label for="">Store</label></div>
                                    <div class="col-md-9"><input type="text" value="<?php echo $row['CSTORE'];?>"
                                            id="po_store" name="po_store" readonly class="form-control"></div>
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                            <div class="col-md-5">
                                <div class="row">
                                    <div class="col-md-3"><label for="">STORE MANAGER</label></div>
                                    <div class="col-md-9"><input type="text" id="po_sm" name="po_sm" class="form-control" value="<?php echo $row['CSTORE_MANAGER'];?>"></div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="row">
                                    <div class="col-md-3"><label for="">CITY </label></div>
                                    <div class="col-md-9"><input type="text" value="<?php echo $row['CCITY'];?>"
                                            id="po_city" name="po_city" readonly class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                            <div class="col-md-5">
                                <div class="row">
                                    <div class="col-md-3"><label for="">CM/ AM </label></div>
                                    <div class="col-md-9">
           <input id="po_requested_sm_asm" name="po_requested_sm_asm" class="form-control" placeholder="SM/ASM Name"
                                    type="text" value="<?php echo $row['CCM_AM'];?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="row">
                                    <div class="col-md-3"><label for="">AREA </label></div>
                                    <div class="col-md-9"><input type="text" value="<?php echo $row['CAREA'];?>"
                                            id="po_area" name="po_area" readonly class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                            <div class="col-md-5">
                                <div class="row">
                                    <div class="col-md-3"><label for="">ZM / AGM</label></div>
                                    <div class="col-md-9">
<input id="po_requested_sm_asm" name="po_requested_sm_asm" class="form-control" placeholder="SM/ASM Name"
                                    type="text" value="<?php echo $row['CZM_AGM'];?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="row">
                                    <div class="col-md-3"><label for="">STATE </label></div>
                                    <div class="col-md-9"><input type="text" value="<?php echo $row['CSTATE'];?>"
                                            id="po_state" name="po_state" readonly class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                            <div class="col-md-5">
                                <div class="row">
                                    <div class="col-md-3"><label for="">SGM </label></div>
                                    <div class="col-md-9"><input type="text" id="po_sgm" name="po_sgm" class="form-control" value="<?php echo $row['CSGM'];?>"></div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="row">
                                    <div class="col-md-3"><label for="">Equipment Type</label></div>
                                    <div class="col-md-9"><input type="text" id="po_eq_type" name="po_eq_type" class="form-control" value="<?php echo $row['CEQUIPMENT_TYPE'];?>"></div>
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                            <div class="col-md-5">
                                <div class="row">
                                    <div class="col-md-3"><label for="">Make </label></div>
                                    <div class="col-md-9"><input type="text" id="po_make" name="po_make" class="form-control" value="<?php echo $row['CMAKE'];?>"></div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="row">
                                    <div class="col-md-3"><label for="">Vendor Name : <span
                                                class="text-danger">*</span></label></div>
                                    <div class="col-md-9"><input type="text" id="po_vendor_name" name="po_vendor_name" class="form-control" value="<?php echo $row['CVENDOR_NAME'];?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                            <div class="col-md-5">
                                <div class="row">
                                    <div class="col-md-3"><label for="">Model:<span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-md-9"><input type="text" id="po_model" name="po_model" class="form-control" value="<?php echo $row['CMODEL'];?>"></div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="row">
                                    <div class="col-md-3"><label for="" style="margin-left: -7px;">Specification :<span
                                                class="text-danger">*</span> </label></div>
                                    <div class="col-md-9"><input type="text" id="po_specification" name="po_specification" class="form-control" value="<?php echo $row['CSPECIFICATION'];?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                            <div class="col-md-5">
                                <div class="row">
                                    <div class="col-md-3 "><label for="">Capacity: </label></div>
                                    <div class="col-md-9"><input type="text" id="po_capacity" name="po_capacity" class="form-control" value="<?php echo $row['CCAPACITY'];?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
  <tr>
                    <td>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="row">
                                    <div class="col-md-3"><label for="">Qty :<span
                                                class="text-danger">*</span> </label></div>
                                    <div class="col-md-9"><input type="text" id="po_qty" name="po_qty" class="form-control" value="<?php echo $row['CQTY'];?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                            <div class="col-md-5">
                                <div class="row">
                                    <div class="col-md-3"><label for="" style="margin-left: -5px;">Approximate Value:<span
                                                class="text-danger">*</span> </label></div>
                                    <div class="col-md-9"><input type="text" id="po_aps_valuw" name="po_aps_valuw" class="form-control" value="<?php echo $row['NAPPROXIMATE_VALUE'];?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td>
                   
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row py-1">
                                    <div class="col-md-4"><label for="">Payment terms :<span
                                                class="text-danger">*</span></label> </div>
                                    <div class="col-md-6">
                                        <input type="text" id="po_payment_terms" name="po_payment_terms" class="form-control" value="<?php echo $row['CPAYMENT_TERMS'];?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row py-1">
                                    <div class="col-md-4 text-right"><label for="">Warranty :</label> </div>
                                    <div class="col-md-6">
                                        <input type="text" id="po_wranty" name="po_wranty" class="form-control" value="<?php echo $row['CWARRANTY'];?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row py-1">
                                    <div class="col-md-4"><label for="">Immediate / Regular</label> </div>
                                    <div class="col-md-6">
                                        <input id="po_immediate_regular" class="form-control" name="po_immediate_regular" value="<?php echo $row['CIMMEDIATE_REGULAR'];?>">
                                      
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row py-1">
                                    <div class="col-md-4"><label for="">Sanctioned / Not Sanctioned</label> </div>
                                    <div class="col-md-6">
                                        <input id="po_sanction_non_sanction" class="form-control" name="po_sanction_non_sanction" value="<?php echo $row['CSANCTIONED'];?>">
                                      
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="row ">
                            <div class="col-md-4">
                                <label for="">Requested by <span class="text-danger">*</span></label>
                                <input id="po_requested_sm_asm" name="po_requested_sm_asm" class="form-control" placeholder="SM/ASM Name"
                                    type="text" value="<?php echo $row['CREQUESTED_BY'];?>">
                            </div>

                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>

</form>
                                  </div>
                                  <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                              </div></div></div></div></td>
		                <td><?php echo $row['CSTORE'];?></td>
						<td><?php echo $row['CCITY'];?></td>
                        <td><?php echo $row['CAREA'];?></td>
                        <td><?php echo $row['CSTATE'];?></td>
                        <td><?php echo $row['CSTORE_MANAGER'];?></td>
						<td><?php echo $row['CCM_AM'];?></td>
                        <td><?php echo $row['CRM'];?></td>
                        <td><?php echo $row['CZM_AGM'];?></td>
                        <td><?php echo $row['CSGM'];?></td>	
                        <td><?php echo $row['CEQUIPMENT_TYPE'];?></td>
						<td><?php echo $row['CMAKE'];?></td>
                        <td><?php echo $row['CVENDOR_NAME'];?></td>
                       <td>
 
 <?php 
 
    $CRM_records = oci_parse($db,"SELECT CUSTOMER_NAME,CUSTOMER_ADDRESS,MOBILE_NO,OUTLET_NAME,OUTLET_ADDRESS FROM RAYMEDI_RAMRAJ.CUSTOMER_DAMAGE_RETURN t  where COMMON_ID='".$row['ITKT_ID']."' group by CUSTOMER_NAME,CUSTOMER_ADDRESS,MOBILE_NO,OUTLET_NAME,OUTLET_ADDRESS ");  
    oci_execute($CRM_records);
 $crm_row = oci_fetch_array($CRM_records);
 	
	
	
?>	
	
 <hr>
                    <div class="comment-text">
                      <span class="username">
                        <b> Customer Details </b>
                      </span>

                    </div>
					<table id="example1" class="table table-bordered table-striped">
					<tr style="background-color: darkorange;">
				 <th>Customer_Name</th>
					<th>Customer_Mobile</th>
					<th>Customer_Address</th>
					<th>Outlet_Name</th>
					<th>outlet_Address</th>
					
					</tr>
					
					<tr>
					<td> <?php echo $crm_row['CUSTOMER_NAME']; ?></td>
					<td> <?php echo $crm_row['MOBILE_NO']; ?></td>
					<td> <?php echo $crm_row['CUSTOMER_ADDRESS']; ?></td>
					<td> <?php echo $crm_row['OUTLET_NAME']; ?></td>
					<td> <?php echo $crm_row['OUTLET_ADDRESS']; ?></td>
					</tr>
					
					
					</table>
	  
				 
                                  </div>
                                  <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                              </div>
                              <!-- /.modal -->




 	   
 </div>			   
	</td>		   
	</tr>		   
		

 <?php  $sl++;      
          ?>
<?php }
}else
{
    $qry_result = oci_parse($db,"SELECT
*
FROM
	RAYMEDI_RAMRAJ.CAPITAL_EXPENDITURE_REQUEST rdg
WHERE rdg.DREQ_DATE>= TO_DATE('$from_date 00:00:00', 'YYYY-MM-DD HH24:MI:SS') 
AND rdg.DREQ_DATE <= TO_DATE('$to_date 00:00:00', 'YYYY-MM-DD HH24:MI:SS') and rdg.CSTORE='$outlet_name'");
 
oci_execute($qry_result);
 
$sl=1;
while($row=oci_fetch_array($qry_result)){ 
?>
<tr>
 <td><?php echo $sl;?></td>
                        <td><a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#<?php echo "b" .$sl; ?>">
                        <i class="fas fa-folder">
                        </i>
                        View
                    </a>

                                                                
                                <div class="modal fade" id="<?php echo "b" .$sl; ?>">
                                <div class="modal-dialog modal-xl">
                                  <div class="modal-content">
								  
								
                                    <div class="modal-header">

                                      <div class="modal-body">

                                <!-- /.card-header -->
                                <div class="card-body">
                                  <form name="form1" method="post" action="index.php">
<div class="container-fluid ">
    <div class="row">
        <div class="col-md-12 text-center py-5">


            <table align="center" class="table col-md-10  border py-5">
                <tr>
                    <td>
                        <div class="row ">
                            <div class="col-md-2 text-center"><img style="height:60;" class="brand-image"
                                    src="logo.png" alt="logo"></div>
                            <div class="col-md-10 text-center py-3 h4">Capital Expenditure Request Form</div>
                        </div>
                    </td>
                </tr>

                <tr style="background-color: #d0e6c7;">
                    <td>
                        <div class="row ">
                            <div class="col-md-12 text-center ">
                                <h4>STORE REQUIRMENT WITH HEADS DETAILS</h4>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="row">
                                    <div class="col-md-3"><label for="">Store</label></div>
                                    <div class="col-md-9"><input type="text" value="<?php echo $row['CSTORE'];?>"
                                            id="po_store" name="po_store" readonly class="form-control"></div>
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                            <div class="col-md-5">
                                <div class="row">
                                    <div class="col-md-3"><label for="">STORE MANAGER</label></div>
                                    <div class="col-md-9"><input type="text" id="po_sm" name="po_sm" class="form-control" value="<?php echo $row['CSTORE_MANAGER'];?>"></div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="row">
                                    <div class="col-md-3"><label for="">CITY </label></div>
                                    <div class="col-md-9"><input type="text" value="<?php echo $row['CCITY'];?>"
                                            id="po_city" name="po_city" readonly class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                            <div class="col-md-5">
                                <div class="row">
                                    <div class="col-md-3"><label for="">CM/ AM </label></div>
                                    <div class="col-md-9">
           <input id="po_requested_sm_asm" name="po_requested_sm_asm" class="form-control" placeholder="SM/ASM Name"
                                    type="text" value="<?php echo $row['CCM_AM'];?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="row">
                                    <div class="col-md-3"><label for="">AREA </label></div>
                                    <div class="col-md-9"><input type="text" value="<?php echo $row['CAREA'];?>"
                                            id="po_area" name="po_area" readonly class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                            <div class="col-md-5">
                                <div class="row">
                                    <div class="col-md-3"><label for="">ZM / AGM</label></div>
                                    <div class="col-md-9">
<input id="po_requested_sm_asm" name="po_requested_sm_asm" class="form-control" placeholder="SM/ASM Name"
                                    type="text" value="<?php echo $row['CZM_AGM'];?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="row">
                                    <div class="col-md-3"><label for="">STATE </label></div>
                                    <div class="col-md-9"><input type="text" value="<?php echo $row['CSTATE'];?>"
                                            id="po_state" name="po_state" readonly class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                            <div class="col-md-5">
                                <div class="row">
                                    <div class="col-md-3"><label for="">SGM </label></div>
                                    <div class="col-md-9"><input type="text" id="po_sgm" name="po_sgm" class="form-control" value="<?php echo $row['CSGM'];?>"></div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="row">
                                    <div class="col-md-3"><label for="">Equipment Type</label></div>
                                    <div class="col-md-9"><input type="text" id="po_eq_type" name="po_eq_type" class="form-control" value="<?php echo $row['CEQUIPMENT_TYPE'];?>"></div>
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                            <div class="col-md-5">
                                <div class="row">
                                    <div class="col-md-3"><label for="">Make </label></div>
                                    <div class="col-md-9"><input type="text" id="po_make" name="po_make" class="form-control" value="<?php echo $row['CMAKE'];?>"></div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="row">
                                    <div class="col-md-3"><label for="">Vendor Name : <span
                                                class="text-danger">*</span></label></div>
                                    <div class="col-md-9"><input type="text" id="po_vendor_name" name="po_vendor_name" class="form-control" value="<?php echo $row['CVENDOR_NAME'];?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                            <div class="col-md-5">
                                <div class="row">
                                    <div class="col-md-3"><label for="">Model:<span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-md-9"><input type="text" id="po_model" name="po_model" class="form-control" value="<?php echo $row['CMODEL'];?>"></div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="row">
                                    <div class="col-md-3"><label for="" style="margin-left: -7px;">Specification :<span
                                                class="text-danger">*</span> </label></div>
                                    <div class="col-md-9"><input type="text" id="po_specification" name="po_specification" class="form-control" value="<?php echo $row['CSPECIFICATION'];?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                            <div class="col-md-5">
                                <div class="row">
                                    <div class="col-md-3 "><label for="">Capacity: </label></div>
                                    <div class="col-md-9"><input type="text" id="po_capacity" name="po_capacity" class="form-control" value="<?php echo $row['CCAPACITY'];?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td>
                   
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row py-1">
                                    <div class="col-md-4"><label for="">Payment terms :<span
                                                class="text-danger">*</span></label> </div>
                                    <div class="col-md-6">
                                        <input type="text" id="po_payment_terms" name="po_payment_terms" class="form-control" value="<?php echo $row['CPAYMENT_TERMS'];?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row py-1">
                                    <div class="col-md-4 text-right"><label for="">Warranty :</label> </div>
                                    <div class="col-md-6">
                                        <input type="text" id="po_wranty" name="po_wranty" class="form-control" value="<?php echo $row['CWARRANTY'];?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row py-1">
                                    <div class="col-md-4"><label for="">Immediate / Regular</label> </div>
                                    <div class="col-md-6">
                                        <input id="po_immediate_regular" class="form-control" name="po_immediate_regular" value="<?php echo $row['CIMMEDIATE_REGULAR'];?>">
                                      
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row py-1">
                                    <div class="col-md-4"><label for="">Sanctioned / Not Sanctioned</label> </div>
                                    <div class="col-md-6">
                                        <input id="po_sanction_non_sanction" class="form-control" name="po_sanction_non_sanction" value="<?php echo $row['CSANCTIONED'];?>">
                                      
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="row ">
                            <div class="col-md-4">
                                <label for="">Requested by <span class="text-danger">*</span></label>
                                <input id="po_requested_sm_asm" name="po_requested_sm_asm" class="form-control" placeholder="SM/ASM Name"
                                    type="text" value="<?php echo $row['CREQUESTED_BY'];?>">
                            </div>

                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>

</form>
                                  </div>
                                  <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                              </div></div></div></div></td>
		                <td><?php echo $row['CSTORE'];?></td>
						<td><?php echo $row['CCITY'];?></td>
                        <td><?php echo $row['CAREA'];?></td>
                        <td><?php echo $row['CSTATE'];?></td>
                        <td><?php echo $row['CSTORE_MANAGER'];?></td>
						<td><?php echo $row['CCM_AM'];?></td>
                        <td><?php echo $row['CRM'];?></td>
                        <td><?php echo $row['CZM_AGM'];?></td>
                        <td><?php echo $row['CSGM'];?></td>	
                        <td><?php echo $row['CEQUIPMENT_TYPE'];?></td>
						<td><?php echo $row['CMAKE'];?></td>
                        <td><?php echo $row['CVENDOR_NAME'];?></td>
                        <td><?php echo $row['CMODEL'];?></td>
                        <td><?php echo $row['CSPECIFICATION'];?></td>
						<td><?php echo $row['CCAPACITY'];?></td>
						<td><?php echo $row['CQTY'];?></td>
						<td><?php echo $row['NAPPROXIMATE_VALUE'];?></td>
                        <td><?php echo $row['CREQUIREMENT_DESCRIPTION'];?></td>
                        <td><?php echo $row['CPAYMENT_TERMS'];?></td>
                        <td><?php echo $row['CWARRANTY'];?></td>
                        <td><?php echo $row['CIMMEDIATE_REGULAR'];?></td>
						<td><?php echo $row['CSANCTIONED'];?></td>
                        <td><?php echo $row['CREQUESTED_BY'];?></td>					
                        <td><?php echo $row['CRECOMMEDED_BY'];?></td>					
                        <td><?php echo $row['CRECOMMENDED_BY_STATUS'];?></td>	
                         <td><?php echo $row['CSANCTIONED_BY'];?></td>
                        <td><?php echo $row['CSANCTIONED_STATUS'];?></td>			   
						<td><?php echo $row['CAPPROVED_BY'];?></td>
                        <td><?php echo $row['CAGM_ZM_APPROVED_STATUS'];?></td>
						<td><?php echo $row['COFF_PROCESSED_BY'];?></td>
                        <td><?php echo $row['CADMIN_PROCESSED_BY_STATUS'];?></td>
						<td><?php echo $row['COFF_APPROVED_BY'];?></td>
                        <td><?php echo $row['CADMIN_PROCESSED_BY_STATUS'];?></td>
						<td><?php echo $row['COFF_AUTHORISED_BY'];?></td>
                        <td><?php echo $row['CSGM_APPROVED_STATUS'];?></td>
						<td><?php echo $row['COFF_PAYMENT_BY'];?></td>
                        <td><?php echo $row['CPAYMENT_APPROVED_STATUS'];?></td>	
                        <td><a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#<?php echo "a" .$sl; ?>">
                        <i class="fas fa-folder">
                        </i>
                        Check
                    </a>
                           <div class="modal fade" id="<?php echo "a" .$sl; ?>">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Default Modal</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="container-fluid">

        <!-- Timelime example  -->
        <div class="row">
          <div class="col-md-3">
            <!-- The time line -->
            <div class="timeline">
              <!-- timeline time label -->
              <div class="time-label">
                <span class="bg-green"><?php echo $row['DRECOMMENDED_DATE'];?></span>
              </div>
              <!-- /.timeline-label -->
              <!-- timeline item -->
              <div>
                <i class="fas fa-user bg-green"></i>
				
                <div class="timeline-item">
                 
                  <h3 class="timeline-header"><a href="#"><?php echo $row['CRECOMMEDED_BY'];?></a></h3>

                  <div class="timeline-body" style="color: #26843e;">
                   <p><?php echo $row['COFF_APPROVED_STATUS'];?></p>
                  </div>
                
                </div>
              </div>
              <!-- END timeline item -->
              <!-- timeline item -->
			   <div class="time-label">
                <span class="bg-green"><?php echo $row['DSANCTIONED_DATE'];?></span>
              </div>
              <div>
                <i class="fas fa-user bg-green"></i>
                <div class="timeline-item">
                  
                  <h3 class="timeline-header no-border"><a href="#"><?php echo $row['CRM'];?></a></h3>
				   <div class="timeline-body" style="color: #26843e;">
                   <p><?php echo $row['CSANCTIONED_STATUS'];?></p>
                  </div>
                </div>
              </div>
              <!-- END timeline item -->
              <!-- timeline item -->
			   	    <div class="time-label">
                <span class="bg-green"><?php echo $row['DSANCTIONED_DATE'];?></span>
              </div>
              <!-- /.timeline-label -->
              <!-- timeline item -->
              <div>
                <i class="fa fa-user bg-green"></i>
                <div class="timeline-item">
                  
                  <h3 class="timeline-header"><a href="#"><?php echo $row['CAPPROVED_BY'];?></a> </h3>
               <div class="timeline-body" style="color: #26843e;">
                   <p><?php echo $row['CAGM_ZM_APPROVED_STATUS'];?></p>
                  </div>
                </div>
              </div>
              <!-- END timeline item -->
              <!-- timeline time label -->
              <div class="time-label">
                <span class="bg-green"><?php echo $row['COFF_PROCESSED_DATE'];?></span>
              </div>
              <!-- /.timeline-label -->
              <!-- timeline item -->
              <div>
                <i class="fa fa-user bg-green"></i>
                <div class="timeline-item">
                  
                  <h3 class="timeline-header"><a href="#"><?php echo $row['COFF_PROCESSED_BY'];?></a> </h3>
               <div class="timeline-body" style="color: #26843e;">
                   <p><?php echo $row['CADMIN_PROCESSED_BY_STATUS'];?></p>
                  </div>
                </div>
              </div>
              <!-- END timeline item -->
              <!-- timeline item -->
			    <div class="time-label">
                <span class="bg-green"><?php echo $row['COFF_APPROVED_DATE'];?></span>
              </div>
              <div>
                <i class="fas fa-user bg-green"></i>

                <div class="timeline-item">
                  

                  <h3 class="timeline-header"><a href="#"><?php echo $row['COFF_APPROVED_BY'];?></a> </h3>

                  <div class="timeline-body" style="color: #26843e;">
                    <p><?php echo $row['CAGM_APPROVED_STATUS'];?></p>
                  </div>
               
                </div>
              </div>
              <!-- END timeline item -->
               <div class="time-label">
                <span class="bg-green"><?php echo $row['COFF_AUTHORISED_DATE'];?></span>
              </div>
              <div>
                <i class="fas fa-user bg-green"></i>

                <div class="timeline-item">
                  

                  <h3 class="timeline-header"><a href="#"><?php echo $row['COFF_AUTHORISED_BY'];?></a> </h3>

                  <div class="timeline-body" style="color: #26843e;">
                    <p><?php echo $row['CSGM_APPROVED_STATUS'];?></p>
                  </div>
               
                </div>
              </div>
			   <div class="time-label">
                <span class="bg-green"><?php echo $row['COFF_PAYMENT_DATE'];?></span>
              </div>
              <div>
                <i class="fas fa-user bg-green"></i>

                <div class="timeline-item">
                  

                  <h3 class="timeline-header"><a href="#"><?php echo $row['COFF_PAYMENT_BY'];?></a> </h3>

                  <div class="timeline-body" style="color: #26843e;">
                    <p><?php echo $row['CPAYMENT_APPROVED_STATUS'];?></p>
                  </div>
               
                </div>
				
              </div>
            </div>
          </div>
		  
          <!-- /.col -->
        </div>
      </div>
      <!-- /.timeline -->
            </div>
         
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div></td>	
	  
	  
				 
</tr>
 <?php  $sl++;      
          ?>
<?php }
}?>
                    </tbody>

                </table>
     </div>  </div></section>


 
 <script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../plugins/jszip/jszip.min.js"></script>
<script src="../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<script>
$(function() {
    $("#example1").DataTable({
        "responsive": false,
        "lengthChange": true,
        "autoWidth": false,
        "buttons": ["csv", "excel", "pdf", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": false,
        "sorting": true,
    });
});
</script>
 
</body>
</html>
