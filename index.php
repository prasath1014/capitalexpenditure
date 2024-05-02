<?php 
include('header.php');
include('connection.php');
error_reporting(0);
include("session.php");
?>
<?php
//get form id
$form_id="";
 $str="SELECT max(IUNIQ_ROW_ID) AS id FROM RAYMEDI_RAMRAJ.CAPITAL_EXPENDITURE_REQUEST";
 $result=oci_parse($db,$str);
 oci_execute($result);
while($row=oci_fetch_array($result)){
if($row[0]==''){
$form_id= 'CER1';
}else{
     $form_id ="CER".($row[0]+(int)1);
}
}
//get store details
$str_name='';
$str_city='';
$str_area='';
$str_state='';
$sql="SELECT MSM_SHOP_NAME ,MSM_SHOP_STREET_ADDR_2 ,LAND_MARK,MSM_SHOP_CITY_TOWN ,MSM_SHOP_STATE FROM RAYMEDI_HQ.HQ_RETAIL_OUTLET_INFO hroi WHERE HROI.MSM_SHOP_NAME  ='$user_check'";
$rst=oci_parse($db,$sql);
oci_execute($rst);
while($row=oci_fetch_array($rst)){
    $str_name=$row[0];
    $str_city=$row[3];;
    $str_area=$row[1].','.$row[2];;
    $str_state=$row[4];;
}
                             
                       
?>
<form name="form1" method="post" action="add_entry.php">
<div class="container-fluid ">
    <div class="row">
        <div class="col-md-12 text-center py-5">


            <table align="center" class="table col-md-10  border py-5">
                <tr>
                    <td>
                        <div class="row ">
                            <div class="col-md-2 text-center"><img style="height:60;" class="brand-image"
                                    src="images/logo.png" alt="logo"></div>
                            <div class="col-md-10 text-center py-3 h4">Capital Expenditure Request Form</div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="row">
                            <div class="col-md-6 py-2 ">
                                <input type="hidden" id="po_reqs_no" name="po_reqs_no" value="<?php echo $form_id;?>">
                                Requisition No: <span class="badge badge-success"><?php echo $form_id;?></span>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6 text-right py-2"> Requisition Date.</div>
                                    <div class="col-md-6 text-left">
                                        <input type="date" id="po_date" name="po_date" value="<?php echo  date("Y-m-d"); ?>" readonly
                                            class="form-control">
                                    </div>
                                </div>
                            </div>
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
                                    <div class="col-md-9"><input type="text" value="<?php echo $str_name; ?>"
                                            id="po_store" name="po_store" readonly class="form-control"></div>
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                            <div class="col-md-5">
                                <div class="row">
                                    <div class="col-md-3"><label for="">STORE MANAGER</label></div>
                                    <div class="col-md-9"><input type="text" id="po_sm" name="po_sm" class="form-control"></div>
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
                                    <div class="col-md-9"><input type="text" value="<?php echo $str_city; ?>"
                                            id="po_city" name="po_city" readonly class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                            <div class="col-md-5">
                                <div class="row">
                                    <div class="col-md-3"><label for="">CM/ AM </label></div>
                                    <div class="col-md-9">
                                        <select id="po_cm_am" name="po_cm_am" class="form-control select2bs4">
                                            <option value="" selected>Select CM/AM</option>
                                            <?php
                                            $str="SELECT
	EMP_NAME,
	tu.USERNAME,
	tu.ID
FROM
	RAYMEDI_RAMRAJ.MAST_MANAGER_DESIGNATION mmd INNER JOIN
	RAYMEDI_RAMRAJ.TICKET_USER tu ON tu.EMPLOYEE_CODE =mmd.EMP_ID 
WHERE
	DESIGNATION IS NOT NULL";
                                            $result=oci_parse($db,$str);
                                            oci_execute($result);
                                            while($row=oci_fetch_array($result)){
                                                ?>
                                            <option value="<?php echo $row[1];  ?>"><?php echo $row[0];  ?></option>
                                            <?php
                                            }
                                            
                                            ?>
                                        </select>
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
                                    <div class="col-md-9"><input type="text" value="<?php echo $str_area; ?>"
                                            id="po_area" name="po_area" readonly class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                            <div class="col-md-5">
                                <div class="row">
                                    <div class="col-md-3"><label for="">ZM / AGM</label></div>
                                    <div class="col-md-9">

                                        <select id="po_zm_agm" name="po_zm_agm" class="form-control select2bs4">
                                            <option value="" selected>Select ZM / AGM</option>
                                            <?php
                                            $str="SELECT
	EMP_NAME,
	tu.USERNAME,
	tu.ID
FROM
	RAYMEDI_RAMRAJ.MAST_MANAGER_DESIGNATION mmd INNER JOIN
	RAYMEDI_RAMRAJ.TICKET_USER tu ON tu.EMPLOYEE_CODE =mmd.EMP_ID 
WHERE
	DESIGNATION IS NOT NULL";
                                            $result=oci_parse($db,$str);
                                            oci_execute($result);
                                            while($row=oci_fetch_array($result)){
                                                ?>
                                            <option value="<?php echo $row[1];  ?>"><?php echo $row[0];  ?></option>
                                            <?php
                                            }
                                            
                                            ?>
                                        </select>
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
                                    <div class="col-md-9"><input type="text" value="<?php echo $str_state; ?>"
                                            id="po_state" name="po_state" readonly class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                            <div class="col-md-5">
                                <div class="row">
                                    <div class="col-md-3"><label for="">SGM </label></div>
                                    <div class="col-md-9"><input type="text" id="po_sgm" name="po_sgm" class="form-control"></div>
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
                                    <div class="col-md-9"><input type="text" id="po_eq_type" name="po_eq_type" class="form-control"></div>
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                            <div class="col-md-5">
                                <div class="row">
                                    <div class="col-md-3"><label for="">Make </label></div>
                                    <div class="col-md-9"><input type="text" id="po_make" name="po_make" class="form-control"></div>
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
                                    <div class="col-md-9"><input type="text" id="po_vendor_name" name="po_vendor_name" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                            <div class="col-md-5">
                                <div class="row">
                                    <div class="col-md-3"><label for="">Model:<span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-md-9"><input type="text" id="po_model" name="po_model" class="form-control"></div>
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
                                    <div class="col-md-3"><label for="">Specification :<span
                                                class="text-danger">*</span> </label></div>
                                    <div class="col-md-9"><input type="text" id="po_specification" name="po_specification" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                            <div class="col-md-5">
                                <div class="row">
                                    <div class="col-md-3 "><label for="">Capacity: </label></div>
                                    <div class="col-md-9"><input type="text" id="po_capacity" name="po_capacity" class="form-control">
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
                                    <div class="col-md-9"><input type="text" id="po_qty" name="po_qty" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                            <div class="col-md-5">
                                <div class="row">
                                    <div class="col-md-3 "><label for="">Approximate Value:<span
                                                class="text-danger">*</span> </label></div>
                                    <div class="col-md-9"><input type="text" id="po_aps_valuw" name="po_aps_valuw" class="form-control">
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
                                    rows="3"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row py-1">
                                    <div class="col-md-4"><label for="">Payment terms :<span
                                                class="text-danger">*</span></label> </div>
                                    <div class="col-md-6">
                                        <input type="text" id="po_payment_terms" name="po_payment_terms" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row py-1">
                                    <div class="col-md-4 text-right"><label for="">Warranty :</label> </div>
                                    <div class="col-md-6">
                                        <input type="text" id="po_wranty" name="po_wranty" class="form-control">
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
                                        <select id="po_immediate_regular" class="form-control" name="po_immediate_regular">
                                            <option value="" selected>Select</option>
                                            <option value="Immediate">Immediate</option>
                                            <option value="Regular">Regular</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row py-1">
                                    <div class="col-md-4"><label for="">Sanctioned / Not Sanctioned</label> </div>
                                    <div class="col-md-6">
                                        <select id="po_sanction_non_sanction" class="form-control" name="po_sanction_non_sanction" >
                                            <option value="" selected>Select</option>
                                            <option value="Sanctioned">Sanctioned</option>
                                            <option value="Not Sanctioned">Not Sanctioned</option>
                                        </select>
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
                                    type="text">
                            </div>
                            <div class="col-md-3 py-4 text-left">
							<button type="save" id="btn_save" name="btn_save"
                                    class="btn btn-primary">Save</button>
                                <input type="reset" value="clear"></div>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>

</form>
<?php
include('footer.php');
?>
