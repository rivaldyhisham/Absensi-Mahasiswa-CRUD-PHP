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
			<h2>Tambah Matakuliah</h2>
			<hr />
			
			<table class="table table-striped table-hover">
		<tr>
			<th>No</th>
			<th>Dosen</th>
			<th>Mata Kuliah</th>
			<th>Kode Kelas</th>
			<th>Tanggal</th>
			<th>OPSI</th>
		</tr>
		<?php 
		include 'koneksi.php';
		$no = 1;
		$data = mysqli_query($koneksi,"select * from matakuliah");
		while($a = mysqli_fetch_array($data)){
			?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $a['Dosen']; ?></td>
				<td><?php echo $a['matakuliah']; ?></td>
				<td><?php echo $a['kodekelas']; ?></td>
				<td><?php echo $a['tanggal']; ?></td>
				<td>
					<a href="edits.php" title="Edit Data" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
					
				</td>
			</tr>
			<?php 
		}

		?>

	</table>
			</div>
		</div>
	</div>
</body>
</html>