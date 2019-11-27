<!DOCTYPE html>
<html>
<head>
<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
  font-family: 'Phetsarath OT';
}
h1,h3 {
  font-family: 'Phetsarath OT';
}
.tb_h tr td{
  border: 0px ;
}

th{
  font-size: 20px;
}

</style>
</head>
<body>

<h1>header</h1>

<table style="width:100%;border: 0px ;" class="tb_h">
  <tr style="width:100%;border: 0px ;">
    <td > ເລກບິນ : <?php echo $sale_data->sel_id ;?></td> 
  </tr>
  <tr style="width:100%;border: 0px ;">
    <td > ວັນທີອອກບິນ : <?php echo date("d/m/Y H:i:s", strtotime($sale_data->sel_date));?></td> 
  </tr>
  <tr style="width:100%;border: 0px ;">
    <td > ງວດວັນທີ : <?php echo date("d/m/Y", strtotime($sale_data->Date_random));?></td> 
  </tr>
</table>



<table style="width:100%;">
  <tr>
    <th style="width:30% ; text-align:center;"> ລຳດັບ</th> 
    <th style="width:30%" > ເລກສ່ຽງ </th> 
    <th style="width:30%; text-align:right;"> ຈຳນວນເງີນ </th>
  </tr>
  
  <?php 
            $i = 0;
            $total = 0;
            foreach($sale_detall as $row)  
                    {  

                        $total+= $row->price;

                            echo  '
                                        <tr>
                                            <td align="center" >'.++$i.'</td>
                                            <td align="center" >'.$row->number.'</td>
                                            <td align="right">'.number_format($row->price,0)." ກີບ".'</td>
                                          
                                        </tr>';
                                                
                    } 
  ?>
  
 

</table>
<table style="width:100%;border: 0px ;" class="tb_h">
    <tr  style="width:100%;border: 0px ;">
    
      <td  style="width:100%; text-align:right;"><h2>ລວມມູນຄ່າ :  <?php echo number_format($total,0);?> ກີບ  <br/>
                                                   
  </tr>
 
</table>


</body>
</html>

<script>

    window.print();
  
  </script>