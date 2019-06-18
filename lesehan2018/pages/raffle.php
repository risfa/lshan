
asdasd
<br>
<br>
<br>
<br>
<br>
<br>
<div class="container-fluid">
<div class="col-md-12">

  <div style="background:red; width: 96%; height: 200px; position: absolute; z-index: 9999999;" id="StartScreen"><br>
    <center>
      <div onclick="show_prize_panel();" style="color: gold; font-size: 50px;">
          <center><?php echo $data_hadiah[2]." Units ".$data_hadiah[1];  ?>
            <div style="display: none;" id="prizeDivision">
              <?php 
                if(isset($_POST['prizeSelector'])){
                  $prizenya = $_POST['prizeSelector'];
                  echo "<script>document.location.href='index.php?prize=$prizenya'</script>";
                }
              ?>
              <form method="post">
                <select name="prizeSelector" onclick="submit()">
                  <?php 
                    $sqlnya = mysqli_query($sql,"SELECT * FROM ms_hadiah WHERE jumlah > 0 ORDER BY hadiah_id");
                    while($data = mysqli_fetch_array($sqlnya,MYSQLI_NUM)){
                      echo "<option value='$data[0]'>$data[0] - $data[1] - $data[2]</option>";
                    }
                  ?>
                </select>
              </form>
            </div>
          </center>
        </div>
        </center>
    </div>
    <div class="widget-container" style="min-height:  160px">
      
      <div class="widget-content padded" id="PanelShuffleResult" style="display: none;">
        <div class="row">
          <div class="col-md-12">
            
          </div>
        </div>
            <center>
              <div style="text-transform: uppercase ; font-size: 60px;"><?php echo $show_data[2]?></div>
              <div style="text-transform: uppercase ; font-size: 50px; margin-top: -20px;"><?php echo $show_data[3]?></div><br>
              <font style="font-size: 20px;"><?php echo " 1 Unit ".$data_hadiah[1];  ?></font>

            </center>
      </div>

      <div class="widget-content padded" id="PanelShuffle" style="background:url('images/assets/loading back.gif'); color: gold; height: 200px;">
        
         

        <center>
            <div class="textsbox2" id="textbsox2" style="text-transform: uppercase ; font-size: 1px; color: black;">A</div><br>
            <div class="textbox" id="textbox" style="text-transform: uppercase ; font-size: 50px; "></div>
            <div class="textbox2" id="textbox2" style="text-transform: uppercase ; font-size: 50px; margin-top: -30px;"></div>
        </center>

        

    </div>
  </div>
  </div>
</div>

<center>
    <button type="button" class="btn btn-default goldButton " id="btnStart" style=" margin-top: 5%; " onclick="start_ruffle()" >START</button>
</center>
<br><br>
<center id="tombolStop" style="display: none; margin-top: 20px;">
  <?php if($_GET['prize']){?>
  <button id="btnStop" class="btn  goldButton" onclick="stop()">STOP </button>
  <?php } ?>
</center>
<center id="tombolReRaffle" style="display: none;">
  <form method="post" >
      <input type="hidden" name="kode" value="<?php echo $show_data[0]; ?>">
      <input type="hidden" name="prize" value="<?php echo $_GET['prize']; ?>">
      <input type="submit" onclick="return confirm('Are You Sure? To Give the Prize?')" value="GET THE PRIZE!" class="btn  goldButton2" name="get_prize">
      <input type="submit" onclick="return confirm('Are You Sure to reshuffle?')" value="RAFFLE AGAIN" class="btn  goldButton" name="reshuffle">
  </form>
</center>
<br>


<script type='text/javascript'>
<?php
$query = "SELECT SUBSTRING(`nama`, 1, 16) FROM $nama_table WHERE attendance = 'Y' AND checked != 'Y'";
$query2 = "SELECT nopek FROM $nama_table WHERE nopek != '' AND attendance = 'Y' AND checked != 'Y'";

$result = $sql->query($query);     
if (!$result) {
  printf("Query failed: %s\n", $mysqli->error);
  exit;
}      
while($row = $result->fetch_row()) {
  $rows[]=$row;
}

$result->close();
$oneDimensionalArray = array_map('current', $rows);
$arrayVal = array_values($oneDimensionalArray);

$php_array = $arrayVal;
$js_array = json_encode($php_array);

echo "var words = ". $js_array . ";\n";


$result2 = $sql->query($query2);     
if (!$result2) {
  printf("Query failed: %s\n", $mysqli->error);
  exit;
}      
while($row2 = $result2->fetch_row()) {
  $rows2[]=$row2;
}

$result2->close();
$oneDimensionalArray2 = array_map('current', $rows2);
$arrayVal2 = array_values($oneDimensionalArray2);

$php_array2 = $arrayVal2;
$js_array2 = json_encode($php_array2);

echo "var words2 = ". $js_array2 . ";\n";

?>
</script>

<script type="text/javascript">
    var getRandomWord = function () {
      return words[Math.floor(Math.random() * words.length)];
    };
$(function() { // after page load
    setInterval(function(){
      $('.textbox').fadeOut(10, function(){
        $(this).html(getRandomWord()).fadeIn(10);
      });
    // 5 seconds
    }, 10);
});

    var getRandomWord2 = function () {
      return words2[Math.floor(Math.random() * words2.length)];
    };
$(function() { // after page load
    setInterval(function(){
      $('#textbox2').fadeOut(10, function(){
        $(this).html(getRandomWord2()).fadeIn(10);
      });
    // 5 seconds
    }, 10);
});



  function show_prize_panel(){
    document.getElementById('prizeDivision').style.display = 'block';
  }
  function stop(){
    document.getElementById('PanelShuffle').style.display = 'none';
    document.getElementById('PanelShuffleResult').style.display = '';
    document.getElementById('tombolStop').style.display = 'none';
    document.getElementById('tombolReRaffle').style.display = 'block';

    // document.location.href='index.php?menu=3&prize'
  }

  function start_ruffle(){
    document.getElementById('StartScreen').style.display = 'none';
    document.getElementById('btnStart').style.display = 'none';
    document.getElementById('tombolStop').style.display = 'block';

  }
</script>



<style type="text/css">
  #PanelShuffleResult{
    background-image: url('images/assets/winnergif.gif');
    color:gold;
    background-repeat: no-repeat;
    background-size: 100%;
  }
  .goldButton{
    transition: 0.9s;
    background:none; color:gold; border: 1px solid gold;
  }
  .goldButton:hover{
    background:gold; color:black; border: 1px solid gold;
  }
  .goldButton2{
    transition: 0.9s;
    background:gold; color:black; border: 1px solid gold;
  }
  .goldButton2:hover{
    background:none; color:gold; border: 1px solid gold;
  }
</style>