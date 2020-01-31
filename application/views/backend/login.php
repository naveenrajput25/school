<!DOCTYPE html>
<html lang="en">
   <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      
    
   </head>
   <body class="bg-gradient-primary">
      <div class="container">
         <!-- Outer Row -->
         <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-6 col-md-6">
               <div class="fadeIn first m-t-50 m-b-30 text-center">
                  <img src="<?php echo base_url() ?>assets/img/logo-color.png" width="200" class="" alt="Greetlog">
               </div>
               <div class="card o-hidden border-0 shadow-lg m-t-10 m-b-10">
                  <div class="card-body p-0">
                     <!-- Nested Row within Card Body -->
                     <div class="row">
                        <!----<div class="col-lg-6 d-none d-lg-block bg-login-image"></div>-->
                        <div class="col-lg-12">
                           <div class="p-4">
                              <div class="text-center">
                                 <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                              </div>

                              <?php if ( $this->session->flashdata('msg')){ ?>
                                 <div class="alert alert-danger alert-dismissible fade show" id="flash">
                                   <strong></strong><?php echo $this->session->flashdata('msg');?></strong>
                                 </div>
                              <?php }elseif ($this->session->flashdata('success_msg')) { ?>
                                 <div class="alert alert-success alert-dismissible fade show" id="flash">
                                   <strong><?php echo $this->session->flashdata('success_msg');?></strong>
                                 </div>
                             <?php }elseif ($this->session->flashdata('succ_msg')) { ?>
                                 <div class="alert alert-success alert-dismissible fade show" id="flash">
                                   <strong><?php echo $this->session->flashdata('succ_msg');?></strong>
                                 </div>
                              <?php }elseif ($this->session->flashdata('succ_registration')) { ?>
                                 
                              <?php } ?>
                              <?php //$mail=base64_decode($_GET['mail']); ?>
                              <form class="card-body" novalidate="" action="<?php echo base_url('checklogin');?>" method="post" id="myForm" autocomplete="off">
                                <!-- <div class="form-group ">
                                    <span class="has-float-label">
                                  <input class="form-control" id="first" type="text" placeholder="Name"/>
                                  <label for="first">First</label>
                                </span>
                                    
                                 </div>-->
                                 <div class="form-group">
                                      <label class="has-float-label">
                                   
                                    <input id="email" class="form-control" name="email" type="email" value="<?php if(!empty($mail)){echo $mail;}elseif(isset($email)){echo $email;}else{echo set_value('email');} ?>" required>
                                     <span class="" for="email">Email <strong class="text-danger">*</strong></span>
                                 
                                      </label>
                                 </div>
                                 <div class="form-group">
                                      <label class="has-float-label">
                                  
                                    <input id="password" class="form-control" name="password" type="password"  required>
                                      <span class="" for="password">Password <strong class="text-danger">*</strong></span>
                                     
                                   
                                 
                                    </label>
                                        <p toggle="#password" class="fa fa-fw fa-eye-slash field-icon toggle-password"></p>
                                           <p class="text-xs"><span class="text-danger">*</span> Password must be 8-20 characters long. </p>
                                 </div>
                                 <div class="col-sm-12   text-right">
                                    <a class="small text-basic" href="<?php echo base_url('verify_email') ?>">Forgot Password?</a>
                                 </div>
                                 <button  type="submit" class="btn btn-green btn-user  btn-block m-t-25">
                                 Log in
                                 </button>
                              </form>
                              <hr>
                              <div class="text-center">
                                 <a class=" text-basic" href="<?php echo base_url('register') ?>">Create an Account!</a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
     <script type="text/javascript">
      $("#myForm").submit(function(event){
          event.preventDefault(); //prevent default action 
          var post_url = $(this).attr("action"); //get form action url
          var request_method = $(this).attr("method"); //get form GET/POST method
        var form_data = new FormData(this); //Creates new FormData object
          $.ajax({
              url : post_url,
              type: request_method,
              data : form_data,
              dataType: 'json',
              processData: false,
              contentType: false,
           
            success: function(response)
            {
              // Login status [success|invalid]
              var login_status = response.login_status;
                
              if(login_status == 'success')
                {
                  // Redirect to login page
                  setTimeout(function()
                  {
                    var redirect_url = baseurl;
                    
                    if(response.redirect_url && response.redirect_url.length)
                    {  
                      redirect_url = response.redirect_url;
                    }
                    alert(response.redirect_url);
                    window.location.href = redirect_url;
                  }, 400);
                }
            }
          })
      });
    </script>
<!--Jquery Validation-->
    
   </body>
</html>
