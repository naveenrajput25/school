
  <div class="wrapper ">
    <div class="sidebar" data-color="white" data-active-color="danger">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      <div class="logo">
        <a href="" class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="<?php echo base_url();?>assets/img/logo.png">
          </div>
        </a>
        <a href="" class="simple-text logo-normal">
         School bird Lite
          <!-- <div class="logo-image-big">
            <img src="img/logo-big.png">
          </div> -->
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="active ">
            <a href="">
              <i class="nc-icon nc-bank"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <!-- STUDENT -->
            <li class="<?php if ($page_name == 'student_information') echo 'active'; ?> ">
                <a href="<?php echo base_url(); ?><?php echo $account_type; ?>/student_information">
                    <i class="nc-icon nc-diamond"></i>
                    <span><?php echo get_phrase('Student'); ?></span>
                </a>
            </li>

            <!-- Teacher -->
            <li class="<?php if ($page_name == 'Teacher') echo 'active'; ?> ">
                <a href="<?php echo base_url(); ?><?php echo $account_type; ?>/Teacher">
                    <i class="nc-icon nc-diamond"></i>
                    <span><?php echo get_phrase('Teacher'); ?></span>
                </a>
            </li>

             <!-- Classes -->
            <li class="<?php if ($page_name == 'Classes') echo 'active'; ?> ">
                <a href="<?php echo base_url(); ?><?php echo $account_type; ?>/Classes">
                    <i class="nc-icon nc-pin-3"></i>
                    <span><?php echo get_phrase('Classes'); ?></span>
                </a>
            </li>
            <!-- Subject -->
            <li class="<?php if ($page_name == 'Classes') echo 'active'; ?> ">
                <a href="<?php echo base_url(); ?><?php echo $account_type; ?>/Subject">
                    <i class="nc-icon nc-bell-55"></i>
                    <span><?php echo get_phrase('Subject'); ?></span>
                </a>
            </li>

             <!-- Timetable -->
            <li class="<?php if ($page_name == 'Timetable') echo 'active'; ?> ">
                <a href="<?php echo base_url(); ?><?php echo $account_type; ?>/Timetable">
                    <i class="nc-icon nc-single-02"></i>
                    <span><?php echo get_phrase('Timetable'); ?></span>
                </a>
            </li> 

            <!-- Examination -->
            <li class="<?php if ($page_name == 'Examination') echo 'active'; ?> ">
                <a href="<?php echo base_url(); ?><?php echo $account_type; ?>/Examination">
                    <i class="nc-icon nc-tile-56"></i>
                    <span><?php echo get_phrase('Examination'); ?></span>
                </a>
            </li>

            <!-- Fees -->
            <li class="<?php if ($page_name == 'Fees') echo 'active'; ?> ">
                <a href="<?php echo base_url(); ?><?php echo $account_type; ?>/Fees">
                    <i class="nc-icon nc-caps-small"></i>
                    <span><?php echo get_phrase('Fees'); ?></span>
                </a>
            </li>

            <!-- Message /Circular -->
            <li class="<?php if ($page_name == 'Message') echo 'active'; ?> ">
                <a href="<?php echo base_url(); ?><?php echo $account_type; ?>/Message">
                    <i class="nc-icon nc-caps-small"></i>
                    <span><?php echo get_phrase('Message /Circular'); ?></span>
                </a>
            </li>

            <!-- Event Gallery -->
            <li class="<?php if ($page_name == 'Gallery') echo 'active'; ?> ">
                <a href="<?php echo base_url(); ?><?php echo $account_type; ?>/Gallery">
                    <i class="nc-icon nc-caps-small"></i>
                    <span><?php echo get_phrase('Gallery'); ?></span>
                </a>
            </li>
        <li class="<?php if ($page_name == 'system_settings') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>admin/system_settings">
                        <span><i class="nc-icon gear"></i> <?php echo get_phrase('general_settings'); ?></span>
                    </a>
                </li>
        
        </ul>
      </div>
    </div>
    
     