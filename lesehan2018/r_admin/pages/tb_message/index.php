<html>

<head>
    <title>Live Table Data Edit</title>
   <!--  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> -->
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
</head>
<body>
    <div class="container">
        <br />
        <br />
        <br />
        <h3 align="center">Messages</h3>
        <br/>
        <div class="row">
            <div class="col-md-4">
                <table>
                    <tr>
                        <td>
                            <div class="form-group">
                                <label>Judul</label>
                                <input type="text" class="form-control" id="Judul">
                                <br>
                                <div class="form-group">
                                    <label>Messages</label>
                                    <input type="text" class="form-control" id="Message">
                                    <br>
                                    
                                    <select id="IdLokasi">
                                     <?php 
                                      $connect = mysqli_connect("localhost", "dapps", "l1m4d1g1t", "dapps_joker_pertamina_lesehan2018");
                                      $sql = mysqli_query($connect,"SELECT * FROM tb_lokasi ");
                                      while($tampil = mysqli_fetch_array($sql)){
                                         ?>
                                        <option style="margin-top: 20px;"  value="<?php echo $tampil['IdLokasi']?>"><?php echo $tampil['Lokasi']?></option>
                                        <?php  
                                        } 
                                        ?>
                                    </select>
                                    <br>
                                    <select id="keterangan" style="margin-top: 20px;">
                                        <option value="Reminder">Reminder</option>
                                        <option value="Umum">Umum</option>
                                        <option value="Urgent">Urgent</option>
                                    </select>
                                    <br>
                                    <button style="margin-top: 20px;" type="button" name="btn_add" id="btn_add" class="btn btn-md btn-success">Insert Data</button>
                                </div>
                        </td>
                    </tr>
                </table>
                </div>
                <div id="live_data"></div>
            </div>
        </div>
</body>
</html>
<script>
    $(document).ready(function() {
        function fetch_data() {
            $.ajax({
                url: "pages/tb_message/select.php",
                method: "POST",
                success: function(data) {
                    $('#live_data').html(data);
                    // setInterval(fetch_data,5000);
                }
            });
        }
        fetch_data();
        $(document).on('click', '#btn_add', function() {
            var Judul = $('#Judul').val();
            var Message = $('#Message').val();
            var IdLokasi = $('#IdLokasi').val();
            var Keterangan = $('#keterangan').val();

            if (Judul == '') {
                alert("Judul Tidak Boleh kosong");
                return false;
            }
            if (Message == '') {
                alert("Message Tidak Boleh kosong");
                return false;
            }
            if (IdLokasi == '') {
                alert("Lokasi Tidak Boleh kosong");
                return false;
            }

            $.ajax({
                url: "pages/tb_message/insert.php",
                method: "POST",
                data: {
                    Judul: Judul,
                    Message:Message,IdLokasi:IdLokasi,Keterangan:Keterangan
                },
                dataType: "text",
                success: function(data) {
                    alert(data);
                    fetch_data();
                    $('#Judul').val('')
                    $('#Message').val('')
                    $('#IdLokasi').val('')
                    
                    
                 }   
            })
        });

        function edit_data(id, text, column_name) {
            $.ajax({
                url: "pages/tb_message/edit.php",
                method: "POST",
                data: {
                    id: id,
                    text: text,
                    column_name: column_name
                },
                dataType: "text",
                success: function(data) {
                    alert('Berhasil Edit data');  
                    fetch_data();
                }
            });
        }

        // contenteditable
        $(document).on('blur', '.Judul_data', function() {
            var id = $(this).data("idjudul");
            var Judul = $(this).text();
            edit_data(id, Judul, "Judul");
        });

        $(document).on('blur', '.Message_data', function() {
            var id = $(this).data("idmessage");
            var Message = $(this).text();
            edit_data(id, Message, "Message");
        });

        $(document).on('blur', '.Keterangan_data', function() {
            var id = $(this).data("idketerangan");
            var Message = $(this).text();
            edit_data(id, Message, "Keterangan");
        });

        $(document).on('blur', '.Tampilkan_data', function() {
            var id = $(this).data("idTampilkan");
            var Message = $(this).text();
            edit_data(id, Message, "Tampilkan");
        });
        // end contenteditable

        $(document).on('click', '.btn_delete', function() {
            var id = $(this).data("id3");
            if (confirm("Are you sure you want to delete this?")) {
                $.ajax({
                    url: "pages/tb_message/delete.php",
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
<script>
var $jnoc = jQuery.noConflict();
 $jnoc(document).ready(function(){
 $jnoc("a.slick").click(function () {
 $jnoc(".active").removeClass("active");
 $jnoc(this).addClass("active");
 $jnoc(".content-slick").slideUp();var content_show =
 $jnoc(this).attr("title");
 $jnoc("#"+content_show).slideDown();
  });
 });
        </script>