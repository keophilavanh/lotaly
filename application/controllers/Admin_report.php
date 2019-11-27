<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// $this->load->model('User');

class Admin_report extends CI_Controller{

   
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Employee_model');
        $this->load->model('Sale_model');
        $this->load->model('Report_Sale_model');
        $this->load->model('Periods_model');
        $this->load->model('Users_model');
       
    }

    public function index(){
        
        if($this->Users_model->check_token())
        {
            //$this->load->view('conten/manage/view_Ticket');
        }
        
    }

    public function report_select_sale(){
        
        if($this->Users_model->check_token())
        {
            $data['list'] = $this->Periods_model->Top_Periods();
            $this->load->view('conten/Admin_report/view_admin_select_report_sale',$data,false);
        }
        
    }

    public function report_select_employee(){
        
        if($this->Users_model->check_token())
        {
            $data['list'] = $this->Periods_model->Top_Periods();
            $this->load->view('conten/Admin_report/view_admin_select_report_employee',$data,false);
        }
        
    }

    public function report_select_by_employee(){
        
        if($this->Users_model->check_token())
        {
            $data['list'] = $this->Periods_model->Top_Periods();
            $data['user'] = $this->Employee_model->user_list();
            $this->load->view('conten/Admin_report/view_admin_select_by_employee',$data,false);
        }
        
    }

    function report_sale($id=0){

        if($this->Users_model->check_token())
        {
            $data['id'] = $id;
            $data['number'] = $this->Periods_model->periods_number_random($id);
            $data['sale_two'] = $this->Report_Sale_model->sale_detell($id,2);
            $data['sale_three'] = $this->Report_Sale_model->sale_detell($id,3);

            $data['sale_award'] = $this->Report_Sale_model->Award_ticket($this->Periods_model->periods_number_random($id),$id);
            //$data['ticket'] = $this->report_award_user_model->Award_ticket($this->Periods_model->periods_number_random($id),$this->Employee_model->id_by_token(),$id);
            // $data['total'] = $this->Report_Sale_model->total($id,$this->Employee_model->id_by_token());
             $this->load->view('conten/Admin_report/view_admin_report_sale',$data,false);
        }
    }

    function report_sale_by_employee($id=0,$employee){

        if($this->Users_model->check_token())
        {
            $data['date'] = $this->Periods_model->periods_date_random($id);
            $data['employee'] = $this->Employee_model->user_name($employee);
            $data['number'] = $this->Periods_model->periods_number_random($id);
            $data['sale_two'] = $this->Report_Sale_model->sale_detell_by_employee($id,2,$employee);
            $data['sale_three'] = $this->Report_Sale_model->sale_detell_by_employee($id,3,$employee);
            $data['sale_award'] = $this->Report_Sale_model->Award_ticket_by_employee($this->Periods_model->periods_number_random($id),$id,$employee);
             $this->load->view('conten/Admin_report/view_admin_report_sale_by_employee',$data,false);
        }
    }


    function report_employee($id=0){

        if($this->Users_model->check_token())
        {
            $data['id'] = $id;
            $data['sale_employee'] = $this->Report_Sale_model->sale_emplyee($id);
            $data['date'] = $this->Periods_model->periods_date_random($id);
            
             $this->load->view('conten/Admin_report/view_admin_employee_report',$data,false);
        }
    }

    



   

  
   


   
}

?>