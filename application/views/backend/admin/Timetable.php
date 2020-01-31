 <section class="content">
      <div class="row">
        <div class="col-xs-12">
    

     <div class="box">
      
        
      
            <div class="box-body table-responsive">
      
              <div class="box-body">
        
        
          <div class="row">
         
         
        <div class="col-md-12">
       
        </div>

          <div class="col-md-5">    
        <div class="form-group">
                  <label for="">Class </label>
                  <select id="class" value=""class="form-control"name="class" placeholder="Subject Name " required>
                     <option>select</option>
                    <?php foreach ($class as $row) { 
                    ?>
                       <option value="<?php echo $row->class_id ?>"><?php echo ' class'.' '. $row->name ?></option>
                   <?php } ?>
                   
                  </select>
                </div>
        </div>
          <div class="col-md-5">    

        </div>
                <div class="col-md-2" style="padding-top:20px;">    
        
                       <button class="btn btn-sm btn-primary"  onclick="changeFunc();" id="submit">
      GO&nbsp;&nbsp;
      <i class="fa fa-arrow-right"></i>
    </button>
            </div>
            </div>
      
        </div>
          <!-- /.box-header -->
          <div class="box-body table-responsive"> 
            <div id="Table_id"></div>
            
          </div>
          <!-- /.box-body --> 
        </div>
     

        </div>
        <!-- /.col -->
      </div>
    </section>
    <script src="http://sbn.greetlogs.com/assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="http://sbn.greetlogs.com/assets/bower_components/jquery-ui/jquery-ui.min.js"></script>

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>

<script src="http://sbn.greetlogs.com/assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>


<!-- Bootstrap WYSIHTML5 -->
<script src="http://sbn.greetlogs.com/assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="http://sbn.greetlogs.com/assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="http://sbn.greetlogs.com/assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- Schoolbird App -->
<script src="http://sbn.greetlogs.com/assets/dist/js/schoolbird.min.js"></script>






<script type="text/javascript">
  function changeFunc() {
     var selectBox = document.getElementById("class");
    var selectedclass = selectBox.options[selectBox.selectedIndex].value; 
   
   $.ajax({

        type:"post",//or POST
        url:'GetTimetable',
                          
        data:{clsaa:selectedclass},
      
       success:function(data){
              //console.log(data);
            $('#Table_id').html(data);  

              
            } 
     })
   }
 </script>
