<?php
  $dataposko = mysqli_query($conn,"SELECT * FROM tb_lokasi");
  while($lokasi = mysqli_fetch_array($dataposko)){
    echo "<div class='bbq'><hr><b style='font-size:25px;'>".$lokasi['Lokasi']."</b><br>";
    $tanggal = $_GET['tanggal'];
    $motor = 0;
    $mobil = 0;
    $orang = 0;
    $lainnya = 0;
      echo "Tanggal ".$tanggal." Juni 2018<br>";
      $sql = mysqli_query($conn,"SELECT * FROM tb_traffic_kendaraan WHERE IdLokasi = '$lokasi[0]' AND `Waktu` LIKE '%2018-06-$tanggal %' ");
      while($data = mysqli_fetch_array($sql)){
        $motor += $data['Motor'];
        $mobil += $data['Mobil'];
        $orang += $data['Jumlah_Pengunjung'];
        $lainnya += $data['Lainnya'];
        echo "<table border='1' style='margin:0 auto;'>
        <tr><td colspan='2'> JAM:".substr($data['Waktu'],-8)."</td></tr>
        <tr>
          <td>Motor</td>
          <td>".$data['Motor']."</td>
        </tr>
        <tr>
          <td>Mobil</td>
          <td>".$data['Mobil']."</td>
        </tr>
        <tr>
          <td>Lainnya</td>
          <td>".$data['Lainnya']."</td>
        </tr>
        <tr>
          <td>Pengunjung</td>
          <td>".$data['Jumlah_Pengunjung']."</td>
        </tr>
        </table><br>";
      }
      echo "".$lokasi[1]." <br>Pada 2018-06-".$tanggal." :
      <br>Motor : ".$motor."
      <br>Mobil : ".$mobil."
      <br>Lainnya : ".$lainnya."
      <br>Orang : ".$orang."<br>============+";
      echo "<br>Jumlah Keseluruhan : ".($motor+$mobil+$lainnya+$orang);
      echo "</div>";
  }

?>

<style>
  .bbq{
    float: left;
    background: white;
    margin: 10px;
  }
</style>
