<html>

<head>
    <title>Live Table Data Edit</title>
</head>

<body>
    <div class="container">

        <h2 align="left">Daftar SPG Setiap Lokasi</h2>
        <div class="row">
            <div class="col-md-3">
                <input type="hidden" value="SPG" class="form-control" id="Jabatan">

                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" required  class="form-control" id="Nama">
                </div>
                <div class="form-group">
                    <label>Telepon</label>
                    <input type="text" required  class="form-control" id="Telepon">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="text" required  class="form-control" id="Password">
                </div>

                <div class="form-group">
                    <label>Username</label>
                    <input type="text" required  class="form-control" id="Username">
                </div>

                <div class="form-group">
                    <label>Lokasi</label>
                    <select required id="IdLokasi" class="form-control">
                        <option value=""></option>
                        <?php 
                        $connect = mysqli_connect("localhost", "dapps", "l1m4d1g1t", "dapps_joker_pertamina_lesehan2018");
                        $sql = mysqli_query($connect,"SELECT * FROM tb_lokasi ");
                        while($tampil = mysqli_fetch_array($sql)){
                            ?>
                            <option value="<?php echo $tampil['IdLokasi']?>">
                                <?php echo $tampil['Lokasi']?>
                            </option>

                            <?php  
                        } 
                        ?>
                    </select>
                </div>
                <button type="button" name="btn_add" id="btn_add" class="btn  btn-success">Insert Data</button>
            </div>
        <div id="live_data" class="col-md-9"></div>
        </div>
    </div>
</body>

</html>
<script>
    $(document).ready(function() {
        function fetch_data() {
            $.ajax({
                url: "pages/tb_spg/select.php",
                method: "POST",
                success: function(data) {
                    $('#live_data').html(data);
                    // setInterval(fetch_data,5000);
                }
            });
        }
        fetch_data();
        $(document).on('click', '#btn_add', function() {
            var Nama = $('#Nama').val();
            var Jabatan = $('#Jabatan').val();
            var Telepon = $('#Telepon').val();
            var Password = $('#Password').val();
            var Username = $('#Username').val();
            var IdLokasi = $('#IdLokasi').val();
            if (Nama == '') {
                alert("Nama Tidak Boleh kosong");
                return false;
            }
            if (Jabatan == '') {
                alert("Jabatan Tidak Boleh kosong");
                return false;
            }

            if (Telepon == '') {
                alert("Telepon Tidak Boleh kosong");
                return false;
            }
            if (Password == '') {
                alert("Password Tidak Boleh kosong");
                return false;
            }
            if (Username == '') {
                alert("Username Tidak Boleh kosong");
                return false;
            }
            if (IdLokasi == '') {
                alert("Lokasi Tidak Boleh kosong");
                return false;
            }

            $.ajax({
                url: "pages/tb_spg/insert.php",
                method: "POST",
                data: {
                    Nama: Nama,
                    Jabatan: Jabatan,
                    Telepon: Telepon,
                    Password: Password,
                    Username: Username,
                    IdLokasi: IdLokasi
                },
                dataType: "text",
                success: function(data) {
                    alert(data);
                    fetch_data();
                    $('#Nama').val('')
                    $('#Jabatan').val('')
                    $('#Telepon').val('')
                    $('#Password').val('')
                    $('#Username').val('')
                    $('#IdLokasi').val('')
                }
            })
        });

        function edit_data(id, text, column_name) {
            $.ajax({
                url: "pages/tb_spg/edit.php",
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
        $(document).on('blur', '.Nama_data', function() {
            var id = $(this).data("idnama");
            var Nama = $(this).text();
            edit_data(id, Nama, "Nama");
        });

        $(document).on('blur', '.Jabatan_data', function() {
            var id = $(this).data("idjabatan");
            var Jabatan = $(this).text();
            edit_data(id, Jabatan, "Jabatan");
        });

        $(document).on('blur', '.Telepon_data', function() {
            var id = $(this).data("idtelepon");
            var Telepon = $(this).text();
            edit_data(id, Telepon, "Telepon");
        });

        $(document).on('blur', '.Password_data', function() {
            var id = $(this).data("idpassword");
            var Password = $(this).text();
            edit_data(id, Password, "Password");
        });

        $(document).on('blur', '.Username_data', function() {
            var id = $(this).data("idusername");
            var Username = $(this).text();
            edit_data(id, Username, "Username");
        });

        // end contenteditable

        $(document).on('click', '.btn_delete', function() {
            var id = $(this).data("id3");
            if (confirm("Are you sure you want to delete this?")) {
                $.ajax({
                    url: "pages/tb_spg/delete.php",
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
    });
</script>
<style>
.subnavbar-inner {
    margin-top: 55px !important;
}
</style>