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
        $this->load->view('view_header_main');
    ?>

<div class="d-flex">
    
    <?php
         $this->load->view('conten/manage/view_menu');
    ?>

    <div class="content p-4">
        <div class="row">

               
        
             
                
                    
                

        </div>
        
        
        <br/>
        

        <div class="card mb-4">
            <div class="card-body">

            <h2 class=" text-center">ລາຍງານການຂາຍ</h2>
            <br/>
            <div class=" row text-center">
                <div class="col-mb-4 col-lg-4"></div>
                
                    <div class="input-group mb-6 col-xs-4 col-lg-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">ງວດວັນທີ</span>
                            </div>
                            <select class="form-control form-control-lg"  name="Periods_id" id="Periods_id">
                            <?php 
                                    foreach($list as $row)  
                                    {  
                                    echo '<option value="'.$row->periods_id.'"> ງວດວັນທີ '.$row->Date_random.'</option>';
                                    } 
                                ?> 
                            </select>
                            <div class="input-group-append">
                                <button class="btn btn-primary" id="reface"> ສະແດງຜົນ </button>
                            </div>
                        </div>

                    
                    </div>
                    <div class="col-mb-4 col-lg-4   "></div>
                
                                    
                    
           
            </div>
        </div>
    </div>
</div>


              



</body>
</html>

<script type="text/javascript" language="javascript" >  

    

 $(document).ready(function(){  

               
    $(document).on('click', '#reface', function(){
           var id = $('#Periods_id').val();
           var link = '<?php echo base_url(); ?>';
            
         console.log('sd');
            window.location.href = link+'Report-Sale-Periods/'+id;
       });
     
     


 });  
 </script>  