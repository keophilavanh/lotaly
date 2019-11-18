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
        <h2 class="mb-4">ຂໍ້ມູນຜູ້ໃຊ້ລະບົບ</h2>

        <div class="card mb-4">
            <div class="card-body">
                    <div align="right">   
                    <button type="button" class="btn btn-success" title="ເພີ້ມ" name="add" id="add" >ເພີ້ມຂໍ້ມູນພະນັກງານ</button>
                    
                    <h1> </h1>
                    </div>
                 <!-- <p>Bordered table:</p> -->
            <table class="table table-bordered" id="test_table"  cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th scope="col">ລະຫັດ</th>
                    <th scope="col">ຊື່ແລະນາມສະກຸນ</th>
                   
                    <th scope="col">ເບີໂທ</th>
                    <th scope="col">ທີ່ຢູ່</th>
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
                    
                    <h4 id="insert_h" class="modal-title">ເພີ້ມລາຍການ</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                <form method="post" id="insert_form" autocomplete="off">
                               
                            <div class="form-group row">
                                    
                                    <div class="col-sm-5">
                                        <label  >ຊື່ຜູ້ໃຊ້</label>
                                        <input type="text" class="form-control" name="firstName" id="firstName" >
                                    </div>
                                    
                                    <div class="col-sm-5">
                                            <label >ນາມສະກຸນ</label>
                                            <input type="text" class="form-control" name="lastName" id="lastName" >
                                    </div>
                                   
                                   
                            </div>
                            <div class="form-group row">
                                    
                                    <div class="col-sm-5">
                                        <label  >ເບີໂທ</label>
                                        <input type="text" class="form-control" name="phone" id="phone" >
                                    </div>
                            </div>
                            <div class="form-group row">
                                    
                                   
                                    <div class="col-sm-12">
                                            <label >ທີຢູ່ປັດຈຸບັນ</label>
                                            <textarea class="form-control"  rows="3" name="Address" id="Address"></textarea>
            
                                    </div>
                            </div>
                            <div class="form-group row">
            
                                <div class="col-sm-5">
                                        <label >Username</label>
                                        <input type="text" class="form-control"  name="Username" id="Username" >
            
                                </div>
                                <div class="col-sm-5">
                                    <label >ສິດ</label>
                                    <select class="form-control"  name="Type" id="Type">
                                        
                                        <option value="Admin">Admin</option>
                                        <option value="Employee">Employee</option>
                                       
                                        
                                    </select>
            
                            </div>
                            </div>
                            <div class="form-group row">
            
                                <div class="col-sm-5">
                                        <label >Password</label>
                                        <input type="text" class="form-control"  name="Password" id="Password" >
            
                                </div>
                            </div>
                                <br />
                                <input type="hidden" name="user_id" id="user_id" />
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



</body>
</html>

<script type="text/javascript" language="javascript" >  
 $(document).ready(function(){  
      var dataTable = $('#test_table').DataTable({  
           "processing":true,  
           "serverSide":true,  
           "order":[],  
           "ajax":{  
                url:"<?php echo base_url() . 'Users/fetch_user'; ?>",  
                type:"POST"  
           },  
           "columnDefs":[  
                {  
                     "targets":[0,4],  
                     "orderable":false,  
                },  
           ],  
      });  


      $('#add').click(function () {
               
               $('#add_data_Modal').modal('show');
               $('#insert').val("ເພີ້ມພະນັກງານ");
               $('#insert_form')[0].reset();
               $('#status').val('Insert');
                 
           });

        
           $('#add').click(function () {
               
               $('#add_data_Modal').modal('show');
               $('#insert').val("ເພີ້ມພະນັກງານ");
               $('#insert_form')[0].reset();
               $('#status').val('Insert');
                 
           });




           $('#linkClose').click(function () {
               $('#myAlert').hide('fade');
           });


            $('#insert_form').on("submit", function(event){  
           event.preventDefault();  
            if($('#Username').val() == '')  
           {  
               $('#myAlert').show('fade');  
           }
           else if($('#Password').val() == '')  
           {  
               $('#myAlert').show('fade');  
           }  
           else if($('#firstName').val() == '')  
           {  
               $('#myAlert').show('fade');  
           } 
           else if($('#lastName').val() == '')  
           {  
               $('#myAlert').show('fade');  
           } 
           else if($('#phone').val() == '')  
           {  
               $('#myAlert').show('fade');  
           } 
           else if($('#Address').val() == '')  
           {  
               $('#myAlert').show('fade');  
           } 
           
  
           else  
           {  
           $.ajax({  
               url:"<?php echo base_url() . 'Users/add_data'; ?>",  
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






           $(document).on('click', '.edit_data', function(){  
                var user_id = $(this).attr("id");  
                
                $.ajax({  
                    url:"<?php echo base_url() . 'Users/get_data'; ?>", 
                    method:"POST",  
                    data:{user_id:user_id},  
                    dataType:"json",  
                    success:function(data){  
                         
                        $('#firstName').val(data.user_fname);  
                        $('#lastName').val(data.user_lname); 
                        $('#phone').val(data.user_phone); 
                        $('#Address').val(data.user_address); 
                        $('#Username').val(data.username); 
                        $('#Password').val(data.decrypt); 

                        $('#user_id').val(data.user_id);  
                        $('#Type').val(data.permission);
                       
                        $('#add_data_Modal').modal('show');
                        $('#insert').val("ແກ້ໄຂຂໍ້ມູນພະນັກງານ");
                        $('#status').val('Update');  
                    }  
                });  
            });


           
           $(document).on('click', '.delete_data', function(){  
                var user_id = $(this).attr("id");  
                var status ='Delete';
                 swal({
                        title: "ລົບຂໍ້ມູນ",
                        text: "ເຈົ້າຕ້ອງການລົບຂໍ້ມູນ ຫຼື່ບໍ່!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                        })
                        .then((willDelete) => {
                        if (willDelete) {

                            $.ajax({  
                                    url:"<?php echo base_url() . 'Users/delete_data'; ?>", 
                                    method:"POST",  
                                    data:{user_id:user_id},  
                                    dataType:"json",  
                                    success:function(data){  
                                        dataTable.ajax.reload();
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
                
                  
            }); 
 });  
 </script>  