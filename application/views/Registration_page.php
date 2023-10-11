<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Registration Page</title>
<link href="<?php echo base_url('assets/Registration_Page/bootstrap.min.css');?>" rel="stylesheet" id="bootstrap-css">
<link href="<?=base_url('assets/css/toastr.min.css')?>"  rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    .register{
    background: -webkit-linear-gradient(left, #3931af, #00c6ff);
    margin-top: 3%;
    padding: 3%;
}
.register-left{
    text-align: center;
    color: #fff;
    margin-top: 4%;
}
.register-left input{
    border: none;
    border-radius: 1.5rem;
    padding: 2%;
    width: 60%;
    background: #f8f9fa;
    font-weight: bold;
    color: #383d41;
    margin-top: 30%;
    margin-bottom: 3%;
    cursor: pointer;
}
.register-right{
    background: #f8f9fa;
    border-top-left-radius: 10% 50%;
    border-bottom-left-radius: 10% 50%;
}
.register-left img{
    margin-top: 15%;
    margin-bottom: 5%;
    width: 25%;
    -webkit-animation: mover 2s infinite  alternate;
    animation: mover 1s infinite  alternate;
}
@-webkit-keyframes mover {
    0% { transform: translateY(0); }
    100% { transform: translateY(-20px); }
}
@keyframes mover {
    0% { transform: translateY(0); }
    100% { transform: translateY(-20px); }
}
.register-left p{
    font-weight: lighter;
    padding: 12%;
    margin-top: -9%;
}
.register .register-form{
    padding: 10%;
    margin-top: 10%;
}
.btnRegister{
    float: right;
    margin-top: 10%;
    border: none;
    border-radius: 1.5rem;
    padding: 2%;
    background: #0062cc;
    color: #fff;
    font-weight: 600;
    width: 50%;
    cursor: pointer;
}
.register .nav-tabs{
    margin-top: 3%;
    border: none;
    background: #0062cc;
    border-radius: 1.5rem;
    width: 28%;
    float: right;
}
.register .nav-tabs .nav-link{
    padding: 2%;
    height: 34px;
    font-weight: 600;
    color: #fff;
    border-top-right-radius: 1.5rem;
    border-bottom-right-radius: 1.5rem;
}
.register .nav-tabs .nav-link:hover{
    border: none;
}
.register .nav-tabs .nav-link.active{
    width: 100px;
    color: #0062cc;
    border: 2px solid #0062cc;
    border-top-left-radius: 1.5rem;
    border-bottom-left-radius: 1.5rem;
}
.register-heading{
    text-align: center;
    margin-top: 8%;
    margin-bottom: -15%;
    color: #495057;
}
</style>


</head>
<body>


<div class="container register">
    <div class="row">
                    <div class="col-md-3 register-left">
                       
                        <h3>Welcome</h3>
                        <p>You are 30 seconds away from earning your own money!</p>
                    </div>
                    <div class="col-md-9 register-right">
                        
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <h3 class="register-heading">Apply as a User</h3>
                                <div class="row register-form">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="first_name" placeholder="First Name *" value="" />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="last_name" placeholder="Last Name *" value="" />
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" id="password" placeholder="Password *" value="" />
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" id="confirm_password"  placeholder="Confirm Password *" value="" />
                                        </div>
                                        

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="email" class="form-control" id="email" placeholder="Your Email *" value="" />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="username" placeholder="Your Username *" value="" />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" id="phone" class="form-control" placeholder="Your Phone *" value="" />
                                        </div>
                                        <div class="form-group">
                                            <select type="text" class="form-control" id="gender">
                                                <option >----Select Gender ----</option>
                                                <option value="1">Male</option>
                                                <option value="0">Female</option>
                                            </select>
                                        </div>
                                        
                                        <button type="submit" id="btnRegister" class="btn btn-success">Register</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

</div>

<script src="<?php echo base_url('assets/Registration_Page/bootstrap.min.js');?>"></script>
<script src="<?php echo base_url('assets/Registration_Page/jquery-3.7.1.min.js');?>"></script>
<script type="text/javascript" src="<?=base_url('assets/js/toastr.min.js')?>"></script>
<script>
    $(document).ready(function(){
        $(document).on('click','#btnRegister',function(e){
            e.preventDefault();
             var first_name=$("#first_name").val();
              var last_name=$("#last_name").val();
              var password=$("#password").val();
              var confirm_password=$("#confirm_password").val();
              var username=$("#username").val();
              var email=$("#email").val();
              var phone=$("#phone").val();
              var gender=$("#gender").val();
              var add_data=0;

              if (first_name.length==0) {
                toastr.error("First Name is required");
              } else if(last_name.length==0){
                 toastr.error("Last is required");
              }else if(password.length==0){
                 toastr.error("Password is required");
              }else if(confirm_password.length==0){
                 toastr.error("Confirm Password is required");
              }else if(password!==confirm_password){
                 toastr.error("Password do not match");
              }else if(gender.length==0){
                 toastr.error("Gender is required");
              }else if(email.length==0){
                 toastr.error("Email is required");
              }else if(username.length==0){
                 toastr.error("Username is required");
              }else if(phone.length==0){
                 toastr.error("Phone Number is required");
              }
              
              
              else{
            $('#btnRegister').html(`<i class="fa fa-refresh fa-spin"></i>&nbsp; Loading`);
            $('#btnRegister').prop('disabled', true);
              var form_data = new FormData();
              form_data.append('first_name', first_name);
              form_data.append('last_name', last_name);
              form_data.append('password', password);
              form_data.append('username', username);
              form_data.append('email', email);
              form_data.append('phone', phone);
              form_data.append('gender', gender);
              form_data.append('add_data', add_data);
              /*Ajax calll Request Start */
                $.ajax({
                  type: 'POST',
                  url:'<?=base_url('register/user')?>',
                  data: form_data,
                  dataType: 'script',
                  cache: false,
                  contentType: false,
                  processData: false,
                  success: function(response) {
                    if (response==1) {
                      toastr.success("Successfully Add ");
                      toastr.success("You Will Get Confirmation Mail From Admin ");
                       setTimeout(()=>{
                           location.reload();
                       },100);
                     
                    }else if(response==0){
                        toastr.error("Username Already Taken!!!");
                        $('#btnRegister').prop('disabled', false);
                        $('#btnRegister').html('Register');
                    }
                    else{ 
                      toastr.error("Please Try Again");
                      $('#btnRegister').prop('disabled', false);
                      $('#btnRegister').html('Register');
                    }
                  }
                });
              /*Ajax calll Request End */
            }
        });
    });
</script>
</body>
</html>
