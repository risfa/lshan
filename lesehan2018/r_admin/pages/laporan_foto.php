                     
<div class="container">
    <div class="row">
        <h1>LIVE PICTURE STREAM | <?php echo date('D, d M Y') ?> </h1>
        <div>
        <div class="col-md-6" style="margin-left: -30px; margin-bottom: 30px;">
               <!-- TANGGAL -->
                <div class="col-md-4" >
                    <label>Tanggal</label>
                    <select   class="form-control" id="Tanggal">
                        <!-- <option>--Pilih Tanggal--</option> -->
        <?php 
        $_GET['posko_kota'];
         $connect = mysqli_connect("localhost", "dapps", "l1m4d1g1t", "dapps_joker_pertamina_lesehan2018");
            $Tanggal = mysqli_query($connect,'SELECT LEFT(Timestamp_waktu,10) as tanggal FROM tb_foto GROUP BY MONTH(Timestamp_waktu), YEAR(Timestamp_waktu), DATE(Timestamp_waktu) ORDER BY Timestamp_waktu ASC');
                     while($data = mysqli_fetch_assoc($Tanggal)){
                     ?>
                        <option value="<?php echo $data['tanggal'] ?>"><?php echo $data['tanggal'] ?></option>
                    <?php } ?>
                    </select>
                </div>
                <!-- LOKASI -->
                <div class="col-md-4">
                    <label>Lokasi</label>
                    <select name="Lokasi" class="form-control" id="Lokasi" >
                        <!-- <option>--Pilih Posko--</option> -->
                        <?php 
                        $Lokasi = mysqli_query($connect,'SELECT * from tb_lokasi ORDER BY Lokasi');
                       while($data = mysqli_fetch_assoc($Lokasi)){
                         ?>

                        <option value="<?php echo $data['IdLokasi']?>"><?php echo $data['Lokasi']?></option>
                    <?php 
                } 
                    ?>
                    </select>
                </div>
                <!-- <div class="col-md-4"><br>
                   <form method="post" action="pages/API/foto_api.php">
                   <input type="submit" class="btn btn-success" name="cari" value="CARI" >
                    </form>
                </div> -->
            </div>
        </div>
       
        <div class="row" style="display: block;">

            <div class="col-md-12" id="foto" >
            </div>
<!-- 
            <div class="span6" id="spg">
            </div> -->
        </div>
       <script>
 //spg
 /*$(document).ready(function() {
     $.ajax({
         url: "pages/API/spg_api.php",
         method: "POST",
         success: function(data) {
             $('#spg').html(data);
             // setInterval(fetch_data,1000);
         }
     });
 });*/
 //end

 //foto

$(document).ready(function(){


         show_image(4,$('#Tanggal option:selected').text());

         function show_image(posko_kota,tanggal){
             $.ajax({
                 url: "pages/API/foto_api.php?posko_kota="+posko_kota+"&tanggal="+tanggal,
                 method: "POST",
                 success: function(data) {
                     $('#foto').html(data);
                 }
             });
         	}

             $('#Lokasi').change(function(){
                show_image($('#Lokasi').val(),$('#Tanggal').val());
             });

             $('#Tanggal').change(function(){
                show_image($('#Lokasi').val(),$('#Tanggal').val());
             });








  });
 //end


 </script>

</div>
</div>
