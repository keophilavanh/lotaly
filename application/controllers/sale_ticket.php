<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// $this->load->model('User');

class Sale_ticket extends CI_Controller{

   
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Employee_model');
        $this->load->model('Periods_model');
        $this->load->model('Sale_model');
        $this->load->model('Report_Sale_model');
    }

    public function index(){
        if($this->Employee_model->check_token())
        {
           
        }
        
    }

    public function ticket($id){
        if($this->Employee_model->check_token())
        {
            $data['sale_data'] = $this->Report_Sale_model->sale_ticket($id);
            $data['sale_detall'] = $this->Report_Sale_model->sale_detall($id);
            $this->load->view('conten/sale/view_sale_ticket',$data,false);
        }
        
    }



   

   


   
}

?>