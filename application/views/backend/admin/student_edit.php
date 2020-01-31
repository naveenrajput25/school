<?php 
$edit_data		=	$this->db->get_where('student' , array('student_id' => $param2) )->result_array();
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
                       <h5 class="card-title">Student Detail</h5>
					   <ol class="breadcrumb card-category">
				<li class="breadcrumb-item"><a href="#">Home</a></li>
				<li class="breadcrumb-item active">Library</li>
			    </ol>
			</div>
              </div>
              <div class="card-body">
              	<form action="" method="post" id="add_stdForm" class="form-horizontal form-groups-bordered validate" enctype="multipart/form-data" autocomplete="off">
                

                  <div class="row">
				  <div class="col-md-4 ">
                    <div class="form-group">
                       <div class="avatar-upload">
						<div class="avatar-edit">
							<input type="file" id="imageUpload" accept=".png, .jpg, .jpeg" name="userfile" value="<?php echo set_value('userfile'); ?>">
							<label for="imageUpload"></label>
						</div>
						<div class="avatar-preview">
							<div id="imagePreview" style="background-image: url(<?php echo $this->crud_model->get_image_url('student' , $row['student_id']);?>);">
							</div>
						</div>
						<div class="image_err error"><?php echo form_error('userfile');   ?></div>
					  </div>
                    </div>
                  </div>
                    <div class="col-md-8 ">
					<div class="row">
						<div class="col-md-6 ">
	                        <div class="form-group">
			                  <label><?php echo get_phrase('Registered Number');?></label>
			                  <input type="text" name="regist_no" class="form-control"  value="<?php echo $row['registered_no'];?>" maxlength="20" >
			                  <div class="error"><?php  echo form_error('regist_no'); ?></div>
			                </div>
					    </div>

						 <div class="col-md-6 ">
                        <div class="form-group">
		                  <label><?php echo get_phrase('Date_of_joining');?></label>
		                  <input type="text" name="joinDate" class="form-control datepicker" maxlength="20"   value="<?php echo $row['joinDate'];?>">
		                  <div class="error"><?php  echo form_error('joinDate'); ?></div>
		                </div>
					  </div>

					 <div class="col-md-6 ">
                        <div class="form-group">
		                  <label><?php echo get_phrase('Student_name');?></label>
		                  <input type="text" name="name" class="form-control"  value="<?php echo $row['name'];?>">
		                  <div class="error"><?php  echo form_error('name'); ?></div>
		                </div>
					  </div>
					  <!--  <div class="col-md-6 ">
	                      <div class="form-group">
	                        <label><?php //echo get_phrase('roll');?></label>
	                        
		                    <input type="text" class="form-control" maxlength="20" placeholder="" name="roll" required>
		                    <div class="error"><?php  //echo form_error('roll'); ?></div>
	                      </div>
						</div> -->
					    <div class="col-md-3 ">
                            <div class="form-group">
			                    <label ><?php echo get_phrase('class');?> </label>
			                    <select name="class_id" class="form-control" id="class_id"
									onchange="return get_class_sections(this.value)" required>
	                              <option value=""><?php echo get_phrase('select');?></option>
	                              <?php 
									$classes = $this->db->get('class')->result_array();
									foreach($classes as $row2):
										?>
                                		<option value="<?php echo $row2['class_id'];?>"
                                        	<?php if($row['class_id'] == $row2['class_id'])echo 'selected';?>>
													<?php echo $row2['name'];?>
                                                </option>
	                                <?php
									endforeach;
								  ?>
	                            </select>
	                            <div class="error"><?php  echo form_error('class_id'); ?></div>
			                </div>
					    </div>
					    <div class="col-md-3 ">
                            <div class="form-group">
			                    <label ><?php echo get_phrase('section');?> </label>
			                    <select name="section_id" class="form-control" id="section_selector_holder" required> 
		                            <option value=""><?php echo get_phrase('select');?></option>
		                          
			                        
			                    </select>
			                    <div class="error"><?php  echo form_error('section_id'); ?></div>
			                </div>
					    </div>
					  	<div class="col-md-4 ">
                            <div class="form-group">
                                <label ><?php echo get_phrase('gender');?> </label>
					            <select name="gender" class="form-control" required>	
			                      <option value=""><?php echo get_phrase('select');?></option>
	                              <option value="male" <?php if($row['sex'] == 'male')echo 'selected';?>><?php echo get_phrase('male');?></option>
				                  <option value="female"<?php if($row['sex'] == 'female')echo 'selected';?>><?php echo get_phrase('female');?></option>
	                              <option value="transgender" <?php if($row['sex'] == 'transgender')echo 'selected';?>><?php echo get_phrase('Transgender');?></option>
	                            </select>
	                            <div class="error"><?php  echo form_error('gender'); ?></div>

                            </div>
                        </div>
                    	<div class="col-md-4 ">
	                        <div class="form-group">
			                  <label><?php echo get_phrase('birthday');?> </label>
			                  <input type="text" class="form-control date_of_birth" name="dob" value="<?php echo $row['birthday'];?>" required>
			                  <div class="error"><?php  echo form_error('dob'); ?></div>
			                </div>
	                    </div>
	                    <div class="col-md-4 ">
	                        <div class="form-group">
			                  <label><?php echo get_phrase('Blood Group');?> </label>
			                  <select name="blood_grp" class="form-control" required>	
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
			                  <div class="error"><?php  echo form_error('blood_grp'); ?></div>
			                </div>
	                    </div>
					    <div class="col-md-6 ">
                     		<div class="form-group">
			                  <label><?php echo get_phrase('email');?> </label>
			                  <input type="email" class="form-control" name="email" value="<?php echo $row['email']; ?>"  required>
			                  <div class="error"><?php  echo form_error('email'); ?></div>
			                </div>
                        </div>
					<div class="col-md-6 ">
                      <div class="form-group">
		                  <label><?php echo get_phrase('phone');?> </label>
		                  <input type="text" class="form-control" maxlength="20" name="phone" value="<?php echo $row['phone']; ?>"  onkeypress="javascript:return isNumber(event)" required>
		                  <div class="error"><?php  echo form_error('phone'); ?></div>
		              </div>
                    </div>
				
					  </div>
                    </div>
                    
                    
                  </div>
                 
                  <div class="row">
                  	  <div class="col-md-4 ">
                        <div class="form-group">
		                  <label><?php echo get_phrase('Father_name');?></label>
		                  <input type="text" name="f_name" class="form-control" value="<?php echo $row['father_name']; ?>" maxlength="20" required>
		                  <div class="error"><?php  echo form_error('f_name'); ?></div>
		                </div>
					  </div>
					   <div class="col-md-4 ">
                        <div class="form-group">
		                  <label><?php echo get_phrase('Mother_name');?></label>
		                  <input type="text" name="m_name" class="form-control" value="<?php echo $row['mother_name']; ?>"  maxlength="20" required>
		                  <div class="error"><?php  echo form_error('m_name'); ?></div>
		                </div>
					  </div>
					   <div class="col-md-4">
                        <div class="form-group">
		                  <label><?php echo get_phrase('Guardian_name');?></label>
		                  <input type="text" name="g_name" class="form-control" value="<?php echo $row['guardian_name']; ?>" maxlength="20"   required>
		                  <div class="error"><?php  echo form_error('g_name'); ?></div>
		                </div>
					  </div>
					  	   <div class="col-md-4">
                        <div class="form-group">
		                  <label><?php echo get_phrase('Father_occupation');?></label>
		                  <input type="text" name="occupation" class="form-control" value="<?php echo $row['occupation']; ?>" maxlength="20"   required>
		                  <div class="error"><?php  echo form_error('occupation'); ?></div>
		                </div>
					  </div>
                    <div class="col-md-8">
                      <div class="form-group">
		                  <label ><?php echo get_phrase('address');?></label>
		                  <input type="text" class="form-control" maxlength="56" name="address" value="<?php echo $row['address'];?>"  required>
		                  <div class="error"><?php  echo form_error('address'); ?></div>
		              </div>
                    </div>
                 
                  </div>
                  <div class="row">
                       <div class="col-md-3">
                      <div class="form-group">
                        <label><?php echo get_phrase('City');?></label>
                        <input type="text" class="form-control" name="city" value="<?php echo $row['city']; ?>" required>
                      </div>
                    </div>
                    <div class="col-md-3 ">
                      <div class="form-group">
                        <label><?php echo get_phrase('State');?></label>
                        <input type="text" class="form-control" name="state" value="<?php echo $row['state']; ?>" required>
                      </div>
                    </div>
                    <div class="col-md-3 ">
                      <div class="form-group">
                        <label><?php echo get_phrase('Country');?></label>
                        <input type="text" class="form-control" name="country" value="<?php echo $row['country']; ?>" required>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label><?php echo get_phrase('Postal Code');?></label>
                        <input type="number" class="form-control" name="postal_code" value="<?php echo $row['postal_code']; ?>" required>
                      </div>
                    </div>
                   
                  </div>
                 
                  <div class="mr-3 mb-3 pull-right">
										
                  <button type="submit" class="btn btn-primary btn-round submit"> <?php echo get_phrase('submit');?></button>
                
                  </div>
                </form>
              </div> <!--  card-body  --->
            </div> <!--  card  --->
	  

        
				                

					              <!-- <div class="col-md-12 ">
					                <div class="form-group">
					                  <label for="exampleInputEmail1"><?php //echo get_phrase('password');?> </label>
					                  <input type="password" class="form-control" placeholder="" minlength="6" maxlength="8" name="password" value=""  required>
					                  <div class="error"><?php  //echo form_error('password'); ?></div>
					                </div>
					              </div> -->

              

      </div>  <!-- col-md-12 -->
    </div>  <!-- row -->
       
</div>  <!-- content -->



<?php
endforeach;
?>


<script type="text/javascript">
	// for add student select section 
    function get_class_sections(class_id) {
      $.ajax({
             url: '<?php echo base_url();?>admin/get_class_section/' + class_id ,
            //url: url ,
            success: function(response)
            {  
              
                jQuery('#section_selector_holder').html(response);
            }
        });

    }

    var class_id = $("#class_id").val();
    	$.ajax({
            url: '<?php echo base_url();?>admin/get_class_section/' + class_id ,
            success: function(response)
            {
                jQuery('#section_selector_holder').html(response);
            }
        });

// for contact number  
     function isNumber(evt) {
        var iKeyCode = (evt.which) ? evt.which : evt.keyCode
        if (iKeyCode != 46 && iKeyCode > 31 && (iKeyCode < 48 || iKeyCode > 57))
            return false;

        return true;
    }   
     
$("#add_stdForm").submit(function(e) {
    e.preventDefault();    
    var formData = new FormData(this);

    $.ajax({
        url: '<?php echo base_url();?>/admin/student/<?php echo $row['class_id'] ?> /doUpdate/<?php echo $row['student_id']?>',
        type: 'POST',
        data: formData,
        success: function (data) {
          location.href = "<?php echo base_url() ?>/admin/student_information";
        },
        cache: false,
        contentType: false,
        processData: false
    });
});
</script>

