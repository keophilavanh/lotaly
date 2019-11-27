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
        $this->load->model('Remit_model');
    }

    public function index(){
        if($this->Employee_model->check_token())
        {
            $this->load->view('conten/sale/view_sale');
        }
        
    }

    public function get_Periods(){
        if($this->Employee_model->check_token())
        {

            echo json_encode($this->Periods_model->max_periods());
        }
        
    }

    public function test(){

        if($this->Employee_model->check_token())
        {

            echo  $this->Sale_model->check_Sale(9,501);
        }
    }
   
    function check_number($remit,$periods,$number,$price){
       
        if($this->Employee_model->check_token())
        {
            if(strlen($number) == 2){
                $sale = $this->Sale_model->check_Sale($periods,$number);
                if(($sale + $price) > $remit->number2){

                    $data = array(
                        'status' => 'Full',
                        'Number' => $number,
                        'total' =>  $remit->number2 - $sale,
                        'type' =>  'ເລກສອງໂຕ',
                    
                        );
                    
                    return $data;
                }else {
                    return 0;
                }
            

            }elseif(strlen($number) == 3){

                $sale = $this->Sale_model->check_Sale($periods,$number);
                if(($sale + $price) > $remit->number3){

                    $data = array(
                        'status' => 'Full',
                        'Number' => $number,
                        'total' =>  $remit->number3 - $sale,
                        'price' =>  $price,
                        'sale' =>  $sale ,
                        'type' =>  'ເລກສາມໂຕ',
                        );
                    
                    return $data;
                }else {
                    return 0;
                }

            }elseif(strlen($number) == 4){

                $sale = $this->Sale_model->check_Sale($periods,$number);
                if(($sale + $price) >= $remit->number4){

                    $data = array(
                        'status' => 'Full',
                        'Number' => $number,
                        'total' =>  $remit->number4 - $sale,
                        'type' =>  'ເລກສີ່ໂຕ',
                        );
                    
                    return $data;
                }else {
                    return 0;
                }

            }elseif(strlen($number) == 5){

                $sale = $this->Sale_model->check_Sale($periods,$number);
                if(($sale + $price) >= $remit->number5){

                    $data = array(
                        'status' => 'Full',
                        'Number' => $number,
                        'total' =>  $remit->number5 - $sale,
                        'type' =>  'ເລກຫ້າໂຕ',
                        );
                    
                    return $data;
                }else {
                    return 0;
                }

            };

            //$this->Sale_model->check_Sale(9,50);
            $remit = $this->Remit_model->get_data();
            echo $remit->number2;
        }
    }

    public function insert_sale(){

        if($this->Employee_model->check_token())
        {

            if($this->Periods_model->id_periods()){

                $myObj = array(
                    'status' => 'close',
                
                    );
                    exit(json_encode($myObj));
            

            }

            $periods = $this->Periods_model->id_periods();
            $remit = $this->Remit_model->get_data();
            $item_number = $_POST["item_number"];
            $item_price = $_POST["item_price"];

            for($count = 0; $count < count($item_number); $count++)
            {

                $number = $item_number[$count];
                $price = $item_price[$count];
                $check = $this->check_number($remit,$periods,$number,$price);
                if($check){
                    exit(json_encode($check)); 
                }
            }

        
            //echo $periods->periods_id;
            $data = array(
                'sel_date' => date("Y/m/d H:i:s"),
                'periods_id' => $periods,
                'emp_id' => $this->Employee_model->id_by_token(),
                'status' => 'Normal',
            
                );
            $sale_id = $this->Sale_model->add_data($data);


        

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

   


   
}

?>