<?php 
defined('BASEPATH') OR exit('No direct script access allowed');


class Report_Sale_model extends MY_Model{

    // // public $primary_key = 'sel_id';
    // // public $table = 'tb_sell';
    // var $primary_key = 'sel_id';
    var $table = "tb_sell";  
   
    


     var $order_column = array("sel_id", "sel_date","Date_random","emp_fname","status");  
     function make_query()  
     {  
          
          $this->db->select('tb_sell.sel_id,tb_sell.sel_date,tb_sell.status,tb_sell.emp_id,tb_sell.user_update,tb_periods.Date_random,tb_employee.emp_fname,tb_employee.emp_lname,(SELECT SUM(tb_sell_detail.price) FROM `tb_sell_detail` WHERE tb_sell_detail.sel_id = tb_sell.sel_id) as total');  
          $this->db->from($this->table);  
          $this->db->join('tb_periods','tb_sell.periods_id = tb_periods.periods_id');
          $this->db->join('tb_employee','tb_sell.emp_id=tb_employee.emp_id');
          $this->db->where("tb_sell.periods_id", $_POST["Periods_id"]); 
          $this->db->where("tb_sell.emp_id",$_POST["user"]);  
          //$this->db->where("tb_sell.status", 'Normal');


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
     }  


     function total ($Periods_id,$emp_id){

          $this->db->select('SUM(tb_sell_detail.price) as total');  
          $this->db->from('tb_sell_detail');  
          $this->db->join('tb_sell','tb_sell.sel_id = tb_sell_detail.sel_id');
          $this->db->where("tb_sell.periods_id", $Periods_id); 
          $this->db->where("tb_sell.emp_id", $emp_id);
          $this->db->where("tb_sell.status", 'Normal'); 
          $query = $this->db->get();
          $row = $query->row();
          if($row->total){
               return $row->total;
          }else {
               return 0;
          }
          
     }

     function sale_detell($Periods_id="",$number){

          //substr($number, -2)
    
         $this->db->select('tb_sell_detail.number,sum(tb_sell_detail.price) as price');  
         $this->db->from('tb_sell_detail');  
         $this->db->join('tb_sell','tb_sell_detail.sel_id = tb_sell.sel_id');
         $this->db->join('tb_periods','tb_sell.periods_id = tb_periods.periods_id');
    
         $this->db->where("tb_sell.periods_id", $Periods_id); 
         $this->db->where("LENGTH(tb_sell_detail.number) =".$number);  

         $this->db->group_by("tb_sell_detail.number");
    
    
         $query = $this->db->get();
         return $query->result();  
    
        }

        function sale_detell_by_employee($Periods_id="",$number,$employee){

          //substr($number, -2)
    
         $this->db->select('tb_sell_detail.number,sum(tb_sell_detail.price) as price');  
         $this->db->from('tb_sell_detail');  
         $this->db->join('tb_sell','tb_sell_detail.sel_id = tb_sell.sel_id');
         $this->db->join('tb_periods','tb_sell.periods_id = tb_periods.periods_id');
    
         $this->db->where("tb_sell.periods_id", $Periods_id); 
         $this->db->where("tb_sell.emp_id", $employee); 
         $this->db->where("LENGTH(tb_sell_detail.number) =".$number);  

         $this->db->group_by("tb_sell_detail.number");
    
    
         $query = $this->db->get();
         return $query->result();  
    
        }


        function Award_ticket($number='',$Periods_id=""){

          //substr($number, -2)
    
         $this->db->select('tb_sell_detail.number,sum(tb_sell_detail.price) as price');  
         $this->db->from('tb_sell_detail');  
         $this->db->join('tb_sell','tb_sell_detail.sel_id = tb_sell.sel_id');
         $this->db->join('tb_periods','tb_sell.periods_id = tb_periods.periods_id');
       
    
         $this->db->where("tb_sell.periods_id", $Periods_id); 
         $this->db->where_in("tb_sell_detail.number",[substr($number, -3),substr($number, -2)]);  

         $this->db->group_by("tb_sell_detail.number");
    
    
         $query = $this->db->get();
         return $query->result();  
    
        }

        function Award_ticket_by_employee($number='',$Periods_id="",$employee){

          //substr($number, -2)
    
         $this->db->select('tb_sell_detail.number,sum(tb_sell_detail.price) as price');  
         $this->db->from('tb_sell_detail');  
         $this->db->join('tb_sell','tb_sell_detail.sel_id = tb_sell.sel_id');
         $this->db->join('tb_periods','tb_sell.periods_id = tb_periods.periods_id');
       
    
         $this->db->where("tb_sell.periods_id", $Periods_id); 
         $this->db->where("tb_sell.emp_id", $employee); 
         $this->db->where_in("tb_sell_detail.number",[substr($number, -3),substr($number, -2)]);  

         $this->db->group_by("tb_sell_detail.number");
    
    
         $query = $this->db->get();
         return $query->result();  
    
        }


        
        function sale_emplyee($Periods_id=""){

          //substr($number, -2)
    
         $this->db->select('tb_employee.emp_fname,tb_employee.emp_lname,tb_employee.emp_phone,tb_employee.emp_address,sum(tb_sell_detail.price) as price');  
         $this->db->from('tb_sell');  
         $this->db->join('tb_employee','tb_employee.emp_id = tb_sell.emp_id');
         $this->db->join('tb_sell_detail','tb_sell_detail.sel_id = tb_sell.sel_id');
        
       
         $this->db->where("tb_sell.periods_id", $Periods_id); 
        $this->db->where("tb_sell.status", 'Normal'); 
        $this->db->group_by("tb_sell.emp_id");
    
         $query = $this->db->get();
         return $query->result();  
    
        }

        function sale_ticket($id=""){

          //substr($number, -2)
    
          $this->db->select('tb_sell.sel_id,tb_sell.sel_date,tb_periods.Date_random,tb_employee.emp_fname,tb_employee.emp_lname');  
          $this->db->from('tb_sell');  
          $this->db->join('tb_employee','tb_employee.emp_id = tb_sell.emp_id');
          $this->db->join('tb_periods','tb_sell.periods_id = tb_periods.periods_id');
          
          $this->db->where("tb_sell.sel_id", $id); 
          $this->db->where("tb_sell.status", 'Normal'); 
          
     
          $query = $this->db->get();
          $row = $query->row();
          return  $row;  
    
        }

        function sale_detall($id=""){

          //substr($number, -2)
    
          $this->db->select('tb_sell_detail.sel_id,tb_sell_detail.number,tb_sell_detail.price');  
          $this->db->from('tb_sell_detail');  
          $this->db->where("tb_sell_detail.sel_id", $id); 
          
     
          $query = $this->db->get();
          return $query->result();  
    
        }

   

    
    

     
}

?>