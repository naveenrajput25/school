<div class="content">
       
    <div class="row">
      <div class="col-md-12">
        <div class="card ">
            <div class="card-header ">
                <div class="row">
                    <div class="col-md-6">
                       <h5 class="card-title">Users Behavior</h5>
                       <p class="card-category">24 Hours performance</p>
                    </div>
                    <div class="col-md-6">
                      
                       <a href="<?php echo base_url($account_type.'/student-add'); ?>"  class="btn btn-primary btn-round pull-right">
                         <i class="fa fa-plus" aria-hidden="true"></i>
                         <?php echo get_phrase('Student');?>
                       </a> 
                    </div>
                </div>

            </div>

            <div class="card-body ">
                <div class="row">
                    <div class="col-md-12">
                        
                        <div class="">
                            <table id="resTable" class="resTable table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        
                                        <th width="80"><div><?php echo get_phrase('Registered Number');?></div></th>
                                        <th width="80"><div><?php echo get_phrase('photo');?></div></th>
                                        <th><div><?php echo get_phrase('name');?></div></th>
                                        <th class="span3"><div><?php echo get_phrase('address');?></div></th>
                                        <th><div><?php echo get_phrase('email');?></div></th>
                                        <th><div><?php echo get_phrase('options');?></div></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                       $students   =   $this->db->get_where('student', array('schoolid' => $_SESSION['schoolId'] ))->result_array();
                                        foreach($students as $row):?>
                                        <tr>
                                            <td><?php echo $row['registered_no'];?></td>
                                            <td><img src="<?php echo $this->crud_model->get_image_url('student',$row['student_id']);?>" class="img-circle" width="30" /></td>
                                            <td><?php echo $row['name'];?></td>
                                            <td><?php echo $row['address'];?></td>
                                            <td><?php echo $row['email'];?></td>
                                            <td>
                                              <div class="dropdown">
                                                <button class="btn btn-sm btn-icon" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                      <i class="fa fa-ellipsis-h bx" data-toggle="tooltip" data-placement="top"
                                                        title="Actions"></i>
                                                    
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                                  <a class="dropdown-item" href="JavaScript:Void(0);" onclick="showAjaxModal('<?php echo base_url();?>modal/popup/modal_student_profile/<?php echo $row['student_id'];?>');"><i class="bx bxs-pencil mr-2"></i><?php echo get_phrase('profile');?></a>

                                                  <a class="dropdown-item" href="<?php echo base_url(); ?><?php echo $account_type; ?>/student_edit/<?php echo $row['student_id'];?>" ><i class="bx bxs-pencil mr-2"></i><?php echo get_phrase('edit');?></a><?php echo $class_id;?>
                                                  <a class="dropdown-item text-danger" href="JavaScript:Void(0);" onclick="confirm_modal('<?php echo base_url();?>admin/student/<?php echo $class_id;?>/delete/<?php echo $row['student_id'];?>');"><i class="bx bxs-trash mr-2"></i> <?php echo get_phrase('delete');?></a>
                                                </div>
                                              </div>
                                            </td>
                                          
                                        </tr>
                                        <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>
                        


                    </div>    <!--  card-body col-md-12 --->   
                </div> <!--  card-body ROW --->
            </div> <!--  card-body  --->
              

        </div>  <!-- card -->
      </div>  <!-- col-md-12 -->
    </div>  <!-- row -->
       
</div>  <!-- content -->







<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
 -->
<!-----  DATA TABLE EXPORT CONFIGURATIONS ---->                      
<script type="text/javascript">




  $(document).ready(function($)
  {
    

    var datatable = $("#table_export").dataTable({
      "sPaginationType": "bootstrap",
      "sDom": "<'row'<'col-xs-3 col-left'l><'col-xs-9 col-right'<'export-data'T>f>r>t<'row'<'col-xs-3 col-left'i><'col-xs-9 col-right'p>>",
      "oTableTools": {
        "aButtons": [
          
          {
            "sExtends": "xls",
            "mColumns": [0, 2, 3, 4]
          },
          {
            "sExtends": "pdf",
            "mColumns": [0, 2, 3, 4]
          },
          {
            "sExtends": "print",
            "fnSetText"    : "Press 'esc' to return",
            "fnClick": function (nButton, oConfig) {
              datatable.fnSetColumnVis(1, false);
              datatable.fnSetColumnVis(5, false);
              
              this.fnPrint( true, oConfig );
              
              window.print();
              
              $(window).keyup(function(e) {
                  if (e.which == 27) {
                    datatable.fnSetColumnVis(1, true);
                    datatable.fnSetColumnVis(5, true);
                  }
              });
            },
            
          },
        ]
      },
      
    });
    
    $(".dataTables_wrapper select").select2({
      minimumResultsForSearch: -1
    });
  });
    
</script>