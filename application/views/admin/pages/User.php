        <!----Header css part code----->
        <?php echo $css;?>
        <!----Header code----->     
         <?php echo $header;?>

        <!----Sidebar code----->
          <?php echo $sidebar;?>

        <!-- ============================================================== -->
       <!-- Start right Content here -->
        <!-- ============================================================== -->
            <?php
        
                function rakib_calculate_time_ago_func($time) {
  
                // Calculate difference between current
                // time and given timestamp in seconds
                $diff     = time() - $time;
                  
                // Time difference in seconds
                $sec     = $diff;
                  
                // Convert time difference in minutes
                $min     = round($diff / 60 );
                  
                // Convert time difference in hours
                $hrs     = round($diff / 3600);
                  
                // Convert time difference in days
                $days     = round($diff / 86400 );
                  
                // Convert time difference in weeks
                $weeks     = round($diff / 604800);
                  
                // Convert time difference in months
                $mnths     = round($diff / 2600640 );
                  
                // Convert time difference in years
                $yrs     = round($diff / 31207680 );
                  
                // Check for seconds
                if($sec <= 60) {
                    echo "$sec seconds ago";
                }
                  
                // Check for minutes
                else if($min <= 60) {
                    if($min==1) {
                        echo "one minute ago";
                    }
                    else {
                        echo "$min minutes ago";
                    }
                }
                  
                // Check for hours
                else if($hrs <= 24) {
                    if($hrs == 1) { 
                        echo "an hour ago";
                    }
                    else {
                        echo "$hrs hours ago";
                    }
                }
                  
                // Check for days
                else if($days <= 7) {
                    if($days == 1) {
                        echo "Yesterday";
                    }
                    else {
                        echo "$days days ago";
                    }
                }
                  
                // Check for weeks
                else if($weeks <= 4.3) {
                    if($weeks == 1) {
                        echo "a week ago";
                    }
                    else {
                        echo "$weeks weeks ago";
                    }
                }
                  
                // Check for months
                else if($mnths <= 12) {
                    if($mnths == 1) {
                        echo "a month ago";
                    }
                    else {
                        echo "$mnths months ago";
                    }
                }
                  
                // Check for years
                else {
                    if($yrs == 1) {
                        echo "one year ago";
                    }
                    else {
                        echo "$yrs years ago";
                    }
                }
            }
        
        
        ?>
        <div class="main-content">
            
            <div class="page-content">


                <div class="container-fluid">
                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card shadow">
                                <div class="card-header">
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#addModal" class="btn-sm btn btn-success mb-2">
                                        <i class="fas fa-user"></i> Add New User  
                                    </button>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive" id="tableStyle">
                                        <table id="template_table" class="table table-striped table-bordered" cellspacing="0"
                                            width="100%">
                                            <thead>
                                                <tr>
                                                    <th class="th-sm">ID</th>
                                                    <th class="th-sm">Username </th>
                                                    <th class="th-sm">Role Model </th>
                                                    <th class="th-sm">Last Login</th>
                                                    <th class="th-sm">Expire Date</th>
                                                    <th class="th-sm">Status</th>
                                                    <th class="th-sm">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="table_data">
                                            <?php foreach ($data as $item): ?>
                                                
                                                <tr>
                                                    <td><?php echo $item->id; ?></td>
                                                    <td><?php echo $item->username; ?></td>
                                                    <td>
                                                        <?php 
                                                        
                                                        if($item->user_type==1){
                                                             echo '<span class="badge bg-success">Admin</span>';
                                                        }else{
                                                            echo '<span class="badge bg-danger">Normal User</span>';
                                                        }
                                                        
                                                        
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                            
                                                            if(!empty($item->last_login)){
                                                                // Display the time ago
                                                                echo rakib_calculate_time_ago_func(strtotime(date("Y-m-d H:i:s",$item->last_login)));
                                                            }else{
                                                                echo '<span class="badge bg-warning">Not Login Still Now</span>';
                                                            }
                                                            
                                                            
                                                            
                                                            ?>
                                                    </td>
                                                    <td>
                                                       <?php 
                                                            
                                                            if( date("Y-m-d") > $item->expire_date){
                                                                 echo '<span class="badge bg-danger">Expired</span>';
                                                            }else{
                                                                echo $item->expire_date;
                                                            }
                                                        ?>

                                                    </td>
                                                    <td>
                                                        <?php 
                                                        if($item->status==1){
                                                            echo '<span class="badge bg-success">Active</span>';
                                                        }else{
                                                            echo '<span class="badge bg-danger">Deactive</span>';
                                                        }
                                                        
                                                        
                                                        ?>
                                                    </td>
                                                        
                                                  
                                                    <td>
                                                        <?php if($item->status==0):?>
                                                        
                                                        <button type="button"  class="btn-sm btn btn-success"  data-bs-toggle="modal" data-bs-target="#approveModal<?php echo $item->id; ?>">Approve</button>
                                                        <?php else:?>
                                                         <button type="button" data-id="<?php echo $item->id; ?>" class="btn-sm btn btn-primary"  id="editModalBtn"><i class="fas fa-edit"></i></button>

                                                        <button type="button" class="btn-sm btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal<?php echo $item->id; ?>"><i class="fas fa-trash"></i></button>
                                                        <?php endif; ?>
                                                        
                                                       
                                                    </td>
                                                </tr>
                                                      
                                                    
                                                    <div id="deleteModal<?php echo  $item->id;?>" class="modal fade">
                                                        <div class="modal-dialog modal-confirm">
                                                            <div class="modal-content">
                                                                <div class="modal-header flex-column">
                                                                    <div class="icon-box">
                                                                        <i class="fas fa-trash"></i>
                                                                    </div>
                                                                    <h4 class="modal-title w-100">Are you sure?</h4>
                                                                    <h4 class="modal-title w-100 d-none" id="deleteId"></h4>
                                                                    <a class="close" data-bs-dismiss="modal" aria-hidden="true"><i class="mdi mdi-close"></i></a>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>Do you really want to delete these records? This process cannot be undone.</p>
                                                                </div>
                                                                <div class="modal-footer justify-content-center">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                                    <button type="button" data-id="<?php echo  $item->id;?>" class="btn btn-danger" id="deleteConfirmBtn">Delete</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
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
                                                                    <button type="button" data-id="<?php echo  $item->id;?>" class="btn btn-success" id="approveBtn">Approve</button>
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

    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog card shadow">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-user"></i> Update User </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body ">
                <form id="editForm" enctype="multipart/form-data">
                        <div class="form-group d-none">
                            <label >ID</label>
                            <input type="text" id="update_id"class="form-control" value="">
                        </div>
                        
                        <div class="form-group mb-3 ">
                            <label for="username">Username</label>
                            <input type="text" id="update_username" class="form-control" placeholder="Enter Username">
                        </div>
                        <div class="form-group mb-3 ">
                            <label for="username">Password</label>
                            <input type="text" id="update_password" class="form-control" placeholder="Enter Password">
                        </div>
                        <div class="form-group mb-3 ">
                            <label for="expire_date">Expire_date</label>
                            <input type="date" id="update_expire_date" class="form-control" placeholder="Enter Expire_date">
                        </div>
                        <div class="form-group mb-3 ">
                            <label for="expire_date">User Type</label>
                            <select type="text" id="update_user_type" class="form-select">
                                <option >-----Select----</option>
                                <option value="1">Admin</option>
                                <option value="0">Normal User</option>
                            </select>
                        </div>
                        <div class="form-group mb-3 ">
                            <label for="expire_date">Status</label>
                             <select type="text" id="update_status" class="form-select">
                                <option >-----Select----</option>
                                <option value="1">Active</option>
                                <option value="0">Deactive</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="updateBtn"  class="btn btn-success">Update Now</button>
                </div>
            </div>
        </div>
	</div>


    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New User </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body card shadow">
                <form id="addForm" enctype="multipart/form-data">
                        
                        <div class="form-group mb-3 ">
                            <label for="username">Username</label>
                            <input type="text" id="add_username" class="form-control" placeholder="Enter Username">
                        </div>
                        <div class="form-group mb-3 ">
                            <label for="username">Password</label>
                            <input type="password" id="add_password" class="form-control" placeholder="Enter Password">
                        </div>
                        <div class="form-group mb-3 ">
                            <label for="expire_date">Expire_date</label>
                            <input type="date" id="add_expire_date" class="form-control" placeholder="Enter Expire_date">
                        </div>
                        <div class="form-group mb-3 ">
                            <label for="expire_date">User Type</label>
                            <select type="text" id="add_user_type" class="form-control">
                                <option >-----Select----</option>
                                <option value="1">Admin</option>
                                <option value="0">Normal User</option>
                            </select>
                        </div>
                        <div class="form-group mb-3 ">
                            <label for="expire_date">Status</label>
                             <select type="text" id="add_status" class="form-control">
                                <option >-----Select----</option>
                                <option value="1">Active</option>
                                <option value="0">Deactive</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger"  data-bs-dismiss="modal">Close</button>
                    <button type="button" id="addBtn"  class="btn btn-success">Add New Icon</button>
                </div>
            </div>
        </div>
    </div>



 <!----Script code----->
 <?php echo $js;?>

<script type="text/javascript">
    $("#template_table").DataTable();
    
    /* Education Add Ajax call  */
	$(document).on('click','#addBtn',function(){
		// GET the form data
		var username=$("#add_username").val();
		var password=$("#add_password").val();
		var expire_date=$("#add_expire_date").val();
		var user_type=$("#add_user_type").val();
		var status=$("#add_status").val();


		/* Validation ruls  */
		if(username.length==0){
			toastr.error('Username is  Require');
		}else if(password.length==0){
            toastr.error('Password is Require');
            
        }else if(expire_date.length==0){
            toastr.error("Expire Date is require");
        }else if(user_type.length==0){
            toastr.error("User type is require");
        }else if(status.length==0){
            toastr.error("Status is require");
        }
        
        else{
			var add_data = "0";
            $('#addBtn').html('<div class="spinner-border spinner-border-sm" role="status"><span class="visually-hidden">Loading...</span></div>')
			/* Create a Form Data and append this  */
			var form_data = new FormData();
			form_data.append('username', username);
			form_data.append('password', password);
			form_data.append('expire_date', expire_date);
			form_data.append('user_type', user_type);
			form_data.append('status', status);
			form_data.append('add_data', add_data);
			/*Ajax calll Request Start */
			$.ajax({
				type: 'POST',
				url:'<?=base_url('admin/users/add')?>',
				data: form_data,
				dataType: 'script',
				cache: false,
				contentType: false,
				processData: false,
				success: function(response) {
				 	    if (response==1) {
    				 	    $("#addBtn").html("Add Now");
    				 	    $("#addModal").modal('hide');
                            toastr.success('Add Successful');
                            setTimeout(() => {
                             location.reload();
                            }, 100);
                        }else if(response==0){
                             $('#updateBtn').html('Update Now');
                            toastr.error(' Username is already taken');
                            
                        }
                        else {
                         // Error occurred
                         toastr.error('Error');
                        }
				}
			});
			/*Ajax calll Request End */
		}
	});

    /* Student Update Ajax call  */
	$(document).on('click', '#updateBtn', function (e) {
    e.preventDefault();

    // GET the form data
  var update_id= $('#update_id').val();
  var update_username=   $("#update_username").val();   
  var update_password=   $("#update_password").val();   
  var update_expire_date=   $("#update_expire_date").val();
  var update_user_type=   $("#update_user_type").val(); 
  var update_status=   $("#update_status").val(); 

	var update_data=0;

	
    /* Validation rules */
    if (update_username.length == 0) {
        toastr.error('Username is required');
    }else if(update_password.length==0){
        toastr.error('Password is required');
    }else if(update_expire_date.length==0){
        toastr.error("Expire Date is require");
    }else if(update_user_type.length==0){
        toastr.error("User Type is require");
    }
    
    else {
        $('#updateBtn').html('<div class="spinner-border spinner-border-sm" role="status"><span class="visually-hidden">Loading...</span></div>')
        // Create a FormData object and append the data
        var form_data = new FormData();
        form_data.append('id', update_id);
        form_data.append('username', update_username);
        form_data.append('password', update_password);
        form_data.append('expire_date', update_expire_date);
        form_data.append('user_type', update_user_type);
        form_data.append('status', update_status);
        form_data.append('update_data', update_data);

        // AJAX call to update the student data
        $.ajax({
            type: 'POST',
            url: '<?=base_url('admin/users/update')?>', 
            data: form_data,
            dataType: 'script',
            cache: false,
            contentType: false,
            processData: false,
            success: function (response) {
                if (response == 1) {
                    $("#editModal").modal('hide'); 
                    $('#updateBtn').html('Update Now');
                        toastr.success('Update Successfully');
                        
                        
                        setTimeout(() => {
                            location.reload();
                        }, 100); 
                }else if(response==0){
                    toastr.error(' Username is already taken');
                     $('#updateBtn').html('Update Now');
                }
                else {
                    toastr.error('Something went wrong: ' + response);
                }
            },
            error: function (xhr, status, error) {
                toastr.error('Error: ' + error);
            }
        });
    }
});

    /* Delete  Script */
    $(document).on('click','#deleteConfirmBtn',function(){
         $('#deleteConfirmBtn').html('<div class="spinner-border spinner-border-sm" role="status"><span class="visually-hidden">Loading...</span></div>');
		var id=$(this).data('id');
		$.ajax({
            url: '<?=base_url('admin/users/delete')?>', 
            type: 'POST',
            data: { id: id , delete_data:0},
            success: function(response) {
                if (response==1) {
                    $("#deleteConfirmBtn").html("Delete");
					$("#deleteModal"+id).modal('hide');
                        toastr.success('Delete Successful');
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
    /* Approve  Script */
    $(document).on('click','#approveBtn',function(){
         $('#approveBtn').html(`Loading......`);
		var id=$(this).data('id');
		$.ajax({
            url: '<?=base_url('admin/users/approve')?>', 
            type: 'POST',
            data: { id: id , approve_data:0},
            success: function(response) {
                if (response==1) {
					$("#approveModal"+id).modal('hide');
					$("#approveBtn").html("Approve");
                        toastr.success('Successful');
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

/* Edit Home section Script */
$(document).on('click','#editModalBtn',function(){
    $('#editModal').modal('show');
    var dataId=$(this).data('id');
    $('#update_status').html('');
    $.ajax({
        type: 'GET',
        url:'<?=base_url('admin/users/get')?>',
        data: {get_data:0,id:dataId},
        cache: false,
        success: function(response) {
             var jsonData = JSON.parse(response);
            for(var i = 0; i < jsonData.length; i++) {
                var data = jsonData[i];
                $('#update_id').val(data.id);
                $("#update_username").val(data.username);   
                $("#update_password").val(data.password);   
                $("#update_expire_date").val(data.expire_date);   
                $("#update_user_type").val(data.user_type);   
                if (data.status === '1') {
                        $('#update_status').html('<option value="1" selected>Active</option>');
                        $('#update_status').append('<option value="0" >inActive</option>');
                    } else {
                        $('#update_status').html('<option value="0" selected>inActive</option>'); 
                        $('#update_status').append('<option value="1">Active</option>');
                    }
            }
             
            
        }
    });

});
    

</script>




</body>

</html>