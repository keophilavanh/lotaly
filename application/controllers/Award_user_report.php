<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// $this->load->model('User');

class Award_user_report extends CI_Controller{

   
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Report_Sale_model');
        $this->load->model('report_award_user_model');
        $this->load->model('Employee_model');
        $this->load->model('Periods_model');
       
    }

    public function index(){
        
         if($this->Employee_model->check_token())
         {
            $data['list'] = $this->Periods_model->Top_Periods();

            
            //  $data = $this->Periods_model->Top_Periods();
            //$this->load->view('conten/sale/view_test',$data,false);
            $this->load->view('conten/sale/view_award_select_report',$data,false);
        }
        
    }

    function report($id=0){
        if($this->Employee_model->check_token())
        {
            $data['id'] = $id;
            $data['number'] = $this->Periods_model->periods_number_random($id);
            $data['user'] = $this->Employee_model->id_by_token();
            $data['ticket'] = $this->report_award_user_model->Award_ticket($this->Periods_model->periods_number_random($id),$this->Employee_model->id_by_token(),$id);
            // $data['total'] = $this->Report_Sale_model->total($id,$this->Employee_model->id_by_token());
            $this->load->view('conten/sale/view_ticket_award',$data,false);
        }
    }

    

    function fetch_data(){  
      
        if($this->Employee_model->check_token())
        {
        
                $fetch_data = $this->report_award_user_model->make_datatables(2);  
                $data = array();  

                if($this->report_award_user_model->get_all_data() > 0){

                    foreach($fetch_data as $row)  
                    {  
                    $sub_array = array();  
                    $sub_array[] = $row->sel_id;  
                    $sub_array[] = '';   
                    $sub_array[] = '';   
                    $sub_array[] = '';   
                    $sub_array[] = '';   
                
            
                    
                    
                    //  $sub_array[] = $row->number;   
                    //  $sub_array[] = $row->price;   
                //  $sub_array[] = $row->sel_date;   
                    //  $sub_array[] = date("d/m/Y", strtotime($row->sel_date));   
                    //  $sub_array[] = $row->emp_fname.' '. $row->emp_lname;
                    //  
                    //$sub_array[] = number_format($row->total)." ກີບ";    
                    
                    
                    $data[] = $sub_array;  
                    } 

                }else{

                    $sub_array = array();  
                    $sub_array[] = '';   
                    $sub_array[] = '';  
                    $sub_array[] = '';  
                    $sub_array[] = '';   
                    $sub_array[] = '';  
                
                
                    
                
                    $data[] = $sub_array;  


                }
                
                $output = array(  
                    "draw"                    =>     intval($_POST["draw"]),  
                    "recordsTotal"          =>      $this->report_award_user_model->get_all_data(),  
                    "recordsFiltered"     =>     $this->report_award_user_model->get_filtered_data(),  
                    "data"                    =>     $data  
                );  
                echo json_encode($output);  
        }
   } 

    



   

  
   


   
}

?>