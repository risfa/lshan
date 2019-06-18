<?php 
session_start();
if(isset($_POST['login'])){

    $connect = mysqli_connect("localhost", "dapps", "l1m4d1g1t", "dapps_joker_pertamina_lesehan2018");
    $Username = $_POST['Username'];
    $Password = $_POST['Password'];
    $sqlcek = mysqli_query($connect,"SELECT * FROM tb_admin WHERE Username='$Username' AND Password = '$Password'");
    $data_login = mysqli_fetch_array($sqlcek);
    if(mysqli_num_rows($sqlcek)>0){
        $_SESSION['Username'] = 'username';
        $_SESSION['Id']       = 'id';
        $_SESSION['level'] = $data_login['Status'];
        /*echo "<script>alert('yes')</script>";*/
        echo "<script>document.location.href='index.php?menu=home'</script>";

    } else{
        echo "<script>alert('Kombinasi username dan password tidak ditemukan')</script>";
        echo "<script>document.location.href='index.php?menu=home'</script>";
    }
}
?>
<div id="login-overlay" class="modal-dialog">
  <div class="modal-content">

      <div class="modal-body"><br>
          <div class="row">
              <div class="col-xs-6">
                  <div class="well">
                      <form id="loginForm" method="POST" action="" novalidate="novalidate">
                          <div class="form-group">
                              <label for="username" class="control-label">Username</label>
                              <input type="text" class="form-control" id="username" name="Username" value="" required="" title="Please enter you username" placeholder="">
                              <span class="help-block"></span>
                          </div>
                          <div class="form-group">
                              <label for="password" class="control-label">Password</label>
                              <input type="password" class="form-control" id="password" name="Password" value="" required="" title="Please enter your password">
                              <span class="help-block"></span>
                          </div>
                          <div id="loginErrorMsg" class="alert alert-error hide">Wrong username og password</div>
                          <input type="submit" class="btn btn-success" value="LOGIN" name="login" style="width: 100%;">

                      </form>
                  </div>
              </div>
              <div class="col-xs-6">
                <img src="http://joker.5dapps.com/pertamina/lesehan2018/assets/berkahenduro_2.png" style="height: 10vw">

            </div>
            <center>Copyright © 2018 PT Pertamina Lubricants<br>
                Owned &amp; Designed By <a href="https://limadigit.com" target="_blank"><img src="https://www.pramborsfm.com/images/limad-logo.png" style="height: 20px;"></a></center>
            </div>
        </div>
    </div>
</div>