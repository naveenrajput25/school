<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/*  
 *  @author     : Marcos Fermin
 *  PencilCrunch School Management System
 *  marcosdavid1794@gmail.com
 */
require_once APPPATH ."/third_party/PHPExcel.php";

class Admin extends CI_Controller{
    public function __construct(){
        parent::__construct();

        /*cache control*/
        /*$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');*/
    }
    
    /***default function, redirects to login page if no admin logged in yet***/
    public function index() {
        redirect( site_url( 'admin/dashboard' ), 'refresh');
    }

    function all_design() {

        if ($this->session->userdata('admin_login') != 1)
            redirect('login', 'refresh');   
        $page_data['page_name']  = 'all-design';
        $page_data['page_title'] = get_phrase('all_design');
        $this->load->view('backend/index', $page_data);
    }


    /***session setup***/
    function session() {
         $this->load->view('backend/includes_top'); 
        $class =   $this->db->get_where('preclasses')->result(); 
        $studentid =  $this->db->get_where('settings', array('schoolId'=>$_SESSION['schoolId']))->row(); 
       
         $this->load->view('session',compact('class','studentid')); 

         $this->load->view('backend/includes_bottom');
    } 

    /***session setup***/
    function Addsession() {
        $studentid =  $this->db->get_where('settings', array('schoolId'=>$_SESSION['schoolId']))->row();
        if(empty($studentid)){
            if(isset($_POST['to'])){
                
                $data['session']             = $this->input->post('to').'-'. $this->input->post('from');            
                $data['schoolId'] = $_SESSION['schoolId'];
                $this->db->insert('settings' , $data);
                
            }else{}
        }else{}
    } 

    /***own profile setup***/
    function ownprofile() {
        $own =  $this->db->get_where('admin', array('schoolId'=>$_SESSION['schoolId'],'designation'=>'Ownner'))->row()->email;
        if(empty($own)){
            if(isset($_POST['email'])){
                 if(isset($_FILES['image'])){
                    $config['upload_path'] = 'uploads/logo/';
                    $config['allowed_types'] = 'jpg|jpeg|png|gif';
                    $this->load->library('upload',$config);
                    $this->upload->initialize($config);
                    if( ! $this->upload->do_upload('image') )
                    {
                        $error = array('error' => $this->upload->display_errors());  
                           
                    }
                    else
                    {
                        $u_data =$this->upload->data();
                        $path=$u_data['file_name'];
                        $img = base_url().$config['upload_path'].$path;
                       
                    }
                }else{
                    $img = 'https://www.schoolbirdapp.com/images/schoolbird-logo-white.png';
                }
                $data=array(
                    'prefix'     =>$this->input->post('prefix'), 
                    'gender'     =>$this->input->post('gender'),
                    'name'       =>$this->input->post('name').' '.$this->input->post('mname').' '.$this->input->post('lname'),
                    'email'      =>$this->input->post('email'),
                    'mobile'     =>$this->input->post('mobile'),
                    'phone'      =>$this->input->post('phone'),
                    'profile'    =>$img,
                    'designation'=>'Ownner',
                    'schoolId'   => $_SESSION['schoolId']
                );
                 $this->db->insert('admin', $data);
            }
        }else{}
    }

    /***Principle profile setup***/ 
     function getpreofile(){

    $session =   $this->db->get_where('admin', array('schoolid'=>$_SESSION['schoolId'],'designation'=>'Ownner'))->row();

       $name = explode(' ',$session->name);
     
       $data  = array(
                 'prefix'=> $session->prefix,
                 'fname' => trim($name[0]),
                 'mname' => trim($name[1]),
                 'lname' => trim($name[2]),
                 'email' => $session->email,
                 'gender'=> $session->gender,
                 'mobile'=> $session->mobile,
                 'phone' => $session->phone,
                );

            echo json_encode($data);
               
     }
    /***Principle profile setup***/
    function Principle() {
        $prin =  $this->db->get_where('admin', array('schoolId'=>$_SESSION['schoolId'],'designation'=>'Principle'))->row();
        if(empty($own)){
             
            $chk = $this->input->post('checkbox2');
            if($chk != 'true'){
                if(isset($_FILES['image'])){
                    $config['upload_path'] = 'uploads/logo/';
                    $config['allowed_types'] = 'jpg|jpeg|png|gif';
                    $this->load->library('upload',$config);
                    $this->upload->initialize($config);
                    if( ! $this->upload->do_upload('image') )
                    {
                        $error = array('error' => $this->upload->display_errors());  
                           
                    }
                    else
                    {
                        $u_data =$this->upload->data();
                        $path=$u_data['file_name'];
                        $img = base_url().$config['upload_path'].$path;
                       
                    }
                }else{
                    $img = 'https://www.schoolbirdapp.com/images/schoolbird-logo-white.png';
                }
                $data=array(
                    'prefix'     =>$this->input->post('pprefix'),
                    'name'       =>$this->input->post('pfname').' '.$this->input->post('pmname').' '.$this->input->post('plname'),
                    'email'      =>$this->input->post('pemail'),
                    'mobile'     =>$this->input->post('pmobile'),
                    'phone'      =>$this->input->post('pphone'),
                    'profile'    =>$img,
                    'designation'=>'Principle',
                    'schoolId'   => $_SESSION['schoolId']
                );
                 
                $this->db->insert('admin', $data);
            }
            else{}
        }        
        else{}         
    }

      /***Export  SAMPLE FILE***/ 

      function Export(){
        $session =   $this->db->get_where('class', array('schoolid'=>$_SESSION['schoolId']))->result();
         $objPHPExcel = new PHPExcel();
        $file = 'test.xlsx';
        $this->load->library('PHPExcel');
        $cell_collection  = $file;
        $table_columns = array("Name");
        $column = 0;
        
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($column, 1, 'naveen');
            //$column++;    
         
        $objPHPExcel->setActiveSheetIndex(0);

            //Set Title
            $objPHPExcel->getActiveSheet()->setTitle($file);
 
            //Save ke .xlsx, kalau ingin .xls, ubah 'Excel2007' menjadi 'Excel5'
            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
 
            //Header
            header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
            header("Cache-Control: no-store, no-cache, must-revalidate");
            header("Cache-Control: post-check=0, pre-check=0", false);
            header("Pragma: no-cache");
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

            //Nama File
            header('Content-Disposition: attachment;filename='.$file);

            //Download
            $objWriter->save("php://output");
            $xlsData = ob_get_contents();
            ob_end_clean();

$response =  array(
        'op' => 'ok',
        'file' => "data:application/vnd.ms-excel;base64,".base64_encode($xlsData)
    );

die(json_encode($response));

      }
      /***School detail  IMI***/
    function Schooldetail() {
        
           if(isset($_FILES['image'])){
                $config['upload_path'] = 'uploads/logo/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                if( ! $this->upload->do_upload('image') )
                {
                    $error = array('error' => $this->upload->display_errors());  
                       
                }
                else
                {
                    $u_data =$this->upload->data();
                    $path=$u_data['file_name'];
                    $img = base_url().$config['upload_path'].$path;
                   
                }
            }else{
                $img = 'https://www.schoolbirdapp.com/images/schoolbird-logo-white.png';
            }
           
                
            $data=array(
                  'schoolname'  =>trim($this->input->post('sname')),
                  'schoolemail' =>trim($this->input->post('sffsf ')),
                  'slogn'       =>trim($this->input->post('stag ')),
                  'schoolph'    =>trim($this->input->post('sphone')),
                  'schoolmobile'=>trim($this->input->post('smobile')),
                  'address'     =>trim($this->input->post('sadd')),
                  'city'        =>trim($this->input->post('scity')),
                  'country'     =>trim($this->input->post('scounty')),
                  'portal'      =>trim($this->input->post('sportal')),
                  'logo'        => $img,
            );  
            $this->db->where('schoolId', $_SESSION['schoolId']);
            $this->db->update('settings' , $data);

           
    } 

       /***School Registation update***/
    function schoolRegistation() {
        $resNo = $this->input->post('next');
        if(isset($resNo)){ 
         $data['regNo'] = $resNo;
         $this->db->where('schoolId', $_SESSION['schoolId']);
         $this->db->update('settings' , $data);
        }else{}
           
    } 

    /***School Registation update***/
    function Claasection() {
       
        $section = $this->input->post('mytext');
        foreach ($section as $key) {
           
            $data=array(
                    'name'=>$key,
                    'schoolid'   => $_SESSION['schoolId']
                );
                  
            $this->db->insert('class', $data);
        }
        /*$session =   $this->db->get_where('class', array('schoolid'=>$_SESSION['schoolId'],'designation'=>'Ownner'))->result();*/

           
    }

    /***ADMIN DASHBOARD***/
    function dashboard() {
        $session        =   $this->db->get_where('settings' , array('schoolid'=>$_SESSION['schoolId']))->row()->session;
        $adminprofile        =   $this->db->get_where('admin' , array('schoolid'=>$_SESSION['schoolId']))->result();
        if(empty($session)){

            redirect( site_url( 'admin/session' ), 'refresh');
        }else{

            $page_data['page_name']  = 'dashboard';
            $page_data['page_title'] = get_phrase('admin_dashboard');
            $this->load->view('backend/index', $page_data);
        }
        
       
    }
    
    
    /****MANAGE STUDENTS CLASSWISE*****/
    function student_add() {

        if ($this->session->userdata('admin_login') != 1)
            redirect('login', 'refresh');   
        $page_data['page_name']  = 'student-add';
        $page_data['page_title'] = get_phrase('add_student');
        $this->load->view('backend/index', $page_data);
    }

    function student_edit( $param2 = '') {

        if ($this->session->userdata('admin_login') != 1)
            redirect('login', 'refresh');   
        $page_data['param2']        =   $param2;
        $page_data['page_name']  = 'student_edit';
        $page_data['page_title'] = get_phrase('student_edit');
        $this->load->view('backend/index', $page_data);
    }

     /****teacher_add*****/
    function teacher_add() {

        if ($this->session->userdata('admin_login') != 1)
            redirect('login', 'refresh');   
        $page_data['page_name']  = 'teacher_add';
        $page_data['page_title'] = get_phrase('add_teachers');
        $this->load->view('backend/index', $page_data);
    }

    
    /****MANAGE Timetable*****/
    function Timetable() {
        
        if ($this->session->userdata('admin_login') != 1)
            redirect('login', 'refresh');
            
        $page_data['page_name']     = 'Timetable';
        $page_data['page_title']    = get_phrase('Timetable');
         $page_data['class']      =   $this->db->get_where('class' , array('schoolid'=>$_SESSION['schoolId']))->result();
        

        $this->load->view('backend/index', $page_data);
    }

    /****MANAGE Timetable*****/
    public function Saveatimetable(){
      
        $clsaa    = $this->input->post('clsaa');
        $leacture = $this->input->post('leacture');
        $teacher  = $this->input->post('teacher');
        $subject  = $this->input->post('subject');
        $leacture = explode(',',$leacture[0]);
        $day      = $leacture[0];
        $leacture = $leacture[1];
        
$tt   = $this->db->get_where('timetable',array('day'=>$day,'classid'=>$clsaa,'schoolid'=>$_SESSION['schoolId']))->row();
      
        $data = array(

            'day'      => $day,
            'classid'  => $clsaa,
            'subjectid'=> $subject[0],
            'lectureid'=> $leacture[0],
            'teacherid'=> $teacher[0],
            'schoolId' =>$_SESSION['schoolId'],
            'createtdate'=>date("Y-m-d H:i:s")
        );
        if(empty($tt)){
         $this->db->insert('timetable' , $data);
        } 
        else{
            $this->db->update('timetable' , $data);
        }      
        
    }
    /****MANAGE Timetable*****/
    function GetTimetable(){

        $class = $this->input->post('clsaa');
        /*$data['Timetable']   = $this->Academics_model->getTimetable($class,$acadmic);*/
        $data['teacher']   = $this->db->get_where('teacher' , array('schoolid'=>$_SESSION['schoolId']))->result();
        $data['getLectures'] = $this->db->get_where('lecture' , array('schoolid'=>$_SESSION['schoolId']))->result();
        $data['getSubjects'] =  $this->db->get_where('subject' , array('schoolid'=>$_SESSION['schoolId'],'class_id'=>$class))->result();
        $data['class']   =$class;

        $this->load->view('backend/timetableview',$data);
        
    }

    
    function student_bulk_add($param1 = '')
    {   

            
            move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/student_import.xlsx');
            // Importing excel sheet for bulk student uploads
             
            include 'simplexlsx.class.php';
            
            $xlsx = new SimpleXLSX('uploads/student_import.xlsx');
            
            list($num_cols, $num_rows) = $xlsx->dimension();
            $f = 0;
            foreach( $xlsx->rows() as $r ) 
            {
                // Ignore the inital name row of excel file
                if ($f == 0)
                {
                    $f++;
                    continue;
                }
                for( $i=0; $i < $num_cols; $i++ )
                {  
                    if ($i == 0)        $data['name']           =   $r[$i];
                    else if ($i == 1)   $data['gender']         =   $r[$i];
                    else if ($i == 2)   $data['father_name']    =   $r[$i];
                    else if ($i == 3)   $data['mother_name']    =   $r[$i];
                    else if ($i == 4)   $data['phone']          =   $r[$i];
                    else if ($i == 5)   $data['email']          =   $r[$i];
                    else if ($i == 7)   $data['guardian_name']           =   $r[$i];
                    else if ($i == 8)   $data['occupation']      =   $r[$i];
                    else if ($i == 9)   $data['class_id']      =   $r[$i];
                    else if ($i == 10)  $data['studentId']      =   $r[$i];
                    else if ($i == 11)  $data['studentId']      =   $r[$i];
                    else if ($i == 12)  $data['studentId']      =   $r[$i];
                   else if ($i == 13)   $data['studentId']      =   $r[$i];
                                        $data['schoolid']       =  $_SESSION['schoolId'];
                }
                $data['class_id']   =   1;//$this->input->post('class_id');
                if(!empty($data['name'])){
                $this->db->insert('student' , $data);
                }
            }
            redirect(base_url() . 'admin/student_information/' . $this->input->post('class_id'), 'refresh');
        
        $page_data['page_name']  = 'student_bulk_add';
        $page_data['page_title'] = get_phrase('add_bulk_student');
        $this->load->view('backend/index', $page_data);
    }
    
    // Teacher's Bulk Add

    function teachers_bulk_add($param1 = '')
    {   

            
                move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/student_import.xlsx');
                // Importing excel sheet for bulk student uploads
                 
                include 'simplexlsx.class.php';
                
                $xlsx = new SimpleXLSX('uploads/student_import.xlsx');
                
                list($num_cols, $num_rows) = $xlsx->dimension();
                $f = 0;
                foreach( $xlsx->rows() as $r ) 
                {
                    // Ignore the inital name row of excel file
                    if ($f == 0)
                    {
                        $f++;
                        continue;
                    }
                    for( $i=0; $i < $num_cols; $i++ )
                    {  
                        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%&";
                        $password = substr( str_shuffle( $chars ), 0, 8 );

                      if ($i == 0)        $data['name']           =   $r[$i];
                        else if ($i == 1)   $data['birthday']       =   $r[$i];
                        else if ($i == 2)   $data['sex']            =   $r[$i];
                        else if ($i == 4)   $data['phone']          =   $r[$i];
                        else if ($i == 5)   $data['email']          =   $r[$i];
                        else if ($i == 6)   $data['password']       =   $password;
                                            $data['schoolid']       =  $_SESSION['schoolId'];

                       /* $config['charset'] = 'utf-8';
                        $config['newline'] = "\r\n";
                        $config['mailtype'] = 'html'; // or html
                        $config['validation'] = TRUE; // bool whether to validate email or not      
                        $this->email->initialize($config);
                        
                        $this->email->from($data['email']);
                        $this->email->to($row['Email']);
                        $this->email->subject($name.' Welcomes You to Greetlog (Account Credentials)');
                        $this->email->message('your Password is :- '.$password );
                        
                        $this->email->send();*/                      
                    }
                   
                    if(!empty($data['name'])){
                    $this->db->insert('teacher' , $data);
                    
                }
                redirect(base_url() . 'admin/student_information/' . $this->input->post('class_id'), 'refresh');
            
            $page_data['page_name']  = 'student_bulk_add';
            $page_data['page_title'] = get_phrase('add_bulk_student');
            $this->load->view('backend/index', $page_data);
        }
    }
    function student_information($class_id = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect('login', 'refresh');
            
        $page_data['page_name']     = 'student_information';
        $page_data['page_title']    = get_phrase('student_information');
        $page_data['class_id']  = $class_id;
        $this->load->view('backend/index', $page_data);
    }
    
    function student_marksheet($class_id = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect('login', 'refresh');
            
        $page_data['page_name']  = 'student_marksheet';
        $page_data['page_title']    = get_phrase('student_marksheet'). " - ".get_phrase('class')." : ".
                                            $this->crud_model->get_class_name($class_id);
        $page_data['class_id']  = $class_id;
        $this->load->view('backend/index', $page_data);
    }
    
    function student($param1 = '', $param2 = '', $param3 = ''){
        if ($this->session->userdata('admin_login') != 1)
            redirect('login', 'refresh');
        if ($param1 == 'create') {
            
            $this->form_validation->set_rules('regist_no','Registration Number','trim|required|max_length[20]');
            $this->form_validation->set_rules('joinDate','Date of Joining','trim|required');
            $this->form_validation->set_rules('name','Name','trim|required|max_length[20]');
            $this->form_validation->set_rules('class_id','Class','required');
            $this->form_validation->set_rules('section_id','Section','required');
            $this->form_validation->set_rules('dob','Date of birth','trim|required');
            $this->form_validation->set_rules('gender','Gender','trim|required');
            $this->form_validation->set_rules('blood_grp','Blood Group','trim|required');
            $this->form_validation->set_rules('address','Address','trim|required|max_length[60]');
            $this->form_validation->set_rules('phone','Phone number','trim|required|max_length[60]');
            $this->form_validation->set_rules('email','Email','trim|required|valid_email');
            $this->form_validation->set_rules('f_name','Father Name','trim|required|max_length[20]');
            $this->form_validation->set_rules('m_name','Mother Name','trim|required|max_length[20]');
            $this->form_validation->set_rules('g_name','Guardian Name','trim|required|max_length[20]');
            $this->form_validation->set_rules('occupation','Father Occupation','trim|required|max_length[20]');
            $this->form_validation->set_rules('city','City','trim|required');
            $this->form_validation->set_rules('state','State','trim|required');
            $this->form_validation->set_rules('country','Country','trim|required');
            $this->form_validation->set_rules('postal_code','Postal Code','trim|required');
            
            if (empty($_FILES['userfile']['name']))
            {
                $this->form_validation->set_rules('userfile','Profile','required');
            }


            if($this->form_validation->run() == false)
            { 
                $this->form_validation->set_message('error', 'This field is required.');
                $page_data['page_name']  = 'student_add';
                $page_data['page_title'] = get_phrase('add_student');
                $this->load->view('backend/index', $page_data);
            }
            else
            {
                 
                $data['name']       = $this->input->post('name');
                $data['birthday']   = $this->input->post('dob');
                $data['sex']        = $this->input->post('gender');
                $data['address']    = $this->input->post('address');
                $data['phone']      = $this->input->post('phone');
                $data['email']      = $this->input->post('email');
                // $data['password']   = $this->input->post('password');
                $data['class_id']   = $this->input->post('class_id');
                if ($this->input->post('section_id') != '') {
                    $data['section_id'] = $this->input->post('section_id');
                }
                // $data['parent_id']  = $this->input->post('parent_id');
                // $data['roll']       = $this->input->post('roll');

                $data['registered_no']    = $this->input->post('regist_no');
                $data['joinDate']     = $this->input->post('joinDate');
                $data['blood_group']  = $this->input->post('blood_grp');
                $data['father_name']  = $this->input->post('f_name');
                $data['mother_name']  = $this->input->post('m_name');
                $data['guardian_name']= $this->input->post('g_name');
                $data['occupation']   = $this->input->post('occupation');
                $data['city']         = $this->input->post('city');
                $data['state']        = $this->input->post('state');
                $data['country']      = $this->input->post('country');
                $data['postal_code']  = $this->input->post('postal_code');
                $data['schoolid']     = $_SESSION['schoolId'];

            

                $this->db->insert('student', $data);
                $student_id = $this->db->insert_id();
                move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/student_image/' . $student_id . '.jpg');
               // $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
                //$this->email_model->account_opening_email('student', $data['email']); //SEND EMAIL ACCOUNT OPENING EMAIL
                //redirect(base_url('admin/student-add') , 'refresh');
            }
        }
        if ($param2 == 'doUpdate') {

            $this->form_validation->set_rules('regist_no','Registration Number','trim|required|max_length[20]');
            $this->form_validation->set_rules('joinDate','Date of Joining','trim|required');
            $this->form_validation->set_rules('name','Name','trim|required|max_length[20]');
            //$this->form_validation->set_rules('parent_id','Parent','trim|required');
            $this->form_validation->set_rules('class_id','Class','required');
            $this->form_validation->set_rules('section_id','Section','required');
            //$this->form_validation->set_rules('roll','Roll number','trim|required|max_length[20]');
            $this->form_validation->set_rules('dob','Date of birth','trim|required');
            $this->form_validation->set_rules('gender','Gender','trim|required');
            $this->form_validation->set_rules('blood_grp','Blood Group','trim|required');
            $this->form_validation->set_rules('address','Address','trim|required|max_length[60]');
            $this->form_validation->set_rules('phone','Phone number','trim|required|max_length[60]');
            $this->form_validation->set_rules('email','Email','trim|required|valid_email');
            $this->form_validation->set_rules('f_name','Father Name','trim|required|max_length[20]');
            $this->form_validation->set_rules('m_name','Mother Name','trim|required|max_length[20]');
            $this->form_validation->set_rules('g_name','Guardian Name','trim|required|max_length[20]');
            $this->form_validation->set_rules('occupation','Father Occupation','trim|required|max_length[20]');
            $this->form_validation->set_rules('city','City','trim|required');
            $this->form_validation->set_rules('state','State','trim|required');
            $this->form_validation->set_rules('country','Country','trim|required');
            $this->form_validation->set_rules('postal_code','Postal Code','trim|required');
            
            // if (empty($_FILES['userfile']['name']))
            // {
            //     $this->form_validation->set_rules('userfile','Profile','required');
            // }


            if($this->form_validation->run() == false)
            { 
                $this->form_validation->set_message('error', 'This field is required.');
               $page_data['param2']        =   $param2;
               $page_data['page_name']  = 'student_edit';
               $page_data['page_title'] = get_phrase('student_edit');
               $this->load->view('backend/index', $page_data);
            }
            else
            { 
                $data['name']       = $this->input->post('name');
                $data['birthday']   = $this->input->post('dob');
                $data['sex']        = $this->input->post('gender');
                $data['address']    = $this->input->post('address');
                $data['phone']      = $this->input->post('phone');
                $data['email']      = $this->input->post('email');
                $data['class_id']    = $this->input->post('class_id');
                $data['section_id']  = $this->input->post('section_id');
                // $data['parent_id']  = $this->input->post('parent_id');
                // $data['roll']       = $this->input->post('roll');

                $data['registered_no']    = $this->input->post('regist_no');
                $data['joinDate']     = $this->input->post('joinDate');
                $data['blood_group']  = $this->input->post('blood_grp');
                $data['father_name']  = $this->input->post('f_name');
                $data['mother_name']  = $this->input->post('m_name');
                $data['guardian_name']= $this->input->post('g_name');
                $data['occupation']   = $this->input->post('occupation');
                $data['city']         = $this->input->post('city');
                $data['state']        = $this->input->post('state');
                $data['country']      = $this->input->post('country');
                $data['postal_code']  = $this->input->post('postal_code');
                $data['schoolid']     = $_SESSION['schoolId'];

                
                
                $this->db->where('student_id', $param3);
                $this->db->update('student', $data);
                move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/student_image/' . $param3 . '.jpg');
                $this->crud_model->clear_cache();
                $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
                redirect(base_url() . 'admin/student_information' , 'refresh'); 
            }
        } 
        
        if ($param2 == 'delete') {
            $this->db->where('student_id', $param3);
            $this->db->delete('student');
            $this->session->set_flashdata('flash_message' , get_phrase('data_deleted'));
            redirect(base_url() . 'admin/student_information/' . $param1, 'refresh');
        }
    } 
    function teachers($param1 = '', $param2 = '', $param3 = ''){
        if ($this->session->userdata('admin_login') != 1)
            redirect('login', 'refresh');
        if ($param1 == 'create') {
         
            $this->form_validation->set_rules('name','Name','trim|required|max_length[20]');
            $this->form_validation->set_rules('class_id','Class','required');
            $this->form_validation->set_rules('section_id','Section','required');
            $this->form_validation->set_rules('gender','Gender','trim|required');
            $this->form_validation->set_rules('dob','Date of birth','trim|required');
            $this->form_validation->set_rules('blood_grp','Blood Group','trim|required');
            $this->form_validation->set_rules('phone','Phone number','trim|required|max_length[60]');
            $this->form_validation->set_rules('email','Email','trim|required|valid_email');
            $this->form_validation->set_rules('f_name','Father Name','trim|required|max_length[20]');
            $this->form_validation->set_rules('m_name','Mother Name','trim|required|max_length[20]');
            $this->form_validation->set_rules('city','City','trim|required');
            $this->form_validation->set_rules('state','State','trim|required');
            $this->form_validation->set_rules('country','Country','trim|required');
            $this->form_validation->set_rules('postal_code','Postal Code','trim|required');
            
            if (empty($_FILES['userfile']['name']))
            {
                $this->form_validation->set_rules('userfile','Profile','required');
            }


            if($this->form_validation->run() == false)
            {    
                $this->form_validation->set_message('error', 'This field is required.');
                $page_data['page_name']  = 'student_add';
                $page_data['page_title'] = get_phrase('add_student');
                $this->load->view('backend/index', $page_data);
            }
            else
            {
                
                $data['name']       = trim($this->input->post('name'));
                $data['class_id']   = trim($this->input->post('class_id'));
                $data['gender']     = trim($this->input->post('gender'));
                $data['birthday']   = trim($this->input->post('dob'));
                $data['blood_group']= trim($this->input->post('blood_grp'));
                $data['email']      = trim($this->input->post('email'));
                $data['phone']      = trim($this->input->post('phone'));
                $data['Father']     = trim($this->input->post('f_name'));
                $data['Mother']     = trim($this->input->post('m_name'));
                $data['City']       = trim($this->input->post('city'));
                $data['State']      = trim($this->input->post('state'));
                $data['country']    = trim($this->input->post('country'));
                $data['postal_code']= trim($this->input->post('postal_code'));

               if ($this->input->post('section_id') != '') {
                    $data['section_id'] = trim($this->input->post('section_id'));
                }
                $data['schoolid']     = $_SESSION['schoolId'];

            
                 
                $this->db->insert('teacher', $data);
                $teacher_id = $this->db->insert_id();
                move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/teacher_img/' . $teacher_id . '.jpg'); 
               // $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
                //$this->email_model->account_opening_email('student', $data['email']); //SEND EMAIL ACCOUNT OPENING EMAIL
                //redirect(base_url('admin/student-add') , 'refresh');
            }
        }
        if ($param2 == 'doUpdate') {

            $this->form_validation->set_rules('regist_no','Registration Number','trim|required|max_length[20]');
            $this->form_validation->set_rules('joinDate','Date of Joining','trim|required');
            $this->form_validation->set_rules('name','Name','trim|required|max_length[20]');
            //$this->form_validation->set_rules('parent_id','Parent','trim|required');
            $this->form_validation->set_rules('class_id','Class','required');
            $this->form_validation->set_rules('section_id','Section','required');
            //$this->form_validation->set_rules('roll','Roll number','trim|required|max_length[20]');
            $this->form_validation->set_rules('dob','Date of birth','trim|required');
            $this->form_validation->set_rules('gender','Gender','trim|required');
            $this->form_validation->set_rules('blood_grp','Blood Group','trim|required');
            $this->form_validation->set_rules('address','Address','trim|required|max_length[60]');
            $this->form_validation->set_rules('phone','Phone number','trim|required|max_length[60]');
            $this->form_validation->set_rules('email','Email','trim|required|valid_email');
            $this->form_validation->set_rules('f_name','Father Name','trim|required|max_length[20]');
            $this->form_validation->set_rules('m_name','Mother Name','trim|required|max_length[20]');
            $this->form_validation->set_rules('g_name','Guardian Name','trim|required|max_length[20]');
            $this->form_validation->set_rules('occupation','Father Occupation','trim|required|max_length[20]');
            $this->form_validation->set_rules('city','City','trim|required');
            $this->form_validation->set_rules('state','State','trim|required');
            $this->form_validation->set_rules('country','Country','trim|required');
            $this->form_validation->set_rules('postal_code','Postal Code','trim|required');
            
            // if (empty($_FILES['userfile']['name']))
            // {
            //     $this->form_validation->set_rules('userfile','Profile','required');
            // }


            if($this->form_validation->run() == false)
            { 
                $this->form_validation->set_message('error', 'This field is required.');
               $page_data['param2']        =   $param2;
               $page_data['page_name']  = 'student_edit';
               $page_data['page_title'] = get_phrase('student_edit');
               $this->load->view('backend/index', $page_data);
            }
            else
            { 
                $data['name']       = $this->input->post('name');
                $data['birthday']   = $this->input->post('dob');
                $data['sex']        = $this->input->post('gender');
                $data['address']    = $this->input->post('address');
                $data['phone']      = $this->input->post('phone');
                $data['email']      = $this->input->post('email');
                $data['class_id']    = $this->input->post('class_id');
                $data['section_id']  = $this->input->post('section_id');
                // $data['parent_id']  = $this->input->post('parent_id');
                // $data['roll']       = $this->input->post('roll');

                $data['registered_no']    = $this->input->post('regist_no');
                $data['joinDate']     = $this->input->post('joinDate');
                $data['blood_group']  = $this->input->post('blood_grp');
                $data['father_name']  = $this->input->post('f_name');
                $data['mother_name']  = $this->input->post('m_name');
                $data['guardian_name']= $this->input->post('g_name');
                $data['occupation']   = $this->input->post('occupation');
                $data['city']         = $this->input->post('city');
                $data['state']        = $this->input->post('state');
                $data['country']      = $this->input->post('country');
                $data['postal_code']  = $this->input->post('postal_code');
                $data['schoolid']     = $_SESSION['schoolId'];

                
                
                $this->db->where('student_id', $param3);
                $this->db->update('student', $data);
                move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/student_image/' . $param3 . '.jpg');
                $this->crud_model->clear_cache();
                $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
                redirect(base_url() . 'admin/student_information' , 'refresh'); 
            }
        } 
        
        if ($param2 == 'delete') {
            $this->db->where('student_id', $param3);
            $this->db->delete('student');
            $this->session->set_flashdata('flash_message' , get_phrase('data_deleted'));
            redirect(base_url() . 'admin/student_information/' . $param1, 'refresh');
        }
    }
     /****MANAGE PARENTS CLASSWISE*****/
    function parent($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect('login', 'refresh');
        if ($param1 == 'create') {
            $data['name']                   = $this->input->post('name');
            $data['email']                  = $this->input->post('email');
            $data['password']               = $this->input->post('password');
            $data['phone']                  = $this->input->post('phone');
            $data['address']                = $this->input->post('address');
            $data['profession']             = $this->input->post('profession');
            $this->db->insert('parent', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
            $this->email_model->account_opening_email('parent', $data['email']); //SEND EMAIL ACCOUNT OPENING EMAIL
            redirect(base_url() . 'admin/parent/', 'refresh');
        }
        if ($param1 == 'edit') {
            $data['name']                   = $this->input->post('name');
            $data['email']                  = $this->input->post('email');
            $data['phone']                  = $this->input->post('phone');
            $data['address']                = $this->input->post('address');
            $data['profession']             = $this->input->post('profession');
            $this->db->where('parent_id' , $param2);
            $this->db->update('parent' , $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'admin/parent/', 'refresh');
        }
        if ($param1 == 'delete') {
            $this->db->where('parent_id' , $param2);
            $this->db->delete('parent');
            $this->session->set_flashdata('flash_message' , get_phrase('data_deleted'));
            redirect(base_url() . 'admin/parent/', 'refresh');
        }
        $page_data['page_title']    = get_phrase('all_parents');
        $page_data['page_name']  = 'parent';
        $this->load->view('backend/index', $page_data);
    }
    
    
    /****MANAGE TEACHERS*****/
    function teacher($param1 = '', $param2 = '', $param3 = '')
    {
        if ($param1 == 'create') {
            $data['name']        = $this->input->post('name');
            $data['birthday']    = $this->input->post('birthday');
            $data['sex']         = $this->input->post('sex');
            $data['address']     = $this->input->post('address');
            $data['phone']       = $this->input->post('phone');
            $data['email']       = $this->input->post('email');
            $data['password']    = $this->input->post('password');
            $this->db->insert('teacher', $data);
            $teacher_id = $this->db->insert_id();
            move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/teacher_image/' . $teacher_id . '.jpg');
            $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
            $this->email_model->account_opening_email('teacher', $data['email']); //SEND EMAIL ACCOUNT OPENING EMAIL
            redirect(base_url() . 'admin/teacher/', 'refresh');
        }
        if ($param1 == 'do_update') {
            $data['name']        = $this->input->post('name');
            $data['birthday']    = $this->input->post('birthday');
            $data['sex']         = $this->input->post('sex');
            $data['address']     = $this->input->post('address');
            $data['phone']       = $this->input->post('phone');
            $data['email']       = $this->input->post('email');
            
            $this->db->where('teacher_id', $param2);
            $this->db->update('teacher', $data);
            move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/teacher_image/' . $param2 . '.jpg');
            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'admin/teacher/', 'refresh');
        } else if ($param1 == 'personal_profile') {
            $page_data['personal_profile']   = true;
            $page_data['current_teacher_id'] = $param2;
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('teacher', array(
                'teacher_id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('teacher_id', $param2);
            $this->db->delete('teacher');
            $this->session->set_flashdata('flash_message' , get_phrase('data_deleted'));
            redirect(base_url() . 'admin/teacher/', 'refresh');
        }
        $page_data['teachers']   = $this->db->get('teacher')->result_array();
        $page_data['page_name']  = 'teacher';
        $page_data['page_title'] = get_phrase('manage_teacher');
        $this->load->view('backend/index', $page_data);
    }
    
    /****MANAGE SUBJECTS*****/
    function subject($param1 = '', $param2 = '' , $param3 = '')
    {
        if ($param1 == 'create') {
            $data['name']       = $this->input->post('name');
            $data['class_id']   = $this->input->post('class_id');
            $data['teacher_id'] = $this->input->post('teacher_id');
            $this->db->insert('subject', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
            redirect(base_url() . 'admin/subject/'.$data['class_id'], 'refresh');
        }
        if ($param1 == 'do_update') {
            $data['name']       = $this->input->post('name');
            $data['class_id']   = $this->input->post('class_id');
            $data['teacher_id'] = $this->input->post('teacher_id');
            
            $this->db->where('subject_id', $param2);
            $this->db->update('subject', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'admin/subject/'.$data['class_id'], 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('subject', array(
                'subject_id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('subject_id', $param2);
            $this->db->delete('subject');
            $this->session->set_flashdata('flash_message' , get_phrase('data_deleted'));
            redirect(base_url() . 'admin/subject/'.$param3, 'refresh');
        }
         $page_data['class_id']   = $param1;
        $page_data['subjects']   = $this->db->get_where('subject' , array('class_id' => $param1))->result_array();
        $page_data['page_name']  = 'subject';
        $page_data['page_title'] = get_phrase('manage_subject');
        $this->load->view('backend/index', $page_data);
    }
    
    /****MANAGE CLASSES*****/
    function classes($param1 = '', $param2 = '')
    {
        if ($param1 == 'create') {
            $data['name']         = $this->input->post('name');
            $data['name_numeric'] = $this->input->post('name_numeric');
            $data['teacher_id']   = $this->input->post('teacher_id');
            $this->db->insert('class', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
            redirect(base_url() . 'admin/classes/', 'refresh');
        }
        if ($param1 == 'do_update') {
            $data['name']         = $this->input->post('name');
            $data['name_numeric'] = $this->input->post('name_numeric');
            $data['teacher_id']   = $this->input->post('teacher_id');
            
            $this->db->where('class_id', $param2);
            $this->db->update('class', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'admin/classes/', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('class', array(
                'class_id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('class_id', $param2);
            $this->db->delete('class');
            $this->session->set_flashdata('flash_message' , get_phrase('data_deleted'));
            redirect(base_url() . 'admin/classes/', 'refresh');
        }
        $page_data['classes']    = $this->db->get('class')->result_array();
        $page_data['page_name']  = 'class';
        $page_data['page_title'] = get_phrase('manage_class');
        $this->load->view('backend/index', $page_data);
    }

    /****MANAGE SECTIONS*****/
    function section($class_id = '')
    {
        // detect the first class
        if ($class_id == '')
            $class_id           =   $this->db->get('class')->first_row()->class_id;

        $page_data['page_name']  = 'section';
        $page_data['page_title'] = get_phrase('manage_sections');
        $page_data['class_id']   = $class_id;
        $this->load->view('backend/index', $page_data);    
    }

    function sections($param1 = '' , $param2 = '')
    {
        if ($param1 == 'create') {
            $data['name']       =   $this->input->post('name');
            $data['nick_name']  =   $this->input->post('nick_name');
            $data['class_id']   =   $this->input->post('class_id');
            $data['teacher_id'] =   $this->input->post('teacher_id');
            $this->db->insert('section' , $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
            redirect(base_url() . 'admin/section/' . $data['class_id'] , 'refresh');
        }

        if ($param1 == 'edit') {
            $data['name']       =   $this->input->post('name');
            $data['nick_name']  =   $this->input->post('nick_name');
            $data['class_id']   =   $this->input->post('class_id');
            $data['teacher_id'] =   $this->input->post('teacher_id');
            $this->db->where('section_id' , $param2);
            $this->db->update('section' , $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'admin/section/' . $data['class_id'] , 'refresh');
        }

        if ($param1 == 'delete') {
            $this->db->where('section_id' , $param2);
            $this->db->delete('section');
            $this->session->set_flashdata('flash_message' , get_phrase('data_deleted'));
            redirect(base_url() . 'admin/section' , 'refresh');
        }
    }

    function get_class_section($class_id)
    {
        $sections = $this->db->get_where('section' , array(
            'class_id' => $class_id
        ))->result_array();
        foreach ($sections as $row) {
            echo '<option value="' . $row['section_id'] . '">' . $row['name'] . '</option>';
        }
    }

    function get_class_subject($class_id)
    {
        $subjects = $this->db->get_where('subject' , array(
            'class_id' => $class_id
        ))->result_array();
        foreach ($subjects as $row) {
            echo '<option value="' . $row['subject_id'] . '">' . $row['name'] . '</option>';
        }
    }

    /****MANAGE EXAMS*****/
    function exam($param1 = '', $param2 = '' , $param3 = '')
    {
        if ($param1 == 'create') {
            $data['name']    = $this->input->post('name');
            $data['date']    = $this->input->post('date');
            $data['comment'] = $this->input->post('comment');
            $this->db->insert('exam', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
            redirect(base_url() . 'admin/exam/', 'refresh');
        }
        if ($param1 == 'edit' && $param2 == 'do_update') {
            $data['name']    = $this->input->post('name');
            $data['date']    = $this->input->post('date');
            $data['comment'] = $this->input->post('comment');
            
            $this->db->where('exam_id', $param3);
            $this->db->update('exam', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'admin/exam/', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('exam', array(
                'exam_id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('exam_id', $param2);
            $this->db->delete('exam');
            $this->session->set_flashdata('flash_message' , get_phrase('data_deleted'));
            redirect(base_url() . 'admin/exam/', 'refresh');
        }
        $page_data['exams']      = $this->db->get('exam')->result_array();
        $page_data['page_name']  = 'exam';
        $page_data['page_title'] = get_phrase('manage_exam');
        $this->load->view('backend/index', $page_data);
    }

    /****** SEND EXAM MARKS VIA SMS ********/
    function exam_marks_sms($param1 = '' , $param2 = '')
    {

        if ($param1 == 'send_sms') {

            $exam_id    =   $this->input->post('exam_id');
            $class_id   =   $this->input->post('class_id');
            $receiver   =   $this->input->post('receiver');

            // get all the students of the selected class
            $students = $this->db->get_where('student' , array(
                'class_id' => $class_id
            ))->result_array();
            // get the marks of the student for selected exam
            foreach ($students as $row) {
                if ($receiver == 'student')
                    $receiver_phone = $row['phone'];
                if ($receiver == 'parent' && $row['parent_id'] != '') 
                    $receiver_phone = $this->db->get_where('parent' , array('parent_id' => $row['parent_id']))->row()->phone;
                

                $this->db->where('exam_id' , $exam_id);
                $this->db->where('student_id' , $row['student_id']);
                $marks = $this->db->get('mark')->result_array();
                $message = '';
                foreach ($marks as $row2) {
                    $subject       = $this->db->get_where('subject' , array('subject_id' => $row2['subject_id']))->row()->name;
                    $mark_obtained = $row2['mark_obtained'];  
                    $message      .= $row2['student_id'] . $subject . ' : ' . $mark_obtained . ' , ';
                    
                }
                // send sms
                $this->sms_model->send_sms( $message , $receiver_phone );
            }
            $this->session->set_flashdata('flash_message' , get_phrase('message_sent'));
            redirect(base_url() . 'admin/exam_marks_sms' , 'refresh');
        }
                
        $page_data['page_name']  = 'exam_marks_sms';
        $page_data['page_title'] = get_phrase('send_marks_by_sms');
        $this->load->view('backend/index', $page_data);
    }

    /****MANAGE EXAM MARKS*****/
    function marks($exam_id = '', $class_id = '', $subject_id = '')
    {
        
        if ($this->input->post('operation') == 'selection') {
            $page_data['exam_id']    = $this->input->post('exam_id');
            $page_data['class_id']   = $this->input->post('class_id');
            $page_data['subject_id'] = $this->input->post('subject_id');
            
            if ($page_data['exam_id'] > 0 && $page_data['class_id'] > 0 && $page_data['subject_id'] > 0) {
                redirect(base_url() . 'admin/marks/' . $page_data['exam_id'] . '/' . $page_data['class_id'] . '/' . $page_data['subject_id'], 'refresh');
            } else {
                $this->session->set_flashdata('mark_message', 'Choose exam, class and subject');
                redirect(base_url() . 'admin/marks/', 'refresh');
            }
        }
        if ($this->input->post('operation') == 'update') {
            $data['mark_obtained'] = $this->input->post('mark_obtained');
            $data['comment']       = $this->input->post('comment');
            
            $this->db->where('mark_id', $this->input->post('mark_id'));
            $this->db->update('mark', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'admin/marks/' . $this->input->post('exam_id') . '/' . $this->input->post('class_id') . '/' . $this->input->post('subject_id'), 'refresh');
        }
        $page_data['exam_id']    = $exam_id;
        $page_data['class_id']   = $class_id;
        $page_data['subject_id'] = $subject_id;
        
        $page_data['page_info'] = 'Exam marks';
        
        $page_data['page_name']  = 'marks';
        $page_data['page_title'] = get_phrase('manage_exam_marks');
        $this->load->view('backend/index', $page_data);
    }
    
    
    /****MANAGE GRADES*****/
    function grade($param1 = '', $param2 = '')
    {
        if ($param1 == 'create') {
            $data['name']        = $this->input->post('name');
            $data['grade_point'] = $this->input->post('grade_point');
            $data['mark_from']   = $this->input->post('mark_from');
            $data['mark_upto']   = $this->input->post('mark_upto');
            $data['comment']     = $this->input->post('comment');
            $this->db->insert('grade', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
            redirect(base_url() . 'admin/grade/', 'refresh');
        }
        if ($param1 == 'do_update') {
            $data['name']        = $this->input->post('name');
            $data['grade_point'] = $this->input->post('grade_point');
            $data['mark_from']   = $this->input->post('mark_from');
            $data['mark_upto']   = $this->input->post('mark_upto');
            $data['comment']     = $this->input->post('comment');
            
            $this->db->where('grade_id', $param2);
            $this->db->update('grade', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'admin/grade/', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('grade', array(
                'grade_id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('grade_id', $param2);
            $this->db->delete('grade');
            $this->session->set_flashdata('flash_message' , get_phrase('data_deleted'));
            redirect(base_url() . 'admin/grade/', 'refresh');
        }
        $page_data['grades']     = $this->db->get('grade')->result_array();
        $page_data['page_name']  = 'grade';
        $page_data['page_title'] = get_phrase('manage_grade');
        $this->load->view('backend/index', $page_data);
    }
    
    /**********MANAGING CLASS ROUTINE******************/
    function class_routine($param1 = '', $param2 = '', $param3 = '')
    {
        if ($param1 == 'create') {
            $data['class_id']   = $this->input->post('class_id');
            $data['subject_id'] = $this->input->post('subject_id');
            $data['time_start'] = $this->input->post('time_start') + (12 * ($this->input->post('starting_ampm') - 1));
            $data['time_end']   = $this->input->post('time_end') + (12 * ($this->input->post('ending_ampm') - 1));
            $data['day']        = $this->input->post('day');
            $this->db->insert('class_routine', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
            redirect(base_url() . 'admin/class_routine/', 'refresh');
        }
        if ($param1 == 'do_update') {
            $data['class_id']   = $this->input->post('class_id');
            $data['subject_id'] = $this->input->post('subject_id');
            $data['time_start'] = $this->input->post('time_start') + (12 * ($this->input->post('starting_ampm') - 1));
            $data['time_end']   = $this->input->post('time_end') + (12 * ($this->input->post('ending_ampm') - 1));
            $data['day']        = $this->input->post('day');
            
            $this->db->where('class_routine_id', $param2);
            $this->db->update('class_routine', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'admin/class_routine/', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('class_routine', array(
                'class_routine_id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('class_routine_id', $param2);
            $this->db->delete('class_routine');
            $this->session->set_flashdata('flash_message' , get_phrase('data_deleted'));
            redirect(base_url() . 'admin/class_routine/', 'refresh');
        }
        $page_data['page_name']  = 'class_routine';
        $page_data['page_title'] = get_phrase('manage_class_routine');
        $this->load->view('backend/index', $page_data);
    }
    
    /****** DAILY ATTENDANCE *****************/
    function manage_attendance($date='',$month='',$year='',$class_id='')
    {
        if($this->session->userdata('admin_login')!=1)redirect('login' , 'refresh');
        
        if($_POST)
        {
            // Loop all the students of $class_id
            $students   =   $this->db->get_where('student', array('class_id' => $class_id))->result_array();
            foreach ($students as $row)
            {
                $attendance_status  =   $this->input->post('status_' . $row['student_id']);

                $this->db->where('student_id' , $row['student_id']);
                $this->db->where('date' , $this->input->post('date'));

                $this->db->update('attendance' , array('status' => $attendance_status));
            }

            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'admin/manage_attendance/'.$date.'/'.$month.'/'.$year.'/'.$class_id , 'refresh');
        }
        $page_data['date']     =    $date;
        $page_data['month']    =    $month;
        $page_data['year']     =    $year;
        $page_data['class_id'] =    $class_id;
        
        $page_data['page_name']  =  'manage_attendance';
        $page_data['page_title'] =  get_phrase('manage_daily_attendance');
        $this->load->view('backend/index', $page_data);
    }
    function attendance_selector()
    {
        redirect(base_url() . 'admin/manage_attendance/'.$this->input->post('date').'/'.
                    $this->input->post('month').'/'.
                        $this->input->post('year').'/'.
                            $this->input->post('class_id') , 'refresh');
    }
    /******MANAGE BILLING / INVOICES WITH STATUS*****/
    function invoice($param1 = '', $param2 = '', $param3 = '')
    {
        
        if ($param1 == 'create') {
            $data['student_id']         = $this->input->post('student_id');
            $data['title']              = $this->input->post('title');
            $data['description']        = $this->input->post('description');
            $data['amount']             = $this->input->post('amount');
            $data['amount_paid']        = $this->input->post('amount_paid');
            $data['due']                = $data['amount'] - $data['amount_paid'];
            $data['status']             = $this->input->post('status');
            $data['creation_timestamp'] = strtotime($this->input->post('date'));
            
            $this->db->insert('invoice', $data);
            $invoice_id = $this->db->insert_id();

            $data2['invoice_id']        =   $invoice_id;
            $data2['student_id']        =   $this->input->post('student_id');
            $data2['title']             =   $this->input->post('title');
            $data2['description']       =   $this->input->post('description');
            $data2['payment_type']      =  'income';
            $data2['method']            =   $this->input->post('method');
            $data2['amount']            =   $this->input->post('amount_paid');
            $data2['timestamp']         =   strtotime($this->input->post('date'));

            $this->db->insert('payment' , $data2);

            $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
            redirect(base_url() . 'admin/invoice', 'refresh');
        }
        if ($param1 == 'do_update') {
            $data['student_id']         = $this->input->post('student_id');
            $data['title']              = $this->input->post('title');
            $data['description']        = $this->input->post('description');
            $data['amount']             = $this->input->post('amount');
            $data['status']             = $this->input->post('status');
            $data['creation_timestamp'] = strtotime($this->input->post('date'));
            
            $this->db->where('invoice_id', $param2);
            $this->db->update('invoice', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'admin/invoice', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('invoice', array(
                'invoice_id' => $param2
            ))->result_array();
        }
        if ($param1 == 'take_payment') {
            $data['invoice_id']   =   $this->input->post('invoice_id');
            $data['student_id']   =   $this->input->post('student_id');
            $data['title']        =   $this->input->post('title');
            $data['description']  =   $this->input->post('description');
            $data['payment_type'] =   'income';
            $data['method']       =   $this->input->post('method');
            $data['amount']       =   $this->input->post('amount');
            $data['timestamp']    =   strtotime($this->input->post('timestamp'));
            $this->db->insert('payment' , $data);

            $data2['amount_paid']   =   $this->input->post('amount');
            $this->db->where('invoice_id' , $param2);
            $this->db->set('amount_paid', 'amount_paid + ' . $data2['amount_paid'], FALSE);
            $this->db->set('due', 'due - ' . $data2['amount_paid'], FALSE);
            $this->db->update('invoice');

            $this->session->set_flashdata('flash_message' , get_phrase('payment_successfull'));
            redirect(base_url() . 'admin/invoice', 'refresh');
        }

        if ($param1 == 'delete') {
            $this->db->where('invoice_id', $param2);
            $this->db->delete('invoice');
            $this->session->set_flashdata('flash_message' , get_phrase('data_deleted'));
            redirect(base_url() . 'admin/invoice', 'refresh');
        }
        $page_data['page_name']  = 'invoice';
        $page_data['page_title'] = get_phrase('manage_invoice/payment');
        $this->db->order_by('creation_timestamp', 'desc');
        $page_data['invoices'] = $this->db->get('invoice')->result_array();
        $this->load->view('backend/index', $page_data);
    }

    /**********ACCOUNTING********************/
    function income($param1 = '' , $param2 = '')
    {
       if ($this->session->userdata('admin_login') != 1)
            redirect('login', 'refresh');
        $page_data['page_name']  = 'income';
        $page_data['page_title'] = get_phrase('incomes');
        $this->db->order_by('creation_timestamp', 'desc');
        $page_data['invoices'] = $this->db->get('invoice')->result_array();
        $this->load->view('backend/index', $page_data); 
    }

    function expense($param1 = '' , $param2 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect('login', 'refresh');
        if ($param1 == 'create') {
            $data['title']               =   $this->input->post('title');
            $data['expense_category_id'] =   $this->input->post('expense_category_id');
            $data['description']         =   $this->input->post('description');
            $data['payment_type']        =   'expense';
            $data['method']              =   $this->input->post('method');
            $data['amount']              =   $this->input->post('amount');
            $data['timestamp']           =   strtotime($this->input->post('timestamp'));
            $this->db->insert('payment' , $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
            redirect(base_url() . 'admin/expense', 'refresh');
        }

        if ($param1 == 'edit') {
            $data['title']               =   $this->input->post('title');
            $data['expense_category_id'] =   $this->input->post('expense_category_id');
            $data['description']         =   $this->input->post('description');
            $data['payment_type']        =   'expense';
            $data['method']              =   $this->input->post('method');
            $data['amount']              =   $this->input->post('amount');
            $data['timestamp']           =   strtotime($this->input->post('timestamp'));
            $this->db->where('payment_id' , $param2);
            $this->db->update('payment' , $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'admin/expense', 'refresh');
        }

        if ($param1 == 'delete') {
            $this->db->where('payment_id' , $param2);
            $this->db->delete('payment');
            $this->session->set_flashdata('flash_message' , get_phrase('data_deleted'));
            redirect(base_url() . 'admin/expense', 'refresh');
        }

        $page_data['page_name']  = 'expense';
        $page_data['page_title'] = get_phrase('expenses');
        $this->load->view('backend/index', $page_data); 
    }

    function expense_category($param1 = '' , $param2 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect('login', 'refresh');
        if ($param1 == 'create') {
            $data['name']   =   $this->input->post('name');
            $this->db->insert('expense_category' , $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
            redirect(base_url() . 'admin/expense_category');
        }
        if ($param1 == 'edit') {
            $data['name']   =   $this->input->post('name');
            $this->db->where('expense_category_id' , $param2);
            $this->db->update('expense_category' , $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'admin/expense_category');
        }
        if ($param1 == 'delete') {
            $this->db->where('expense_category_id' , $param2);
            $this->db->delete('expense_category');
            $this->session->set_flashdata('flash_message' , get_phrase('data_deleted'));
            redirect(base_url() . 'admin/expense_category');
        }

        $page_data['page_name']  = 'expense_category';
        $page_data['page_title'] = get_phrase('expense_category');
        $this->load->view('backend/index', $page_data);
    }

    /**********MANAGE LIBRARY / BOOKS********************/
    function book($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect('login', 'refresh');
        if ($param1 == 'create') {
            $data['name']        = $this->input->post('name');
            $data['description'] = $this->input->post('description');
            $data['price']       = $this->input->post('price');
            $data['author']      = $this->input->post('author');
            $data['class_id']    = $this->input->post('class_id');
            $data['status']      = $this->input->post('status');
            $this->db->insert('book', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
            redirect(base_url() . 'admin/book', 'refresh');
        }
        if ($param1 == 'do_update') {
            $data['name']        = $this->input->post('name');
            $data['description'] = $this->input->post('description');
            $data['price']       = $this->input->post('price');
            $data['author']      = $this->input->post('author');
            $data['class_id']    = $this->input->post('class_id');
            $data['status']      = $this->input->post('status');
            
            $this->db->where('book_id', $param2);
            $this->db->update('book', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'admin/book', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('book', array(
                'book_id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('book_id', $param2);
            $this->db->delete('book');
            $this->session->set_flashdata('flash_message' , get_phrase('data_deleted'));
            redirect(base_url() . 'admin/book', 'refresh');
        }
        $page_data['books']      = $this->db->get('book')->result_array();
        $page_data['page_name']  = 'book';
        $page_data['page_title'] = get_phrase('manage_library_books');
        $this->load->view('backend/index', $page_data);
        
    }
    /**********MANAGE TRANSPORT / VEHICLES / ROUTES********************/
    function transport($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect('login', 'refresh');
        if ($param1 == 'create') {
            $data['route_name']        = $this->input->post('route_name');
            $data['number_of_vehicle'] = $this->input->post('number_of_vehicle');
            $data['description']       = $this->input->post('description');
            $data['route_fare']        = $this->input->post('route_fare');
            $this->db->insert('transport', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
            redirect(base_url() . 'admin/transport', 'refresh');
        }
        if ($param1 == 'do_update') {
            $data['route_name']        = $this->input->post('route_name');
            $data['number_of_vehicle'] = $this->input->post('number_of_vehicle');
            $data['description']       = $this->input->post('description');
            $data['route_fare']        = $this->input->post('route_fare');
            
            $this->db->where('transport_id', $param2);
            $this->db->update('transport', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'admin/transport', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('transport', array(
                'transport_id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('transport_id', $param2);
            $this->db->delete('transport');
            $this->session->set_flashdata('flash_message' , get_phrase('data_deleted'));
            redirect(base_url() . 'admin/transport', 'refresh');
        }
        $page_data['transports'] = $this->db->get('transport')->result_array();
        $page_data['page_name']  = 'transport';
        $page_data['page_title'] = get_phrase('manage_transport');
        $this->load->view('backend/index', $page_data);
        
    }
    /**********MANAGE DORMITORY / HOSTELS / ROOMS ********************/
    function dormitory($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect('login', 'refresh');
        if ($param1 == 'create') {
            $data['name']           = $this->input->post('name');
            $data['number_of_room'] = $this->input->post('number_of_room');
            $data['description']    = $this->input->post('description');
            $this->db->insert('dormitory', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
            redirect(base_url() . 'admin/dormitory', 'refresh');
        }
        if ($param1 == 'do_update') {
            $data['name']           = $this->input->post('name');
            $data['number_of_room'] = $this->input->post('number_of_room');
            $data['description']    = $this->input->post('description');
            
            $this->db->where('dormitory_id', $param2);
            $this->db->update('dormitory', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'admin/dormitory', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('dormitory', array(
                'dormitory_id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('dormitory_id', $param2);
            $this->db->delete('dormitory');
            $this->session->set_flashdata('flash_message' , get_phrase('data_deleted'));
            redirect(base_url() . 'admin/dormitory', 'refresh');
        }
        $page_data['dormitories'] = $this->db->get('dormitory')->result_array();
        $page_data['page_name']   = 'dormitory';
        $page_data['page_title']  = get_phrase('manage_dormitory');
        $this->load->view('backend/index', $page_data);
        
    }
    
    /***MANAGE EVENT / NOTICEBOARD, WILL BE SEEN BY ALL ACCOUNTS DASHBOARD**/
    function noticeboard($param1 = '', $param2 = '', $param3 = '')
    {
        
        if ($param1 == 'create') {
            $data['notice_title']     = $this->input->post('notice_title');
            $data['notice']           = $this->input->post('notice');
            $data['create_timestamp'] = strtotime($this->input->post('create_timestamp'));
            $this->db->insert('noticeboard', $data);

            $check_sms_send = $this->input->post('check_sms');

            if ($check_sms_send == 1) {
                // sms sending configurations

                $parents  = $this->db->get('parent')->result_array();
                $students = $this->db->get('student')->result_array();
                $teachers = $this->db->get('teacher')->result_array();
                $date     = $this->input->post('create_timestamp');
                $message  = $data['notice_title'] . ' ';
                $message .= get_phrase('on') . ' ' . $date;
                foreach($parents as $row) {
                    $reciever_phone = $row['phone'];
                    $this->sms_model->send_sms($message , $reciever_phone);
                }
                foreach($students as $row) {
                    $reciever_phone = $row['phone'];
                    $this->sms_model->send_sms($message , $reciever_phone);
                }
                foreach($teachers as $row) {
                    $reciever_phone = $row['phone'];
                    $this->sms_model->send_sms($message , $reciever_phone);
                }
            }

            $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
            redirect(base_url() . 'admin/noticeboard/', 'refresh');
        }
        if ($param1 == 'do_update') {
            $data['notice_title']     = $this->input->post('notice_title');
            $data['notice']           = $this->input->post('notice');
            $data['create_timestamp'] = strtotime($this->input->post('create_timestamp'));
            $this->db->where('notice_id', $param2);
            $this->db->update('noticeboard', $data);

            $check_sms_send = $this->input->post('check_sms');

            if ($check_sms_send == 1) {
                // sms sending configurations

                $parents  = $this->db->get('parent')->result_array();
                $students = $this->db->get('student')->result_array();
                $teachers = $this->db->get('teacher')->result_array();
                $date     = $this->input->post('create_timestamp');
                $message  = $data['notice_title'] . ' ';
                $message .= get_phrase('on') . ' ' . $date;
                foreach($parents as $row) {
                    $reciever_phone = $row['phone'];
                    $this->sms_model->send_sms($message , $reciever_phone);
                }
                foreach($students as $row) {
                    $reciever_phone = $row['phone'];
                    $this->sms_model->send_sms($message , $reciever_phone);
                }
                foreach($teachers as $row) {
                    $reciever_phone = $row['phone'];
                    $this->sms_model->send_sms($message , $reciever_phone);
                }
            }

            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'admin/noticeboard/', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('noticeboard', array(
                'notice_id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('notice_id', $param2);
            $this->db->delete('noticeboard');
            $this->session->set_flashdata('flash_message' , get_phrase('data_deleted'));
            redirect(base_url() . 'admin/noticeboard/', 'refresh');
        }
        $page_data['page_name']  = 'noticeboard';
        $page_data['page_title'] = get_phrase('manage_noticeboard');
        $page_data['notices']    = $this->db->get('noticeboard')->result_array();
        $this->load->view('backend/index', $page_data);
    }
    
    /* private messaging */

    function message($param1 = 'message_home', $param2 = '', $param3 = '') {

        if ($param1 == 'send_new') {
            $message_thread_code = $this->crud_model->send_new_private_message();
            $this->session->set_flashdata('flash_message', get_phrase('message_sent!'));
            redirect(base_url() . 'admin/message/message_read/' . $message_thread_code, 'refresh');
        }

        if ($param1 == 'send_reply') {
            $this->crud_model->send_reply_message($param2);  //$param2 = message_thread_code
            $this->session->set_flashdata('flash_message', get_phrase('message_sent!'));
            redirect(base_url() . 'admin/message/message_read/' . $param2, 'refresh');
        }

        if ($param1 == 'message_read') {
            $page_data['current_message_thread_code'] = $param2;  // $param2 = message_thread_code
            $this->crud_model->mark_thread_messages_read($param2);
        }

        $page_data['message_inner_page_name']   = $param1;
        $page_data['page_name']                 = 'message';
        $page_data['page_title']                = get_phrase('private_messaging');
        $this->load->view('backend/index', $page_data);
    }
    
    /*****SITE/SYSTEM SETTINGS*********/
    function system_settings($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url() . 'login', 'refresh');
        
        if ($param1 == 'do_update') {
            /* 
            $data['description'] = $this->input->post('system_name');
            $this->db->where('type' , 'system_name');
            $this->db->update('settings' , $data);

            $data['description'] = $this->input->post('system_title');
            $this->db->where('type' , 'system_title');
            $this->db->update('settings' , $data);

            $data['description'] = $this->input->post('address');
            $this->db->where('type' , 'address');
            $this->db->update('settings' , $data);

            $data['description'] = $this->input->post('phone');
            $this->db->where('type' , 'phone');
            $this->db->update('settings' , $data);

            $data['description'] = $this->input->post('paypal_email');
            $this->db->where('type' , 'paypal_email');
            $this->db->update('settings' , $data);

            $data['description'] = $this->input->post('currency');
            $this->db->where('type' , 'currency');
            $this->db->update('settings' , $data);

            $data['description'] = $this->input->post('system_email');
            $this->db->where('type' , 'system_email');
            $this->db->update('settings' , $data);

            $data['description'] = $this->input->post('system_name');
            $this->db->where('type' , 'system_name');
            $this->db->update('settings' , $data);

            $data['description'] = $this->input->post('language');
            $this->db->where('type' , 'language');
            $this->db->update('settings' , $data);

            $data['description'] = $this->input->post('text_align');
            $this->db->where('type' , 'text_align');
            $this->db->update('settings' , $data);

            $data['description'] = $this->input->post('session');
            $this->db->where('type' , 'session');
            $this->db->update('settings' , $data);
            
            $this->session->set_flashdata('flash_message' , get_phrase('data_updated')); 
            redirect(base_url() . 'admin/system_settings/', 'refresh');*/
        }
        if ($param1 == 'upload_logo') {
            move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/logo.png');
            $this->session->set_flashdata('flash_message', get_phrase('settings_updated'));
            redirect(base_url() . 'admin/system_settings/', 'refresh');
        }
        if ($param1 == 'change_skin') {
            $data['description'] = $param2;
            $this->db->where('type' , 'skin_colour');
            $this->db->update('settings' , $data);
            $this->session->set_flashdata('flash_message' , get_phrase('theme_selected')); 
            redirect(base_url() . 'admin/system_settings/', 'refresh'); 
        }
        $page_data['page_name']  = 'system_settings';
        $page_data['page_title'] = get_phrase('system_settings');
        $page_data['settings']   = $this->db->get('settings')->result_array();
        $this->load->view('backend/index', $page_data);
    }

    /*****SMS SETTINGS*********/
    function sms_settings($param1 = '' , $param2 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url() . 'login', 'refresh');
        if ($param1 == 'clickatell') {

            $data['description'] = $this->input->post('clickatell_user');
            $this->db->where('type' , 'clickatell_user');
            $this->db->update('settings' , $data);

            $data['description'] = $this->input->post('clickatell_password');
            $this->db->where('type' , 'clickatell_password');
            $this->db->update('settings' , $data);

            $data['description'] = $this->input->post('clickatell_api_id');
            $this->db->where('type' , 'clickatell_api_id');
            $this->db->update('settings' , $data);

            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'admin/sms_settings/', 'refresh');
        }

        if ($param1 == 'twilio') {

            $data['description'] = $this->input->post('twilio_account_sid');
            $this->db->where('type' , 'twilio_account_sid');
            $this->db->update('settings' , $data);

            $data['description'] = $this->input->post('twilio_auth_token');
            $this->db->where('type' , 'twilio_auth_token');
            $this->db->update('settings' , $data);

            $data['description'] = $this->input->post('twilio_sender_phone_number');
            $this->db->where('type' , 'twilio_sender_phone_number');
            $this->db->update('settings' , $data);

            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'admin/sms_settings/', 'refresh');
        }

        if ($param1 == 'active_service') {

            $data['description'] = $this->input->post('active_sms_service');
            $this->db->where('type' , 'active_sms_service');
            $this->db->update('settings' , $data);

            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'admin/sms_settings/', 'refresh');
        }

        $page_data['page_name']  = 'sms_settings';
        $page_data['page_title'] = get_phrase('sms_settings');
        $page_data['settings']   = $this->db->get('settings')->result_array();
        $this->load->view('backend/index', $page_data);
    }
    
    /*****LANGUAGE SETTINGS*********/
    function manage_language($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url() . 'login', 'refresh');
        
        if ($param1 == 'edit_phrase') {
            $page_data['edit_profile']  = $param2;  
        }
        if ($param1 == 'update_phrase') {
            $language   =   $param2;
            $total_phrase   =   $this->input->post('total_phrase');
            for($i = 1 ; $i < $total_phrase ; $i++)
            {
                //$data[$language]  =   $this->input->post('phrase').$i;
                $this->db->where('phrase_id' , $i);
                $this->db->update('language' , array($language => $this->input->post('phrase'.$i)));
            }
            redirect(base_url() . 'admin/manage_language/edit_phrase/'.$language, 'refresh');
        }
        if ($param1 == 'do_update') {
            $language        = $this->input->post('language');
            $data[$language] = $this->input->post('phrase');
            $this->db->where('phrase_id', $param2);
            $this->db->update('language', $data);
            $this->session->set_flashdata('flash_message', get_phrase('settings_updated'));
            redirect(base_url() . 'admin/manage_language/', 'refresh');
        }
        if ($param1 == 'add_phrase') {
            $data['phrase'] = $this->input->post('phrase');
            $this->db->insert('language', $data);
            $this->session->set_flashdata('flash_message', get_phrase('settings_updated'));
            redirect(base_url() . 'admin/manage_language/', 'refresh');
        }
        if ($param1 == 'add_language') {
            $language = $this->input->post('language');
            $this->load->dbforge();
            $fields = array(
                $language => array(
                    'type' => 'LONGTEXT'
                )
            );
            $this->dbforge->add_column('language', $fields);
            
            $this->session->set_flashdata('flash_message', get_phrase('settings_updated'));
            redirect(base_url() . 'admin/manage_language/', 'refresh');
        }
        if ($param1 == 'delete_language') {
            $language = $param2;
            $this->load->dbforge();
            $this->dbforge->drop_column('language', $language);
            $this->session->set_flashdata('flash_message', get_phrase('settings_updated'));
            
            redirect(base_url() . 'admin/manage_language/', 'refresh');
        }
        $page_data['page_name']        = 'manage_language';
        $page_data['page_title']       = get_phrase('manage_language');
        //$page_data['language_phrases'] = $this->db->get('language')->result_array();
        $this->load->view('backend/index', $page_data); 
    }
    
    /*****BACKUP / RESTORE / DELETE DATA PAGE**********/
    function backup_restore($operation = '', $type = '')
    {
        
        if ($operation == 'create') {
            $this->crud_model->create_backup($type);
        }
        if ($operation == 'restore') {
            $this->crud_model->restore_backup();
            $this->session->set_flashdata('backup_message', 'Backup Restored');
            redirect(base_url() . 'admin/backup_restore/', 'refresh');
        }
        if ($operation == 'delete') {
            $this->crud_model->truncate($type);
            $this->session->set_flashdata('backup_message', 'Data removed');
            redirect(base_url() . 'admin/backup_restore/', 'refresh');
        }
        
        $page_data['page_info']  = 'Create backup / restore from backup';
        $page_data['page_name']  = 'backup_restore';
        $page_data['page_title'] = get_phrase('manage_backup_restore');
        $this->load->view('backend/index', $page_data);
    }
    
    /******MANAGE OWN PROFILE AND CHANGE PASSWORD***/
    function manage_profile($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url() . 'login', 'refresh');
        if ($param1 == 'update_profile_info') {
            $data['name']  = $this->input->post('name');
            $data['email'] = $this->input->post('email');
            
            $this->db->where('admin_id', $this->session->userdata('admin_id'));
            $this->db->update('admin', $data);
            move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/admin_image/' . $this->session->userdata('admin_id') . '.jpg');
            $this->session->set_flashdata('flash_message', get_phrase('account_updated'));
            redirect(base_url() . 'admin/manage_profile/', 'refresh');
        }
        if ($param1 == 'change_password') {
            $data['password']             = $this->input->post('password');
            $data['new_password']         = $this->input->post('new_password');
            $data['confirm_new_password'] = $this->input->post('confirm_new_password');
            
            $current_password = $this->db->get_where('admin', array(
                'admin_id' => $this->session->userdata('admin_id')
            ))->row()->password;
            if ($current_password == $data['password'] && $data['new_password'] == $data['confirm_new_password']) {
                $this->db->where('admin_id', $this->session->userdata('admin_id'));
                $this->db->update('admin', array(
                    'password' => $data['new_password']
                ));
                $this->session->set_flashdata('flash_message', get_phrase('password_updated'));
            } else {
                $this->session->set_flashdata('flash_message', get_phrase('password_mismatch'));
            }
            redirect(base_url() . 'admin/manage_profile/', 'refresh');
        }
        $page_data['page_name']  = 'manage_profile';
        $page_data['page_title'] = get_phrase('manage_profile');
        $page_data['edit_data']  = $this->db->get_where('admin', array(
            'admin_id' => $this->session->userdata('admin_id')
        ))->result_array();
        $this->load->view('backend/index', $page_data);
    }
    
}
