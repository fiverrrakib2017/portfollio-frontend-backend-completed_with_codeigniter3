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
                    
                    <div class="row ">
                        <div class="col-md-7 m-auto">
                            <div class="card">
                                <?php foreach ($data as $item): ?>
                                    <form action="">
                                        <div class="card-header bg-info text-white text-center">
                                            <h4>Profile Information</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group mb-3 d-none">
                                                <label for="">Id</label>
                                                <input type="text" id="update_id" class="form-control" placeholder="Enter Title" value="<?php echo $item->id;?>">
                                            </div>
                                            <div class="form-group mb-3 ">
                                                <label for="">Name</label>
                                                <input type="text" id="update_name" class="form-control" placeholder="Enter Title" value="<?php echo $item->name;?>">
                                            </div>
                                            <div class="form-group mb-3 ">
                                                <label for="image">Profile Image</label>
                                                <input type="file" id="update_image" class="form-control">
                                            </div>
                                            <div class="form-group mb-3 ">
                                                <img src="<?php echo base_url() . '/' . $item->image; ?>"
                                                alt="Profile Image" class="img-fluid img-thumbnail" 
                                                id="old_image" style="max-width: 200px; height: 100px;">
                                            </div>
                                            
                                            <div class="form-group mb-3 ">
                                                <label for="image">Resume Upload</label>
                                                <input type="file" id="update_resume" class="form-control">
                                            </div>
                                            <div class="form-group mb-3 d-none">
                                                <img src="<?php echo $item->resume_upload; ?>" alt="PDF" id="old_resume">
                                            </div>
                                            
                                            <div class="form-group mb-3 ">
                                                <label for="image">Site Title</label>
                                                <input type="text" id="update_title" 
                                                class="form-control" 
                                                placeholder="Enter Site Title"
                                                value="<?php echo $item->site_title;?>">
                                            </div>
                                            
                                            <div class="form-group mb-3 ">
                                                <label for="image">Site Logo</label>
                                                <input type="file" id="update_site_logo" class="form-control">
                                            </div>
                                            <div class="form-group mb-3 ">
                                                <img src="<?php echo base_url() . '/' . $item->site_logo; ?>"
                                                alt="Site Logo" class="img-fluid img-thumbnail" id="old_site_logo"
                                                style="max-width: 200px; height: 100px;">
                                            </div>
                                            
                                            
                                            
                                            <div class="form-group mb-3 ">
                                                <label for="Status">Status</label>
                                                <select id="update_status"  class="form-select">
                                                    
                                                        <?php if ($item->status == 1) : ?>
                                                            <option value="1" selected>Active</option>
                                                            <option value="0">inActive</option>
                                                        <?php else : ?>
                                                            <option value="0" selected>inActive</option>
                                                            <option value="1" >Active</option>
                                                        <?php endif; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <button type="button" id="updateBtnConfirm" class="btn  btn-success">Update Profile Information</button>
                                            <button type="button" onclick="history.back();" class="btn  btn-danger">Back</button>
                                            
                                        </div>
                                    </form>
                                <?php endforeach; ?>
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
    //preview image beore uploaded
    update_image.onchange = evt => {
			const [file] = update_image.files
			if (file) {
				old_image.src = URL.createObjectURL(file)
			}
    	}

    /* Profile Update Ajax call  */
	$(document).on('click', '#updateBtnConfirm', function (e) {
    e.preventDefault();

    // GET the form data
   var update_id= $('#update_id').val();
   var update_name= $('#update_name').val();
   var update_status= $('#update_status').val();

    var update_image = $("#update_image").prop('files')[0];
    var update_resume = $("#update_resume").prop('files')[0];
    var update_site_logo = $("#update_site_logo").prop('files')[0];
    var update_title = $("#update_title").val();
	var update_data=0;


    var old_image = $("#old_image").attr("src");
	var imageName = old_image.replace("<?=base_url()?>/", "");
    $("#old_image").attr("src", imageName);



    var old_resume = $("#old_resume").attr("src");
	var resumeName = old_resume.replace("<?=base_url()?>/", "");
    $("#old_resume").attr("src", resumeName);
    
    
    

     var old_Slogo = $("#old_site_logo").attr("src");
	var siteLogoName = old_Slogo.replace("<?=base_url()?>/", "");
    $("#old_site_logo").attr("src", siteLogoName);
    



    /* Validation rules */
    if (update_name.length == 0) {
        toastr.error('Name is required');
    } else {
          $('#updateBtnConfirm').html('<div class="spinner-border spinner-border-sm" role="status"><span class="visually-hidden">Loading...</span></div>')
        // Create a FormData object and append the data
        var form_data = new FormData();
        form_data.append('update_image', update_image);
        form_data.append('old_image', imageName);
        
        form_data.append('update_resume', update_resume);
        form_data.append('old_resume', old_resume);
        
        form_data.append('update_site_logo', update_site_logo);
        form_data.append('old_site_logo', siteLogoName);
        
        form_data.append('update_id', update_id);
        form_data.append('update_name', update_name);
        form_data.append('update_status', update_status);
        form_data.append('update_title', update_title);
        form_data.append('update_data', update_data);
        // AJAX call to update the student data
        $.ajax({
            type: 'POST',
            url: '<?=base_url('admin/setting/profile/add')?>', 
            data: form_data,
            dataType: 'script',
            cache: false,
            contentType: false,
            processData: false,
            success: function (response) {
                if (response == 1) {
                    $("#updateBtn").html("Update Now");
                    $("#editModal").modal('hide');
                        toastr.success('Update Successfull');
                        setTimeout(() => {
                            location.reload();
                        }, 100);
                } else {
                    toastr.error('Something went wrong: ' + response);
                }
            },
            error: function (xhr, status, error) {
                toastr.error('Error: ' + error);
            }
        });
    }
});



</script>




</body>

</html>