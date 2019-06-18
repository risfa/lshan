<?php 
    $connect = mysqli_connect("localhost", "dapps", "l1m4d1g1t", "dapps_joker_pertamina_lesehan2018");
    $sqladmin = mysqli_query($connect,"SELECT * FROM tb_admin WHERE Id ='$_SESSION[id]'");
    $admin = mysqli_fetch_array($sqladmin);
 ?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js">
</script>

<div class="row">
    <div class="span6" id="jumlah_kendaraan" style="cursor:pointer;">
    </div>
    <div class="span6" id="area_chart" >
    </div>	
    
</div>

<div class="row">
    <div class="span6" id="hadiah">
    </div>

    <div class="span6" id="redeem_code">
    </div>

</div>
<br>

<div class="row" style="display: none;">
    <!-- SUDAH SURVEY -->
    <div class="span3" id="survey">
    </div> 

    <!-- SUDAH QUIZ -->
    <div class="span3" id="quiz">
    </div>

    <!-- sisa hadiah -->

</div>
<br>

<div class="row" style="display: none;">

    <div class="span6" id="foto" >
    </div>
    
    <div class="span6" id="spg">
    </div>
</div>





        <style type="text/css">
        #map {
  height: 300px;
  /*border: 1px solid #000;*/
  margin-left: 15px;
  margin-right: -15px;
}
    </style>

    <script type="text/javascript">

       $.ajax({
                url: "pages/API/spg_cek_online.php",
                method: "POST",
                success: function(data) {
                    var data = JSON.parse(data);
                    console.log(data[0]);
                    if (data[0] == 1 ) {
                        data[0] = '<i style = "color: green;">Online</i>&nbsp;';
                    }else{
                        data[0] = '<i style = "color: Red;">Offline</i>&nbsp;';
                    }

                    if (data[1] == 1 ) {
                        data[1] = '<i style = "color: green;">Online</i>&nbsp;';
                    }else{
                        data[1] = '<i style = "color: Red;">Offline</i>&nbsp;';
                    }


                    if (data[2] == 1 ) {
                        data[2] = '<i style = "color: green;">Online</i>&nbsp;';
                    }else{
                        data[2] = '<i style = "color: Red;">Offline</i>&nbsp;';
                    }


                    if (data[3] == 1 ) {
                        data[3] = '<i style = "color: green;">Online</i>&nbsp;';
                    }else{
                        data[3] = '<i style = "color: Red;">Offline</i>&nbsp;';
                    }


                    if (data[4] == 1 ) {
                        data[4] = '<i style = "color: green;">Online</i>&nbsp;';
                    }else{
                        data[4] = '<i style = "color: Red;">Offline</i>&nbsp;';
                    }

                    $('#spg_cek_online').html('Masjid At Tuqo : ' + data[0] + ' | Masjid An Nur Tegal : ' + data[1] + ' | Masjid Uswatun Hassanah : ' + data[2] + ' | Masjid An Nur Comal : ' + data[3] + ' | Masjid Al Falah Cikampek : ' + data[4]);
                    
                }
            });


        window.onload = function() {
            // var idLokasi1 = '';
            // var idLokasi2 = '';
            // var idLokasi3 = '';
            // var idLokasi4 = '';
             

            var locations = [
      ['Masjid Raya Al-fairuz, Pekalongan', -6.9031017, 109.6955863, 5],
      ['Masjid Uswatun hasanah , Nagreg', -7.0283883, 107.8967476, 3],
      ['Masjid At-Tuqo, Cirebon', -6.7711395, 108.6006727, 2],
      ['SPBU Pertamina 44.531.28 Kedungpring, Kedungpring Satu, Kedungpring, Kabupaten Banyumas, Jawa Tengah', -7.5992774, 109.3314002, 4],
      ['Masjid Al-Muhajirin Merak', -6.0153279, 106.0055338, 1]
    ];
    var latlng = new google.maps.LatLng( -7.0283883, 107.8967476);
        var map = new google.maps.Map(document.getElementById('map'), {
        center: latlng,
        zoom: 7,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var marker, i;

    for (i = 0; i < locations.length; i++) {  
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map,
        animation: google.maps.Animation.BOUNCE,
        title: locations[i][0],

      });

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
        	window.open("http://maps.google.com/maps?q="+locations[i][1]+","+locations[i][2]+
        		"");
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
    }
};
    </script>
    <div id="map"></div>
    <div id="spg_cek_online" style="margin-left: 20px;"></div>
    
<script>


    $('#laporan_traffic').click(function(){
        alert('test');
    })

    area_chart();
    jenis_kendaraan();
    redeem_code()
    hadiah()
    setInterval(jenis_kendaraan,3000);

    function jenis_kendaraan(){
             //Jenis kendaraan
             $(document).ready(function() {
                $.ajax({
                    url: "pages/API/jenis_kendaraan_api.php",
                    method: "POST",
                    success: function(data) {
                        $('#jumlah_kendaraan').html(data);
                                // setInterval(fetch_data,1000);
                            }
                        });
            });
        //end
    } 

    setInterval(redeem_code,3000);

    function redeem_code(){
        //redeem code
        $(document).ready(function() {
            $.ajax({
                url: "pages/API/redeem_code_api.php",
                method: "POST",
                success: function(data) {
                    $('#redeem_code').html(data);
                    // setInterval(fetch_data,1000);
                }
            });
    });//end
    }
        //area chart
        setInterval(area_chart,3000);
        function area_chart(){
        $(document).ready(function() {
            $.ajax({
                url: "pages/API/area_chart_api.php",
                method: "POST",
                success: function(data) {
                    $('#area_chart').html(data);
                    // setInterval(fetch_data,1000);
                }
            });
        });
    }
    //end

    //survey
    $(document).ready(function() {
        $.ajax({
            url: "pages/API/survey_api.php",
            method: "POST",
            success: function(data) {
                $('#survey').html(data);
                    // setInterval(fetch_data,1000);
                }
            });
    });
    //end

    //quiz
    setInterval(quiz,3000);
    function quiz(){
    $(document).ready(function() {
        $.ajax({
            url: "pages/API/quiz_api.php",
            method: "POST",
            success: function(data) {
                $('#quiz').html(data);
                    // setInterval(fetch_data,1000);
                }
            });
    });
    //end
}

    //hadiah
    setInterval(hadiah,3000);
    function hadiah(){
    $(document).ready(function() {
        $.ajax({
            url: "pages/API/hadiah_api.php",
            method: "POST",
            success: function(data) {
                $('#hadiah').html(data);
                    // setInterval(fetch_data,1000);
                }
            });
    });
    //end
}

    // //spg
    // $(document).ready(function() {
    //     $.ajax({
    //         url: "pages/API/spg_api.php",
    //         method: "POST",
    //         success: function(data) {
    //             $('#spg').html(data);
    //                 // setInterval(fetch_data,1000);
    //             }
    //         });
    // });
    // //end

    // //foto
    // $(document).ready(function() {
    //     $.ajax({
    //         url: "pages/API/foto_api.php",
    //         method: "POST",
    //         success: function(data) {
    //             $('#foto').html(data);
    //                 // setInterval(fetch_data,1000);
    //             }
    //         });
    // });
    // //end

</script>



<script src="https://maps.google.com/maps/api/js?key=AIzaSyCZmwxYDDefw7LNF2cU-BXszEYZQ5EvVzg"></script>