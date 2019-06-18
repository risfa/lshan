<h3 align="left">Report Posko</h3>
<br/>
<div class="row">

       
        
        <div id="live_data1"class="col-md-8"></div>

</div>

<script>
    $(document).ready(function() {
        function fetch_data() {
            $.ajax({
                url: "pages/tb_report/select.php",
                method: "POST",
                success: function(data) {
                    $('#live_data1').html(data);
                    // setInterval(fetch_data,3000);

                }
            });
        }
        fetch_data();
        $(document).on('click', '#btn_add', function() {
            var Hadiah = $('#Hadiah').val();
            var Jumlah = $('#Jumlah').val();
            var Awal = $('#Awal').val();
            var Status = $('#Status').val();
            var Kategori = $('#Kategori').val();

            if (Hadiah == '') {
                alert("Hadiah Tidak Boleh kosong");
                return false;
            }
            if (Jumlah == '') {
                alert("Jumlah Tidak Boleh kosong");
                return false;
            }
            if (Awal == '') {
                alert("Jumlah Awal Tidak Boleh kosong");
                return false;
            }

            if (Status == '') {
                alert("Status Tidak Boleh kosong");
                return false;
            }
            if (Kategori == '') {
                alert("Kategori Tidak Boleh kosong");
                return false;
            }

            $.ajax({
                url: "pages/tb_report/insert.php",
                method: "POST",
                data: {
                    Keterangan : Keterangan,
                    Message: Message,
                    IdLokasi : IdLokasi,
                    Waktu: Waktu,
                    Status : Status
                },
                dataType: "text",
                success: function(data) {
                    alert(data);
                    fetch_data();
                    $('#Keterangan').val('')
                    $('#Message').val('')
                    $('#IdLokasi').val('')
                    $('#Status').val('')
                    $('#Waktu').val('')

                }
            })
        });

        function edit_data(id, text, column_name) {
            $.ajax({
                url: "pages/tb_report/edit.php",
                method: "POST",
                data: {
                    id: id,
                    text: text,
                    column_name: column_name
                },
                dataType: "text",
                success: function(data) {
                    // alert(data);  
                    fetch_data();
                }
            });
        }

        // contenteditable
        $(document).on('blur', '.Keterangan_data', function() {
            var id = $(this).data("idketerangan");
            var Keterangan = $(this).text();
            edit_data(id, Keterangan, "Keterangan");
        });

        $(document).on('blur', '.Message_data', function() {
            var id = $(this).data("idmessage");
            var Message = $(this).text();
            edit_data(id, Message, "Message");
        });
        $(document).on('blur', '.Awal_data', function() {
            var id = $(this).data("idawal");
            var Awal = $(this).text();
            edit_data(id, Awal, "Awal");
        });

        $(document).on('blur', '.Status_data', function() {
            var id = $(this).data("idstatus");
            var Status = $(this).text();
            edit_data(id, Status, "Status");
        });

        $(document).on('blur', '.Waktu_data', function() {
            var id = $(this).data("idwaktu");
            var Waktu = $(this).text();
            edit_data(id, Waktu, "Waktu");
        });

        // end contenteditable

        $(document).on('click', '.btn_change_succes', function() {
            var id = $(this).data("id3");
            if (confirm("Are you sure you want to change this?")) {
                $.ajax({
                    url: "pages/tb_report/change_success.php",
                    method: "POST",
                    data: {
                        id: id
                    },
                    dataType: "text",
                    success: function(data) {
                        alert(data);
                        location.reload();
                    }
                });
            }
        });

           $(document).on('click', '.btn_change_unsucces', function() {
            var id = $(this).data("id3");
            if (confirm("Are you sure you want to change this?")) {
                $.ajax({
                    url: "pages/tb_report/change_unsuccess.php",
                    method: "POST",
                    data: {
                        id: id
                    },
                    dataType: "text",
                    success: function(data) {
                        alert(data);
                        location.reload();
                    }
                });
            }
        });

        

        // last btn delete

        // btn update


        $(document).on('click', '.btn_update_aktif', function() {
            var id = $(this).data("id3");
            if (confirm("Are you sure you want to change this?")) {
                $.ajax({
                    url: "pages/tb_report/update.php",
                    method: "POST",
                    data: {
                        id: id,
                        status: 'Non Aktif'
                    },
                    dataType: "text",
                    success: function(data) {
                        alert(data);
                        fetch_data();
                    }
                });
            }
        });


        $(document).on('click', '.btn_update_non_aktif', function() {
            var id = $(this).data("id3");
            if (confirm("Are you sure you want to change this?")) {
                $.ajax({
                    url: "pages/tb_report/update.php",
                    method: "POST",
                    data: {
                        id: id,
                        status: 'aktif'
                    },
                    dataType: "text",
                    success: function(data) {
                        alert(data);
                        fetch_data();
                    }
                });
            }
        });


        // last
    });
</script>
<style>
    .subnavbar-inner {
        margin-top: 55px !important;
    }
</style>