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
          $this->load->view('conten/Admin_report/view_print');
    ?>

<div class="d-flex">
    
    <?php
        // $this->load->view('conten/sale/view_menu');
    ?>

    <div class="content p-4">
        
        
        <br/>
        
        

                    <div class="card mb-4">
                        <div class="card-body">

                            <h2 class="mb-12 col-sm-8  ">ງວດວັນທີ <?php echo $date; ?></h2>
                            <br/>
                    
                                
                            <table class="table table-bordered"   cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th scope="col">ລຳດັບ</th>
                                    <th scope="col">ຊື່ພະນັກງານຂາຍ</th>
                                    <th scope="col">ນາມສະກຸນ</th>
                                    <th scope="col">ເບີໂທລະສັບ</th>
                                    <th scope="col">ທີ່ຢູ່</th>
                                    <th scope="col">ຈຳນວນເງີນທີຂາຍໄດ້</th>
                    
                                    
                                
                                
                                </tr>
                                </thead>
                                
                                <tbody>

                                <?php 

                                                $two =0;
                                                $paramiter=0;
                                                    foreach($sale_employee as $row)  
                                                    {  

                                                    
                                                        echo  '<thead>
                                                                <tr>
                                                                    <td scope="col">'.++$paramiter.'</td>
                                                                    <td scope="col">'.$row->emp_fname.'</td>
                                                                    <td scope="col">'.$row->emp_lname.'</td>
                                                                    <td scope="col">'.$row->emp_phone.'</td>
                                                                    <td scope="col">'.$row->emp_address.'</td>
                                                                    <td scope="col">'.number_format($row->price )." ກີບ".'</td>
                                                                    

                                                                 
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

   
    
        
   
     

     

      
     
     


 });  
 </script>  