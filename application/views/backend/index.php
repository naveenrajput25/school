<?php


	$system_name        =	$this->db->get_where('settings')->row()->schoolname;
	$system_title       =	$this->db->get_where('settings')->row()->schoolname;
	$text_align         =	$this->db->get_where('settings')->row()->text_align;
	$account_type       = $this->session->userdata('login_type');
	$skin_colour        =   $this->db->get_where('settings')->row()->skin_colour;
	/*$active_sms_service =   $this->db->get_where('settings' , array('type'=>'active_sms_service'))->row()->description;*/
	?>
<title><?php echo $page_title;?> | <?php echo $system_title;?></title>
    
	
	

	<?php include 'includes_top.php';?>
	
</head> 
 <body class=" <?php if ($skin_colour != '') echo 'skin-' . $skin_colour;?>" > 
	<div class=" <?php if ($text_align == 'right-to-left') echo 'right-sidebar';?>" >
		<?php include $account_type.'/navigation.php';?>	
		<div class="main-content">
		
		<?php //include 'sidebar.php';?>
			<?php include 'header.php';?>

           <!-- <h3 class="" style="">
           	<i class="entypo-right-circled"></i> 
				<?php //echo $page_title;?>
           </h3> -->

			<?php include $account_type.'/'.$page_name.'.php';?>
    
			<?php include 'footer.php';?>
 
		</div>


		
        	
	</div>
    <?php include 'modal.php';?>
    <?php include 'includes_bottom.php';?>
		
 <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Modal</h4>
      </div>
      <div class="modal-body">
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

</body>
</html> 