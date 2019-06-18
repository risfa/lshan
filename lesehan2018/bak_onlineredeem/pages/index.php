<html>  
      <head>  
          <!--  <title>Live Table Data Edit</title>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>   -->
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
      </head>  
      <body>  
           <div class="container">  
                <br />  
                <br />  
                <br />  
                <div class="table-responsive">  
                     <!-- <h3 align="center">Live Table Add Edit Delete using Ajax Jquery in PHP Mysql</h3><br />  --> 
                     <div id="live_data"></div>                 
                </div>  
           </div>  
      </body>  
 </html>  
 <script>  
 $(document).ready(function(){  
      function fetch_data()  
      {  
           $.ajax({  
                url:"code.php",  
                method:"POST",  
                success:function(data){  
                     $('#live_data').html(data);  
                     // setInterval(fetch_data,5000);
                }  
           });  
      }  
      fetch_data();  
      $(document).on('click', '#btn_add', function(){ 
          
            
           var NoVoucher = $('#NoVoucher').text();  
           var Kategori = $('#Kategori').text();  
           var Status = $('#Status').text();  
           var Reedem = $('#Reedem').text();  
           
            
           
           
           if(NoVoucher == '')  
           {  
                alert("No Voucher Tidak Boleh kosong");  
                return false;  
           }  
           if(Kategori == '')  
           {  
                alert("Kategori Tidak Boleh kosong");  
                return false;  
           }  
           if(Status == '')  
           {  
                alert("Status Tidak Boleh kosong");  
                return false;  
           }  
           if(Reedem == '')  
           {  
                alert("Reedem Tidak Boleh kosong");  
                return false;  
           }  

           
           $.ajax({  
                url:"code.php",  
                method:"POST",  
                data:{NoVoucher:NoVoucher, Kategori:Kategori, Status:Status, Reedem:Reedem},  
                dataType:"text",  
                success:function(data)  
                {  
                     alert(data);  
                     fetch_data();  
                }  
           })  
      });  
      function edit_data(id, text, column_name)  
      {  
           $.ajax({  
                url:"code.php",  
                method:"POST",  
                data:{id:id, text:text, column_name:column_name},  
                dataType:"text",  
                success:function(data){  
                     // alert(data);  
                     fetch_data();
                }  
           });  
      }  


      // contenteditable
    

       $(document).on('blur', '.NoVoucher_data', function(){  
           var id = $(this).data("idNoVoucher");  
           var NoVoucher = $(this).text();  
           edit_data(id, NoVoucher, "NoVoucher");  
      });  
       $(document).on('blur', '.Kategori_data', function(){  
           var id = $(this).data("idKategori");  
           var Kategori = $(this).text();  
           edit_data(id, Kategori, "Kategori");  
      });  
       $(document).on('blur', '.Status_data', function(){  
           var id = $(this).data("idStatus");  
           var Status = $(this).text();  
           edit_data(id, Status, "Status");  
      });  
       $(document).on('blur', '.Reedem_data', function(){  
           var id = $(this).data("idReedem");  
           var Reedem = $(this).text();  
           edit_data(id, Reedem, "Reedem");  
      });  
        

      // end contenteditable

      $(document).on('click', '.btn_delete', function(){  
           var id=$(this).data("id3");  
           if(confirm("Are you sure you want to delete this?"))  
           {  
                $.ajax({  
                     url:"delete.php",  
                     method:"POST",  
                     data:{id:id},  
                     dataType:"text",  
                     success:function(data){  
                          alert(data);  
                          fetch_data();  
                     }  
                });  
           }  
      });  
 });  
 </script>

 