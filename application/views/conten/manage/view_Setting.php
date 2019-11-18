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
        <h2 class="mb-4">ກຳນົດການຕັ້ງຄ່າ</h2>

        <div class="card mb-4">
            <div class="card-body">

                            <div class="form-group row">
                                    
                                    <div class="col-sm-5">
                                        <label  >ຈຳກັດເລກ 2ໂຕ</label>
                                        <input type="text" class="form-control" name="number2" id="number2" >
                                    </div>
                                    
                                    <div class="col-sm-5">
                                            <label >ຈຳກັດເລກ 3ໂຕ</label>
                                            <input type="text" class="form-control" name="number3" id="number3" >
                                    </div>
                                   
                                   
                            </div>
                            <div class="form-group row">
                                    
                                    <div class="col-sm-5">
                                        <label  >ຈຳກັດເລກ 4ໂຕ</label>
                                        <input type="text" class="form-control" name="number4" id="number4" >
                                    </div>
                                    
                                    <div class="col-sm-5">
                                            <label >ຈຳກັດເລກ 5ໂຕ</label>
                                            <input type="text" class="form-control" name="number5" id="number5" >
                                    </div>
                                   
                                   
                            </div>

                    <div >   
                    <button type="button" class="btn btn-success" title="edit" name="edit" id="edit" >ແກ້ໄຂ້ຂໍ້ມູນ</button>
                    
                    <h1> </h1>
                    </div>
                
           
            </div>
        </div>
    </div>
</div>


                



</body>
</html>

<script type="text/javascript" language="javascript" >  
 $(document).ready(function(){  
      
           $.ajax({  
                    url:"<?php echo base_url() . 'Setting/get_data'; ?>", 
                    method:"POST",  
                    data:{},  
                    dataType:"json",  
                    success:function(data){  
                         
                         $('#number2').val(data.number2);  
                        $('#number3').val(data.number3); 
                        $('#number4').val(data.number4); 
                        $('#number5').val(data.number5); 
                        
                    }  
            }); 


            $('#edit').click(function () {
               
                var number2 = $('#number2').val();  
                var number3 = $('#number3').val(); 
                var number4 = $('#number4').val(); 
                var number5 = $('#number5').val(); 
                parseInt(number2);
                parseInt(number3);
                parseInt(number4);
                parseInt(number5);
                
                swal({
                        title: "ແກ້ໄຂຂໍ້ມູນ",
                        text: "ເຈົ້າຕ້ອງການແກ້ໄຂຂໍ້ມູນ ຫຼື່ບໍ່!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                        })
                        .then((willDelete) => {
                        if (willDelete) {

                            $.ajax({  
                                    url:"<?php echo base_url() . 'Setting/Edit_data'; ?>", 
                                    method:"POST",  
                                    data:{number2:number2,number3:number3,number4:number4,number5:number5},  
                                    dataType:"json",  
                                    success:function(data){  
                                       
                                        console.log("data");
                                        console.log(data);
                                        if(data.status=='ok'){

                                          
                                            
                                                $.toast({
                                                    heading: 'ແຈ້ງເຕືອນ!',
                                                    text: data.msg,
                                                    textFont: 'Saysettha OT',
                                                    bgColor: '#009900',
                                                    position: 'top-right',
                                                    icon: 'success',
                                                    loader: false,   
                                                    loaderBg: '#ff6666',
                                                    textColor: 'white'
                                                })

                                                $.ajax({  
                                                        url:"<?php echo base_url() . 'Setting/get_data'; ?>", 
                                                        method:"POST",  
                                                        data:{},  
                                                        dataType:"json",  
                                                        success:function(data){  
                                                            
                                                            $('#number2').val(data.number2);  
                                                            $('#number3').val(data.number3); 
                                                            $('#number4').val(data.number4); 
                                                            $('#number5').val(data.number5); 
                                                            
                                                        }  
                                                }); 
                                            
                                            
                                            
                                            }else{


                                            $.toast({
                                                    heading: 'ແຈ້ງເຕືອນ!',
                                                    text: data.msg,
                                                    textFont: 'Saysettha OT',
                                                    bgColor: '#cc3300',
                                                    position: 'top-right',
                                                    icon: 'error',
                                                    loader: false,   
                                                    loaderBg: '#ff6666',
                                                    textColor: 'white'
                                                })
                                        }
                                    }
                                });
                               
                            
                          
                        }      
                    });
                 
            });

        
         


        });  
</script>  