<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// $this->load->model('User');

class Ticket extends CI_Controller{

   
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Sale_model');
        //$this->load->model('Employee_model');
        $this->load->model('Users_model');
       
    }

    public function index(){
        
        if($this->Users_model->check_token())
        {
            $this->load->view('conten/manage/view_Ticket');
        }
        
    }

    function fetch_data(){  
      
        if($this->Users_model->check_token())
        {
                $fetch_data = $this->Sale_model->make_datatables();  
                $data = array();  

                if($this->Sale_model->get_all_data() > 0){

                    foreach($fetch_data as $row)  
                    {  
                    $sub_array = array();  
                    $sub_array[] = $row->sel_id;   
                    $sub_array[] =  date("d/m/Y", strtotime($row->Date_random)); 
                    $sub_array[] = date("d/m/Y", strtotime($row->sel_date));   
                    $sub_array[] = $row->emp_fname.' '. $row->emp_lname;
                    $sub_array[] = $row->status;   
                    
                    
                        if($row->status=="Normal"){

                            $sub_array[] = '<a href="#" id="'.$row->sel_id.'" class="btn btn-pill btn-primary update_data" data-toggle="tooltip" title="Close"> ຍົກເລີກໃບບິນ </a> 
                                        '; 

                        }else{
                            $sub_array[] = 'ຜູ້ຍົກເລີກ '.$row->user_update;
                        }
                    
                    
                    $data[] = $sub_array;  
                    } 

                }else{

                    $sub_array = array();  
                    $sub_array[] = '';   
                    $sub_array[] = '';  
                    $sub_array[] = '';  
                    $sub_array[] = '';   
                    $sub_array[] = '';  
                    $sub_array[] = ''; 
                
                    
                
                    $data[] = $sub_array;  


                }
                
                $output = array(  
                    "draw"                    =>     intval($_POST["draw"]),  
                    "recordsTotal"          =>      $this->Sale_model->get_all_data(),  
                    "recordsFiltered"     =>     $this->Sale_model->get_filtered_data(),  
                    "data"                    =>     $data  
                );  
                echo json_encode($output); 
        } 
   } 

    public function update_data(){

        if($this->Users_model->check_token())
        {
        
            $user = $this->Users_model->get_username();
            $id = $_POST["ticket_id"];
            $data = array(         
                'status' =>  'Cancel',
                'user_update' =>  $user,
                );
                    
            if($this->Sale_model->Edit_data($data,$id)){
                $myObj = array(
                    'status' => 'ok',
                    'msg' =>  'ຍົກເລີກໃບບິນສຳເລັດ...'
                    );
                echo json_encode($myObj);
            }else{
                $myObj = array(
                    'status' => 'on',
                    'msg' =>  'ຍົກເລີກໃບບິນບໍ່ສຳເລັດ...'
                    );
            }
        }


    }



   

  
   


   
}

?>