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

            <h2 class="mb-12 col-sm-8  " id="number">ເລກອອກ</h2>
            <br/>
           
                    
            <table class="table table-bordered" id="award"  cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th scope="col">ເລກບິນ</th>
                    <th scope="col">ວັນທີອອກບິນ</th>
                    <th scope="col">ງວດວັນທີ</th>
                    <th scope="col">ໝາຍເລກ</th>
                    <th scope="col">ຈຳນວນເງີນ</th>
                    <th scope="col">ລວມເງີນ</th>
                    
                   
                 
                </tr>
                </thead>
                
                <tbody>

                <?php 
                                $paramiter;
                                    foreach($ticket as $row)  
                                    {  

                                        if( strlen($row->number)==2){
                                            $paramiter = 60;
                                        }elseif(strlen($row->number)==3){
                                            $paramiter = 500;
                                        }elseif(strlen($row->number)==4){
                                            $paramiter = 6000;
                                        }

                                        echo  '<thead>
                                                <tr>
                                                    <td scope="col">'.$row->sel_id.'</td>
                                                    <td scope="col">'.$row->sel_date.'</td>
                                                    <td scope="col">'.$row->Date_random.'</td>
                                                    <td scope="col">'.$row->number.'</td>
                                                    <td scope="col">'.$row->price.'</td>
                                                    <td scope="col">'.number_format(($row->price * $paramiter))." ກີບ".'</td>
                                                </tr>';
                                  
                                    } 
                                ?> 
                    
                
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

   
    
        
   
     document.getElementById("number").innerHTML = 'ເລກອອກ :'+' <?php echo $number ; ?>';

     

     $('#test_table').DataTable({  

        "columnDefs":[  
            
                {
                    "targets": 5,
                    "className": "text-right",
                } 
           ],
           "scrollX": true
      });  
     
     


 });  
 </script>  