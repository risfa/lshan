<h3 align="left">Database Hadiah</h3>
<br/>
<div class="row">
        <div class="col-md-4" >
                <div class="form-group"> 
                    <label>Nama Hadiah</label>
                    <input type="text" class="form-control" id="Hadiah">
                </div>
                <div class="form-group"> 
                    <label>Jumlah</label>
                    <input type="text" class="form-control" id="Jumlah">
                </div>

                <div class="form-group"> 
                    <label>&nbsp;</label>
                    <button type="button" name="btn_add" id="btn_add" class="btn  btn-success" >Insert Data</button>
                </div>
        </div>
        
       
        
        <div id="live_data1"class="col-md-8"></div>

</div>

<script>
    $(document).ready(function() {
        function fetch_data() {
            $.ajax({
                url: "pages/tb_hadiah/select.php",
                method: "POST",
                success: function(data) {
                    $('#live_data1').html(data);

                }
            });
        }
        fetch_data();
                     setInterval(fetch_data,5000);
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
                url: "pages/tb_hadiah/insert.php",
                method: "POST",
                data: {
                    Hadiah: Hadiah,
                    Jumlah: Jumlah,
                    Status: Status,
                    Kategori: Kategori,
                    Awal : Awal
                },
                dataType: "text",
                success: function(data) {
                    alert(data);
                    fetch_data();
                    $('#Hadiah').val('')
                    $('#Jumlah').val('')
                    $('#Awal').val('')
                    $('#Status').val('')
                    $('#Kategori').val('')

                }
            })
        });

        function edit_data(id, text, column_name) {
            $.ajax({
                url: "pages/tb_hadiah/edit.php",
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
        $(document).on('blur', '.Hadiah_data', function() {
            var id = $(this).data("idhadiah");
            var Hadiah = $(this).text();
            edit_data(id, Hadiah, "Hadiah");
        });

        $(document).on('blur', '.Jumlah_data', function() {
            var id = $(this).data("idjumlah");
            var Jumlah = $(this).text();
            edit_data(id, Jumlah, "Jumlah");
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

        $(document).on('blur', '.Kategori_data', function() {
            var id = $(this).data("idkategori");
            var Kategori = $(this).text();
            edit_data(id, Kategori, "Kategori");
        });

        // end contenteditable

        $(document).on('click', '.btn_delete', function() {
            var id = $(this).data("id3");
            if (confirm("Are you sure you want to delete this?")) {
                $.ajax({
                    url: "pages/tb_hadiah/delete.php",
                    method: "POST",
                    data: {
                        id: id
                    },
                    dataType: "text",
                    success: function(data) {
                        alert(data);
                        fetch_data();
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
                    url: "pages/tb_hadiah/update.php",
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
                    url: "pages/tb_hadiah/update.php",
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