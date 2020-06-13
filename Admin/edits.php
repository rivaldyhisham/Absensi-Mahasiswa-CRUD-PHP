<?php
	include 'koneksi.php';
	$a = $_GET['id'];
	$data = mysqli_query($koneksi,"select * from matakuliah");
	while($a = mysqli_fetch_array($data)){
		?>
		<form method="post" action="update.php">
			<table>
				<tr>			
					<td>Nama Dosen</td>
					<td>
						<input type="hidden" name="id" value="<?php echo $a['id']; ?>">
						<input type="text" name="nama" value="<?php echo $a['nama']; ?>">
					</td>
				</tr>
				<tr>
					<td>Mata kuliah</td>
					<td><input type="number" name="nim" value="<?php echo $d['nim']; ?>"></td>
				</tr>
				<tr>
					<td>Kode kelas</td>
					<td><input type="text" name="alamat" value="<?php echo $d['alamat']; ?>"></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" value="SIMPAN"></td>
				</tr>		
			</table>
		</form>
		
		<?php 
	}
	?>