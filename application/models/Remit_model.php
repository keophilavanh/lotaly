<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Remit_model extends MY_Model{

    // // public $primary_key = 'sel_id';
    // // public $table = 'tb_sell';
    // var $primary_key = 'sel_id';
    var $table = "tb_remit";  
   

     function get_data()
     {
          // $this->load->library('encrypt');
          // $password = $this->encryption->decrypt($_POST["Password"]);

          $this->db->select('*');
          $this->db->from('tb_remit');
          $this->db->where('id', '1');
          $query = $this->db->get();
          $row = $query->row();

                
         

        
         return $row;
     }

     function Edit_data($info)
     {
          $this->db->where('id','1');
          $this->db->update('tb_remit', $info);
          
          $myObj = array(
               'status' => 'ok',
               'msg' =>  'Update ຂໍ້ມູນສຳເລັດ...'
               );

          return  $myObj;
     }

   

    
    

     
}

?>