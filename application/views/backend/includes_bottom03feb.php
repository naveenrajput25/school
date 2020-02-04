<!--   Core JS Files   -->
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
  <script src="<?php echo base_url();?>assets/js/core/popper.min.js"></script>
  <script src="<?php echo base_url();?>assets/js/core/bootstrap.min.js"></script>
  <script src="<?php echo base_url();?>assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
 <script src="<?php echo base_url();?>assets/js/schoolbird-lite.js?v=2.0.0" type="text/javascript"></script>
  <!--   datepicker JS Files   -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
   <!--   datatable JS Files   -->
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
 <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js"></script>
  <!-- Chart JS -->
  <script src="<?php echo base_url();?>assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="<?php echo base_url();?>assets/js/plugins/bootstrap-notify.js"></script>
   <script src="<?php echo base_url();?>assets/js/custom.js"></script>

   <!-- Js for validation -->
<!--    <script src="<?php //echo base_url();?>assets/js/jquery.validate.min.js"></script> -->
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
 
  


<!-- new js included -->

  <script src="<?php echo site_url('assets/js1/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js'); ?>"></script>
  <script src="<?php echo site_url('assets/js1/toastr.js'); ?>"></script>
  
    
    <script src="<?php echo site_url('assets/js1/fileinput.js'); ?>"></script>
    
    <script src="<?php echo site_url('assets/js1/jquery.dataTables.min.js'); ?>"></script>
  <script src="<?php echo site_url('assets/js1/datatables/TableTools.min.js'); ?>"></script>
  <script src="<?php echo site_url('assets/js1/datatables/jquery.dataTables.columnFilter.js'); ?>"></script>
  <script src="<?php echo site_url('assets/js1/datatables/lodash.min.js'); ?>"></script>
  
  
  <script src="<?php echo site_url('assets/js1/neon-chat.js'); ?>"></script>
 


<!-- SHOW TOASTR NOTIFIVATION -->
<?php if ($this->session->flashdata('flash_message') != ""):?>

<script type="text/javascript">
  toastr.success('<?php echo $this->session->flashdata("flash_message");?>');
</script>

<?php endif;?>


<!-----  DATA TABLE EXPORT CONFIGURAT   IONS ----->                      
<script type="text/javascript">

  jQuery(document).ready(function($)
  {
    

    var datatable = $("#table_export").dataTable();
    
    $(".dataTables_wrapper select").select2({
      minimumResultsForSearch: -1
    });
  });
    

   
</script>
<!-- new js included -->

