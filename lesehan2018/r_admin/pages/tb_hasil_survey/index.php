<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
.tg .tg-us36{border-color:inherit;vertical-align:top}
</style>

<!-- <div id="chartContainer2" class="chartContainer2" style="height: 300px; width: 100%; margin-top: 50px;"></div> -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<div id="chart_div" style="width: 900px; height: 500px;"></div>
<div id="chart_div2" style="width: 900px; height: 500px;"></div>
<div id="chart_div3" style="width: 900px; height: 500px;"></div>
<div id="chart_div4" style="width: 900px; height: 500px;"></div>
<div id="chart_div5" style="width: 900px; height: 500px;"></div>
<br>
<table class="tg">
  <tr>
    <th class="tg-us36">No</th>
    <th class="tg-us36">Pertanyaan</th>
    <th class="tg-us36">Jawaban 1</th>
    <th class="tg-us36">Jawaban 2</th>
    <th class="tg-us36">Jawaban 3</th>
    <th class="tg-us36">Jawaban 4</th>
    <th class="tg-us36">Jawaban 5</th>
  </tr>

  <?php
  $connect = mysqli_connect("localhost", "dapps", "l1m4d1g1t", "dapps_joker_pertamina_lesehan2018");
  $query = mysqli_query($connect,"SELECT * FROM `poll_qst`");

   //PERTANYAAN 1
  $raw_motor1_query = mysqli_query($connect,"SELECT count(ans_id) FROM `poll_answer` where opt = 'option1' and qst_id = 1 ");
  $raw_motor1 = mysqli_fetch_array($raw_motor1_query);
  $raw_motor1_2_query = mysqli_query($connect,"SELECT count(ans_id) FROM `poll_answer` where opt = 'option2' and qst_id = 1 ");
  $raw_motor1_2 = mysqli_fetch_array($raw_motor1_2_query);
  $raw_motor1_3_query = mysqli_query($connect,"SELECT count(ans_id) FROM `poll_answer` where opt = 'option3' and qst_id = 1 ");
  $raw_motor1_3 = mysqli_fetch_array($raw_motor1_3_query);
  $raw_motor1_4_query = mysqli_query($connect,"SELECT count(ans_id) FROM `poll_answer` where opt = 'option4' and qst_id = 1 ");
  $raw_motor1_4 = mysqli_fetch_array($raw_motor1_4_query);
  $raw_motor1_5_query = mysqli_query($connect,"SELECT count(ans_id) FROM `poll_answer` where opt = 'option5' and qst_id = 1 ");
  $raw_motor1_5 = mysqli_fetch_array($raw_motor1_5_query);
    //END

    //PERTANYAAN 2
  $raw_motor2_query = mysqli_query($connect,"SELECT count(ans_id) FROM `poll_answer` where opt = 'option1' and qst_id = 2 ");
  $raw_motor2 = mysqli_fetch_array($raw_motor2_query);
  $raw_motor2_2_query = mysqli_query($connect,"SELECT count(ans_id) FROM `poll_answer` where opt = 'option2' and qst_id = 2 ");
  $raw_motor2_2 = mysqli_fetch_array($raw_motor2_2_query);
  $raw_motor2_3_query = mysqli_query($connect,"SELECT count(ans_id) FROM `poll_answer` where opt = 'option3' and qst_id = 2 ");
  $raw_motor2_3 = mysqli_fetch_array($raw_motor2_3_query);
  $raw_motor2_4_query = mysqli_query($connect,"SELECT count(ans_id) FROM `poll_answer` where opt = 'option4' and qst_id = 2 ");
  $raw_motor2_4 = mysqli_fetch_array($raw_motor2_4_query);
  $raw_motor2_5_query = mysqli_query($connect,"SELECT count(ans_id) FROM `poll_answer` where opt = 'option5' and qst_id = 2 ");
  $raw_motor2_5 = mysqli_fetch_array($raw_motor2_5_query);
    //END

    //PERTANYAAN 3
  $raw_motor3_query = mysqli_query($connect,"SELECT count(ans_id) FROM `poll_answer` where opt = 'option1' and qst_id = 3 ");
  $raw_motor3 = mysqli_fetch_array($raw_motor3_query);
  $raw_motor3_2_query = mysqli_query($connect,"SELECT count(ans_id) FROM `poll_answer` where opt = 'option2' and qst_id = 3 ");
  $raw_motor3_2 = mysqli_fetch_array($raw_motor3_2_query);
  $raw_motor3_3_query = mysqli_query($connect,"SELECT count(ans_id) FROM `poll_answer` where opt = 'option3' and qst_id = 3 ");
  $raw_motor3_3 = mysqli_fetch_array($raw_motor3_3_query);
  $raw_motor3_4_query = mysqli_query($connect,"SELECT count(ans_id) FROM `poll_answer` where opt = 'option4' and qst_id = 3 ");
  $raw_motor3_4 = mysqli_fetch_array($raw_motor3_4_query);
  $raw_motor3_5_query = mysqli_query($connect,"SELECT count(ans_id) FROM `poll_answer` where opt = 'option5' and qst_id = 3");
  $raw_motor3_5 = mysqli_fetch_array($raw_motor3_5_query);
    //END

    //PERTANYAAN 4
  $raw_motor4_query = mysqli_query($connect,"SELECT count(ans_id) FROM `poll_answer` where opt = 'option1' and qst_id = 4 ");
  $raw_motor4 = mysqli_fetch_array($raw_motor4_query);
  $raw_motor4_2_query = mysqli_query($connect,"SELECT count(ans_id) FROM `poll_answer` where opt = 'option2' and qst_id = 4 ");
  $raw_motor4_2 = mysqli_fetch_array($raw_motor4_2_query);
  $raw_motor4_3_query = mysqli_query($connect,"SELECT count(ans_id) FROM `poll_answer` where opt = 'option3' and qst_id = 4 ");
  $raw_motor4_3 = mysqli_fetch_array($raw_motor4_3_query);
  $raw_motor4_4_query = mysqli_query($connect,"SELECT count(ans_id) FROM `poll_answer` where opt = 'option4' and qst_id = 4 ");
  $raw_motor4_4 = mysqli_fetch_array($raw_motor4_4_query);
  $raw_motor4_5_query = mysqli_query($connect,"SELECT count(ans_id) FROM `poll_answer` where opt = 'option5' and qst_id = 4 ");
  $raw_motor4_5 = mysqli_fetch_array($raw_motor4_5_query);
    //END

    //PERTANYAAN 5
  $raw_motor5_query = mysqli_query($connect,"SELECT count(ans_id) FROM `poll_answer` where opt = 'option1' and qst_id = 5 ");
  $raw_motor5 = mysqli_fetch_array($raw_motor5_query);
  $raw_motor5_2_query = mysqli_query($connect,"SELECT count(ans_id) FROM `poll_answer` where opt = 'option2' and qst_id = 5 ");
  $raw_motor5_2 = mysqli_fetch_array($raw_motor5_2_query);
  $raw_motor5_3_query = mysqli_query($connect,"SELECT count(ans_id) FROM `poll_answer` where opt = 'option3' and qst_id = 5 ");
  $raw_motor5_3 = mysqli_fetch_array($raw_motor5_3_query);
  $raw_motor5_4_query = mysqli_query($connect,"SELECT count(ans_id) FROM `poll_answer` where opt = 'option4' and qst_id = 5 ");
  $raw_motor5_4 = mysqli_fetch_array($raw_motor5_4_query);
  $raw_motor5_5_query = mysqli_query($connect,"SELECT count(ans_id) FROM `poll_answer` where opt = 'option5' and qst_id = 5 ");
  $raw_motor5_5 = mysqli_fetch_array($raw_motor5_5_query);
    //END


  $i = 1 ;
  while ($data = mysqli_fetch_array($query)) {

    $query_jawaban1 = mysqli_query($connect,"SELECT count(ans_id) FROM `poll_answer` where opt = 'option1' and qst_id = $i  ");
    $data_jawaban1 = mysqli_fetch_array($query_jawaban1);

    $query_jawaban2 = mysqli_query($connect,"SELECT count(ans_id) FROM `poll_answer` where opt = 'option2' and qst_id = $i  ");
    $data_jawaban2 = mysqli_fetch_array($query_jawaban2);

    $query_jawaban3 = mysqli_query($connect,"SELECT count(ans_id) FROM `poll_answer` where opt = 'option3' and qst_id = $i  ");
    $data_jawaban3 = mysqli_fetch_array($query_jawaban3);

    $query_jawaban4 = mysqli_query($connect,"SELECT count(ans_id) FROM `poll_answer` where opt = 'option4' and qst_id = $i  ");
    $data_jawaban4 = mysqli_fetch_array($query_jawaban4);

    $query_jawaban5 = mysqli_query($connect,"SELECT count(ans_id) FROM `poll_answer` where opt = 'option5' and qst_id = $i  ");
    $data_jawaban5 = mysqli_fetch_array($query_jawaban5);

    
    ?>
    <tr>
      <td class="tg-us36"><?php echo $i; ?></td>
      <td class="tg-us36"><?php echo $data['qst']; ?></td>
      <td class="tg-us36"><?php echo $data['opt1']; ?><!-- , (Pemilih : <?php echo $data_jawaban1[0]; ?>) --></td>
      <td class="tg-us36"><?php echo $data['opt2']; ?></td>
      <td class="tg-us36"><?php echo $data['opt3']; ?></td>
      <td class="tg-us36"><?php echo $data['opt4']; ?></td>
      <td class="tg-us36"><?php echo $data['opt5']; ?></td>
    </tr>
    <?php
    $i++;
  }
  ?>

</table>


<!-- <script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script> -->
<script src="jquery.canvasjs.min.js"></script>



<script type="text/javascript">
  
      // bargraph
      //PERTANYAAN 1
      var raw_motor1 = <?php echo $raw_motor1[0]; ?>;
      var raw_motor1_2 = <?php echo $raw_motor1_2[0]; ?>;
      var raw_motor1_3 = <?php echo $raw_motor1_3[0]; ?>;
      var raw_motor1_4 = <?php echo $raw_motor1_4[0]; ?>;
      var raw_motor1_5 = <?php echo $raw_motor1_5[0]; ?>;
      //END

      //PERTANYAAN 2
      var raw_motor2 = <?php echo $raw_motor2[0]; ?>;
      var raw_motor2_2 = <?php echo $raw_motor2_2[0]; ?>;
      var raw_motor2_3 = <?php echo $raw_motor2_3[0]; ?>;
      var raw_motor2_4 = <?php echo $raw_motor2_4[0]; ?>;
      var raw_motor2_5 = <?php echo $raw_motor2_5[0]; ?>;
      //END

      //PERTANYAAN 3
      var raw_motor3 = <?php echo $raw_motor3[0]; ?>;
      var raw_motor3_2 = <?php echo $raw_motor3_2[0]; ?>;
      var raw_motor3_3 = <?php echo $raw_motor3_3[0]; ?>;
      var raw_motor3_4 = <?php echo $raw_motor3_4[0]; ?>;
      var raw_motor3_5 = <?php echo $raw_motor3_5[0]; ?>;
      //END

      //PERTANYAAN 4
      var raw_motor4 = <?php echo $raw_motor4[0]; ?>;
      var raw_motor4_2 = <?php echo $raw_motor4_2[0]; ?>;
      var raw_motor4_3 = <?php echo $raw_motor4_3[0]; ?>;
      var raw_motor4_4 = <?php echo $raw_motor4_4[0]; ?>;
      var raw_motor4_5 = <?php echo $raw_motor4_5[0]; ?>;
      //END

      //PERTANYAAN 5
      var raw_motor5 = <?php echo $raw_motor5[0]; ?>;
      var raw_motor5_2 = <?php echo $raw_motor5_2[0]; ?>;
      var raw_motor5_3 = <?php echo $raw_motor5_3[0]; ?>;
      var raw_motor5_4 = <?php echo $raw_motor5_4[0]; ?>;
      var raw_motor5_5 = <?php echo $raw_motor5_5[0]; ?>;
      //END
      // var chart = new CanvasJS.Chart("chartContainer2", {
      //   exportEnabled: true,
      //   animationEnabled: true,
      //   title:{
      //     text: "Hasil Survey "
      //   },
      //   subtitles: [{
      //     text: ""
      //   }], 
      //   axisX: {
      //     title: "States"
      //   },
      //   axisY: {
      //     title: "Jumlah Pemilih",
      //     titleFontColor: "#4F81BC",
      //     lineColor: "#4F81BC",
      //     labelFontColor: "#4F81BC",
      //     tickColor: "#4F81BC"
      //   },
      //   axisY2: {
      //     title: "Jumlah Pemilih",
      //     titleFontColor: "#C0504E",
      //     lineColor: "#C0504E",
      //     labelFontColor: "#C0504E",
      //     tickColor: "#C0504E"
      //   },
      //   toolTip: {
      //     shared: true
      //   },
      //   legend: {
      //     cursor: "pointer",
      //     itemclick: toggleDataSeries
      //   },
      //   data: [{
      //     type: "column",
      //     indexLabel: "{y}",
      //     name: "Jawaban 1",
      //     showInLegend: true,      
      //     yValueFormatString: "#,##0.# ",
      //     dataPoints: [
      //     { label: "Dari mana Anda mengetahui info Lesehan Enduro?  ",  y: raw_motor1},
      //     {label: "Apa alasan utama Anda mengunjungi posko Lesehan Enduro?  ", y: raw_motor2},
      //     {label: "Apa kegiatan utama yang Anda lakukan di Lesehan Enduro?  ", y: raw_motor3},
      //     {label: "Apakah Anda puas dengan fasilitas di Lesehan Enduro?   ", y:raw_motor4},
      //     {label: "Mengapa Anda puas dengan layanan di Lesehan Enduro?    ", y:raw_motor5}
      //     ]
      //   },{
      //     type: "column",
      //     indexLabel: "{y}",
      //     name: "Jawaban 2",
      //     showInLegend: true,      
      //     yValueFormatString: "#,##0.# ",
      //     dataPoints: [
      //     { label: "Dari mana Anda mengetahui info Lesehan Enduro?  ",  y: raw_motor1_2},
      //     {label: "Apa alasan utama Anda mengunjungi posko Lesehan Enduro?  ", y: raw_motor2_2},
      //     {label: "Apa kegiatan utama yang Anda lakukan di Lesehan Enduro?  ", y: raw_motor3_2},
      //     {label: "Apakah Anda puas dengan fasilitas di Lesehan Enduro?   ", y:raw_motor4_2},
      //     {label: "Mengapa Anda puas dengan layanan di Lesehan Enduro?    ", y:raw_motor5_2}
      //     ]
      //   },{
      //     type: "column",
      //     indexLabel: "{y}",
      //     name: "Jawaban 3",
      //     showInLegend: true,      
      //     yValueFormatString: "#,##0.# ",
      //     dataPoints: [
      //     { label: "Dari mana Anda mengetahui info Lesehan Enduro?  ",  y: raw_motor1_3},
      //     {label: "Apa alasan utama Anda mengunjungi posko Lesehan Enduro?  ", y: raw_motor2_3},
      //     {label: "Apa kegiatan utama yang Anda lakukan di Lesehan Enduro?  ", y: raw_motor3_3},
      //     {label: "Apakah Anda puas dengan fasilitas di Lesehan Enduro?   ", y:raw_motor4_3},
      //     {label: "Mengapa Anda puas dengan layanan di Lesehan Enduro?    ", y:raw_motor5_3}
      //     ]
      //   },{
      //     type: "column",
      //     indexLabel: "{y}",
      //     name: "Jawaban 4",
      //     showInLegend: true,      
      //     yValueFormatString: "#,##0.# ",
      //     dataPoints: [
      //     { label: "Dari mana Anda mengetahui info Lesehan Enduro?  ",  y: raw_motor1_4},
      //     {label: "Apa alasan utama Anda mengunjungi posko Lesehan Enduro?  ", y: raw_motor2_4},
      //     {label: "Apa kegiatan utama yang Anda lakukan di Lesehan Enduro?  ", y: raw_motor3_4},
      //     {label: "Apakah Anda puas dengan fasilitas di Lesehan Enduro?   ", y:raw_motor4_4},
      //     {label: "Mengapa Anda puas dengan layanan di Lesehan Enduro?    ", y:raw_motor5_4}
      //     ]
      //   },
      //   {
      //     type: "column",
      //     indexLabel: "{y}",
      //     name: "Jawaban 5",
      //     showInLegend: true,
      //     yValueFormatString: "#,##0.# ",
      //     dataPoints: [
      //     { label: "Pertanyaan 1", y:raw_motor1_5},
      //     {label: "Pertanyaan 2", y:raw_motor2_5},
      //     {label: "Pertanyaan 3", y:raw_motor3_5},
      //     {label: "Pertanyaan 4",y:raw_motor4_5},
      //     {label: "Pertanyaan 5",y:raw_motor5_5}
      //     ]
      //   }]
      // });
      // chart.render();
      // // end


      // function toggleDataSeries(e) {
      //   if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
      //     e.dataSeries.visible = false;
      //   } else {
      //     e.dataSeries.visible = true;
      //   }+
      //   e.chart.render();
      // }

      // // end


      // start google chart


      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawVisualization);

      function drawVisualization() {
        // Some raw data (not necessarily accurate)
        // raw_motor1
        var data = google.visualization.arrayToDataTable([
         ['Pertanyaan', 'Iklan di radio ', 'Iklan di media sosial ', 'Iklan di website berita ', 'Banner / petunjuk arah di sepanjang jalan  ', 'Keluarga / teman / komunitas '],   
         ['Pertanyaan 1',  raw_motor1, raw_motor1_2, raw_motor1_3, raw_motor1_4,raw_motor1_5]
        /* ['Pertanyaan 2',  raw_motor2,      raw_motor2,        raw_motor2,             raw_motor2,          raw_motor2],
         ['Pertanyaan 3',  raw_motor3,      raw_motor3,        raw_motor3,             raw_motor3,           raw_motor3],
         ['Pertanyaan 4',  raw_motor4,      raw_motor4,        raw_motor4,             raw_motor4,           raw_motor4],
         ['Pertanyaan 5',  raw_motor5,      raw_motor5,        raw_motor5,             raw_motor5,          raw_motor5]*/
         ]);

        var options = {
          title : 'Dari mana Anda mengetahui info Lesehan Enduro? ',
          vAxis: {title: 'Survey'},
          hAxis: {title: ''},
          seriesType: 'bars',
          series: {5: {type: 'line'}}
        };

        var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
        chart.draw(data, options);


      }

      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawVisualization2);
      function drawVisualization2() {
        // Some raw data (not necessarily accurate)
        // raw_motor1
        var data = google.visualization.arrayToDataTable([
         ['Pertanyaan', 'Tertarik dengan berbagai fasilitas gratis ', 'Kelelahan atau ingin beristirahat ', 'Periksa kendaraan / servis motor ringan ', 'Butuh medis ringan  ', 'Kebetulan sedang lewat '],
         /*['Pertanyaan 1',  raw_motor1,      raw_motor1_2,         raw_motor1_3,             raw_motor1_4,           raw_motor1_5],*/
         ['Pertanyaan 2',  raw_motor2,      raw_motor2_2,        raw_motor2_3,             raw_motor2_4,          raw_motor2_5]
        /* ['Pertanyaan 3',  raw_motor3,      raw_motor3_2,        raw_motor3_3,             raw_motor3_4,           raw_motor3_5],
         ['Pertanyaan 4',  raw_motor4,      raw_motor4_2,        raw_motor4_3,             raw_motor4_4,           raw_motor4_5],
         ['Pertanyaan 5',  raw_motor5,      raw_motor5_2,         raw_motor5_3,             raw_motor5_4,          raw_motor5_5]*/
         ]);

        var options = {
          title : 'Apa alasan utama Anda mengunjungi posko Lesehan Enduro? ',
          vAxis: {title: 'Survey'},
          hAxis: {title: ''},
          seriesType: 'bars',
          series: {5: {type: 'line'}}
        };

        var chart = new google.visualization.ComboChart(document.getElementById('chart_div2'));
        chart.draw(data, options);


      }
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawVisualization3);
      function drawVisualization3() {
        // Some raw data (not necessarily accurate)
        // raw_motor1
        var data = google.visualization.arrayToDataTable([
         ['Pertanyaan', 'Tidur / beristirahat / pijat ', 'Charge HP ', 'Wifi-an ', 'Servis motor', 'Santap takjil / sahur'],
         // ['Pertanyaan 1',  raw_motor1,      raw_motor1_2,         raw_motor1_3,             raw_motor1_4,           raw_motor1_5],
         // ['Pertanyaan 2',  raw_motor2,      raw_motor2_2,        raw_motor2_3,             raw_motor2_4,          raw_motor2_5],
         ['Pertanyaan 3',  raw_motor3,      raw_motor3_2,        raw_motor3_3,             raw_motor3_4,           raw_motor3_5]
         // ['Pertanyaan 4',  raw_motor4,      raw_motor4_2,        raw_motor4_3,             raw_motor4_4,           raw_motor4_5],
         // ['Pertanyaan 5',  raw_motor5,      raw_motor5_2,         raw_motor5_3,             raw_motor5_4,          raw_motor5_5]
         ]);

        var options = {
          title : 'Apa kegiatan utama yang Anda lakukan di Lesehan Enduro?',
          vAxis: {title: 'Survey'},
          hAxis: {title: 'Pertanyaan'},
          seriesType: 'bars',
          series: {5: {type: 'line'}}
        };

        var chart = new google.visualization.ComboChart(document.getElementById('chart_div3'));
        chart.draw(data, options);


      }
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawVisualization4);
      function drawVisualization4() {
        // Some raw data (not necessarily accurate)
        // raw_motor1
        var data = google.visualization.arrayToDataTable([
         ['Pertanyaan', 'Saya puas dan akan merekomendasikannya', 'Saya puas, tapi harus ada perbaikan kedepannya', 'Biasa saja ', 'Saya kurang puas  ', 'Saya sangat tidak puas dan tidak akan mengunjungi lagi '],
         // ['Pertanyaan 1',  raw_motor1,      raw_motor1_2,         raw_motor1_3,             raw_motor1_4,           raw_motor1_5],
         // ['Pertanyaan 2',  raw_motor2,      raw_motor2_2,        raw_motor2_3,             raw_motor2_4,          raw_motor2_5],
         // ['Pertanyaan 3',  raw_motor3,      raw_motor3_2,        raw_motor3_3,             raw_motor3_4,           raw_motor3_5],
         ['Pertanyaan 4',  raw_motor4,      raw_motor4_2,        raw_motor4_3,             raw_motor4_4,           raw_motor4_5]
         // ['Pertanyaan 5',  raw_motor5,      raw_motor5_2,         raw_motor5_3,             raw_motor5_4,          raw_motor5_5]
         ]);

        var options = {
          title : 'Apakah Anda puas dengan fasilitas di Lesehan Enduro?',
          vAxis: {title: ''},
          hAxis: {title: ''},
          seriesType: 'bars',
          series: {5: {type: 'line'}}
        };

        var chart = new google.visualization.ComboChart(document.getElementById('chart_div4'));
        chart.draw(data, options);


      }
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawVisualization5);
      function drawVisualization5() {
        // Some raw data (not necessarily accurate)
        // raw_motor
        var data = google.visualization.arrayToDataTable([
         ['Pertanyaan', 'Semua fasilitasnya gratis', 'Posko nyaman & bersih ', 'Kebutuhan saya terpenuhi', 'SPGnya ramah', 'Stamina saya kembali semangat'],
         // ['Pertanyaan 1',  raw_motor1,      raw_motor1_2,         raw_motor1_3,             raw_motor1_4,           raw_motor1_5],
         // ['Pertanyaan 2',  raw_motor2,      raw_motor2_2,        raw_motor2_3,             raw_motor2_4,          raw_motor2_5],
         // ['Pertanyaan 3',  raw_motor3,      raw_motor3_2,        raw_motor3_3,             raw_motor3_4,           raw_motor3_5],
         // ['Pertanyaan 4',  raw_motor4,      raw_motor4_2,        raw_motor4_3,             raw_motor4_4,           raw_motor4_5],
         ['Pertanyaan 5',  raw_motor5,      raw_motor5_2,         raw_motor5_3,             raw_motor5_4,          raw_motor5_5]
         ]);

        var options = {
          title : 'Mengapa Anda puas dengan layanan di Lesehan Enduro? ',
          vAxis: {title: 'Survey'},
          hAxis: {title: ''},
          seriesType: 'bars',
          series: {5: {type: 'line'}}
        };

        var chart = new google.visualization.ComboChart(document.getElementById('chart_div5'));
        chart.draw(data, options);


      }

    </script>