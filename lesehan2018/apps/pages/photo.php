<head><script>
	function startTime() {
		var today = new Date();
		var h = today.getHours();
		var m = today.getMinutes();
		var s = today.getSeconds();
		day = today.getDate(),
		month = today.getMonth() + 1,
		year = today.getFullYear();
		m = checkTime(m);
		s = checkTime(s);
		document.getElementById('clock').innerHTML =
		h + ":" + m + ":" + s + "<br>" + day+"-"+month+"-"+year
		var t = setTimeout(startTime, 500);
	}
	function checkTime(i) {
    if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
    return i;
}
</script>
</head>
<body onload="startTime()"></body>
<div style="float: right; color: #00b140; font-size: 15px; font-weight: bolder;" id="clock"></div>
<div class="row">
	<div class="col-md-4"></div>
	<div class="col-md-4"><center>
		<img src="../assets/berkahenduro.png" style="width: 20vh;">
	</center></div>
	<div class="col-md-4"><a href="index.php?menu=logout" style="float:right; font-size: 20px;">LOG OUT</a></div>
	

</div>
<center><h3>Photo Gallery</h3><hr></center>
<div class="photo_gallery">
	<?php
date_default_timezone_set('Asia/Jakarta');

	$date = date('Y-m-d');
	$query2 = mysql_query('SELECT * FROM `tb_kategori_foto`');
	$i=1;
	while ($data2 = mysql_fetch_array($query2)) {
        # code...
        if ($data2[2] != '') {
        	
		?>

		<p style="font-size: 20px"><?php echo $data2[1]; ?>(<?php echo $data2[2]; ?>)</p>
		<?php
		}else{
		?>
		<p style="font-size: 20px"><?php echo $data2[1]; ?></p>
		<?php
		}

		$query3 = mysql_query("SELECT IdFoto FROM `tb_foto` WHERE Timestamp_waktu like '%$date%' and IdKategoriFoto = '$data2[0]' and IdLokasi = '$_SESSION[id_lokasi]' ");
		while ($data3 = mysql_fetch_array($query3)) {
        # code...
			// echo(date('Y-m-d h:i:s'));
			?>

			<button type="button" style="background:none; border:none;" data-toggle="modal" data-target="#myModal<?php echo $i; ?>"><img src="images_assets/photo/<?php echo $data2[0];?>/<?php echo $data3[0];?>.jpg" class="image_data"></button>
			<div class="modal fade" id="myModal<?php echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-body">
							<center>
								<img  src="images_assets/photo/<?php echo $data2[0];?>/<?php echo $data3[0];?>.jpg" class="image_data" style="width: 100%; height: 100%; margin-top: 50%;">
							</center>
						</div>
					</div>
				</div>
			</div>
			<?php $i++; } ?>
			<div style="clear: both;"></div>
			<hr>

			<?php } ?>
		</div>
		<div class="floating_form">
			<div class="category">
				<select class="selectnya" id="selectnya">
					<?php

					$query = mysql_query('SELECT * FROM `tb_kategori_foto`');
					while ($data = mysql_fetch_array($query)) {
				# code...
						?>
						<option class="optionnya" value="<?php echo $data[0]; ?>"><?php echo $data[1]; ?></option>
<!-- 			<option class="optionnya">Photo Category</option>
			<option class="optionnya">Photo Category</option>
			<option class="optionnya">Photo Category</option> -->


			<?php
		}


		?>
	</select>
</div>

<div>	<button class="camera_button" style="background: #008d33"  onclick="document.getElementById('multiple_files').click()"><i class="fa fa-camera"></i></button>
	<input  style="display: none;" type="file" name="multiple_files" id="multiple_files" multiple />
</div>
<!-- <div class="camera_button" onclick="uploadImage()"> -->

	<!-- <i class="fa fa-camera" style="color: white; font-size: 6vw; padding: 4vw"></i> -->
	<!-- </div> -->
	<!-- </div> -->


	<div id="wait" style="display:none;background: rgba(0,0,0,0.7);position:absolute;margin-top:-50vh;margin-left:33%;padding:20px; border-radius: 10px;"><center><img src='loaderr.gif' style="width: 15vh;height: 15vh;" ><br><h3>	Loading..</h3></div></center>



	<style type="text/css">
	.image_data{
		float: left;
		border: 1px solid #FFF;
		width: 99px;
		height: 99px;
		margin: 3px;
	}
	.selectnya{
		margin-top: 4vw;
		background: none;
		border: none;
		font-size: 5vw;
		padding: 0vw 1vw 1vw 4vw;
	}
/*	.floating_form{
		border-radius: 6px;
	    background: #00b140;
	    height: 80px;
	    width: 60vw;
	    margin: 0 auto;
	    margin-top: 60vh;
	    border-radius: 5px;
	    }*/

	    .floating_form{
	    	border-radius: 6px;
	    	background: #00b140;
	    	position: fixed;
	    	bottom: 15vh;
	    	height: 14vw;
	    	width: 98%;
	    }
	    .camera_button{
	    	display: block;
	    	width: 10vh;
	    	height: 10vh;
	    	border: none;
	    }
	    .category{
	    	height: 100%;
	    	float: left;
	    	padding: 0;
	    }
	    .photo_gallery{
	    	padding-bottom: 150px;
	    }
	    .optionnya{
	    	background: #00b140;
	    	border: none;
	    }

	    @media all and (min-width:320px) and (max-width: 480px)
	    {
	    	#wait
	    	{
	    		margin-left: 22% !important;
	    	}

	    	.up
	    	{
	    		padding-top: 3px;
	    		width: 10vh !important;
	    		height: 4vh !important;
	    	}
	    }

	</style>

	<script type="text/javascript">



		$('#multiple_files').change(function(){
			var error_images = '';
			var form_data = new FormData();
			var files = $('#multiple_files')[0].files;
			if(files.length > 10)
			{
				error_images += 'You can not select more than 10 files';
			}
			else
			{
				for(var i=0; i<files.length; i++)
				{
					var name = document.getElementById("multiple_files").files[i].name;
					var ext = name.split('.').pop().toLowerCase();
					if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1) 
					{
						error_images += '<p>Invalid '+i+' File</p>';
					}
					var oFReader = new FileReader();
					oFReader.readAsDataURL(document.getElementById("multiple_files").files[i]);
					var f = document.getElementById("multiple_files").files[i];
					var fsize = f.size||f.fileSize;
					if(fsize > 2000000)
					{
						error_images += '<p>' + i + ' File Size is very big</p>';
					}
					else
					{
						form_data.append("file[]", document.getElementById('multiple_files').files[i]);
					}
				}
			}
			if(error_images == '')
			{
				$.ajax({
					url:"pages/process/upload_photo.php?kategori="+$( "#selectnya" ).val()+"&IdLokasi="+<?php echo $_SESSION['id_lokasi']; ?>+"&IdSpg="+<?php echo $_SESSION['id_spg']; ?>,
					method:"POST",
					data: form_data,
					contentType: false,
					cache: false,
					processData: false,
					beforeSend:function(){
						$("#wait").css("display", "block");
     // alert('wait')
 },   
 success:function(data)
 {
 	$("#wait").css("display", "none");
     // $('#error_multiple_files').html('<br /><label class="text-success">Uploaded</label>');
     // load_image_data();
     swal({
     	title: "Sukses Masukan Foto!",
     	type: "success" 
     }, function(){
     	/*location.reload();*/
				// document.location.href="index.php?menu=redeem";
			});
     // alert('sukses');
     
     	location.reload();
 }
});
			}
			else
			{
				$('#multiple_files').val('');
				$('#error_multiple_files').html("<span class='text-danger'>"+error_images+"</span>");
				return false;
			}
		});  

	</script>