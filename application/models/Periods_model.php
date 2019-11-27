<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Periods_model extends MY_Model{

    // // public $primary_key = 'sel_id';
    // // public $table = 'tb_sell';
    //var $primary_key = 'sel_id';
    var $table = "tb_periods";  
    // var $select_column = array("sel_id", "sel_date", "Payment_status", "sel_id");  
    var $order_column = array("periods_id", "Date_random","Date_start","user_start","Date_end","user_end");  
    function make_query()  
    {  
         $this->db->select('*');  
         $this->db->from($this->table);  
         if(isset($_POST["search"]["value"]))  
         {  
              $this->db->like("periods_id", $_POST["search"]["value"]);  
              $this->db->or_like("Date_random", $_POST["search"]["value"]); 
              $this->db->or_like("Date_start", $_POST["search"]["value"]);
              $this->db->or_like("user_start", $_POST["search"]["value"]); 
              $this->db->or_like("Date_end", $_POST["search"]["value"]);
              $this->db->or_like("user_end", $_POST["search"]["value"]); 
             
         }  
         if(isset($_POST["order"]))  
         {  
              $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
         }  
         else  
         {  
              $this->db->order_by('periods_id', 'DESC');  
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


    function add_data($info)
     {
       $this->db->trans_start();
       //$info['dateInserted'] = date('Y-m-d H:i:s');
       $this->db->insert($this->table, $info);
      
       //$insert_id = $this->db->insert_id();
       $this->db->trans_complete();

       $myObj = array(
               'status' => 'ok',
               'msg' =>  'Insert ຂໍ້ມູນສຳເລັດ...'
               );

          return  $myObj;
     }

     function get_data()
     {
          // $this->load->library('encrypt');
          // $password = $this->encryption->decrypt($_POST["Password"]);

          $this->db->select('*');
          $this->db->from($this->table);
          $this->db->where('status = "Open"');
          $query = $this->db->get();
          $row = $query->row();
          // $password = $row->password;
          //  $row->decrypt =  $this->encryption->decrypt($password);        
         

        
         return $row;
     }

     function Edit_data($info,$id)
     {
          $this->db->where('periods_id', $id);
          $this->db->update($this->table, $info);
          
          $myObj = array(
               'status' => 'ok',
               'msg' =>  'Update ຂໍ້ມູນສຳເລັດ...'
               );

          return  $myObj;
     }

     

     function close_periods($data){
          
         

          $this->db->where('status = "Open"');
          $this->db->update($this->table, $data);

          $myObj = array(
               'status' => 'ok',
               'msg' =>  'delete ຂໍ້ມູນສຳເລັດ...'
               );

          return  $myObj;
           
        }

     function all_periods(){
          $this->db->select('*');
          $this->db->from($this->table);
          $query = $this->db->get();
          //$row = $query->row();

          return $query->result();  
      
     }
     function max_periods(){
          $this->db->select('Date_random');
          $this->db->from($this->table);
          $this->db->where('status = "Open"');
          $query = $this->db->get();
          $row = $query->row();

          return $row;  
      
     }

     function id_periods(){

          $this->db->select('periods_id');
          $this->db->from($this->table);
          $this->db->where('status = "Open"');
          $query = $this->db->get();
          $row = $query->row();

          return $row->periods_id;  
      
     }

     function periods_number_random($id){

          $this->db->select('out_put_random');
          $this->db->from($this->table);
          $this->db->where('periods_id',$id);
          $query = $this->db->get();
          $row = $query->row();

          return $row->out_put_random;  
      
     }

     function periods_date_random($id){

          $this->db->select('Date_random');
          $this->db->from($this->table);
          $this->db->where('periods_id',$id);
          $query = $this->db->get();
          $row = $query->row();

          return date("d/m/Y", strtotime($row->Date_random));  
      
     }

     function Top_Periods(){
          $this->db->select('*');
          $this->db->from($this->table);
          $this->db->limit(3,0);  
          $this->db->order_by('periods_id', 'DESC');  
          $query = $this->db->get();
          $query->row();

          // $query = $this->db->get($this->table, 0, 3);

          return $query->result();  
      
     }
}

?>