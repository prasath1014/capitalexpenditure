<?php
include('header.php');
include('connection.php');
include("session.php");
?>
    <h2 class="text-center font-weight-bold" align="center">Reports</h2>
    <div class="card border ">
        <div class="card-body">
           
                <div class="text-center">
                    <div class="row">
					<div class="col-4">
                            <b class="">From_Date</b><br>
                            <input type="date" class="form-control" name="from_date" id="from_date">
                          
                        </div>
					               <div class="col-4">
                            <b>To_Date</b><br>
                            <input type="date" class="form-control" name="to_date" id="to_date">
                          
                        </div>
                       <div class="col-4">
                            <b>Outlet_Name</b><br>
                            <?php
							 
							if($role==1)
							{
							?>
							
	<input type="text" class="form-control" name="search_query_out" id="search_query_out" value="<?php echo $login_session;?>" readonly>
							
							<?php }else{?>
							<select class=" form-control select2bs4" name="search_query_out" id="search_query_out"
                                searchable="Search here..">
                                <option value="ALL">ALL</option>
                                <?php 
		 
		 $str="SELECT hroi.RETAIL_OUTLET_ID ,hroi.MSM_SHOP_NAME  FROM RAYMEDI_HQ.HQ_RETAIL_OUTLET_INFO hroi ORDER BY hroi.MSM_SHOP_NAME ASC";

         $result=oci_parse($db,$str);
		 oci_execute($result);
		 while($outlet=oci_fetch_array($result))
		 {
		 ?>

                                <option value="<?php echo $outlet[1];?>">
                                    <?php echo $outlet[1]; ?></option>

                                <?php } ?>
                            </select>
							
							<?php } ?>
							
							
							
                          
                        </div>
                        
                    <div class="col-md-3">
                            <input type="button" name="incentive_flow_verfiy" id="incentive_flow_verfiy" value="Search"
                                class="btn form-control rounded-pill" style="margin-top: 28px; margin-left: 568px; background-color: #1b5127; color: #dfc536;">
                            
                        </div>
                      </div></div>
                    <div class="row">
                            <div class="col-md-12">
                                <div class="text-center">
                                    <!-- Image loader -->
                                    <div id='loader' style='display: none;'>
                                        <img src="../../loader.gif" style="width:70px;">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Image loader -->

                        <!-- Output Tag -->


                        <div class="response"></div>
                </div>

                 
<!-- jQuery -->
<script src="../../assets/plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap 4 -->
<script src="../../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- DataTables  & Plugins -->
<script src="../../assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../../assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../../assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../../assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../../assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="../../assets/plugins/date/bootstrap-datetimepicker.min.js"></script>
<script src="../../assets/plugins/select2/js/select2.full.min.js"></script>
<!-- SweetAlert2 -->
<script src="../../assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="../../assets/plugins/toastr/toastr.min.js"></script>
<!-- AdminLTE App -->
<script src="../../assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../assets/dist/js/demo.js"></script>


        <script src="../../assets/plugins/select2/js/select2.full.min.js"></script>

                
        </div>
    </div>

<?php 
include('footer.php');
?>



<script type='text/javascript'>
$(document).ready(function() {
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
        theme: 'bootstrap4'
    })
    var theResponse = null;
    $("#incentive_flow_verfiy").click(function() {
        $('.response').empty();
        var outlet_name = $('#search_query_out').val();
        var from_date = $('#from_date').val();
        var to_date = $('#to_date').val();
		
        $.ajax({
            url: 'Rpt_admin_project_result.php',
            type: 'get',
            data: {
                outlet_name: outlet_name,
                from_date: from_date,
                to_date:to_date,
                
                
            },
            beforeSend: function() {
              
                // Show image container
                $("#loader").show();
                //$('#login_for_review').modal('show');
            },
            success: function(response) {
                
                $('.response').empty();
                $('.response').append(response);
            },
            complete: function(data) {
                // Hide image container
                $("#loader").hide();

            }
        });

    });
});
</script>
