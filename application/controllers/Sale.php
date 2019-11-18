<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// $this->load->model('User');

class Sale extends CI_Controller{

   
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Employee_model');
        $this->load->model('Periods_model');
        $this->load->model('Sale_model');
    }

    public function index(){
        if($this->Employee_model->check_token())
        {
            $this->load->view('conten/sale/view_sale');
        }
        
    }

    public function get_Periods(){

        echo json_encode($this->Periods_model->max_periods());
        
    }

    public function insert_sale(){

        //$periods = $this->Periods_model->id_periods();
        //echo $periods->periods_id;
        $data = array(
            'sel_date' => date("Y/m/d H:i:s"),
            'periods_id' => $this->Periods_model->id_periods(),
            'emp_id' => $this->Employee_model->id_by_token(),
            'status' => 'Normal',
           
            );
        $sale_id = $this->Sale_model->add_data($data);


        $item_number = $_POST["item_number"];
        $item_price = $_POST["item_price"];

        for($count = 0; $count < count($item_number); $count++)
        {
            $number = $item_number[$count];
            $price = $item_price[$count];
            $data_detell = array(
                'sel_id' => $sale_id,
                'number' => $number,
                'price' => $price,
               
                );
            $this->Sale_model->add_data_detell($data_detell);
        }

        $myObj = array(
            'status' => 'ok',
            'print' =>  $sale_id,
            );

        echo json_encode($myObj);
    }

   


   
}

?>