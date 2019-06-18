<div class="col-md-6">
    <div class="widget widget-nopad" style="width: 98%">
        <div class="widget-content">
            <div class="widget big-stats-container" id="voucher_api2">

                <!-- /widget-content -->

            </div>

        </div>

    </div>
</div>

<div class="col-md-6">
	<div class="widget-content">
		<div class="widget big-stats-container" >
			<p>
				<b>Informasi Penting :</b> 
				<ol>
					<li>Pastikan bahwa dokumen sudah dengan benar ter-validasi</li>
					<li>Jika validasi via aplikasi silahkan cek Tab Aplikasi</li>
					<li>Jika validasi via Whatsapp pastikan nomor terdaftar dengan nomor pengirim sama</li>
				</ol>
			</p>
		</div>
	</div>
</div>

<div class="col-md-12">
    <div class="widget widget-nopad" id="voucher_api">

    </div>
</div>
<script>
    // setInterval(voucher_api, 1500);
    voucher_api();
    voucher_api2();
    function voucher_api() {
        //traffic_kendaraan
        $(document).ready(function() {
            $.ajax({
                url: "pages/ketupat_module/process/validasi_api.php",
                method: "POST",
                success: function(data) {
                    $('#voucher_api').html(data);
                    // setInterval(fetch_data,1000);
                }
            });
        }); //end
    }

    // setInterval(voucher_api2, 1500);

    function voucher_api2() {
        //orang
        $(document).ready(function() {
            $.ajax({
                url: "pages/ketupat_module/process/validasi_api2.php",
                method: "POST",
                success: function(data) {
                    $('#voucher_api2').html(data);
                    // setInterval(fetch_data,1000);
                }
            });
        }); //end
    }


    $(document).on('click', '#action', function() {

        var id = $(this).data("id3");
        if (confirm("Anda yakin akan me-validasi customer ini dengan informasi yang tersedia?")) {
        var customer = $(this).data("id6");
            $.ajax({
                url: "pages/ketupat_module/process/update_validasi.php",
                method: "POST",
                data: {
                    id: id, customer: customer
                },
                dataType: "text",
                success: function(data) {
                    alert(data);
                    voucher_api();
                    voucher_api2();
                }
            });
        }
    });

    $(document).on('click', '#batalkan', function() {
        var customer = $(this).data("id5");
        if (confirm("Anda yakin ingin membatalkan validasi orang ini?")) {
            
        var id = $(this).data("id4");
            $.ajax({
                url: "pages/ketupat_module/process/update_validasi_batal.php",
                method: "POST",
                data: {
                    id: id, customer: customer
                },
                dataType: "text",
                success: function(data) {
                    alert(data);
                    voucher_api();
                     voucher_api2();
                }
            });
        }
    });

     $(document).on('click', '#reminder_wa', function() {
        // alert('Under Construction , Waiting for mba sapi copy')
        var customer = $(this).data("id5");
        if (confirm("Anda yakin ingin mengirim reminder orang ini?")) {
            
        var id = $(this).data("id4");
            $.ajax({
                url: "pages/ketupat_module/process/reminder_wa.php",
                method: "POST",
                data: {
                    id: id, customer: customer
                },
                dataType: "text",
                success: function(data) {
                    alert(data);
                    voucher_api();
                     voucher_api2();
                }
            });
        }
    });

    

</script>