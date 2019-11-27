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

    <h5 id="periods" class="mb-4">ບໍ່ອານຸຍາດໃຫ້ຂາຍ</h5>

        <div class="row">
            <div class="col-sm-12" style="position: relative; overflow: hidden; overflow-y: scroll; height: 320px; width: 100%; padding: 8px;">

                <table class="table table-bordered" id="data_table"   cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th scope="col">ລ/ດ</th>
                            <th scope="col">ເລກສ່ຽງ</th>
                            <th scope="col">ຈຳນວນເງີນ</th>
                            <th scope="col">ລືບ</th>
                        </tr>
                    </thead>
                        
                       
                      
                        
                    
                    </tbody>
                
                </table>

                    
            
            </div>
            <!-- <div class="col-sm-5">
            </div> -->
            <div class="row" style="padding: 15px;">
                <h2 id="total"  class="col-sm-12">ຍອດລວມ :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;0 ກີບ </h2>
                <div class="col-sm-6 number ">
                    <input class="form-control form-control-lg mb-3 is-valid" type="number" placeholder="ເລກສ່ຽງ"  disabled id="number">
                </div>
                <div class="col-sm-6 price">
                    <input class="form-control form-control-lg mb-3" type="number" placeholder="ຈຳນວນເງີນ" disabled id="price">
                </div>
                
            </div>
           

            <div style="width: 60%; padding-left: 30px;">
                <div class="row">
                    
                        <div class="d-flex border Click_monney" style="width: 33%; height: 80px; padding: 3px;"  data-price='7' >
                                                
                            <div class="flex-grow-1 bg-white p-4 manag" >
                                <center>
                                                            
                                    <font size="5" >7</font>
                                </center>
                            </div>
                        </div>
                        <div class="d-flex border Click_monney" style="width: 33%; height: 80px; padding: 3px;"  data-price='8' >
                                                
                            <div class="flex-grow-1 bg-white p-4 manag" >
                                <center>
                                                            
                                    <font size="5" >8</font>
                                </center>
                            </div>
                        </div>
                        <div class="d-flex border Click_monney" style="width: 33%; height: 80px; padding: 3px;"  data-price='9' >
                                                
                            <div class="flex-grow-1 bg-white p-4 manag" >
                                <center>
                                                            
                                    <font size="5" >9</font>
                                </center>
                            </div>
                        </div>

                        
                        <div class="d-flex border Click_monney" style="width: 33%; height: 80px; padding: 3px;"  data-price='4' >
                                                
                            <div class="flex-grow-1 bg-white p-4 manag" >
                                <center>
                                                            
                                    <font size="5" >4</font>
                                </center>
                            </div>
                        </div>
                        <div class="d-flex border Click_monney" style="width: 33%; height: 80px; padding: 3px;"  data-price='5' >
                                                
                            <div class="flex-grow-1 bg-white p-4 manag" >
                                <center>
                                                            
                                    <font size="5" >5</font>
                                </center>
                            </div>
                        </div>
                        <div class="d-flex border Click_monney" style="width: 33%; height: 80px; padding: 3px;"  data-price='6' >
                                                
                            <div class="flex-grow-1 bg-white p-4 manag" >
                                <center>
                                                            
                                    <font size="5" >6</font>
                                </center>
                            </div>
                        </div>
                        
                        <div class="d-flex border Click_monney" style="width: 33%; height: 80px; padding: 3px;"  data-price='1' >
                                                
                            <div class="flex-grow-1 bg-white p-4 manag" >
                                <center>
                                                            
                                    <font size="5" >1</font>
                                </center>
                            </div>
                        </div>
                        <div class="d-flex border Click_monney" style="width: 33%; height: 80px; padding: 3px;"  data-price='2' >
                                                
                            <div class="flex-grow-1 bg-white p-4 manag" >
                                <center>
                                                            
                                    <font size="5" >2</font>
                                </center>
                            </div>
                        </div>
                        <div class="d-flex border Click_monney" style="width: 33%; height: 80px; padding: 3px;"  data-price='3' >
                                                
                            <div class="flex-grow-1 bg-white p-4 manag" >
                                <center>
                                                            
                                    <font size="5" >3</font>
                                </center>
                            </div>
                        </div>
                        <div class="d-flex border Click_monney" style="width: 33%; height: 80px; padding: 3px;"  data-price='0' >
                                                
                            <div class="flex-grow-1 bg-white p-4 manag" >
                                <center>
                                                            
                                    <font size="5" >0</font>
                                </center>
                            </div>
                        </div>

                         <div class="d-flex border Click_000" style="width: 33%; height: 80px; padding: 3px;"  data-price='000' >
                                                
                            <div class="flex-grow-1 bg-white p-4 manag" >
                                <center>
                                                            
                                    <font size="5" >000</font>
                                </center>
                            </div>
                        </div>

                         <div class="d-flex border Click_clear" style="width: 33%; height: 80px; padding: 3px;"  >
                                                
                            <div class="flex-grow-1 bg-white p-4 manag" >
                                <center>
                                                            
                                    <font size="5" >ລ້າງ</font>
                                </center>
                            </div>
                        </div>
                    
                  
                   
                   
                </div>
            </div>
            <div style="width: 40%; padding-left: 15px;" >

                    
                        <div class="d-flex border Click_print" style="width: 100%; height: 110px; padding: 3px;" >
                                                
                            <div class="flex-grow-1 bg-white p-4 manag" >
                                <center>
                                                            
                                    <h1 style="margin : 15px;  font-size: 2.5vw; ">ພີມບິນ</h1>
                                </center>
                            </div>
                        </div>
                        <div class="d-flex border Click_reload" style="width: 100%; height: 110px; padding: 3px;" >
                                                
                            <div class="flex-grow-1 bg-white p-4 manag" >
                                <center>
                                                            
                                    <h1 style="margin : 15px;  font-size: 2.5vw;">ເລີ່ມໃໝ່</h1>
                                </center>
                            </div>
                        </div>
                        <div class="d-flex border Click_add" style="width: 100%; height: 110px; padding: 3px;" >
                                                
                            <div class="flex-grow-1 bg-white p-4 manag" >
                                <center>
                                                            
                                    <h1 style="margin : 15px;  font-size: 2.5vw;">ຂາຍ</h1>
                                </center>
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
     
    $.ajax({  

                    url:"<?php echo base_url() . 'Sale/get_Periods'; ?>", 
                    method:"POST",  
                    data:{},  
                    dataType:"json",  
                    success:function(data){  
                        //alert(data);
                         
                        if(data){
                            
                            document.getElementById("periods").innerHTML = 'ອອກຄັ້ງວັນທີ '+formatDate(data.Date_random);
                        }else{
                            swal({
                                    title: "ປິດການຂາຍແລ້ວ",
                                    text: "ບໍ່ອານຸຍາດໃຫ້ຂາຍ",
                                    icon: "warning",
                                  
                                });
                        }
                        
                    }  
    }); 

    function formatDate(date) {
    var d = new Date(date),
        month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear();

        if (month.length < 2) 
            month = '0' + month;
        if (day.length < 2) 
            day = '0' + day;

        return [day, month, year].join('-');
    }

    function attive() {

            var number = document.getElementById("number");
            number.classList.toggle("is-valid");
            var price = document.getElementById("price");
            price.classList.toggle("is-valid");
            return 0;  
    }

    function conver_number_to_string(number) {
        
        console.log(new Intl.NumberFormat('ja-JP').format(parseInt(number)));
        return new Intl.NumberFormat('ja-JP').format(number);
    }

    function clear() {
        var text_nem = document.getElementById("price");
        $('#number').val(''); 
        $('#price').val(''); 

        if(text_nem.classList.contains("is-valid"))
        {
            attive();
        }
        
        return 0;
    }

    function count_table(table_name) {
        var count = 0;
        var table = document.getElementById(table_name);
                for (var i = 0, row; row = table.rows[i]; i++) {
                    count++;
                }
        console.log('count table :'+count);
        return count;
    }

    function count_tatal(table_name) {
        var count = 0;
        var table = document.getElementById(table_name);
                for (var i = 0, row; row = table.rows[i]; i++) {
                   
                    //count += parseInt(document.getElementById(table_name).rows[i].cells.item(row).innerHTML);
                    if(i > 0){
                        console.log(parseInt(document.getElementById(table_name).rows[i].cells.item(2).innerHTML));
                        count += parseInt(document.getElementById(table_name).rows[i].cells.item(2).innerHTML);
                    }
                    
                }
                
        return 'ຍອດລວມ : '+conver_number_to_string(count)+' ກີບ ';
    }


        $(document).on('click', '.number', function(){ 
            attive();
        });

        $(document).on('click', '.price', function(){ 
            attive();
        });

        $(document).on('click', '#number', function(){ 
            attive();
        });

        $(document).on('click', '#price', function(){ 
            attive();
        });

       
        $('.Click_monney').click(function () {
               
               var number_text = $('#number').val(); 
               var input = $('.is-valid').val(); 
               var number = $(this).data("price");
               var text_nem = document.getElementById("number");

               if(number_text.length > 2 &&  text_nem.classList.contains("is-valid")){
                    attive();
                    input = $('.is-valid').val(); 
                    $('.is-valid').val(input+number);  
               }else{
                $('.is-valid').val(input+number);  
               }
        });

        $('.Click_000').click(function () {
               
            
               var input = $('.is-valid').val(); 
               var number = $(this).data("price");
               var text_nem = document.getElementById("price");

               if(text_nem.classList.contains("is-valid")){
                    $('.is-valid').val(input+number);  
               }
        });

        $('.Click_clear').click(function () {
               
            clear();
        });

        $('.Click_reload').click(function () {
               
            location.reload();
        });

        $('.Click_add').click(function () {
               
           
            var count = count_table("data_table");
            var number = $('#number').val();
            var price = $('#price').val();
            //console.log(count);
            if(number.length > 1 && price.length > 3){
                var html_code = "<tr id='row"+count+"'>";
                        html_code += "<td  contenteditable='false' >"+count+"</td>";
                        html_code += "<td  contenteditable='false' class='item_number'>"+number+"</td>";               
                        html_code += "<td  contenteditable='false' class='item_price'>"+price+"</td>";
                        html_code += "<td> <button type='button' name='remove' data-row='"+count+"' class='btn btn-danger remove'><i class='far fa-trash-alt'></i></button></td>";
                        html_code += "</tr>";  
                        $('#data_table').append(html_code);
            
               var tatal = count_tatal("data_table");
               document.getElementById("total").innerHTML = tatal;
               document.getElementById("row"+count).scrollIntoView();
               clear();
            }else{
                $.toast({
                                heading: 'ແຈ້ງເຕືອນ!',
                                text: 'ຂໍ້ມູນບໍ່ຖືກຕ້ອງ',
                                textFont: 'Saysettha OT',
                                bgColor: '#cc3300',
                                position: 'top-right',
                                icon: 'error',
                                loader: false,   
                                loaderBg: '#ff6666',
                                textColor: 'white'
                            })
            }
           
            
        });

        $(document).on('click', '.remove', function(){

            var delete_row = $(this).data("row");
            $('#row' + delete_row).remove();
            var tatal = count_tatal("data_table");
               document.getElementById("total").innerHTML = tatal;

        });


        $(document).on('click', '.Click_print', function(){

            if(count_table("data_table") != 1){

                var item_number = [];
                var item_price = [];        
                            
                $('.item_number').each(function(){
                    item_number.push($(this).text());
                });
                $('.item_price').each(function(){
                    item_price.push($(this).text());
                });
                
                               
                swal({
                        title: "ເຈົ້າຕ້ອງການພີມບິນ ຫຼືບໍ່ ?",
                        text: "ຢື່ນຢັນຖ້າຕ້ອງການ",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                        })
                        .then((willDelete) => {
                        if (willDelete) {

                            console.log("item_number");
                            console.log(item_number);
                            console.log("item_price");
                            console.log(item_price);
                            $.ajax({  
                                    url:"<?php echo base_url() . 'Sale/insert_sale'; ?>", 
                                    method:"POST",  
                                    data:{item_number:item_number,item_price:item_price},  
                                    dataType:"json",  
                                    success:function(data){  
                                       
                                        console.log("data");
                                        console.log(data);
                                        if(data.status=='ok'){

                                            $.toast({
                                                    heading: 'ແຈ້ງເຕືອນ!',
                                                    text: 'ຂາຍສຳເລັດ',
                                                    textFont: 'Saysettha OT',
                                                    bgColor: '#33cc33',
                                                    position: 'top-right',
                                                    icon: 'error',
                                                    loader: false,   
                                                    loaderBg: '#ff6666',
                                                    textColor: 'white'
                                                })
                                             location.reload();

                                           
                                        }else if(data.status=='Full'){


                                                 $.toast({
                                                    heading: 'ແຈ້ງເຕືອນ!',
                                                    text: 'ເລກ: '+data.Number+' ຍັງເຫຼືອ: '+data.total+' ກີບ',
                                                    textFont: 'Saysettha OT',
                                                    bgColor: '#1a1aff',
                                                    position: 'top-right',
                                                    icon: 'error',
                                                    loader: false,   
                                                    loaderBg: '#ff6666',
                                                    textColor: 'white'
                                                })
                                        }else{


                                                $.toast({
                                                        heading: 'ແຈ້ງເຕືອນ!',
                                                        text: 'insert ບໍ່ສຳເລັດ',
                                                        textFont: 'Saysettha OT',
                                                        bgColor: '#cc3300',
                                                        position: 'top-right',
                                                        icon: 'error',
                                                        loader: false,   
                                                        loaderBg: '#ff6666',
                                                        textColor: 'white'
                                                    })
                                        }
                                    },
                                    error: function (error) {
                                       console.log(error);
                                        $.toast({
                                                        heading: 'ແຈ້ງເຕືອນ!',
                                                        text: 'ບໍ່ສາມາດຂາຍໄດ້ ',
                                                        textFont: 'Saysettha OT',
                                                        bgColor: '#cc3300',
                                                        position: 'top-right',
                                                        icon: 'error',
                                                        loader: false,   
                                                        loaderBg: '#ff6666',
                                                        textColor: 'white'
                                                    })
                                    }
                                });
                               
                            
                          
                        }      
                    });

            }else{
                $.toast({
                                heading: 'ແຈ້ງເຕືອນ!',
                                text: 'ຂໍ້ມູນບໍ່ມີໃນຕາຕະລາງ',
                                textFont: 'Saysettha OT',
                                bgColor: '#cc3300',
                                position: 'top-right',
                                icon: 'error',
                                loader: false,   
                                loaderBg: '#ff6666',
                                textColor: 'white'
                            })
            }

        });







 });  
 </script>  
