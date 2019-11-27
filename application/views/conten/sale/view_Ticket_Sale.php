<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <?php
        $this->load->view('src');
    ?>

    <title>BootAdmin</title>
</head>
<body class="bg-light">

<?php
        $this->load->view('view_header_user');
    ?>

<div class="d-flex">
    
    <?php
         $this->load->view('conten/sale/view_menu');
    ?>

    <div class="content p-4">
        
        
        <br/>
        

        <div class="card mb-4">
            <div class="card-body">

            <h2 class="mb-12 col-sm-8  " id="total">ໃບບິນການຂາຍ</h2>
            <br/>
           
                    
            <table class="table table-bordered" id="test_table"  cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th scope="col">ເລກບິນ</th>
                    <th scope="col">ວັນທີອອກບິນ</th>
                    <th scope="col">ຜູ້ຂາຍ</th>
                    <th scope="col">ສະຖານະ</th>
                    <th scope="col">ລວມເງີນ</th>
                </tr>
                </thead>
                
                <tbody>
                    
                
                </tbody>
              
            </table>
            </div>
        </div>
    </div>
</div>


              



</body>
</html>

<script type="text/javascript" language="javascript" >  

    

 $(document).ready(function(){  

   
    
        
   
    document.getElementById("total").innerHTML = 'ລວມເງີນທັງໝົດ :'+' <?php echo  number_format($total)." ກີບ"; ?>';

      var dataTable = $('#test_table').DataTable({  
           "processing":true,  
           "serverSide":true, 
            
           "order":[],  
           "ajax":{  
                url:"<?php echo base_url() . 'Report_sale/fetch_data'; ?>",  
                type:"POST" ,
                "data":{"Periods_id":"<?php echo $id; ?>","user":"<?php echo $user; ?>"} 
           },  
           "columnDefs":[  
                {  
                     "targets":[2],  
                     "orderable":false,  
                }, 
                {
                    "targets": 4,
                    "className": "text-right",
                } 
           ],  
           "scrollX": true
      });  

      $(document).on('click', '#reface', function(){
            test = $('#Periods_id').val();
            dataTable.clear();
            dataTable.ajax.reload();
       });
     
     


 });  
 </script>  