<h3>Customer Survey</h3><hr>
<div class="col-xs-12">
	<!-- <form> -->
		<div class="form-group">
			<label  style="font-size: 20px">Nama Lengkap</label>
			<input id="nama_lengkap" type="text" class="form-control self-form" name="nama_lengkap">
		</div>
		<div class="form-group">
			<label  style="font-size: 20px">Nomor Telepon</label>
			<input id="nomor_telepon" type="text" class="form-control self-form" name="nomor_telepon">
		</div>
		<div class="form-group">
			<button id="lanjutkan" class="btn self-green-button">LANJUTKAN >></button>
		</div>
	<!-- </form> -->
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


<script type="text/javascript">

	$(document).ready(function(){


    $("#lanjutkan").click(function(){
        $.ajax({url: "process/api.php", data:{nama_lengkap:$('#nama_lengkap').val(), nomor_telepon:$('#nomor_telepon').val()}, success: function(result){
        	swal({
				title: "belum di masukin link selanjutnya!",
				type: "error" 
				}, function(){
				document.location.href="index.php?menu=survey2";
				});
        	// alert('belum di masukin link selanjutnya')
            console.log(result)
        }
    });
   });

});


	
</script>