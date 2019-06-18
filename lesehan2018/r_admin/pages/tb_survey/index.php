<div class="container">
    <h2 align="left">Data Soal Survey</h2>
    <br/>
    <div class="row">
        <div class="col-md-4">

            <div class="form-group">
                <label>Soal</label>
                <input type="text" class="form-control" id="qst">
            </div>
            <div class="form-group">
                <label>Jawaban</label>
                <input type="text" class="form-control" id="opt1" placeholder="Jawaban 1">

            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="opt2" placeholder="Jawaban 2">

            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="opt3" placeholder="Jawaban 3">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="opt4" placeholder="Jawaban 4">
            </div> 
            <div class="form-group">
                <input type="text" class="form-control" id="opt5" placeholder="Jawaban 5">
            </div>
            <button type="button" name="btn_add" id="btn_add" class="btn btn-success">Insert Data</button>
        </div>
        <div id="live_data" class="col-md-8"></div>
    </div>
</div>

<script>
    $(document).ready(function() {
        function fetch_data() {
            $.ajax({
                url: "pages/tb_survey/select.php",
                method: "POST",
                success: function(data) {
                    $('#live_data').html(data);
                    // setInterval(fetch_data,5000);
                }
            });
        }
        fetch_data();
        $(document).on('click', '#btn_add', function() {

            var qst = $('#qst').val();
            var opt1 = $('#opt1').val();
            var opt2 = $('#opt2').val();
            var opt3 = $('#opt3').val();
            var opt4 = $('#opt4').val();
            var opt4 = $('#opt5').val();

            if (qst == '') {
                alert("Soal Tidak Boleh kosong");
                return false;
            }
            if (opt1 == '') {
                alert("Jawaban Tidak Boleh kosong");
                return false;
            }

            if (opt2 == '') {
                alert("Jawaban Tidak Boleh kosong");
                return false;
            }
            if (opt3 == '') {
                alert("Jawaban Tidak Boleh kosong");
                return false;
            }
            if (opt4 == '') {
                alert("Jawaban Tidak Boleh kosong");
                return false;
            } 
            if (opt5 == '') {
                alert("Jawaban Tidak Boleh kosong");
                return false;
            }

            $.ajax({
                url: "pages/tb_survey/insert.php",
                method: "POST",
                data: {
                    qst: qst,
                    opt1: opt1,
                    opt2: opt2,
                    opt3: opt3,
                    opt4: opt4,
                    opt5: opt5

                },
                dataType: "text",
                success: function(data) {
                    alert(data);
                    fetch_data();
                    $('#qst').val('')
                    $('#opt1').val('')
                    $('#opt2').val('')
                    $('#opt3').val('')
                    $('#opt4').val('')
                    $('#opt5').val('')
                }
            })
        });

        function edit_data(id, text, column_name) {
            $.ajax({
                url: "pages/tb_survey/edit.php",
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
        $(document).on('blur', '.qst_data', function() {
            var id = $(this).data("idqst");
            var qst = $(this).text();
            edit_data(id, qst, "qst");
        });


        $(document).on('blur', '.opt1_data', function() {
            var id = $(this).data("idopt1");
            var opt1 = $(this).text();
            edit_data(id, opt1, "opt1");
        });

        $(document).on('blur', '.opt2_data', function() {
            var id = $(this).data("idopt2");
            var opt2 = $(this).text();
            edit_data(id, opt2, "opt2");
        });

        $(document).on('blur', '.opt3_data', function() {
            var id = $(this).data("idopt3");
            var opt3 = $(this).text();
            edit_data(id, opt3, "opt3");
        });
        $(document).on('blur', '.opt4_data', function() {
            var id = $(this).data("idopt4");
            var opt4 = $(this).text();
            edit_data(id, opt4, "opt4");
        }); 
        $(document).on('blur', '.opt5_data', function() {
            var id = $(this).data("idopt5");
            var opt5 = $(this).text();
            edit_data(id, opt5, "opt5");
        });

        // end contenteditable

        $(document).on('click', '.btn_delete', function() {
            var id = $(this).data("id3");
            if (confirm("Are you sure you want to delete this?")) {
                $.ajax({
                    url: "pages/tb_survey/delete.php",
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