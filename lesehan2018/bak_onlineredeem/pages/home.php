<?php 
if(isset($_POST['submitcode'])){
  $kodenya = $_POST['code'];
  $sql = mysqli_query($connect,"SELECT * FROM tb_token_voucher WHERE NoVoucher ='$kodenya' and Status = 0 ");
  $jumlah_voucher = mysqli_num_rows($sql);
  if($jumlah_voucher == 1){
    mysqli_query($connect,"UPDATE `tb_token_voucher` SET `Token` = '$token_universal' WHERE `tb_token_voucher`.`NoVoucher` = $kodenya;");
    echo "<script>document.location.href='index.php?menu=daftar&token=$token_universal&voucher=$kodenya'</script>";
  }else{
    echo "<script>alert('Maaf kode voucher tersebut tidak tersedia')</script>";
  }
}
?>
<div class="container">
  <div class="row">

    <div class="col-lg-2 col-md-2 col-sm-0"> </div>
    <div class="col-lg-8 col-md-8 col-sm-12 content">
      <center>
        <div class="img-responsive berkah">
          <img class="berkahenduro" src="assets/berkahenduro.png" style="width: 80%; margin-top: 10vh;">
        </div>



        <form class="form-inline" method="post">
          <div style="margin: 0 auto; margin-top: 5vh; margin-bottom: 5vh">
            <center>
             <div class="center" style="color: white;"><a href="index.php?menu=daftar" style="color: white;">REGISTER</a> | <a href="#" onclick="login_form_open()" style="color: white;">LOGIN</a></div>
           </center>
           <div id="code_form">
            <input class="form-control code code_input" type="text" name="code" placeholder="Masukan CODE Anda" style="width: 30vw;">
            <input class="form-control btn-success sub button_go" type="submit" name="submitcode" value=">" style="">
          </div>
          <div id="login_form">
            <input class="form-control code " type="text" name="code" placeholder="Username" required="" style="width: 30vw;">
            <input class="form-control code " type="password" name="code" placeholder="Password" required="" style="width: 30vw;">
            <input class="form-control code btn btn-success" type="submit" name="code" value="Login" style="width: 30vw;">

          </div>
        </div>
      </form>

    </center>
  </div>
  <div class="col-md-2 col-lg-2 col-sm-0"> </div>

</div>
<div class="row">
  <div class="col-6"><img class="ketupat" src="assets/ketupat.png"> <img class="lesehan" src="assets/lesehan.png"></div>
  <div class="col-2 mesjid"></div>
  <div class="col-4">
    <div class="col-12">
      <div>
        <img class="enduro" src="assets/endurocolor.png" style="width: 65%;margin-top: 20%; float: right;">
      </div>
    </div>
  </div>
</div>
<br>
<div class="row">
  <div class="col-12">
    <div style="width: 100%;height: 100px; background-color:white; text-align: center">
      <h1>  sponsor</h1></div> 
    </div>
  </div>
</div>

<style>
.button_go{
  border:3px solid green;
  border-top-left-radius: 0px;
  border-bottom-left-radius: 0px;
  text-align:left;
  border-left: 1px; 
  font-weight: bolder;
  float: left;
}
.code_input{
  float: left;
  width: 30vw;
  text-align: center;
  border:3px solid green;
  border-right: 1px;
  border-bottom-right-radius: 0px;
  margin-right: -5px;
  border-top-right-radius: 0px
}


.ketupat {
  width: 12vw;
  float: left;
} 

.lesehan {
  float: left;
  width: 12vw;
  margin-top: 4%;
}


@media all and (min-width:320px) and (max-width: 480px) {
  .code {
    width: 89% !important;
    border-right: 1px !important;
    margin-left: 0px !important;
  }
  .berkahenduro {
    width: 90% !important;
  }
  .sub {
    width: 10% !important;
  }
  .berkah {
    margin-top: 40px !important;
  }

  .lesehan
  {
    float: left !important;
    width: 46% !important;
    margin-top: 6% !important;
  }

  .ketupat
  {
    width: 50% !important;
    float: left !important;
  }

  .enduro
  {
    width: 16vh !important;
    margin-top: 25% !important;
    float: right !important;
  }
}
</style>
<script type="text/javascript">
  function login_form_open(){
    document.getElementById('login_form').style.display = 'block';
  }
  document.getElementById('code_form').style.display = 'none'; 
  document.getElementById('login_form').style.display = 'none'; 

</script>