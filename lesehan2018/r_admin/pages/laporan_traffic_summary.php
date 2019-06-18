<div class="container">
    <div class="row">
        <div class="col-md-10"><h1 title="Laporan kondisi traffic terkini, sampai dengan tanggal yang ditunjukan (lihat dibawah judul)." style="margin: 0px;">SUMMARY TRAFFIC</h1><h3>Until <?php echo date('D, d M Y') ?></h3> </div> 
        <div class="col-md-2"><a href="index.php?menu=laporan_traffic"><button  class="btn btn-success" >LIVE REPORT</button></a></div>

        
        
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
    setInterval(traffic_kendaraan, 1000);

    function traffic_kendaraan() {
        //traffic_kendaraan
        $(document).ready(function() {
            $.ajax({
                url: "pages/api_detail/traffic_kendaraan_api_sum.php",
                method: "POST",
                success: function(data) {
                    $('#traffic_kendaraan').html(data);
                    // setInterval(fetch_data,1000);
                }
            });
        }); //end
    }

    setInterval(orang, 1000);

    function orang() {
        //orang
        $(document).ready(function() {
            $.ajax({
                url: "pages/api_detail/traffic_orang_sum.php",
                method: "POST",
                success: function(data) {
                    $('#orang').html(data);
                    // setInterval(fetch_data,1000);
                }
            });
        }); //end
    }

    setInterval(lokasi, 1000);

    function lokasi() {
        //lokasi
        $(document).ready(function() {
            $.ajax({
                url: "pages/api_detail/lokasi_api_sum.php",
                method: "POST",
                success: function(data) {
                    $('#lokasi').html(data);
                    // setInterval(fetch_data,1000);
                }
            });
        }); //end
    }
</script>