<?php 
defined('BASEPATH') OR exit('No direct script access allowed');


class report_award_user_model extends MY_Model{

    // // public $primary_key = 'sel_id';
    // // public $table = 'tb_sell';
    // var $primary_key = 'sel_id';
    var $table = "tb_sell";  
   
    
    function Award_ticket($number='',$user="",$Periods_id=""){

      //substr($number, -2)

     $this->db->select('tb_sell_detail.sel_id,tb_sell_detail.number,tb_sell_detail.price,tb_sell.sel_date,tb_periods.Date_random');  
     $this->db->from('tb_sell_detail');  
     $this->db->join('tb_sell','tb_sell_detail.sel_id = tb_sell.sel_id');
     $this->db->join('tb_periods','tb_sell.periods_id = tb_periods.periods_id');
     $this->db->join('tb_employee','tb_sell.emp_id=tb_employee.emp_id');

     $this->db->where("tb_sell.periods_id", $Periods_id); 
     $this->db->where("tb_sell.emp_id",$user);  
     $this->db->where_in("tb_sell_detail.number",[substr($number, -3),substr($number, -2)]);  


     $query = $this->db->get();
     return $query->result();  

    }

    



     var $order_column = array("sel_id", "sel_date","Date_random","emp_fname","status");  
     function make_query()  
     {  
          
          $this->db->select('tb_sell.sel_id');  
          $this->db->from('tb_sell');  

          //$this->db->join('tb_sell_detail','tb_sell_detail.sel_id = tb_sell.sel_id');
          // $this->db->join('tb_periods','tb_sell.periods_id = tb_periods.periods_id');
          // $this->db->join('tb_employee','tb_sell.emp_id=tb_employee.emp_id');
          // $this->db->where("tb_sell.periods_id", $_POST["Periods_id"]); 
          // $this->db->where("tb_sell.emp_id",2);  
        // $this->db->where_in("tb_sell_detail.sel_id", $this->id_sell());


          if(isset($_POST["search"]["value"]))  
          {  
               $this->db->like("sel_id", $_POST["search"]["value"]);  
               
              
              
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
          //return 11;
     }  


     // function total ($Periods_id,$emp_id){

     //      $this->db->select('SUM(tb_sell_detail.price) as total');  
     //      $this->db->from('tb_sell_detail');  
     //      $this->db->join('tb_sell','tb_sell.sel_id = tb_sell_detail.sel_id');
     //      $this->db->where("tb_sell.periods_id", $Periods_id); 
     //      $this->db->where("tb_sell.emp_id", $emp_id);
     //      $this->db->where("tb_sell.status", 'Normal'); 
     //      $query = $this->db->get();
     //      $row = $query->row();
     //      if($row->total){
     //           return $row->total;
     //      }else {
     //           return 0;
     //      }
          
     // }

   

    
    

     
}

?>