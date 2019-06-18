<html>

<head>
    <!-- <title>Live Table Data Edit</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> -->
</head>

<body>
    <div class="container">
        <br />
        <br />
        <br />
        <div class="table-responsive">
            <h3 align="center">Customer</h3>
            <br/>
            <!-- <div class="row">
                <div class="col-md-4">
                    <table>

                        <tr>
                            <td>
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" class="form-control" id="Nama">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div class="form-group">
                                    <label>Telepon</label>
                                    <input type="text" class="form-control" id="Telepon">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <input type="text" class="form-control" id="Alamat">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div class="form-group">
                                    <label>Sumber</label>
                                    <input type="text" class="form-control" id="Sumber">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" class="form-control" id="Email">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="text" class="form-control" id="Password">
                                    <br>
                                    <button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">Insert Data</button>
                                </div>
                            </td>
                        </tr>

                    </table>
                </div> -->
                <div id="live_data1"></div>
            </div>
        </div>
</body>

</html>
<script>
    $(document).ready(function() {
        function fetch_data() {
            $.ajax({
                url: "pages/tb_customer/select.php",
                method: "POST",
                success: function(data) {
                    $('#live_data1').html(data);
                     setInterval(fetch_data,3000);

                }
            });
        }
        fetch_data();
        $(document).on('click', '#btn_add', function() {
            var Nama = $('#Nama').val();
            var Telepon = $('#Telepon').val();
            var Alamat = $('#Alamat').val();
            var Sumber = $('#Sumber').val();
            var Email = $('#Email').val();
            var Password = $('#Password').val();
            if (Nama == '') {
                alert("Nama Tidak Boleh kosong");
                return false;
            }
            if (Telepon == '') {
                alert("Telepon Tidak Boleh kosong");
                return false;
            }

            if (Alamat == '') {
                alert("Alamat Tidak Boleh kosong");
                return false;
            }
            if (Sumber == '') {
                alert("Sumber Tidak Boleh kosong");
                return false;
            }
            if (Email == '') {
                alert("Email Tidak Boleh kosong");
                return false;
            }
            if (Password == '') {
                alert("Password Tidak Boleh kosong");
                return false;
            }

            $.ajax({
                url: "pages/tb_customer/insert.php",
                method: "POST",
                data: {
                    Nama: Nama,
                    Telepon: Telepon,
                    Alamat: Alamat,
                    Sumber: Sumber,
                    Email: Email,
                    Password: Password
                },
                dataType: "text",
                success: function(data) {
                    alert(data);
                    fetch_data();
                    $('#Nama').val('')
                    $('#Telepon').val('')
                    $('#Alamat').val('')
                    $('#Sumber').val('')
                    $('#Email').val('')
                    $('#Password').val('')
                }
            })
        });

        function edit_data(id, text, column_name) {
            $.ajax({
                url: "pages/tb_customer/edit.php",
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

        $(document).on('blur', '.Telepon_data', function() {
            var id = $(this).data("idtelepon");
            var Telepon = $(this).text();
            edit_data(id, Telepon, "Telepon");
        });

        $(document).on('blur', '.Alamat_data', function() {
            var id = $(this).data("idalamat");
            var Alamat = $(this).text();
            edit_data(id, Alamat, "Alamat");
        });

        $(document).on('blur', '.Sumber_data', function() {
            var id = $(this).data("idsumber");
            var Sumber = $(this).text();
            edit_data(id, Sumber, "Sumber");
        });

        $(document).on('blur', '.Email_data', function() {
            var id = $(this).data("idemail");
            var Email = $(this).text();
            edit_data(id, Email, "Email");
        });

        // end contenteditable

        $(document).on('click', '.btn_delete', function() {
            var id = $(this).data("id3");
            if (confirm("Are you sure you want to delete this?")) {
                $.ajax({
                    url: "pages/tb_customer/delete.php",
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
    .subnavbar-inner
    {
        margin-top:55px !important;
    }
</style>