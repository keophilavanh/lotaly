<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// $this->load->model('User');

class Periods extends CI_Controller{

   
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Periods_model');
        //$this->load->model('Employee_model');
        $this->load->model('Users_model');
       
    }

    public function index(){
        
        if($this->Users_model->check_token())
        {
            $this->load->view('conten/manage/view_Periods');
        }
        
    }

    function fetch_data(){  

        if($this->Users_model->check_token())
        {
      
            $this->load->model("Periods_model");  
            $fetch_data = $this->Periods_model->make_datatables();  
            $data = array();  

            if($this->Periods_model->get_all_data() > 0){

                foreach($fetch_data as $row)  
                {  
                $sub_array = array();  
                $sub_array[] = $row->periods_id;   
                $sub_array[] = date("d/m/Y", strtotime($row->Date_random));  
                $sub_array[] = $row->Date_start;   
                $sub_array[] = $row->user_start;
                $sub_array[] = $row->Date_end;   
                $sub_array[] = $row->user_end;
                
                    if($row->status=="Open"){

                        $sub_array[] = '<a href="#" id="'.$row->periods_id.'" class="btn btn-pill btn-primary close_data" data-toggle="tooltip" title="Close"> ປິດງວດການຂາຍ </a> 
                                    '; 

                    }else{
                        $sub_array[] = '';
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
                $sub_array[] = ''; 
                
            
                $data[] = $sub_array;  


            }
            
            $output = array(  
                "draw"                    =>     intval($_POST["draw"]),  
                "recordsTotal"          =>      $this->Periods_model->get_all_data(),  
                "recordsFiltered"     =>     $this->Periods_model->get_filtered_data(),  
                "data"                    =>     $data  
            );  
            echo json_encode($output);  
        }
   } 

    public function add_data(){
        //  $this->load->library('encryption');
        //  $password = $this->encryption->encrypt($_POST["Password"]);

        if($this->Users_model->check_token())
        {

            $user = $this->Users_model->get_username();

            $data = array(
                
                'Date_random' =>  date("Y/m/d", strtotime($_POST["Date_random"])),
                'Date_start' => date("Y/m/d H:i:s"),
                'user_start' =>  $user,
                'status' =>  'Open'

                
                );
        
            if( $_POST["status"] =='Insert'){

                if($this->Periods_model->get_data()){

                    $myObj = array(
                        'status' => 'no',
                        'msg' =>  'ຂໍ້ມູນງວດເກົ່າຍັງຄ້າງຢູ່...'
                        );
        
                echo json_encode($myObj);
                    
                }else{
                    echo json_encode($this->Periods_model->add_data($data));
                
                }
            

            }
        }
        
    }

    public function get_data(){

        if($this->Users_model->check_token())
        {
            $id = $_POST["periods_id"];
            echo json_encode($this->Periods_model->get_data($id));
        }
    }

  
    public function close_periods(){
        if($this->Users_model->check_token())
        {
                $user = $this->Users_model->get_username();
                $data = array(
                
                    'out_put_random' => $_POST["number"],
                    'Date_end' => date("Y/m/d H:i:s"),
                    'user_end' =>  $user,
                    'status' =>  'close'
        
                    
                    );
            $myObj = array();  

            if($this->Periods_model->close_periods($data)){

                
                $myObj = array(
                    'status' => 'ok',
                    'msg' =>  'ປິດງວດສຳແລ້ວ...'
                    );
                echo json_encode($myObj);

            }else{

                
                $myObj = array(
                    'status' => 'no',
                    'msg' =>  'ປິດງວດບໍ່ໄດ້...'
                    );
                echo json_encode($myObj);

            }
        }
       
    }

    public function top_priods(){

        if($this->Users_model->check_token())
        {

            $fetch_data = $this->Periods_model->Top_Periods();
            $output=" ";
                foreach($fetch_data as $row)  
                {  
                
                    $output.='<option value="'.$row->periods_id.'"> ງວດວັນທີ '.$row->Date_random.'</option>';
                
                } 

            echo $output;
        }
    }
   


   
}

?>