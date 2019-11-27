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
        
        <div class="row">
            <div class=" col-sm-4 ">

                    <div class="card mb-4">
                        <div class="card-body">

                            <h2 class="mb-12 col-sm-8  " id="number2">ເລກສອງໂຕ</h2>
                            <br/>
                    
                                
                            <table class="table table-bordered"   cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th scope="col">ລຳດັບ</th>
                                    <th scope="col">ໝາຍເລກ</th>
                                    <th scope="col">ຈຳນວນເງີນ</th>
                    
                                    
                                
                                
                                </tr>
                                </thead>
                                
                                <tbody>

                                <?php 

                                                $two =0;
                                                $paramiter=0;
                                                    foreach($sale_two as $row)  
                                                    {  

                                                        $two+= $row->price;

                                                        echo  '<thead>
                                                                <tr>
                                                                    <td scope="col">'.++$paramiter.'</td>
                                                                    <td scope="col">'.$row->number.'</td>
                                                                    <td scope="col">'.number_format($row->price )." ກີບ".'</td>
                                                                </tr>';
                                                
                                                    } 
                                                ?> 
                                    
                                
                                </tbody>
                            
                            </table>
                        </div>
                    </div>

            </div>

            <div class=" col-sm-4 ">

                    <div class="card mb-4">
                        <div class="card-body">

                        <h2 class="mb-12 col-sm-8  " id="number3" >ເລກສາມໂຕ</h2>
                            <br/>
                    
                                
                            <table class="table table-bordered"   cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th scope="col">ລຳດັບ</th>
                                    <th scope="col">ໝາຍເລກ</th>
                                    <th scope="col">ຈຳນວນເງີນ</th>
                                    
                                
                                
                                </tr>
                                </thead>
                                
                                <tbody>

                                <?php    
                                            $three =0;
                                            $paramiter=0;
                                                    foreach($sale_three as $row)  
                                                    {  

                                                        $three += $row->price;

                                                        echo  '<thead>
                                                                <tr>
                                                                    <td scope="col">'.++$paramiter.'</td>
                                                                    <td scope="col">'.$row->number.'</td>
                                                                    <td scope="col">'.number_format($row->price )." ກີບ".'</td>
                                                                </tr>';
                                                
                                                    } 
                                                ?> 
                                    
                                
                                </tbody>
                            
                            </table>
                        </div>
                    </div>

            </div>

            <div class=" col-sm-4 ">

                    <div class="card mb-4">
                        <div class="card-body">

                            <!-- <h2 class="mb-12 col-sm-8  " id="number">ເລກອອກ</h2> -->

                            <h2 class="mb-12 col-sm-8  " id="award" >ລູກຄ້າຖືກເລກ</h2>
                            <br/>
                    
                                
                            <table class="table table-bordered"  cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th scope="col">ລຳດັບ</th>
                                    <th scope="col">ໝາຍເລກ</th>
                                    <th scope="col">ຈຳນວນເງີນ</th>
                                    <th scope="col">ເງີນລາງວັນ</th>
                                    
                                
                                
                                </tr>
                                </thead>
                                
                                <tbody>
                                <?php    
                                            $i = 0;
                                            $paramiter=0;
                                            $award =0;
                                                    foreach($sale_award as $row)  
                                                    {  

                                                        if( strlen($row->number)==2){
                                                            $paramiter = 60;
                                                        }elseif(strlen($row->number)==3){
                                                            $paramiter = 500;
                                                        }elseif(strlen($row->number)==4){
                                                            $paramiter = 6000;
                                                        }

                                                        $award += ($row->price*$paramiter);

                                                        echo  '<thead>
                                                                <tr>
                                                                    <td scope="col">'.++$i.'</td>
                                                                    <td scope="col">'.$row->number.'</td>
                                                                    <td scope="col">'.number_format($row->price )." ກີບ".'</td>
                                                                    <td scope="col">'.number_format($row->price*$paramiter)." ກີບ".'</td>
                                                                </tr>';
                                                
                                                    } 
                                                ?> 
                                    
                                
                                </tbody>
                            
                            </table>
                        </div>
                    </div>

            </div>
        
        </div>

        
    </div>
</div>


              



</body>
</html>

<script type="text/javascript" language="javascript" >  

    

 $(document).ready(function(){  

   
    
        
   
     document.getElementById("number2").innerHTML = 'ເລກສອງໂຕ :'+' <?php echo  number_format($two)." ກີບ" ; ?>';
     document.getElementById("number3").innerHTML = 'ເລກສາມໂຕ  :'+' <?php echo  number_format($three)." ກີບ" ; ?>';
     document.getElementById("award").innerHTML = 'ລູກຄ້າຖືກເລກ :'+' <?php echo  number_format($award)." ກີບ" ; ?>';

     

      
     
     


 });  
 </script>  