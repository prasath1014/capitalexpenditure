<?php 
include('header.php');
error_reporting(0);
include('connection.php');
include("session.php");

//get data for view
$str_name='';
$str_city='';
$str_area='';
$str_state='';
$str_sm='';
$str_cm_am='';
$str_zm_agm='';
$str_sgm='';
$str_equ='';
$mrk='';
$vnd_nm='';
$mdl='';
$req_ds='';
$pmt_tr='';
$warr='';
$imm_rgl='';
$s_ns='';
$req_by='';

	  if($role==3 || $role==181 || $role==182 || $role==183 || $role==161 || $role==207)
			{

$sql="SELECT
	rdg.CSTORE ,
	rdg.CCITY ,
	rdg.CAREA ,
	rdg.CSTATE ,
	rdg.CSTORE_MANAGER ,
	rdg.CCM_AM ,
	rdg.CZM_AGM ,
	rdg.CSGM ,
	rdg.CEQUIPMENT_TYPE ,
	rdg.CMAKE ,
	rdg.CMODEL ,
	rdg.CSPECIFICATION ,
	rdg.CCAPACITY ,
	rdg.CQTY ,
	rdg.NAPPROXIMATE_VALUE ,
	rdg.CREQUIREMENT_DESCRIPTION ,
	rdg.CPAYMENT_TERMS ,
	rdg.CWARRANTY ,
	rdg.CIMMEDIATE_REGULAR ,
	rdg.CSANCTIONED ,
	rdg.CREQUESTED_BY 
FROM
	RAYMEDI_RAMRAJ.CAPITAL_EXPENDITURE_REQUEST rdg WHERE rdg.CCM_AM='$user_check' or rdg.CZM_AGM='$user_check' or rdg.CRM='$user_check'";
	
			}else{
				
		$sql="SELECT
	rdg.CSTORE ,
	rdg.CCITY ,
	rdg.CAREA ,
	rdg.CSTATE ,
	rdg.CSTORE_MANAGER ,
	rdg.CCM_AM ,
	rdg.CZM_AGM ,
	rdg.CSGM ,
	rdg.CEQUIPMENT_TYPE ,
	rdg.CMAKE ,
	rdg.CMODEL ,
	rdg.CSPECIFICATION ,
	rdg.CCAPACITY ,
	rdg.CQTY ,
	rdg.NAPPROXIMATE_VALUE ,
	rdg.CREQUIREMENT_DESCRIPTION ,
	rdg.CPAYMENT_TERMS ,
	rdg.CWARRANTY ,
	rdg.CIMMEDIATE_REGULAR ,
	rdg.CSANCTIONED ,
	rdg.CREQUESTED_BY 
FROM
	RAYMEDI_RAMRAJ.CAPITAL_EXPENDITURE_REQUEST rdg";  		
				
			}	
	
	
	
$rst=oci_parse($db,$sql);
oci_execute($rst);
while($row=oci_fetch_array($rst)){
    $str_name=$row[0];
    $str_city=$row[3];;
    $str_area=$row[1].','.$row[2];;
    $str_state=$row[3];;
	$str_sm=$row[5];
	$str_cm_am=$row[6];
	$str_zm_agm=$row[7];
	$str_sgm=$row[8];
	$str_equ=$row[9];
	$mrk=$row[10];
	$vnd_nm=$row[11];
	$mdl=$row[12];
	$req_ds=$row[13];
	$pmt_tr=$row[14];
	$warr=$row[15];
	$imm_rgl=$row[16];
	$s_ns=$row[17];
	$req_by=$row[18];
}

?>

<div class="col-md-12">
    <table id="example1"  class="table table-bordered table-striped">
	<h2 class="text-center font-weight-bold" align="center">Approval Screen</h2>
        <thead style="border-radius: 13px 13px 0px 0px;" class="  bg-info">
            <tr>
                <th>S.No</th>
                <th>Ref_Number</th>
                <th>Create_date</th>
                <th>Store_Name</th>
                <th>Vendor_Name</th>
              <th>Specification</th>
              <th>Qty</th>
              <th>Approximate Value</th>
                <th>Requested_By</th>
               <th>AM_Recommended_by</th>
               <th>AM_Approval_Status</th>
               <th>RM_Sanctioned_by</th>
			   <th>RM_Approval_Status</th>
               <th>AGM_ZM__Approved_by</th>
			   <th>AGM_ZM_Approval_Status</th>
			   <th>Processed_By</th>
			   <th>Processed_Status</th>
			   <th>Approved_By</th>
			   <th>Approved_Status</th>
			   <th>Authorised_By</th>
			   <th>Authorised_Status</th>
			   <th>Payment_By</th>
			   <th>Payment_Status</th>
              <th>Attachment</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
		 
			  if($role==3 || $role==181 || $role==182 || $role==183 || $role==161 || $role==207)
			{
			 
			
                $str="SELECT * FROM
	RAYMEDI_RAMRAJ.CAPITAL_EXPENDITURE_REQUEST rdg 
	WHERE rdg.CCM_AM='$login_session' or rdg.CZM_AGM='$login_session' or rdg.CRM='$login_session'";
			}else{
				
                $str="SELECT * FROM RAYMEDI_RAMRAJ.CAPITAL_EXPENDITURE_REQUEST rdg";
			}
			
	
	
	
	
                $result=oci_parse($db,$str);
                oci_execute($result);
                $sl=1;
                while($row=oci_fetch_array($result)){
                ?>
            <tr>
            <td><?php echo $sl; ?></td>
                <td><?php echo $row['CREQ_NO'];?></td>
                <td><?php echo $row['DREQ_DATE'];?></td>
                <td><?php echo $row['CSTORE'];?></td>
                <td><?php echo $row['CVENDOR_NAME'];?></td>
                <td><?php echo $row['CSPECIFICATION'];?></td>
                <td><?php echo $row['CQTY'];?></td>
                <td><?php echo $row['NAPPROXIMATE_VALUE'];?></td>
                <td><?phpecho $row['CREQUESTED_BY'];?></td>
                <td><?php echo $row['CRECOMMEDED_BY'];?></td>           
			  <td><?php echo $row['COFF_APPROVED_STATUS'];?></td>
               <td><?php $check = $row['CAPPROVED_BY'];
			   if($check == ''){
			   echo $row['CSANCTIONED_BY'];
			   }else{?>
				    <label>- -</label>
			  <?php }?></td>			  
			   <td><?php $check1 = $row['CAGM_ZM_APPROVED_STATUS'];
			   if($check1 == ''){
			   echo $row['CSANCTIONED_STATUS'];
			   }else{?>
				    <label>- -</label>
			  <?php }?>
			   </td> 
               <td><?php echo $row['CAPPROVED_BY'];?></td>			  
			 	<td><?php echo $row['CAGM_ZM_APPROVED_STATUS'];?></td>
<td><?php echo $row['COFF_PROCESSED_BY'];?></td>			  
			 	<td><?php echo $row['COFF_PROCESSED_STATUS'];?></td>
<td><?php echo $row['COFF_APPROVED_BY'];?></td>			  
			 	<td><?php echo $row['CADMIN_PROCESSED_BY_STATUS'];?></td>
<td><?php echo $row['COFF_AUTHORISED_BY'];?></td>			  
			 	<td><?php echo $row['CSGM_APPROVED_STATUS'];?></td>
<td><?php echo $row['COFF_PAYMENT_BY'];?></td>			  
			 	<td><?php echo $row['CPAYMENT_APPROVED_STATUS'];?></td>				
				<td>
				<a class="btn btn-primary" data-toggle="modal" data-target="#<?php echo "att" . $sl; ?>">
                                    View
                                  </a>
                                 
				  <div class="modal fade" id="<?php echo "att" . $sl; ?>">
                                <div class="modal-dialog modal-lg">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h4 class="modal-title"> </h4>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
								<img src="https://vccreports.ramrajcotton.net/Admin_Capital_Expenditure/<?php  echo $row['CATTACHMENT'];?>" style="width: 768px;height: 500px;"> 
								  
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                                    </div>
                                  </div>
                                  <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                              </div>
				
				
				
				</td>
              <td class="project-actions text-right">
                    <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#<?php echo "b" .$sl; ?>">
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
                                    src="Capital_Expenditur_image/logo.png" alt="logo"></div>
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
              <div class="col-md-9">
<input type="text" value="<?php echo $row['CSTORE'];?>"  id="po_store" name="po_store" readonly class="form-control">



</div>
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                            <div class="col-md-5">
                                <div class="row">
                                    <div class="col-md-3"><label for="">STORE MANAGER</label></div>
                                    <div class="col-md-9"><input type="text" id="po_sm" name="po_sm" class="form-control" value="<?php echo $row['CSTORE_MANAGER'];?>" readonly></div>
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
                                    <div class="col-md-9"><input type="text" value="<?php echo $row['CCITY'];?>" readonly
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
                                    type="text" value="<?php echo $row['CCM_AM'];?>" readonly>
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
                                    <div class="col-md-9"><input type="text" value="<?php echo $row['CAREA'];?>" readonly
                                            id="po_area" name="po_area"   class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                            <div class="col-md-5">
                                <div class="row">
                                    <div class="col-md-3"><label for="">ZM / AGM</label></div>
                                    <div class="col-md-9">
<input id="po_requested_sm_asm" name="po_requested_sm_asm" class="form-control" placeholder="SM/ASM Name"
                                    type="text" value="<?php echo $row['CZM_AGM'];?>" readonly>
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
                                    <div class="col-md-9"><input type="text" value="<?php echo $row['CSTATE'];?>" readonly
                                            id="po_state" name="po_state"   class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                            <div class="col-md-5">
                                <div class="row">
                                    <div class="col-md-3"><label for="">SGM </label></div>
                                    <div class="col-md-9"><input type="text" id="po_sgm" name="po_sgm" class="form-control" value="<?php echo $row['CSGM'];?>" readonly></div>
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
                                    <div class="col-md-9"><input type="text" id="po_eq_type" name="po_eq_type" class="form-control" value="<?php echo $row['CEQUIPMENT_TYPE'];?>" readonly></div>
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                            <div class="col-md-5">
                                <div class="row">
                                    <div class="col-md-3"><label for="">Make </label></div>
                                    <div class="col-md-9"><input type="text" id="po_make" name="po_make" class="form-control"  value="<?php echo $row['CMAKE'];?>" readonly></div>
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
                                    <div class="col-md-9"><input type="text" id="po_vendor_name" name="po_vendor_name" class="form-control"  value="<?php echo $row['CVENDOR_NAME'];?>" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                            <div class="col-md-5">
                                <div class="row">
                                    <div class="col-md-3"><label for="">Model:<span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-md-9"><input type="text" id="po_model" name="po_model" class="form-control" value="<?php echo $row['CMODEL'];?>" readonly></div>
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
                                    <div class="col-md-9"><input type="text" id="po_specification" name="po_specification" class="form-control" value="<?php echo $row['CSPECIFICATION'];?>" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                            <div class="col-md-5">
                                <div class="row">
                                    <div class="col-md-3 "><label for="">Capacity: </label></div>
                                    <div class="col-md-9"><input type="text" id="po_capacity" name="po_capacity" class="form-control" value="<?php echo $row['CCAPACITY'];?>" readonly>
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
                                    <div class="col-md-9"><input type="text" id="po_qty" name="po_qty" class="form-control" value="<?php echo $row['CQTY'];?>" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                            <div class="col-md-5">
                                <div class="row">
                                    <div class="col-md-3"><label for="" style="margin-left: -5px;">Approximate Value:<span
                                                class="text-danger">*</span> </label></div>
                                    <div class="col-md-9"><input type="text" id="po_aps_valuw" name="po_aps_valuw" class="form-control" value="<?php echo $row['NAPPROXIMATE_VALUE'];?>" readonly>
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
                            <div class="col-md-12">
                                <label for="">Requirement Description : <span class="text-danger">*</span></label>
                                <textarea class="form-control" id="po_details" name="po_details" cols="30"
                                    rows="3" value="<?php echo $row['CREQUIREMENT_DESCRIPTION'];?>" readonly></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row py-1">
                                    <div class="col-md-4"><label for="">Payment terms :<span
                                                class="text-danger">*</span></label> </div>
                                    <div class="col-md-6">
                                        <input type="text" id="po_payment_terms" name="po_payment_terms" class="form-control" value="<?php echo $row['CPAYMENT_TERMS'];?>" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row py-1">
                                    <div class="col-md-4 text-right"><label for="">Warranty :</label> </div>
                                    <div class="col-md-6">
                                        <input type="text" id="po_wranty" name="po_wranty" class="form-control" value="<?php echo $row['CWARRANTY'];?>" readonly>
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
                                        <input id="po_immediate_regular" class="form-control" name="po_immediate_regular" value="<?php echo $row['CIMMEDIATE_REGULAR'];?>" readonly>
                                      
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row py-1">
                                    <div class="col-md-4"><label for="">Sanctioned / Not Sanctioned</label> </div>
                                    <div class="col-md-6">
                                        <input id="po_sanction_non_sanction" class="form-control" name="po_sanction_non_sanction" value="<?php echo $row['CSANCTIONED'];?>" readonly>
                                      
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="row ">
                            <div class="col-md-12">
                                <label for="">Requested by <span class="text-danger">*</span></label>
                                <input id="po_requested_sm_asm" name="po_requested_sm_asm" class="form-control" placeholder="SM/ASM Name"
                                    type="text" value="<?php echo $row['CREQUESTED_BY'];?>" readonly>
                            </div>

                        </div>
                    </td>
                </tr>
				
				
				    <tr>
                    <td>
                        <div class="row ">
                            <div class="col-md-4">
                                <label for="">Attachment <span class="text-danger">*</span></label>
                                 
								 
								 <img src="https://vccreports.ramrajcotton.net/Admin_Capital_Expenditure/<?php  echo $row['CATTACHMENT'];?>" style="width: 768px;height: 500px;"> 
								 
								 
								 
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
                              </div></div></div></div>
					<a class="btn btn-warning btn-sm" data-toggle="modal" data-target="#<?php echo "a" .$sl; ?>">
                                    <i class="fas fa-edit"></i> Approval
                                  </a>
                                                                
                                <div class="modal fade" id="<?php echo "a" .$sl; ?>">
                                <div class="modal-dialog modal-xl">
                                  <div class="modal-content">
								  
								  <h2 class="text-center" align="center">Request Approval </h2>
                                    <div class="modal-header">

                                      <div class="modal-body">

                                <!-- /.card-header -->
                                <div class="card-body">
                                  <form name="form1" method="post" action="update_entry.php">
                                        <div class="text-center">
										
                                            <div class="row">
<div class="col-4">
                            <b>Ref Number</b><br>
                            
                          <input type="text" class="form-control" name="edit_ref_name" id="edit_ref_name" value="<?php echo  $row['CREQ_NO']; ?>" readonly>
						  
						  <input type="hidden" value="<?php echo $row['IUNIQ_ROW_ID'];?>"  id="edit_row_id" name="edit_row_id" readonly class="form-control">
                        </div>
<div class="col-4">
                            <b>Create date</b><br>
                            
                          <input type="text" class="form-control" name="edit_create_date" id="edit_create_date" value="<?php echo  $row['DREQ_DATE']; ?>" readonly>
                        </div>
               
<div class="col-4">
                            <b>Store Name</b><br>
                            
                          <input type="text" class="form-control" name="edit_store_name" id="edit_store_name" value="<?php echo  $row['CSTORE']; ?>" readonly>
                        </div>
						</div>
						  <div class="row py-2"> 
						<div class="col-4">
                            <b>Vendor Name</b><br>
                           <input class="form-control" rows="1" name="edit_vendor_name"  id="edit_vendor_name" value="<?php echo $row['CVENDOR_NAME'];?>">
                         
                        </div>
						<div class="col-4">
                            <b>Modal</b><br>
                            
                          <input type="text" class="form-control" name="edit_modal" id="edit_modal" value="<?php echo $row['CMODEL'];?>">
                        </div>
						<div class="col-4">
                            <b>Specification</b><br>
                            
                          <input type="text" class="form-control" name="edit_spcifi" id="edit_spcifi" value="<?php echo $row['CSPECIFICATION'];?>" >
                        </div>   </div>
						  <div class="row"> 
						<div class="col-4">
                            <b>Requested By</b><br>
                            
                          <input type="text" class="form-control" name="edit_crd_date" id="edit_crd_date" value="<?php echo $row['CREQUESTED_BY'];?>" readonly>
                        </div>
						<div class="col-4">
                            <b>Status</b><br>
                           <select class="form-control" style="width: 100%;" name="edit_approved" id="edit_approved">
                    <option value="" disabled selected>Select Status</option>
                    <option value="Approved">Approved</option>
                    <option value="Rejected">Rejected </option>
                    
                  </select>
							<div class="col-4">
                            <b></b><br>
                            
                          <input type="hidden" class="form-control" name="up_date" id="up_date" value="<?php echo date("Y-m-d");?>" readonly>
                        </div>  
						  
						  
						  
						  
                        </div>
						<div class="col-2">
 
						 <button type="save" name="Update_Details" id="Update_Details" class="form-control btn btn-success rounded-pill" style="margin-top: 22px; margin-left: 59px;">Update</button>
						 
						 </div>						
                                 
</div>
						
           </div>
                                            <!-- /.card-body -->
                                        </div>
									</form>
                                  </div>
                                  <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                              </div></div></div></div>
                              <!-- /.modal --></td>	  
							  
							  
							  
							  

            </tr>
			     <?php  
                   $sl++;
                ?>

            <?php                 } ?>
        </tbody>
    </table>
</div>
			

			
<?php 
include('footer.php');
?>
<script>
$(function() {
    $("#example1").DataTable({
        "responsive": false,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": [{
            extend: "excel",
            className: "btn  btn-info",
            titleAttr: 'Export in Excel',
            text: "<i class='fas fa-file-excel'>&nbsp; Excel</i>",
            init: function(api, node, config) {
                $(node).removeClass('btn-default')
            }
        }, {
            extend: "pdf",
            className: "btn  btn-info",
            titleAttr: "Export in PDF",
            text: "<i class='fas fa-file-pdf'>&nbsp; PDF</i>",
            init: function(api, node, config) {
                $(node).removeClass('btn-default')
            }
        }, {
            extend: "print",
            className: "btn  btn-info",
            titleAttr: 'Export in Excel',
            text: "<i class='fas fa-print'>&nbsp; Print</i>",
            init: function(api, node, config) {
                $(node).removeClass('btn-default')
            }
        }]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
    });
});
</script>