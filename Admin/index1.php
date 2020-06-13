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
			margin-top: 80px;
		}
	</style>
</head>
<link rel="shortcut icon" href="../img/logo.png">
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top">
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
			<h2>Data Mahasiswa</h2>
			<hr />
			
			<?php
			if(isset($_GET['aksi']) == 'delete'){
				$Nim = $_GET['Nim'];
				$cek = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE $Nim='Nim'");
				if(mysqli_num_rows($cek) == 1){
					echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data tidak ditemukan.</div>';
				}else{
					$delete = mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE Nim='$Nim'");
					if($delete){
						echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data berhasil dihapus.</div>';
					}else{
						echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data gagal dihapus.</div>';
					}
				}
			}
			?>
			
			<div class="table-responsive">
			<table class="table table-striped table-hover">
				<tr>
                    <th>No</th>
					<th>NPM</th>
					<th>Nama</th>
                    <th>Gender</th>
					<th>No.HP</th>
					<th>Email</th>
					<th>Tools</th>
				</tr>
				<?php
				if(isset($_POST['lihat'])){
						$Nim = $_POST['filter'];
						$sql = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE mahasiswa.Nim and mahasiswa.Nim = '$Nim' ORDER BY Nim ASC");
					}else{
						$sql = mysqli_query($koneksi, "select * from mahasiswa where mahasiswa.Nim ORDER BY Nim ASC");
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
                            <td>'.$row['Gender'].'</td>
							<td>'.$row['Nohp'].'</td>
                            <td>'.$row['Email'].'</td>';
						echo '
							<td>								
								<a href="edit.php?Nim='.$row['Nim'].'" title="Edit Data" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
								<a href="index1.php?aksi=delete&Nim='.$row['Nim'].'" title="Hapus Data" onclick="return confirm(\'Anda yakin akan menghapus data '.$row['Nama'].'?\')" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
							</td>
						</tr>
						';
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