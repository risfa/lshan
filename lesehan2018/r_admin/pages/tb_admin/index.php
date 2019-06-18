<h3 align="left">Database Admin</h3>
<br/>
<div class="row">
        <div class="col-md-4" >
                <div class="form-group"> 
                    <label>Username</label>
                    <input type="text" class="form-control" id="Username">
                </div>
                <div class="form-group"> 
                    <label>Password</label>
                    <input type="text" class="form-control" id="Password">

                    <select id="Status">
                   
                    	 <option style="margin-top: 20px;"  value="1 = Admin">Admin</option>
                    	 <option style="margin-top: 20px;"  value="2 = Customer">Customer</option>
                           
                    </select>
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
                url: "pages/tb_admin/select.php",
                method: "POST",
                success: function(data) {
                    $('#live_data1').html(data);
                    // setInterval(fetch_data,3000);

                }
            });
        }
        fetch_data();
        $(document).on('click', '#btn_add', function() {
            var Username = $('#Username').val();
            var Password = $('#Password').val();
            var Status = $('#Status').val();
            

            if (Username == '') {
                alert("Username Tidak Boleh kosong");
                return false;
            }
            if (Password == '') {
                alert("Password Tidak Boleh kosong");
                return false;
            }

            if (Status == '') {
                alert("Status Tidak Boleh kosong");
                return false;
            }
            

            $.ajax({
                url: "pages/tb_admin/insert.php",
                method: "POST",
                data: {
                    Username: Username,
                    Password: Password,
                    Status: Status
                    
                },
                dataType: "text",
                success: function(data) {
                    alert(data);
                    fetch_data();
                    $('#Username').val('')
                    $('#Password').val('')
                    $('#Status').val('')
                   

                }
            })
        });

        function edit_data(id, text, column_name) {
            $.ajax({
                url: "pages/tb_admin/edit.php",
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
        $(document).on('blur', '.Username_data', function() {
            var id = $(this).data("idusername");
            var Username = $(this).text();
            edit_data(id, Username, "Username");
        });

        $(document).on('blur', '.Password_data', function() {
            var id = $(this).data("idpassword");
            var Password = $(this).text();
            edit_data(id, Password, "Password");
        });

        $(document).on('blur', '.Status_data', function() {
            var id = $(this).data("idstatus");
            var Status = $(this).text();
            edit_data(id, Status, "Status");
        });

        // end contenteditable

        $(document).on('click', '.btn_delete', function() {
            var id = $(this).data("id3");
            if (confirm("Are you sure you want to delete this?")) {
                $.ajax({
                    url: "pages/tb_admin/delete.php",
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
        // last btn delete
</script>
<style>
    .subnavbar-inner {
        margin-top: 55px !important;
    }
</style>