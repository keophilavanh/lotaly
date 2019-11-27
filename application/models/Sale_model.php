<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Sale_model extends MY_Model{

    // // public $primary_key = 'sel_id';
    // // public $table = 'tb_sell';
    // var $primary_key = 'sel_id';
    var $table = "tb_sell";  
   
    public function check_Sale($periods,$number){

          $this->db->select_sum('tb_sell_detail.price');  
          $this->db->from('tb_sell_detail');  
          $this->db->join('tb_sell','tb_sell.sel_id = tb_sell_detail.sel_id');
          $this->db->where('tb_sell.periods_id', $periods);
          $this->db->where('tb_sell_detail.number',$number);
          $query = $this->db->get();
          $row = $query->row();
         
          if($row->price){
               return  $row->price;
          }else {
               return  0;
          }
         
     }
    

     function add_data($info)
     {
       $this->db->trans_start();
       $this->db->insert($this->table, $info);
       $insert_id = $this->db->insert_id();
       $this->db->trans_complete();
        return  $insert_id;
     }

     function add_data_detell($info)
     {
       $this->db->insert('tb_sell_detail', $info);
     }

     function Edit_data($info,$id)
     {
          $this->db->where('sel_id',$id);
          $this->db->update($this->table, $info);
          
          $myObj = array(
               'status' => 'ok',
               'msg' =>  'Update ຂໍ້ມູນສຳເລັດ...'
               );

          return  $myObj;
     }


     var $order_column = array("sel_id", "sel_date","Date_random","emp_fname","status");  
     function make_query()  
     {  
          $this->db->select('tb_sell.sel_id,tb_sell.sel_date,tb_sell.status,tb_sell.user_update,tb_periods.Date_random,tb_employee.emp_fname,tb_employee.emp_lname');  
          $this->db->from($this->table);  
          $this->db->join('tb_periods','tb_sell.periods_id = tb_periods.periods_id');
          $this->db->join('tb_employee','tb_sell.emp_id=tb_employee.emp_id');

          if(isset($_POST["search"]["value"]))  
          {  
               $this->db->like("sel_id", $_POST["search"]["value"]);  
               $this->db->or_like("emp_fname", $_POST["search"]["value"]); 
              
              
          }  
          if(isset($_POST["order"]))  
          {  
               $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
          }  
          else  
          {  
               $this->db->order_by('sel_id', 'DESC');  
          }  
     }  
     function make_datatables(){  
          $this->make_query();  
          if($_POST["length"] != -1)  
          {  
               $this->db->limit($_POST['length'], $_POST['start']);  
          }  
          $query = $this->db->get();  
          return $query->result();  
     }  
     function get_filtered_data(){  
          $this->make_query();  
          $query = $this->db->get();  
          return $query->num_rows();  
     }       
     function get_all_data()  
     {  
          $this->db->select("*");  
          $this->db->from($this->table);  

          return $this->db->count_all_results();  
     }  

   

    
    

     
}

?>