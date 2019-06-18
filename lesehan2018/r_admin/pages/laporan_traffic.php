<?php
    
    $connect = mysqli_connect("localhost", "dapps", "l1m4d1g1t", "dapps_joker_pertamina_lesehan2018");
    // $sqladmin = mysqli_query($connect,"SELECT * FROM tb_admin WHERE Id ='$_SESSION[id]'");
    // $admin = mysqli_fetch_array($sqladmin);
?>
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <h1 title="Rangkuman laporan kondisi traffic sampai dengan tanggal yang ditunjukan (lihat dibawah judul).
" style="margin: 0px; font-size: 40px">Daily TRAFFIC</h1>
              <!-- <h3 style="margin: 0px; margin-bottom: 10px;"><?php echo date('D, d M Y') ?></h3> -->
              <select id="tanggal">
                <?php
                    $query = mysqli_query($connect,'SELECT DATE(Waktu) FROM `tb_traffic_kendaraan` GROUP BY DATE(Waktu)');
                    while ($data =mysqli_fetch_array($query)) {
                          
                ?>
                  <option value="<?php echo $data[0]; ?>"><?php echo $data[0]; ?></option>
                <?php } ?>
              </select>


    </div>
    <br>
                
        <div class="col-md-2"><a href="index.php?menu=laporan_traffic_summary">
        <button class="btn btn-success" style="margin-bottom: 20px;" title="Laporan ">SUMMARY REPORT</button></a></div>
        <div class="row">
            <div class="col-md-10" id="traffic_kendaraan">
            </div>
            <div class="col-md-2" id="orang">
            </div>
        </div>

        <br>
        <div class="row"  id="lokasi">
        </div>
    </div>
</div>

<script>

    $('#tanggal').change(function(){
       // alert($('#tanggal').val()); 
       traffic_kendaraan($('#tanggal').val());
        orang($('#tanggal').val());
        lokasi($('#tanggal').val());


    })
    // setInterval(traffic_kendaraan, 1000);
    traffic_kendaraan('2018-06-09');
    orang('2018-06-09');
    lokasi('2018-06-09');

    function traffic_kendaraan(date) {
        //traffic_kendaraan
        $(document).ready(function() {
            $.ajax({
                url: "pages/api_detail/traffic_kendaraan_api.php?date="+date,
                method: "POST",
                success: function(data) {
                    $('#traffic_kendaraan').html(data);
                    // setInterval(fetch_data,1000);
                }
            });
        }); //end
    }

    // setInterval(orang, 1000);

    function orang(date) {
        //orang
        $(document).ready(function() {
            $.ajax({
                url: "pages/api_detail/traffic_orang.php?date="+date,
                method: "POST",
                success: function(data) {
                    $('#orang').html(data);
                    // setInterval(fetch_data,1000);
                }
            });
        }); //end
    }

    // setInterval(lokasi, 1000);

    function lokasi(date) {
        //lokasi
        $(document).ready(function() {
            $.ajax({
                url: "pages/api_detail/lokasi_api.php?date="+date,
                method: "POST",
                success: function(data) {
                    $('#lokasi').html(data);
                    // setInterval(fetch_data,1000);
                }
            });
        }); //end
    }
</script>