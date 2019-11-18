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
        <h2 class="mb-4">ເປີດ/ປິດງວດຂາຍ</h2>

        <div class="card mb-4">
            <div class="card-body">
                    <div align="right">   
                    <button type="button" class="btn btn-success" title="ເພີ້ມ" name="add" id="add" >ເປີດງວດ</button>
                    
                    <h1> </h1>
                    </div>
                 <!-- <p>Bordered table:</p> -->
            <table class="table table-bordered" id="test_table"  cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th scope="col">ລະຫັດ</th>
                    <th scope="col">ງວດວັນທີ</th>
                    <th scope="col">ເລີ້ນຂາຍ</th>
                    <th scope="col">ຜູ້ອະນຸຍາດ</th>
                    <th scope="col">ວັນທີຍຸດຂາຍ</th>
                    <th scope="col">ຜູ້ສັງປິດ</th>
                   
                   
                    <th scope="col">Action</th>
                </tr>
                </thead>
                
                <tbody>
                    
                
                </tbody>
              
            </table>
            </div>
        </div>
    </div>
</div>


                <div id="add_data_Modal" class="modal fade">
                <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    
                    <h4 id="insert_h" class="modal-title">ເພີ້ມງວດວັນທີ</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                <form method="post" id="insert_form" autocomplete="off">
                               
                            <div class="form-group row">
                                    
                                    <div class="col-sm-5">
                                        <label  >ງວດວັນທີເລກອອກ</label>
                                        <input type="text" class="form-control" name="Date_random" id="Date_random" >
                                    </div>
                                   

                            </div>
                           
                            
                                <br />
                                <input type="hidden" name="periods_id" id="periods_id" />
                                <input type="hidden" name="status" id="status" />
                                <input type="submit" name="insert" id="insert" value="ເພີ້ມລາຍການ" class="btn btn-success" />
                                

                                <h5> </h5>
                                        <div id="myAlert" class="alert alert-danger collapse">
                                                <button type="button" class="close" id="linkClose">&times;</button>
                                                <strong>ຜິດພາດ! :</strong> ກະລູນາປ້ອນຂໍ້ມູນໃຫ້ຄົບ ຂໍຂອບໃຈ.
                                        </div>

                            </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
                </div>
                </div>
                </div>


                <div id="add_data_Modal_close" class="modal fade">
                <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    
                    <h4 id="insert_h" class="modal-title">ເພີ້ມງວດວັນທີ</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                <form method="post" id="close_form" autocomplete="off">
                               
                            <div class="form-group row">
                                    
                                    <div class="col-sm-5">
                                        <label  >ເລກສາມໂຕທີ່ອອກ XXX</label>
                                        <input type="text" class="form-control" name="number" id="number" >
                                    </div>

                                   
                                   

                            </div>
                           
                            
                                <br />
                               
                                <button type="button" name="close" id="close_Periods"  class="btn btn-success">ປິດງວດ</button>
                                

                                <h5> </h5>
                                        <div id="myAlert" class="alert alert-danger collapse">
                                                <button type="button" class="close" id="linkClose">&times;</button>
                                                <strong>ຜິດພາດ! :</strong> ກະລູນາປ້ອນຂໍ້ມູນໃຫ້ຄົບ ຂໍຂອບໃຈ.
                                        </div>

                            </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
                </div>
                </div>
                </div>



</body>
</html>

<script type="text/javascript" language="javascript" >  
 $(document).ready(function(){  
      var dataTable = $('#test_table').DataTable({  
           "processing":true,  
           "serverSide":true,  
           "order":[],  
           "ajax":{  
                url:"<?php echo base_url() . 'Periods/fetch_data'; ?>",  
                type:"POST"  
           },  
           "columnDefs":[  
                {  
                     "targets":[2],  
                     "orderable":false,  
                },  
           ],  
      });  

      $("#Date_random").datetimepicker({format:'d-m-Y'});


      $('#add').click(function () {
               
               $('#add_data_Modal').modal('show');
               $('#insert').val("ເພີ້ມງວດ");
               $('#insert_form')[0].reset();
               $('#status').val('Insert');
                 
           });

        
        




           $('#linkClose').click(function () {
               $('#myAlert').hide('fade');
           });


            $('#insert_form').on("submit", function(event){  
           event.preventDefault();  
            if($('#Date_random').val() == '')  
           {  
               $('#myAlert').show('fade');  
           }
          
           
  
           else  
           {  
           $.ajax({  
               url:"<?php echo base_url() . 'Periods/add_data'; ?>",  
               method:"POST",  
               dataType:"json",  
               data:$('#insert_form').serialize(),  
               beforeSend:function(){  
               $('#insert').val("ເພີ້ມລາຍການ");  
               },  
               success:function(data){  
               $('#insert_form')[0].reset();  
               $('#add_data_Modal').modal('hide');  
               dataTable.ajax.reload();
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

                    $('#insert_form')[0].reset();  

                    dataTable.ajax.reload();
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






           $(document).on('click', '.close_data', function(){  

            
                 $('#add_data_Modal_close').modal('show');
                 

            });


           
           $(document).on('click', '#close_Periods', function(){  
                var number = $('#number').val();
                var str = number.length;
                console.log("1");
              
                console.log("2");
                console.log(str);
                
                if(parseInt(number, 10) && (parseInt(str) == 3)){
                    console.log("3++++++");
                   


                    $.ajax({  
                                    url:"<?php echo base_url() . 'Periods/close_periods'; ?>", 
                                    method:"POST",  
                                    data:{number:number},  
                                    dataType:"json",  
                                    success:function(data){  
                                        
                                        console.log("data");
                                        console.log(data);
                                        dataTable.ajax.reload();
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

                                            $('#insert_form')[0].reset();  
                                            $('#add_data_Modal_close').modal('hide'); 
                                            dataTable.ajax.reload();
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
                }else{


                    if(parseInt(str) != 3){

                        $.toast({
                                                    heading: 'ແຈ້ງເຕືອນ!',
                                                    text: 'ຕົວເລກ 3ຕົວ ເທົ່ານັ້ນ.....',
                                                    textFont: 'Saysettha OT',
                                                    bgColor: '#cc3300',
                                                    position: 'top-right',
                                                    icon: 'error',
                                                    loader: false,   
                                                    loaderBg: '#ff6666',
                                                    textColor: 'white'
                                                })

                    }else{

                        $.toast({
                                                    heading: 'ແຈ້ງເຕືອນ!',
                                                    text: 'ຂໍ້ມູນຕ້ອງເປັນ ຕົວເລກ ເທົ່ານັ້ນ...',
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
 });  
 </script>  