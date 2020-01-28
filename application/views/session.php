 <link href="<?php echo base_url('assets/css/custom.css')?>" rel="stylesheet" />



   <div class="wrapper ">
 
   
    <div class="main-panel"id="main-panel2" > 
     <div class="content">
    <div class="row">
          <div class="offset-md-2 col-md-8">
    <!-- multistep form -->
<form id="msform"enctype="multipart/form-data" autocomplete="off">
  <!-- progressbar -->
 <!--- <ul id="progressbar">
    <li class="active">Account Setup</li>
    <li>Social Profiles</li>
    <li>Personal Details</li>
  </ul>--->
  <!-- fieldsets -->
  <fieldset>

    <h2 class="fs-title">School Session</h2>
   <!---- <h3 class="fs-subtitle">This is step 1</h3>--->
    <div class="row mt-4 mb-4">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Year Start</label>
                        <input type="text" id="From" name="from"class="form-control datepicker" placeholder="From" value="" >
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Year End</label>
                        <input type="text" value="" name="to"id="To" class="form-control datepicker" placeholder="To" >
                      </div>
                    </div>
                  
                  </div>
  
    <input type="button" name="next" id="session"class="next action-button button1" value="Next" />
  </fieldset>
  <fieldset>

    
    <h2 class="fs-title">Owner Profile</h2>
  <div class="row mt-4 mb-4">
                    <div class="col-md-2 ">
          
          <div class="form-group">
              <label for="sel1">Salutation</label>
             <select class="form-control" id="prefix" name="prefix" name="Salutation">
                                        <option value="" class="small" disabled="" selected="">Select</option>
                                        <option value="Ms"> Ms </option> 
                                        <option value="Miss"> Miss </option> 
                                        <option value="Mrs"> Mrs </option> 
                                        <option value="Mr"> Mr </option> 
                                        <option value="Master"> Master </option> 
                                        <option value="Rev"> Rev (Reverend) </option>
                                        <option value="Dr"> Dr (Docto) </option> 
                                        <option value="Atty"> Atty (Attorney) </option>  
                                        <option value="Hon"> Hon (Honorable) </option>  
                                        <option value="Prof"> Prof (Professor) </option>  
                                
                                        <option value="Ofc"> Ofc (Officer) </option> 
                                    </select>
          </div>
                   
                    </div>
                    <div class="col-md-4 ">
                      <div class="form-group">
                        <label>Owner First Name</label>
                        <input name="fname" id="fname" type="text" class="form-control" placeholder="First Name" value="">
                      </div>
                    </div>
          <div class="col-md-3 ">
                      <div class="form-group">
                        <label> Middle Name</label>
                        <input type="text" id="mname" name="mname" class="form-control" placeholder="Middle Name" value="">
                      </div>
                    </div>
          <div class="col-md-3 ">
                      <div class="form-group">
                        <label> Last Name</label>
                        <input type="text" id="lname" name="lname" class="form-control" placeholder="Last Name" value="">
                      </div>
                    </div>
                    <div class="col-md-4 ">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email </label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="Email">
                      </div>
                    </div>
          <div class="col-md-4 ">
                      <div class="form-group">
                        <label for="exampleInputMobile">Mobile </label>
                        <input type="number"name="mobile" id="mobile" class="form-control" placeholder="Mobile">
                      </div>
                    </div>
          <div class="col-md-4 ">
                      <div class="form-group">
                        <label for="exampleInputPhone">Phone No </label>
                        <input type="number"name="phone" id="phone"class="form-control" placeholder="Phone No">
                      </div>
                    </div>
                  </div>
          <input type="button" name="next"id="next2" class="next action-button button1" value="Next" />
    <input type="button" name="previous" class="previous action-button button1" value="Previous" />
    
  </fieldset>
  <fieldset>
    <h2 class="fs-title">Principal Profile</h2>
    <div class="row mb-3">
        <div class=" offset-md-8 col-md-4 float-right text-right">
                 <div class="checkbox checkbox-primary">
            <input id="checkbox2" value="" type="checkbox" checked="">
            <label for="checkbox2">
        Same As Owner Profile
                        </label>
      </div>
       
        </div>
        </div>
  <div class="row mt-4 mb-4">
                    <div class="col-md-2 ">
          
          <div class="form-group">
              <label for="sel1">Salutation</label>
             <select class="form-control" id="pprefix" value=""name="Salutation">
                                        <option value="" class="small" disabled="" selected="">Select</option>
                                        <option value="Ms"> Ms </option> 
                                        <option value="Miss"> Miss </option> 
                                        <option value="Mrs"> Mrs </option> 
                                        <option value="Mr"> Mr </option> 
                                        <option value="Master"> Master </option> 
                                        <option value="Rev"> Rev (Reverend) </option>
                                        <option value="Dr"> Dr (Docto) </option> 
                                        <option value="Atty"> Atty (Attorney) </option>  
                                        <option value="Hon"> Hon (Honorable) </option>  
                                        <option value="Prof"> Prof (Professor) </option>  
                                
                                        <option value="Ofc"> Ofc (Officer) </option> 
                                    </select>
          </div>
                   
                    </div>
                    <div class="col-md-4 ">
                      <div class="form-group">
                        <label>Principal  First Name</label>
                        <input type="text" id="pfname" value="" class="form-control" placeholder="First Name" value="">
                      </div>
                    </div>
          <div class="col-md-3 ">
                      <div class="form-group">
                        <label> Middle Name</label>
                        <input type="text"id="pmname"  value=""class="form-control" placeholder="Middle Name" value="">
                      </div>
                    </div>
          <div class="col-md-3 ">
                      <div class="form-group">
                        <label> Last Name</label>
                        <input type="text"id="plname" value="" class="form-control" placeholder="Last Name" value="">
                      </div>
                    </div>
                    <div class="col-md-4 ">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email </label>
                        <input type="email"id="pemail" value="" class="form-control" placeholder="Email">
                      </div>
                    </div>
          <div class="col-md-4 ">
                      <div class="form-group">
                        <label for="exampleInputMobile">Mobile </label>
                        <input type="number"id="pmobile" value="" class="form-control" placeholder="Mobile">
                      </div>
                    </div>
          <div class="col-md-4 ">
                      <div class="form-group">
                        <label for="exampleInputPhone">Phone No </label>
                        <input type="number"id="pphone"  value=""class="form-control" placeholder="Phone No">
                      </div>
                    </div>
                  </div>
            <input type="button" name="next" id="next3" class="next action-button button1" value="Next" />       
    <input type="button" name="previous" class="previous action-button button1" value="Previous" />
  
  </fieldset>
  <fieldset>
    <h2 class="fs-title">School Profile</h2>
    
  <div class="row mt-4 mb-4">
          <div class="col-md-4 ">
                      <div class="form-group">
                       <div class="avatar-upload">
            <div class="avatar-edit">
              <input type='file' id="imageUpload"name="logo"value="" accept=".png, .jpg, .jpeg" />
              <label for="imageUpload"></label>
            </div>
            <div class="avatar-preview">
              <div id="imagePreview" style="background-image: url(http://i.pravatar.cc/500?img=7);">
              </div>
            </div>
          </div>
                      </div>
                    </div>
                    <div class="col-md-8 ">
          <div class="row">
           <div class="col-md-12 ">
                      <div class="form-group">
                        <label>School Name</label>
                        <input type="text"id="sname" value="" class="form-control"  placeholder="School Name" value="">
                      </div>
            </div>
            <div class="col-md-12 ">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email </label>
                        <input type="email"id="semail" value=""  class="form-control" placeholder="Email">
                      </div>
                    </div>
          <div class="col-md-6 ">
                      <div class="form-group">
                        <label for="exampleInputMobile">Phone No </label>
                        <input type="number" id="sphone" value="" class="form-control" placeholder="Phone No">
                      </div>
                    </div>
          <div class="col-md-6 ">
                      <div class="form-group">
                        <label for="exampleInputPhone">Alternate Phone No</label>
                        <input type="number"id="smobile" value=""  class="form-control" placeholder="Alternate Phone No">
                      </div>
                    </div>
            </div>
                    </div>
                    
                    
                  </div>
                 
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Address</label>
                        <input type="text"id="sadd" value=""  class="form-control" placeholder="School Address" value="">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>City</label>
                        <input type="text" id="scity" value=""  class="form-control" placeholder="City" value="">
                      </div>
                    </div>
                    <div class="col-md-4 ">
                      <div class="form-group">
                        <label>Country</label>
                        <input type="text" id="scounty" value="" class="form-control" placeholder="Country" value="">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Postal Code</label>
                        <input type="number" id="sportal" value="" class="form-control" placeholder="ZIP Code">
                      </div>
                    </div>
                  </div>
            <input type="button" id="next4"name="next" class="next action-button button1" value="Next" />       
    <input type="button" name="previous" class="previous action-button button1" value="Previous" />
  
  </fieldset>
  <fieldset>
    <h2 class="fs-title">Upload Student Master</h2>
   
   <div class="row mt-4 mb-4">
        <div class=" col-md-12">
                    <ul class="responsive-table">
          <li class="table-header">
            <div class="col col-md-4">Classes</div>
            <div class="col col-md-8">Section</div>
           
          </li><?php $a=1; foreach ($class as $value) { ?>
          <li class="table-row">
            
             <div class="col col-md-2 pt-3" id="<?php echo $value->id ?>" ><?php echo $value->className; ?></div>
             <div class="col col-md-8" data-label="Section" >
            
           
            <div class="row ">
          
            <div class="container1" id="<?php echo 'add'.$a; ?>"  >
             
            <div style="display:inline-block;">
            <input type="hidden" id="classname"name="class[]" value="<?php echo $value->className; ?>">
            <input type="text" id="Section" name="mytext[]" class="form-control" value="A" disabled></div>
           
            </div>
          
          
            </div>
            
            </div>
          
            
            
            <div class="col col-md-2">  <button class="add_form_field btn btn-outline-primary btn-round" type="button" id="<?php echo $value->id ?>">Add  </button></div>
          </li> <?php $a++; } ?>
          </ul>
          </div>
                 </div>
            <input type="button" id="claasection" name="next" class="next action-button button1" value="Next" />       
    <input type="button" name="previous" class="previous action-button button1" value="Previous" />
  
  </fieldset>
 
 <fieldset>
    <h2 class="fs-title">Upload Student Master</h2>
   
   <div class="row mt-4 mb-4">
         <div class="offset-md-3 col-md-6">
                 <div class="file-upload">
            <div class="file-select">
            <div class="file-select-button" id="fileName">Choose File</div>
            <div class="file-select-name" id="noFile">No file chosen...</div> 
            
            <input type='file' id="chooseFile"name="Student"value=""/>
            </div>
          </div>
                  </div>
                 </div>
            <input type="button"id="importstuden"  name="next" class="next action-button button1" value="Next" />       
    <input type="button" name="previous" class="previous action-button button1" value="Previous" />
  
  </fieldset>
  
   <fieldset>
    <h2 class="fs-title">School Registration Number</h2>
   
     <div class="row mt-4 mb-4">
                    <div class="offset-md-2 col-md-4">
                      <div class="form-group">
                        <label>Previous Registration Number</label>
                        <input type="text" id="preid" value="" class="form-control"  placeholder="<?php if(isset($studentid->regNo)){echo $studentid->regNo;} else{} ?>" disabled >
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Updated Registration Number</label>
                        <input type="text" id="newid" value=""class="form-control " placeholder="SCH123092"  >
                      </div>
                    </div>
                  
                  </div>
          
            <input type="button" id="registation" name="next" class="next action-button button1" value="Next" />       
    <input type="button" name="previous" class="previous action-button button1" value="Previous" />
  
  </fieldset>
  <fieldset>
    <h2 class="fs-title">Upload Teacher Data</h2>
   
    <div class="row mt-4 mb-4">
         <div class="offset-md-3 col-md-6">
                 <div class="file-upload">
            <div class="file-select">
            <div class="file-select-button" id="fileName">Choose File</div>
            <div class="file-select-name" id="noFile">No file chosen...</div> 
            <input type="file" name="chooseFile" value="" id="Teacher">
            </div>
          </div>
                  </div>
                 </div>
            <input type="button" id="importteacher" name="next" class="next action-button button1" value="Next" />       
    <input type="button" name="previous" class="previous action-button button1" value="Previous" />
  
  </fieldset> 
  
  <fieldset>
    <h2 class="fs-title">Class Wise Subject</h2>
   
    <div class="row mt-4 mb-4">
        
          <div class="col-md-4 text-center">
         <h6 class="text-center"> Class</h6>
         KG-1
        </div>
        
           <div class="col-md-8 text-center">
         <h6 class="text-center"> Section</h6>
        <div class="form-check-inline ">
  <label class="form-check-label ">
    <input type="checkbox" class="form-check-input" value="" checked>A
  </label>
</div>
<div class="form-check-inline">
  <label class="form-check-label">
    <input type="checkbox" class="form-check-input" value="" checked>B
  </label>
</div>
<div class="form-check-inline">
  <label class="form-check-label">
    <input type="checkbox" class="form-check-input" value="" checked>C
  </label>
</div>
<div class="form-check-inline">
  <label class="form-check-label">
    <input type="checkbox" class="form-check-input" value="" checked >D
  </label>
</div>
       </div> 
        </div>
        <div class="row" >
        <div class=" col-md-12">
  <div class="box">
          <div class="container1  "  >
   <h6 class="text-left"> Subjects</h6>
            <div style="display:inline-block;">
            <input type="text" name="mytext[]" class="form-control" value="Maths"  style="display:inline-block;" disabled>
            <input type="text" name="mytext[]" class="form-control" value="English"  style="display:inline-block;" disabled>  
  <input type="text" name="mytext[]" class="form-control" value="Hindi"  style="display:inline-block;" disabled>  
  <input type="text" name="mytext[]" class="form-control" value="EVS"  style="display:inline-block;" disabled>  

            </div>

            </div>
              
      </div>
  
   <div class=" pull-right " >  <button class="add_form_field btn btn-outline-primary btn-round">Add Subject </button></div>
      
    
                 </div>
         
        </div>
        
            <input type="button"name="next" class="next action-button button1" value="Next" />       
    <input type="button" name="previous" class="previous action-button button1" value="Previous" />
  
  </fieldset>
  <fieldset>
    <h2 class="fs-title">Exam</h2>
   
      <div class="row mt-4 mb-4">
        
               <div class="col-lg-12 ">
          <table class="table rtable table-bordered table-hover dt-responsive "  id="Rtabledata" style="width:100%">
        
        <thead>
          <tr>
            <th>Unit Test</th>
            <th>Quarterly Exam</th>
            <th>Unit Test</th>
            <th>Half Yearly Exam </th>
            <th>Unit Test</th>
            <th>Final Exam </th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>
      
              <input type="text" class="form-control" placeholder="0%">
           
       </td>
            <td>
      
              <input type="text" class="form-control" placeholder="0%">
            
      </td>
            <td>
      
              <input type="text" class="form-control" placeholder="0%">
         
      </td>
            <td>
      
              <input type="text" class="form-control" placeholder="0%">
           
      </td>
            <td>
      
              <input type="text" class="form-control" placeholder="0%">
           
      </td>
            <td>
      
              <input type="text" class="form-control" placeholder="0%">
           
      </td>
          </tr>
          
        </tbody>
        <tfoot>
          
        </tfoot>
      </table>
          
        </div>
        </div>
            <input type="button" name="next" class="next action-button button1" value="Next" />       
    <input type="button" name="previous" class="previous action-button button1" value="Previous" />
  
  </fieldset>
  
 <fieldset>
    <h2 class="fs-title">Complete</h2>
   
   
           <input type="submit" name="submit" class="submit action-button button1" value="Submit" />      
    <input type="button" name="previous" class="previous action-button button1" value="Previous" />
  
  </fieldset>
  
</form>
</div>
</div>
</div>
  
      <!-- Navbar -->
         <!-- End Navbar -->

    
   
    </div>
  </div>


 
 <script>
 
 $(function() {
            $('.datepicker').datepicker( {
           minViewMode: 1,
         format: 'M/yyyy'
            });
        });
 $(document).ready(function() {        
    $('.rtable').DataTable({
        "paging":   false,
       "info":     false,
     "searching": false
    } );
      
  } );
 

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#imagePreview').css('background-image', 'url('+e.target.result +')');
            $('#imagePreview').hide();
            $('#imagePreview').fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#imageUpload").change(function() {
    readURL(this);
});


 </script>

<script>
$(document).ready(function() {
    var max_fields      = 10;
    var add_button      = $(".add_form_field");
    var wrapper         =    $('.container1');
    var x = 1;
    $(".add_form_field").click(function(e){
      var id = $(this).attr('id');

      //var append = $(".container1").attr('id');alert(append);
        e.preventDefault();
        if(x < max_fields){
            x++;
            $("#add"+id).append('<div style="display:inline-block;" ><input type="text" name="mytext[]" style="display:inline;" class="form-control" /><a href="#" class="close-thik " style="display:inline;"> </a></div>'); //add input box
        }
  else
  {
  alert('You Reached the limits')
  }
    });
 
    $(wrapper).on("click",".close-thik", function(e){
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});


$('#chooseFile').bind('change', function () {
  var filename = $("#chooseFile").val();
  if (/^\s*$/.test(filename)) {
    $(".file-upload").removeClass('active');
    $("#noFile").text("No file chosen..."); 
  }
  else {
    $(".file-upload").addClass('active');
    $("#noFile").text(filename.replace("C:\\fakepath\\", "")); 
  }
});



//jQuery time
var current_fs, next_fs, previous_fs; //fieldsets
var left, opacity, scale; //fieldset properties which we will animate
var animating; //flag to prevent quick multi-click glitches

$(".next").click(function(){
  if(animating) return false;
  animating = true;
  
  current_fs = $(this).parent();
  next_fs = $(this).parent().next();
  
  //activate next step on progressbar using the index of next_fs
  $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
  
  //show the next fieldset
  next_fs.show(); 
  //hide the current fieldset with style
  current_fs.animate({opacity: 0}, {
    step: function(now, mx) {
      //as the opacity of current_fs reduces to 0 - stored in "now"
      //1. scale current_fs down to 80%
      scale = 1 - (1 - now) * 0.2;
      //2. bring next_fs from the right(50%)
      left = (now * 50)+"%";
      //3. increase opacity of next_fs to 1 as it moves in
      opacity = 1 - now;
      current_fs.css({
        'transform': 'scale('+scale+')',
        'position': 'absolute'
      });
      next_fs.css({'left': left, 'opacity': opacity});
    }, 
    duration: 800, 
    complete: function(){
      current_fs.hide();
      animating = false;
    }, 
    //this comes from the custom easing plugin
    easing: 'easeInOutBack'
  });
});

$(".previous").click(function(){
  if(animating) return false;
  animating = true;
  
  current_fs = $(this).parent();
  previous_fs = $(this).parent().prev();
  
  //de-activate current step on progressbar
  $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
  
  //show the previous fieldset
  previous_fs.show(); 
  //hide the current fieldset with style
  current_fs.animate({opacity: 0}, {
    step: function(now, mx) {
      //as the opacity of current_fs reduces to 0 - stored in "now"
      //1. scale previous_fs from 80% to 100%
      scale = 0.8 + (1 - now) * 0.2;
      //2. take current_fs to the right(50%) - from 0%
      left = ((1-now) * 50)+"%";
      //3. increase opacity of previous_fs to 1 as it moves in
      opacity = 1 - now;
      current_fs.css({'left': left});
      previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
    }, 
    duration: 800, 
    complete: function(){
      current_fs.hide();
      animating = false;
    }, 
    //this comes from the custom easing plugin
    easing: 'easeInOutBack'
  });
});


</script>
<script type='text/javascript'>
  $(document).ready(function(){
    $('#session').click(function(){
      var to = $('#To').val();
      var from = $('#From').val();
      var data = from+'-'+to;
      $.ajax({
           type: "POST",
           data:{to:to,from:from},
           url: "<?php echo base_url('Addsession');?>",
           success: function(data)
           {
            
           }
        }); 
      
    });

       $('#next2').click(function(){
      var prefix = $('#prefix').val();
      var fname = $('#fname').val();
      var mname = $('#mname').val();
      var lname = $('#lname').val(); 
      var email = $('#email').val();
      var mobile = $('#mobile').val(); 
      var phone = $('#phone').val();
      var name = fname+' '+mname+' '+lname;
      $.ajax({
           type: "POST",
           data:{prefix:prefix,name:name,email:email,mobile:mobile,phone:phone},
           url: "<?php echo base_url('admin/ownprofile');?>",
           success: function(data)
           {
            
           }
        }); 
      
    }); 

    $('#next3').click(function(){
      var checkbox2 =  $('#checkbox2').prop('checked');
      var prefix    = $('#pprefix').val();
      var fname     = $('#pfname').val();
      var mname     = $('#pmname').val();
      var lname     = $('#plname').val(); 
      var email     = $('#pemail').val();
      var mobile    = $('#pmobile').val(); 
      var phone     = $('#pphone').val();
      var name      = fname+' '+mname+' '+lname;
      $.ajax({
           type: "POST",
           data:{prefix:prefix,name:name,email:email,mobile:mobile,phone:phone,cheack:checkbox2},
           url: "<?php echo base_url('admin/Principle');?>",
           success: function(data)
           {
            
           }
        }); 
      
    });
     
    $('#next4').click(function(){
      var formData = new FormData();

     
        formData.append('sname',$('#sname').val());
        formData.append('semail',$('#semail').val());
        formData.append('sphone',$('#sphone').val());
        formData.append('smobile',$('#smobile').val());
        formData.append('sadd',$('#sadd').val());
        formData.append('scity',$('#scity').val());
        formData.append('scounty',$('#scounty').val());
        formData.append('sportal',$('#sportal').val());
     formData.append('image', $('input[type=file]')[0].files[0]); 
      
    
      $.ajax({
           type: "POST",
          data: formData,
          processData: false,
          contentType: false,
           url: "<?php echo base_url('admin/Schooldetail');?>",
           success: function(data)
           {
            
           }
        });
        }); 

      $('#claasection').click(function(){
        data = $("#msform").serialize();
       console.log(msform);
      $.ajax({
           type: "POST",
          data: data,
         
           url: "<?php echo base_url('admin/Claasection');?>",
           success: function(data)
           {
            
           }
        }); 
      
    });

    $('#importstuden').click(function(){

       var formData = new FormData();
       formData.append('userfile', $('#chooseFile')[0].files[0]);
    
      $.ajax({
           type: "POST",
           data: formData,
           processData: false,
           contentType: false,
           url: "<?php echo base_url('admin/student_bulk_add');?>",
           success: function(data)
           {
            
           }
        }); 
      
    }); 
    $('#importteacher').click(function(){

       var formData = new FormData();
       formData.append('userfile', $('#Teacher')[0].files[0]);
    
      $.ajax({
           type: "POST",
           data: formData,
           processData: false,
           contentType: false,
           url: "<?php echo base_url('admin/teachers_bulk_add');?>",
           success: function(data)
           {
            
           }
        }); 
      
    });  

    $('#registation').click(function(){
        
      var pre = $('#preid').val(); 
      var next = $('#newid').val(); 
      $.ajax({
           type: "POST",
           data: {pre:pre,next:next},
           url: "<?php echo base_url('admin/schoolRegistation');?>",
           success: function(data)
           {
            
           }
        }); 
      
    });
  });
    </script>