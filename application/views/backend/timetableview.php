 <style type="text/css">

  /* drag container (contains two tables) */
  #redips-drag {
    margin: auto;
    width: 100%;
  }

  /* drag objects (DIV inside table cells) */
  .redips-drag {
    position: relative;
    cursor: move;
    margin: 2px auto;
    z-index: 10;
    background-color: #f0f0f0;
    text-align: left;
    padding: 5px;
    font-size: 12px;
    width: 190px;
    /* round corners for FF, Chrome, Safari (except IE) */
    -moz-border-radius: 10px;
    -webkit-border-radius: 10px;
    border-radius: 10px;
    /* shadow for FF, Chrome, Safari (except IE)*/
  /*
  -moz-box-shadow: 4px 4px 8px #444;
  -webkit-box-shadow: 4px 4px 8px #444;
  box-shadow: 4px 4px 8px #444;
  */
}

/* drag objects border for the first table */
.t1 {
  border: 1px solid #9B9EA2;;
}

/* tables */
div#redips-drag table {
  background-color: #e0e0e0;
  border-collapse: collapse;
}

/* table cells */
div#redips-drag td {
  height: 50px;
  border: 1px solid white;
  text-align: center;
  font-size: 12px;
  padding: 2px;
}

/* message cell (marked as forbidden) */
.redips-mark {
  color: white;
  background-color: SteelBlue;
}

div#redips-drag th {
  height: 50px;
  border: 1px solid white;
  text-align: center;
  font-size: 12px;
  padding: 2px;
  background-color: SteelBlue;
  color: white;
}

.close {
   float: right; 
   font-size: 21px; 
   font-weight: normal !important; 
   line-height: 1;
   color: #000; 
   text-shadow: 0 1px 0 #fff; 
   filter: alpha(opacity=20);
   opacity: .8; 

  }
.close:after{
  content: "\f057";
    font-family: FontAwesome;
    font-style: normal;
    font-weight: normal;
    text-decoration: inherit;
    color: #000;
    font-size: 18px;
    padding-right: 0.5em;
    position: absolute;
    top: 76px;
    left: 286px;
}
/*.close.showShadow{
  @include transition(300ms ease-out);
  @include transform(scale(0));
  opacity:0;
}
*/
</style>


  <div class="row">

    <div id="redips-drag">

      <!-- left container -->
      <!--  <div id="left">  --><div class="col-md-12">
        <table id="table11">
          <colgroup>
            <col width="190"/>

          </colgroup>
          <tbody>

           <tr >
            <th >Teacher's</th>
            <?php foreach ($teacher as $row ) {?>
              <td class="objectDrag" id="teacher" value="<?php echo $row->teacher_id;?>"  ><?php echo $row->name;  ?></td>
            <?php } ?>
          </tr> 

          <!--  <tr><td class="redips-trash" title="Trash">Trash</td></tr> -->
        </tbody>
      </table>
    </div><!-- left container -->

    <!--  <div id="left">  --><div class="col-md-2" style="margin-top:20px; ">
      <table id="table12">
        <colgroup>
          <col width="200"/>
        </colgroup>
        <tbody>
         <?php foreach ($getSubjects as $row ) { ?>
          
           <tr>
           
            <td  class="subjectDrag" id="subject" value="<?php echo $row->subject_id;?>"><?php echo $row->name;  ?></td>

          </tr> 
        <?php } ?>
        <!--  <tr><td class="redips-trash" title="Trash">Trash</td></tr> -->
      </tbody>
    </table>
  </div><!-- left container -->

  <!-- right container -->
  <!--  <div id="right"> --> <div class="col-md-10"  style="margin-top:20px; ">
    <table id="table2">
      <colgroup>
        <col width="150"/>
        <col width="200"/>
        <col width="200"/>
        <col width="200"/>
        <col width="200"/>
        <col width="200"/>
          <col width="200"/>

      </colgroup>
      <tbody>
        <tr>
          <td class="redips-mark blank">
            Leacher's
          </td>
          <?php $days = array('Mon','Tue','Wed','Thu','Fri','Sat');?>
          <?php foreach ($days as $dey) {?>
            <td class="redips-mark dark"><?php echo $dey;?></td>
          <?php } ?>
        </tr>


        <?php 
        $j=0;

        foreach ($getLectures as $lectures) {?>
          <tr>
            <td style="vertical-align:middle;font-size:12px;" value="<?php echo $lectures->id;?>"  id="lectures">
              <?php echo $lectures->name;?>
            </td>

            <?php
            for($k=0;$k<6;$k++){ $rnd = rand(0,7);  ?> 

              <td id="day" value="<?php echo $days[$k];?>:::<?php echo $lectures->id;?>" lang="<?php echo $days[$k];?>:::<?php echo $lectures->id;?>">
                <div id="garbageCollector">

                </div>  
                <input type="text" style="display: none;" class="try" value="<?php echo $days[$k];?>,<?php echo $lectures->id;?>" name="">
                 <span style="font-size:12px;"id="step1Content"  class="label label-default ">
                 
                     Teachers
                  </span>
                <div id="garbageCollector1">
                 
                </div>
                       <span style="font-size:12px;"id="step2Content"  class="label label-default ">
                 
                     Subject
                  </span>
                    
                 

              </td>

              <?php
            }
            ?>
          </tr>
          <?php $j++;} ?>

        </tbody>
      </table>
       <div id="message">Drag school subjects to the timetable (clone subjects with SHIFT key)</div>
       <div id="alert" style="display: none;"><div class="alert alert-success" role="alert">Data update successfuly</div></div>
  <div class="button_container">
    <input type="button" value="Save" class="button" onclick="redips.save()" title="Save timetable"/>
  </div>

    </div><!-- right container -->
  </div><!-- drag container -->

 



</div>

</div>



    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.0/jquery.min.js"></script>
    <!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/jquery-ui.min.js"></script -->



<!-- jQuery UI 1.11.4 -->
<!-- <script src="http://sbn.greetlogs.com/assets/bower_components/jquery-ui/jquery-ui.min.js"></script> -->
<script type="text/javascript">

   $(document).ready(function(){
    var tb11 = $(".objectDrag");
    var tb12 = $(".subjectDrag");

     $(tb11).draggable({helper:'clone'})
     $(tb12).draggable({helper:'clone'})

      var fruits = [];
      var teacher1 = [];
      var subject1 = [];
       $("table#table2 td").droppable({
        
        accept: ".objectDrag, .subjectDrag",
           
            drop: function(event,ui){
              var tempid = ui.draggable;
              var id = tempid.attr("id");
              
                  
              
                  if (typeof id !== 'undefined' && id == 'teacher' ) {
                    var data = $(ui.draggable).clone().text();
                    var teacher = tempid.attr("value");
                    var time =  $(this).find('.try').val();
  
                    fruits.push(time);
                    teacher1.push(teacher);
                    $(this).find('#garbageCollector').append('<span style="font-size:12px;" class="label label-default  ui-droppable"><button class="close1" id="tec'+teacher+'">'+data+'X</button></span>');

                    $(this).find('#step1Content').hide();
                      var closebtns = document.getElementsByClassName("close1");
                  var i;

                    
                     
                     for (i = 0; i < closebtns.length; i++) {
                    closebtns[i].addEventListener("click", function() {
                      this.parentElement.remove();
                  
                    });
                  }
                
                    
                

                   
                  }
                  else if(typeof id !== 'undefined' && id == 'subject'){
                  var data = $(ui.draggable).clone().text();
                  var tempid = ui.draggable;
                  var subject = tempid.attr("value");
                  subject1.push(subject);

                    $(this).find('#garbageCollector1').append('<span style="font-size:12px;" class="label label-default  ui-droppable"><button class="close2"  id="sub'+subject+'">'+data+'X</button></span>');

                    $(this).find('#step2Content').hide();
                     var closebtns = document.getElementsByClassName("close2");
                  var i;

                  
                     
                     for (i = 0; i < closebtns.length; i++) {
                    closebtns[i].addEventListener("click", function() {
                      this.parentElement.remove();
                  
                    });
                  }
                   
                   

                  
                   
                  }
                  else{

                    //alert('please drag requred data');
                  }
                  //alert(fruits);
                  if (teacher1.length == 0 || subject1.length == 0 ) {
            
                   //alert(name + ' is NOT in the array...');
                  } else {
                   
                      var selectBox = document.getElementById("class");
                      var selectedclass = selectBox.options[selectBox.selectedIndex].value;

                      
                       $.ajax({
                          type: "POST",
                          data:{leacture:fruits,teacher:teacher1,subject:subject1,clsaa:selectedclass},
                          processData: false,
                          contentType: false,
                          url: "<?php echo base_url('admin/Saveatimetable');?>",
                          success:function(data){
                            console.log(data);
                            fruits.pop();
                            teacher1.pop();
                            subject1.pop(); 
                             $("#alert").fadeIn(3000).fadeOut(4000);
                          } 
                        });   
                      
                  }
                }

        });
        
    
    });

  
</script>
<!-- Bootstrap 3.3.7 -->


<!-- Bootstrap WYSIHTML5 -->


