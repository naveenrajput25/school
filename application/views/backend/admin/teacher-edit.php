<?php 
$edit_data		=	$this->db->get_where('teacher' , array('teacher_id' => $param2, 'schoolid' => $_SESSION['schoolId']) )->result_array();
foreach ( $edit_data as $row):

?>

<div class="content">
    <div class="row">
      <div class="col-md-12">
        <!-- <div class="alert alert-success alert-dismissible fade show flash" style="display: none;">
           <strong class="success_msg"></strong>
        </div> -->
  <div class="card">
              <div class="card-header">
                  <div class="col-md-6">
                    <h5 class="card-title">Teachers Detail</h5>
					<ol class="breadcrumb card-category">
				      <li class="breadcrumb-item"><a href="#">Home</a></li>
				      <li class="breadcrumb-item active">Library</li>
			        </ol>
			      </div>
              </div>
              <div class="card-body">
              	<form action="" method="post" id="add_stdForm" class="needs-validation form-horizontal form-groups-bordered validate" enctype="multipart/form-data" autocomplete="off" novalidate>
              
                

                  <div class="row">
				  <div class="col-md-4 ">
                      <div class="form-group">
                       <div class="avatar-upload">
						<div class="avatar-edit">
							<input type="file" id="imageUpload" accept=".png, .jpg, .jpeg" name="userfile" value="<?php echo set_value('userfile'); ?>">
							<label for="imageUpload"></label>
						</div>
						<div class="avatar-preview">
							<div id="imagePreview" style="background-image: url(<?php if (($this->crud_model->get_image_url('teacher' , $row['teacher_id'])) == '') {
								echo $this->crud_model->get_image_url(); }else{ echo $this->crud_model->get_image_url('teacher' , $row['teacher_id']); } ?>);">
							</div>
						</div>
						
					</div>
                      </div>
                    </div>
                    <div class="col-md-8 ">
					<div class="row">
						
					 <div class="col-md-6 ">
                        <div class="form-group">
		                  <label><?php echo get_phrase('name');?></label>
		                  <input type="text" name="name" class="form-control" value="<?php echo $row['name']; ?>" data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>" maxlength="20" required>
		                  <div class="valid-feedback"></div>
					      <div class="invalid-feedback"></div>
		                </div>
					  </div>
					  
					   
					  	<div class="col-md-3 ">
                            <div class="form-group">
                                <label ><?php echo get_phrase('gender');?> </label>
					            <select name="gender" class="form-control" required>	
			                      <option value=""><?php echo get_phrase('select');?></option>
	                              <option value="male" <?php if($row['gender'] == 'male') echo 'selected'; ?> ><?php echo get_phrase('Male');?></option>
	                              <option value="female" <?php if($row['gender'] == 'female') echo 'selected'; ?> ><?php echo get_phrase('Female');?></option>
	                              <option value="transgender" <?php if($row['gender'] == "transgender") echo 'selected'; ?> ><?php echo get_phrase('Transgender');?></option>
	                            </select>
	                           <div class="valid-feedback"></div>
					           <div class="invalid-feedback"></div>

                            </div>
                        </div>

                        <div class="col-md-3 ">
	                        <div class="form-group">
			                  <label><?php echo get_phrase('Blood Group');?> </label>
			                  <select name="blood_group" class="form-control" >	
			                      <option value=""><?php echo get_phrase('select');?></option>
	                              <option value="O+" <?php if($row['blood_group'] == 'O+') echo 'selected'; ?> ><?php echo get_phrase('O+');?></option>
	                              <option value="O-" <?php if($row['blood_group'] == 'O-') echo 'selected'; ?> ><?php echo get_phrase('O-');?></option>
	                              <option value="A+" <?php if($row['blood_group'] == 'A+') echo 'selected'; ?> ><?php echo get_phrase('A+');?></option>
	                              <option value="A-" <?php if($row['blood_group'] == 'A-') echo 'selected'; ?> ><?php echo get_phrase('A-');?></option>
	                              <option value="B+" <?php if($row['blood_group'] == 'B+') echo 'selected'; ?> ><?php echo get_phrase('B+');?></option>
	                              <option value="B-" <?php if($row['blood_group'] == 'B-') echo 'selected'; ?> ><?php echo get_phrase('B-');?></option>
	                              <option value="AB+" <?php if($row['blood_group'] == 'AB+') echo 'selected'; ?> ><?php echo get_phrase('AB+');?></option>
	                              <option value="AB-" <?php if($row['blood_group'] == 'AB-') echo 'selected'; ?> ><?php echo get_phrase('AB-');?></option>
	                              
	                            </select>
			                
			                </div>
	                    </div>

                    	<div class="col-md-6 ">
	                        <div class="form-group">
			                  <label><?php echo get_phrase('birthday');?> </label>
			                  <input type="text" class="form-control date_of_birth" name="dob" value="<?php echo $row['birthday']; ?>" required>
			                  <div class="valid-feedback"></div>
					          <div class="invalid-feedback"></div>
			                </div>
	                    </div>

	                    <div class="col-md-6 ">
	                      <div class="form-group">
			                  <label><?php echo get_phrase('Mobile Number');?> </label>
			                  <input type="tel" class="form-control" maxlength="20" name="phone" value="<?php echo $row['phone']; ?>"  onkeypress="javascript:return isNumber(event)" required>
			                  <div class="valid-feedback"></div>
					          <div class="invalid-feedback"></div>
			               
			              </div>
	                    </div>
	                    
					    <div class="col-md-6 ">
                     		<div class="form-group">
			                  <label><?php echo get_phrase('email');?> </label>
			                  <input type="email" class="form-control" name="email" value="<?php echo $row['email']; ?>"  >
			                
			                </div>
                        </div>
                        <div class="col-md-6 ">
                     		<div class="form-group">
			                  <label><?php echo get_phrase('password');?> </label>
			                  <input type="password" class="form-control" name="password" value="<?php echo $row['password']; ?>"  >
			            
			                </div>
                        </div>
					
				
					  </div>
                    </div>
                    
                    
                  </div>
                 
                  <div class="row">
                  	  <div class="col-md-6 ">
                        <div class="form-group">
		                  <label><?php echo get_phrase('Father_name');?></label>
		                  <input type="text" name="f_name" class="form-control" value="<?php echo $row['Father']; ?>" maxlength="20" >
		                
		                </div>
					  </div>
					   <div class="col-md-6 ">
                        <div class="form-group">
		                  <label><?php echo get_phrase('Mother_name');?></label>
		                  <input type="text" name="m_name" class="form-control" value="<?php echo $row['Mother'] ; ?>"  maxlength="20" >
		                  
		                </div>
					  </div>
					 
                  </div>
                  <div class="row">
                  	<div class="col-md-8">
                      <div class="form-group">
		                  <label ><?php echo get_phrase('address');?></label>
		                  <input type="text" class="form-control" maxlength="56" name="address" value="<?php echo $row['address']; ?>"  required>
		                  <div class="valid-feedback"></div>
					      <div class="invalid-feedback"></div>
		              </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label><?php echo get_phrase('City');?></label>
                        <input type="text" class="form-control" name="city" value="<?php echo $row['City']; ?>">
                      </div>
                    </div>
                    <div class="col-md-3 ">
                      <div class="form-group">
                        <label><?php echo get_phrase('State');?></label>
                        <input type="text" class="form-control" name="state" value="<?php echo $row['State']; ?>">
                      </div>
                    </div> 


			        <div class="col-md-5">
			          <div class="form-group">
			         	<label>dddd</label>
			            <div class="custom-file mb-3">
			            <input type="file" class="custom-file-input" id="customFile" name="attachfile" value="">
			            <label class="custom-file-label" for="customFile">Choose file</label>
			          </div>  
			        </div>
			      </div>


                   
                   
                </div>
                 
                <div class="mr-3 mb-3 pull-right">
										
                  <button type="submit" class="btn btn-primary btn-round submit"> <?php echo get_phrase('submit');?></button>
                
                </div>
                </form>
              </div> <!--  card-body  --->
            </div> <!--  card  --->
	  

              

      </div>  <!-- col-md-12 -->
    </div>  <!-- row -->
       
</div>  <!-- content -->


<?php

endforeach;
?>


<!-- Modal  -->
<div class="modal fade" id="form-successful" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
   
   <div class="modal-header border-0">
				  <h4 class="modal-title" style="text-align:center;">Thank You!<br>
				  <span class="small">Your form has been successfully submitted</span>
				  </h4>
				  <p class="modal-title" style="text-align:center;"></p>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                  
                </div>
                <div class="modal-footer border-0" style="margin:0px; border-top:0px; text-align:center;">
                   <button type="button" class="btn btn-outline-primary btn-round okbtn" data-dismiss="modal">Ok</button>
					
                </div>
    </div>
  </div>
</div>



<script type="text/javascript">


     
$("#add_stdForm").submit(function(e) {
    e.preventDefault();    
    var formData = new FormData(this);
     
    $.ajax({
        url: '<?php echo base_url('admin/teachers');?>',
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function (data) {
          if (data != 'Error') {
          	    $("#form-successful").modal("toggle");
          	    // setTimeout(function() {$('#form-successful').modal('hide');}, 11000);
          	    $('.okbtn').click(function() {
          	    	location.reload();
          	    })
          	   
        		
        	}
        },
        
    });
});
</script>

