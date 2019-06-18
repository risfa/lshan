<html>

<head>
    <title>Live Table Data Edit</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
</head>

<body>
    <div class="container">
        <br />
        <br />
        <br />
        <div class="table-responsive">
            <h3 align="center">Jawaban Quiz</h3>
            <br/>

            <div class="row">
                <div class="col-md-4">
                    <table>

                        <tr>
                            <td>
                                <div class="form-group">
                                    <label>Jawaban</label>
                                    <input type="text" class="form-control" id="Jawaban">
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
</body>

</html>
<script>
    $(document).ready(function() {
        function fetch_data() {
            $.ajax({
                url: "pages/tb_jawaban_quiz/select.php",
                method: "POST",
                success: function(data) {
                    $('#live_data').html(data);
                    // setInterval(fetch_data,5000);
                }
            });
        }
        fetch_data();
        $(document).on('click', '#btn_add', function() {

            var Jawaban = $('#Jawaban').val();

            if (Jawaban == '') {
                alert("Jawaban Tidak Boleh kosong");
                return false;
            }

            $.ajax({
                url: "pages/tb_jawaban_quiz/insert.php",
                method: "POST",
                data: {
                    Jawaban: Jawaban
                },
                dataType: "text",
                success: function(data) {
                    alert(data);
                    fetch_data();

                    $('#Jawaban').val('')
                }
            })
        });

        function edit_data(id, text, column_name) {
            $.ajax({
                url: "pages/tb_jawaban_quiz/edit.php",
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
        $(document).on('blur', '.Jawaban_data', function() {
            var id = $(this).data("idjawaban");
            var Jawaban = $(this).text();
            edit_data(id, Jawaban, "Jawaban");
        });

        // end contenteditable

        $(document).on('click', '.btn_delete', function() {
            var id = $(this).data("id3");
            if (confirm("Are you sure you want to delete this?")) {
                $.ajax({
                    url: "pages/tb_jawaban_quiz/delete.php",
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