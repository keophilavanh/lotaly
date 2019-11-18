<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// $this->load->model('User');

class Setting extends CI_Controller{

   
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Remit_model');
        $this->load->model('Users_model');
       
    }

    public function index(){
       
        if($this->Users_model->check_token())
        {
            $this->load->view('conten/manage/view_Setting');
        }
    }

    



   
    public function Edit_data(){

        $data = array(
            'number2' => $_POST["number2"],
            'number3' => $_POST["number3"],
            'number4' => $_POST["number4"],
            'number5' => $_POST["number5"],
           
            );
        
        echo json_encode($this->Remit_model->Edit_data($data));

       
        
    }

    public function get_data(){
        
        
        echo json_encode($this->Remit_model->get_data());
    }

   

   
   


   
}

?>