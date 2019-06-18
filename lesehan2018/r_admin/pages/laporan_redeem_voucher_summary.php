<div class="container">
    <div class="row">
        <h1>SUMMARY VOUCHER YANG TELAH DI REDEEM </h1> 
        <h3> <?php echo date('D, d M Y') ?> </h3>
<!--         <a href="index.php?menu=laporan_traffic">
        <button class="btn btn-info" style="margin-bottom: 20px;" title="Berisi keterangan report traffic per-hari">LIVE REPORT</button></a> -->
        <div class="row">
            <!-- <div class="col-md-10" id="traffic_kendaraan">
            </div> -->
                <div class="span6" id="redeem_code">
                </div>
                <div class="span6">   </div>

        </div>
                <div id="online"></div>

        <br>
        <div class="row"  id="lokasi" style="margin: 0px;">
        </div>
    </div>
</div>

<script>
    // setInterval(traffic_kendaraan, 1000);
    redeem_code_api();
    online();
    function redeem_code_api(){
        $.ajax({
                url: "pages/API/redeem_code_api.php",
                method: "POST",
                success: function(data) {
                    $('#redeem_code').html(data);
                    // setInterval(fetch_data,1000);
                }
            });
    }

    function online(){
            $.ajax({
                url: "pages/api_detail/reedem_voucher_online_api.php",
                method: "POST",
                success: function(data) {
                    $('#online').html(data);
                    // setInterval(fetch_data,1000);
                }
            });
    }

    setInterval(lokasi, 1000);

    function lokasi() {
        //lokasi
        $(document).ready(function() {
            $.ajax({
                url: "pages/api_detail/reedem_voucher_api_sum.php",
                method: "POST",
                success: function(data) {
                    $('#lokasi').html(data);
                    // setInterval(fetch_data,1000);
                }
            });
        }); //end
    }
</script>