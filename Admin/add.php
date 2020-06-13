<?php
include("koneksi.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Absensi Mahasiswa</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap-datepicker.css" rel="stylesheet"> 
	<style>
		.content {
			margin-top: 80px;
		}
	</style>
</head><link rel="shortcut icon" href="../img/logo.png">
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
			</div>
		</div>
	</nav>
	<div class="container">
		<div class="content">
			<h2>Tambah Data Mahasiswa</h2>
			<hr />
		<?php
			if(isset($_POST['add'])){
				$Nim		    = $_POST['Nim'];
				$Nama		    = $_POST['Nama'];
				$Password		= $_POST['Password'];
				$Gender		    = $_POST['gender'];
				$Nohp		 	= $_POST['Nohp'];
				$Email		 	= $_POST['Email'];

				$cek = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE Nim='$Nim'");
				if(mysqli_num_rows($cek) == 0){
					if($Password){
						$Password = md5($Password);
						$sql = "INSERT into mahasiswa values ('$Nim','$Nama','$Password','$Gender','$Nohp','$Email')";
						$insert = mysqli_query($koneksi, $sql) or die(mysqli_error());
						if($insert){
							echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data Absensi Berhasil Di Simpan.</div>';
						}else{
							echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ups, Data Absensi Gagal Di simpan !</div>';
						}
					} else{
						echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Password Tidak sama !</div>';
					}
				}else{
					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>NPM Sudah Ada!</div>';
					}	}
			?>
			
			<form class="form-horizontal"  method="post">
				<div class="form-group">
					<label class="col-sm-3 control-label">NPM</label>
					<div class="col-sm-2">
						<input type="varchar" name="Nim" class="form-control" placeholder="NPM" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Nama</label>
					<div class="col-sm-4">
						<input type="varchar" name="Nama" class="form-control" placeholder="Nama" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Password</label>
					<div class="col-sm-4">
						<input type="password" name="Password" class="form-control" placeholder="Password" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Gender</label>
					<div class="col-sm-3">
						<span><input type="radio" name="gender" value="Laki-Laki" > Laki-Laki
						<input type="radio" name="gender" value="Perempuan" > Perempuan </span>	
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">No.HP</label>
					<div class="col-sm-3">
						<input type="varchar" name="Nohp" class="form-control" placeholder="No.HP" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Email</label>
					<div class="col-sm-2">
						<input type="varchar" name="Email" class="form-control" placeholder="Email" required>

				  <label for="img">Select image:</label>
				  <input type="file" id="img" name="img" accept="image/*">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="add" class="btn btn-sm btn-primary" value="Simpan">
						<a href="index.php" class="btn btn-sm btn-danger">Batal</a>
					</div>
				</div>
			</form>
		</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script>
	</script>
</body>
</html>