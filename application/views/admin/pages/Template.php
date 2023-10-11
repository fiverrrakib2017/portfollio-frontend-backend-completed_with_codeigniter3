        <!----Header css part code----->
        <?php echo $css;?>
        <!----Header code----->     
         <?php echo $header;?>

        <!----Sidebar code----->
          <?php echo $sidebar;?>

        <!-- ============================================================== -->
       <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">


                <div class="container-fluid">
                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card shadow">
                                
                                <div class="card-body">
                                    <div class="table-responsive" id="tableStyle">
                                        <table id="template_table" class="table table-striped table-bordered" cellspacing="0"
                                            width="100%">
                                            <thead>
                                                <tr>
                                                    <th class="th-sm">ID</th>
                                                    <th class="th-sm">Template Image</th>
                                                    <th class="th-sm">Template Name</th>
                                                    <th class="th-sm">Status</th>
                                                    <th class="th-sm">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="table_data">
                                               
                                            <?php foreach ($template_data as $item): ?>
                                                    <tr>
                                                    <td><?php echo $item->id; ?></td>
                                                        <td><img src=" <?php echo base_url();?>/<?php echo $item->template_image;?>" height="50px" width="100px" class="rounded"/></td>
                                                        <td><?php echo $item->template_name; ?></td>
                                                        <td>
                                                            <?php 
                                                            if ($item->status==1) {
                                                               echo '<span class="badge bg-success">Active</span>'; 
                                                            }else{
                                                                echo '<span class="badge bg-danger">inActive</span>'; 
                                                            }
                                                            
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <button type="button" class="btn btn-success"  data-bs-toggle="modal" data-bs-target="#approveModal<?php echo  $item->id;?>">Approve</button>
                                                        </td>
                                                    </tr>
                                                      
                                                    
                                                    <div id="approveModal<?php echo  $item->id;?>" class="modal fade">
                                                        <div class="modal-dialog modal-confirm">
                                                            <div class="modal-content">
                                                                <div class="modal-header flex-column">
                                                                    <div class="icon-box" style="background: #062418;">
                                                                    <i class="fas fa-solid fa-check" style="color:#32bb77"></i>
                                                                    </div>
                                                                    <h4 class="modal-title w-100">Are you sure?</h4>
                                                                    <h4 class="modal-title w-100 d-none" id="deleteId"></h4>
                                                                    <a class="close" data-bs-dismiss="modal" aria-hidden="true"><i class="mdi mdi-close"></i></a>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>Do you really want to Approve these records? This process cannot be undone.</p>
                                                                </div>
                                                                <div class="modal-footer justify-content-center">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                                    <button type="button" data-id="<?php echo  $item->id;?>" class="btn btn-success" id="ConfirmBtn">Approve</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                    
                    <!-- Modal -->


                      
                    </div>
                    <!-- end row -->

                </div> <!-- container-fluid -->



               <!----Footer code----->
               <?php echo $footer;?>
            </div>
            <!-- End Page-content -->

        </div>
    <!-- END layout-wrapper -->




    



 <!----Script code----->
 <?php echo $js;?>

<script type="text/javascript">
    $("#template_table").DataTable();
   





    /* Approve Template Script */
    $(document).on('click','#ConfirmBtn',function(){
         $('#ConfirmBtn').html('<div class="spinner-border spinner-border-sm" role="status"><span class="visually-hidden">Loading...</span></div>')
		var template_id=$(this).data('id');
		$.ajax({
            url: '<?=base_url('admin/template/approve')?>', 
            type: 'POST',
            data: { id: template_id , approve_template:0},
            success: function(response) {
                if (response==1) {
                    $("#confirmBtn").html("Approve");
					$("#approveModal"+template_id).modal('hide');
                        toastr.success('Template Approve');
                        setTimeout(() => {
                            location.reload();
                    }, 100);
                } else {
                    // Error occurred
                    toastr.error('Error deleting ');
                }
            },
            error: function(xhr, status, error) {
                // Handle AJAX errors here
                toastr.error('AJAX Error: ' + error);
            }
        });
	});

</script>




</body>

</html>