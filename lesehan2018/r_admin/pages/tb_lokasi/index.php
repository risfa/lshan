<html>

<head>
    <title>Live Table Data Edit</title>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
       <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>   -->
       <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> -->
   </head>

   <body>
    <div class="container">

        <h3 align="left">Data Lokasi</h3>
        <br />
        <div class="row">
            <div class="col-md-4">
                <table>

                    <div class="form-group">
                        <label>Latitude</label>
                        <input type="text" class="form-control" id="Latitude">
                    </div>

                    <div class="form-group">
                        <label>Longitude</label>
                        <input type="text" class="form-control" id="Longitude">
                    </div>

                    <div class="form-group">
                        <label>Lokasi</label>
                        <input type="text" class="form-control" id="Lokasi">
                        <br>
                        <button type="button" name="btn_add" id="btn_add" class="btn btn-success">Insert Data</button>
                    </div>
                </td>
            </tr>

        </table>
    </div>
    <div id="live_data" class="col-md-8">

    </div>
</div>
</div>
</body>

</html>
<script>
    $(document).ready(function() {
        function fetch_data() {
            $.ajax({
                url: "pages/tb_lokasi/select.php",
                method: "POST",
                success: function(data) {
                    $('#live_data').html(data);
                    // setInterval(fetch_data,1000);
                }
            });
        }
        fetch_data();
        $(document).on('click', '#btn_add', function() {

            var Latitude = $('#Latitude').val();
            var Longitude = $('#Longitude').val();
            var Lokasi = $('#Lokasi').val();

            if (Latitude == '') {
                alert("Latitude Tidak Boleh kosong");
                return false;
            }

            if (Longitude == '') {
                alert("Longitude Tidak Boleh kosong");
                return false;
            }

            if (Lokasi == '') {
                alert("Lokasi Tidak Boleh kosong");
                return false;
            }

            $.ajax({
                url: "pages/tb_lokasi/insert.php",
                method: "POST",
                data: {
                    Latitude: Latitude,
                    Longitude: Longitude,
                    Lokasi: Lokasi
                },
                dataType: "text",
                success: function(data) {
                    alert(data);
                    fetch_data();
                    $('#Latitude').val('')
                    $('#Longitude').val('')
                    $('#Lokasi').val('')
                }
            })
        });

        function edit_data(id, text, column_name) {
            $.ajax({
                url: "pages/tb_lokasi/edit.php",
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

        $(document).on('blur', '.Latitude_data', function() {
            var id = $(this).data("idlatitude");
            var Latitude = $(this).text();
            edit_data(id, Latitude, "Latitude");
        });
        $(document).on('blur', '.Longitude_data', function() {
            var id = $(this).data("idlongitude");
            var Longitude = $(this).text();
            edit_data(id, Longitude, "Longitude");
        });
        $(document).on('blur', '.Lokasi_data', function() {
            var id = $(this).data("idlokasi");
            var Lokasi = $(this).text();
            edit_data(id, Lokasi, "Lokasi");
        });

        // end contenteditable

        $(document).on('click', '.btn_delete', function() {
            var id = $(this).data("id3");
            if (confirm("Are you sure you want to delete this?")) {
                $.ajax({
                    url: "pages/tb_lokasi/delete.php",
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