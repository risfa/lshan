
<table border="1">
	<tr>
		<th>Nama</th>
		<th>Telpon</th>
		<th>Alamat</th>
		<th>Email</th>
	</tr>
	<?php
	//koneksi ke database
	
	$connect = mysqli_connect("localhost", "dapps", "l1m4d1g1t", "dapps_joker_pertamina_lesehan2018");  

	//query menampilkan data
	$sql = mysqli_query($connect,"SELECT * FROM `tb_customer` WHERE StatusHadiah = 'VALIDASI_GAGAL' ");
	$no = 1;
	while($data = mysqli_fetch_assoc($sql)){
		echo '
		<tr>
			<td>'.$data['Nama'].'</td>
			<td>'.$data['Telepon'].'</td>
			<td>'.$data['Alamat'].'</td>
			<td>'.$data['Email'].'</td>
		</tr>
		';
		$no++;
	}
	?>
</table>