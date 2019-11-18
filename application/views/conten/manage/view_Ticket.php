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
        <h2 class="mb-4">ໃບບິນການຂາຍ</h2>

        <div class="card mb-4">
            <div class="card-body">
                    
            <table class="table table-bordered" id="test_table"  cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th scope="col">ເລກບິນ</th>
                    <th scope="col">ງວດວັນທີ</th>
                    <th scope="col">ວັນທີອອກບິນ</th>
                    <th scope="col">ຜູ້ຂາຍ</th>
                    <th scope="col">ສະຖານະ</th>
                    
                   
                   
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


              



</body>
</html>

<script type="text/javascript" language="javascript" >  
 $(document).ready(function(){  
      var dataTable = $('#test_table').DataTable({  
           "processing":true,  
           "serverSide":true,  
           "order":[],  
           "ajax":{  
                url:"<?php echo base_url() . 'Ticket/fetch_data'; ?>",  
                type:"POST"  
           },  
           "columnDefs":[  
                {  
                     "targets":[2],  
                     "orderable":false,  
                },  
           ],  
      });  

     
      $(document).on('click', '.update_data', function(){  
                var ticket_id = $(this).attr("id");  
                console.log("ticket_id ="+ticket_id);
                 swal({
                        title: " ເຈົ້າຕ້ອງການຍົກເລີກ ຫຼືບໍ່!",
                        text: "ຢືນຢັນ",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                        })
                        .then((willDelete) => {
                        if (willDelete) {
                            console.log("ticket_id ="+ticket_id);
                            $.ajax({  
                                    url:"<?php echo base_url() . 'Ticket/update_data'; ?>", 
                                    method:"POST",  
                                    data:{ticket_id:ticket_id},  
                                    dataType:"json",  
                                    success:function(data){  
                                        console.log("ticket_id ="+ticket_id);
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