    <h2 align="left">Kategori Foto</h2>
    <br/>

    <div class="col-md-4">
        <table>

            <tr>
                <td>
                    <div class="form-group">
                        <label>Kategori</label>
                        <input type="text" class="form-control" id="Kategori">
                        <br>
                        <button type="button" name="btn_add" id="btn_add" class="btn btn-success">Insert Data</button>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <div id="live_data"></div>

    <script>
        $(document).ready(function() {
            function fetch_data() {
                $.ajax({
                    url: "pages/tb_kategori_foto/select.php",
                    method: "POST",
                    success: function(data) {
                        $('#live_data').html(data);
                // setInterval(fetch_data,5000);
            }
        });
            }
            fetch_data();
            $(document).on('click', '#btn_add', function() {

                var Kategori = $('#Kategori').val();

                if (Kategori == '') {
                    alert("Kategori Foto Tidak Boleh kosong");
                    return false;
                }

                $.ajax({
                    url: "pages/tb_kategori_foto/insert.php",
                    method: "POST",
                    data: {
                        Kategori: Kategori
                    },
                    dataType: "text",
                    success: function(data) {
                        alert(data);
                        fetch_data();

                        $('#Kategori').val('')
                    }
                })
            });

            function edit_data(id, text, column_name) {
                $.ajax({
                    url: "pages/tb_kategori_foto/edit.php",
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
                url: "pages/tb_kategori_foto/delete.php",
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