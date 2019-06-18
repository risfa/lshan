<html>

<head>
    <title>Live Table Data Edit</title>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> -->
</head>
    <div class="container">
        <br />
        <br />
        <br />

        <h3 align="center">Jenis Kendaraan</h3>
        <br/>
        <div class="row">
            <div class="col-md-4">
                <table>

                    <tr>
                        <td>
                            <div class="form-group">
                                <label>Jenis Kendaraan</label>
                                <input type="text" class="form-control" id="Kendaraan">
                                <br>
                                <button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">Insert Data</button>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
            <div id="live_data"></div>
        </div>
    </div>

</html>
<script>
    $(document).ready(function() {
        function fetch_data() {
            $.ajax({
                url: "pages/tb_jenis_kendaraan/select.php",
                method: "POST",
                success: function(data) {
                    $('#live_data').html(data);
                    // setInterval(fetch_data,5000);
                }
            });
        }
        fetch_data();
        $(document).on('click', '#btn_add', function() {

            var Kendaraan = $('#Kendaraan').val();

            if (Kendaraan == '') {
                alert("Jenis Kendaraan Tidak Boleh kosong");
                return false;
            }

            $.ajax({
                url: "pages/tb_jenis_kendaraan/insert.php",
                method: "POST",
                data: {
                    Kendaraan: Kendaraan
                },
                dataType: "text",
                success: function(data) {
                    alert('berhasil insert data');
                    fetch_data();

                    $('#Kendaraan').val('')
                }
            })
        });

        function edit_data(id, text, column_name) {
            $.ajax({
                url: "pages/tb_jenis_kendaraan/edit.php",
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

        $(document).on('blur', '.Kendaraan_data', function() {
            var id_Kendaraan = $(this).data("idkendaraan");
            var Kendaraan = $(this).text();
            edit_data(id_Kendaraan, Kendaraan, "Kendaraan");
        });

        // end contenteditable

        $(document).on('click', '.btn_delete', function() {
            var id = $(this).data("id3");
            if (confirm("Are you sure you want to delete this?")) {
                $.ajax({
                    url: "pages/tb_jenis_kendaraan/delete.php",
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