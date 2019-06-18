<html>

<head>
    <title>Live Table Data Edit</title>
   
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
</head>

<body>
    <div class="container">
        <br />
        <br />
        <br />

        <h3 align="center">Quiz</h3>
        <br/>
        <div class="row">
            <div class="col-md-4">
                <table>

                    <tr>
                        <td>
                            <div class="form-group">
                                <label>Soal</label>
                                <input type="text" class="form-control" id="qst">
                                <br>
                                <div class="form-group">
                                    <label>Jawaban</label>
                                    <input type="text" class="form-control" id="opt1">
                                    
                                </div>
                                <div class="form-group">
                                    
                                    <input type="text" class="form-control" id="opt2">
                                    
                                </div>
                                <div class="form-group">
                                    
                                    <input type="text" class="form-control" id="opt3">
                                   
                                </div>
                                <div class="form-group">
                                    
                                    <input type="text" class="form-control" id="opt4">
                                   
                                </div>
                                <div class="form-group">
                                    <label>Jawaban Benar</label>
                                    <select id="Jawaban">
                                       
                                        <option  value=""></option>
                                        <option  value="A">A</option>
                                        <option  value="B">B</option>
                                        <option  value="C">C</option>
                                        <option  value="D">D</option>

                                    </select>
                                    
                                </div>
                                <div class="form-group">
                                    <label>Kategori</label>
                                    <input type="text" class="form-control" id="kategori">
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
                url: "pages/tb_quiz/select.php",
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
            var Jawaban = $('#Jawaban').val();
            var kategori = $('#kategori').val();

            if (qst == '') {
                alert("Soal Tidak Boleh kosong");
                return false;
            }
            if (opt1 == '') {
                alert("Jawaban Tidak Boleh kosong");
                return false;
            }

            if(opt2 == '')  
            {  
                 alert("Jawaban Tidak Boleh kosong");  
                 return false;  
            }  
            if(opt3 == '')  
            {  
                 alert("Jawaban Tidak Boleh kosong");  
                 return false;  
            }  
            if(opt4 == '')  
            {  
                 alert("Jawaban Tidak Boleh kosong");  
                 return false;  
            } 
            if(Jawaban == '')  
            {  
                 alert("Jawaban Benar Tidak Boleh kosong");  
                 return false;  
            }  
            if(kategori == '')  
            {  
                 alert("kategori Tidak Boleh kosong");  
                 return false;  
            }   

            $.ajax({
                url: "pages/tb_quiz/insert.php",
                method: "POST",
                data: {qst: qst,opt1: opt1, opt2:opt2, opt3:opt3, opt4:opt4,Jawaban:Jawaban,kategori:kategori },
                dataType: "text",
                success: function(data) {
                    alert(data);
                    fetch_data();
                    $('#qst').val('')
                    $('#opt1').val('')
                    $('#opt2').val('')
                    $('#opt3').val('')
                    $('#opt4').val('')
                    $('#Jawaban').val('')
                    $('#kategori').val('')
                }
            })
        });

        function edit_data(id, text, column_name) {
            $.ajax({
                url: "pages/tb_quiz/edit.php",
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


        $(document).on('blur', '.opt1_data', function(){  
             var id = $(this).data("idopt1");  
             var opt1 = $(this).text();  
             edit_data(id, opt1, "opt1");  
        });  

        $(document).on('blur', '.opt2_data', function(){  
             var id = $(this).data("idopt2");  
             var opt2 = $(this).text();  
             edit_data(id, opt2, "opt2");  
        });  

        $(document).on('blur', '.opt3_data', function(){  
             var id = $(this).data("idopt3");  
             var opt3 = $(this).text();  
             edit_data(id, opt3, "opt3");  
        });  
        $(document).on('blur', '.opt4_data', function(){  
             var id = $(this).data("idopt4");  
             var opt4 = $(this).text();  
             edit_data(id, opt4, "opt4");  
        });  
        $(document).on('blur', '.Jawaban_data', function(){  
             var id = $(this).data("idjawaban");  
             var Jawaban = $(this).text();  
             edit_data(id, Jawaban, "Jawaban");  
        });  

        $(document).on('blur', '.kategori_data', function() {
            var id = $(this).data("idkategori");
            var kategori = $(this).text();
            edit_data(id, kategori, "kategori");
        });
        // end contenteditable

        $(document).on('click', '.btn_delete', function() {
            var id = $(this).data("id3");
            if (confirm("Are you sure you want to delete this?")) {
                $.ajax({
                    url: "pages/tb_quiz/delete.php",
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