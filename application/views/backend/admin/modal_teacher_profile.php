<?php
$teacher_info	=	$this->crud_model->get_teacher_info($param2);
foreach($teacher_info as $row): ?>

 
<div class="profile-env">
  <section class="profile-info-tabs">
    <div class="row">
      <div class="col-md-12">
        <form action="" method="post" id="add_stdForm" class="needs-validation form-horizontal form-groups-bordered validate" enctype="multipart/form-data" autocomplete="off" novalidate>
          <div class="row">
            <div class="col-md-4 text-center "> <a href="#" class=""> <img src="<?php echo $this->crud_model->get_image_url('teacher' , $row['teacher_id']);?>" 
                	class="img-responsive img-circle" /> </a> </div>
            <div class="col-md-8 ">
              <?php if($row['name'] != ''):?>
                <div class="col-md-12 ">
                    <div class="form-group">
                      <label>Name</label>
                      <input type="text" class="form-control" value="<?php echo $row['name'];?>"  disabled>
                    </div>
                </div>
                <?php endif;?>

                <?php if($row['email'] != ''):?>
                 <div class="col-md-12 ">
                      <div class="form-group">
                        <label>Email </label>
                        <input type="email" class="form-control"  value="<?php echo $row['email'];?>" disabled>
                      </div>
                    </div>
                <?php endif;?>
            </div>
          </div>
          <div class="row">

		        
           
				 <?php if($row['gender'] != ''):?>
                <div class="col-md-6 ">
                  <div class="form-group">
                    <label>Gender </label>
				   <input type="text" class="form-control "  value="<?php echo $row['gender'];?>" disabled>
                  </div>
                </div>
				    <?php endif;?>

               
		      <?php if($row['birthday'] != ''):?>
		   <div class="col-md-6 ">
                  <div class="form-group">
                    <label>Date of Birth </label>
                    <input type="text" class="form-control "  value="<?php echo $row['birthday'];?>" disabled>
                  </div>
                </div>
				    <?php endif;?>
              
			 <?php if($row['blood_group'] != ''):?>
		    <div class="col-md-6 ">
                  <div class="form-group">
                    <label>Blood Group </label>
                           <input type="text" class="form-control"  value="<?php echo $row['blood_group'];?>" disabled>
                  </div>
                </div>
				    <?php endif;?>

            
		   
               
		     <?php if($row['phone'] != ''):?>
		   <div class="col-md-6 ">
                  <div class="form-group">
                    <label>Mobile Number</label>
                    <input type="text" class="form-control" value="<?php echo $row['phone'];?>" disabled>
                  </div>
                </div>
				    <?php endif;?>

            
		  
			  <?php if($row['Father'] != ''):?>
            <div class="col-md-6 ">
              <div class="form-group">
                <label>Father Name</label>
                <input type="text"  class="form-control" value="<?php echo $row['Father'];?>" disabled>
              </div>
            </div>
			    <?php endif;?>

			   <?php if($row['Mother'] != ''):?>
            <div class="col-md-6 ">
              <div class="form-group">
                <label>Mother Name</label>
                <input type="text"  class="form-control" value="<?php echo $row['Mother'];?>" disabled>
              </div>
            </div>
			    <?php endif;?>


            <div class="col-md-12">
			  <?php if($row['address'] != ''):?>
              <div class="form-group">
                <label>Address</label>
                <input type="text" class="form-control"   value="<?php echo $row['address'];?>" disabled>
              </div>
			    <?php endif;?>
            </div>
          </div>


          <div class="row">

		       

			      <?php if($row['State'] != ''):?>
			 <div class="col-md-6 ">
              <div class="form-group">
                <label>State</label>
                <input type="text" class="form-control"  value="<?php echo $row['State'];?>" disabled>
              </div>
            </div>
			    <?php endif;?>
           
			   <?php if($row['City'] != ''):?>
            <div class="col-md-6">
              <div class="form-group">
                <label>City</label>
                <input type="text" class="form-control"  value="<?php echo $row['City'];?>" disabled>
              </div>
            </div>
			    <?php endif;?>
           
			
          </div>
        </form>
       
      </div>
    </div>
  </section>
</div>
<?php endforeach;?>
