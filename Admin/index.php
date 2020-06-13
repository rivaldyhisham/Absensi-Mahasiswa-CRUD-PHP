<?php
include("koneksi.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Absensi Mahasiswa</title>

	<link href="css/bootstrap.min.css" rel="stylesheet">
	
	<style>
		.content {
			margin-top: 20px;
		}
	</style>
	
</head>
<link rel="shortcut icon" href="../img/logo.png">
<body>
	<nav class="navbar navbar-inverse">
		<div class="container">
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
	<li><a href="index1.php">Data Mahasiswa</a></li>
					<li><a href="index.php">Absensi</a></li>
					<li><a href="add.php">Tambah Data</a></li>
					<li><a href="add2.php">Matakuliah</a></li>
					<li><a href="../logout.php">Log Out</a></li>
					
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</nav>
	<div class="container">
		<div class="content">
			<h2>Data Absensi</h2>
			<hr />
			
			<?php
			if(isset($_GET['aksi']) == 'delete'){
				$Id = $_GET['Id'];
				$cek = mysqli_query($koneksi, "SELECT * FROM absen WHERE Id='$Id'");
				if(mysqli_num_rows($cek) == 0){
					echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data tidak ditemukan.</div>';
				}else{
					$delete = mysqli_query($koneksi, "DELETE FROM absen WHERE Id='$Id'");
					if($delete){
						echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data berhasil dihapus.</div>';
					}else{
						echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data gagal dihapus.</div>';
					}
				}
			}
			?>
			<?php
			$sql = "select * from mahasiswa";
			$query = mysqli_query($koneksi,$sql);
			?>
			
			<form class="form-inline" method="post">
				<div class="form-group">
					<select name="filter" class="form-control">
						<option value="0">Pilih Mahasiswa</option>
						<?php
						while($data=mysqli_fetch_assoc($query)){
						?>
						<option value="<?php echo $data['Nim']; ?>"><?php echo $data['Nama']; ?></option>
						<?php } ?>
					</select>
				</div>
			<br />
			<br />
					<input type="submit" name="datang" class="btn btn-sm btn-info" value="Datang">
					<input type="submit" name="pulang" class="btn btn-sm btn-info" value="Pulang">
					<input type="submit" name="lihat" class="btn btn-sm btn-info" value="Lihat">
			</form>
			<br />
			
			<div class="table-responsive">
			<table class="table table-striped table-hover">
				<tr>
					<th>ID</th>
					<th>NPM</th>
					<th>Nama</th>
					<th>Tanggal</th>
                    <th>Datang</th>
                    <th>Pulang</th>
				</tr>
				<?php
				if(isset($_POST['datang']))
				{
				$Nim = $_POST['filter'];
				$sql = "select * from absen where Tanggal = CURRENT_DATE() and Nim=$Nim";
				$query = mysqli_query($koneksi,$sql);
				if(mysqli_num_rows($query) == 0)
				{
				$sql = "insert into absen (`Nim`,`Tanggal`,`Datang`,`Pulang`) values ('$Nim',CURRENT_DATE(),CURRENT_TIME(),'')";
				$query = mysqli_query($koneksi,$sql);
				if(!$query)
				{
					echo "Gagal Datang";
					echo $Nim;
				}
				else
				{
					echo "Berhasil Datang";
				}
				}
				else
				{
					echo "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button> Anda sudah absen.</div>";
				}	
				}
				else if(isset($_POST['pulang']))
				{
				$Nim = $_POST['filter'];
				$sql = "select * from absen where Tanggal = CURRENT_DATE() and Nim=$Nim and Pulang='00:00:00'";
				$query = mysqli_query($koneksi,$sql);
				if(mysqli_num_rows($query) != 0)
				{
				$sql = "update absen set Pulang=CURRENT_TIME() where Tanggal = CURRENT_DATE() and Nim=$Nim";
				$query = mysqli_query($koneksi,$sql);
				if(!$query)
				{
					echo "Gagal Pulang";
				}
				else
				{
					echo "Berhasil Pulang";
				}
				}
				else
				{
					echo "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button> Anda belum absen datang / Anda sudah absen pulang.</div>";
				}
				}
				if(isset($_POST['lihat'])){
						$Nim = $_POST['filter'];
						$sql = mysqli_query($koneksi, "SELECT * FROM absen,mahasiswa WHERE mahasiswa.Nim = absen.Nim and absen.Nim = '$Nim' ORDER BY Id ASC");
					}else{
						$sql = mysqli_query($koneksi, "select * from absen,mahasiswa where mahasiswa.Nim = absen.Nim ORDER BY Id ASC");
					}
					if(mysqli_num_rows($sql) == 0){
					echo '<tr><td colspan="8">Data Tidak Ada.</td></tr>';
					}else{
					$no = 1;
					while($row = mysqli_fetch_assoc($sql)){
						echo '
						<tr>
							<td>'.$no.'</td>
							<td>'.$row['Nim'].'</td>
							<td><a href="../Profile/'.$row['Nim'].'.php/"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> '.$row['Nama'].'</a></td>
							<td>'.$row['Tanggal'].'</td>
                            <td>'.$row['Datang'].'</td>';
							if($row["Pulang"]!="00:00:00")
							{
								echo '<td>'.$row['Pulang'].'</td> ';
							}
							else
							{
								echo '<td></td>';
							}
						'</tr>';
						$no++;
					}
					}
					?>
			</table>
			</div>
		</div>
	</div>
</body>
</html>