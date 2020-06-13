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
	
</head>
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li><a href="index1.php">Data Mahasiswa</a></li>
					<li><a href="index.php">Absensi</a></li>
					<li><a href="add.php">Tambah Data</a></li>
					<li><a href="../logout.php">Log Out</a></li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</nav>
	<div class="container">
		<div class="content">
			<h2>Data Mahasiswa &raquo; Edit Data</h2>
			<hr />
			
			<?php
			$Nim = $_GET['Nim'];
			$sql = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE Nim='$Nim'");
			if(mysqli_num_rows($sql) == 0){
				header("Location: index.php");
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			if(isset($_POST['save'])){
				$Nim		    = $_POST['Nim'];
				$Nama		    = $_POST['Nama'];
				$Password		= $_POST['Password'];
				$Gender		    = $_POST['Gender'];
				$Nohp		 	= $_POST['Nohp'];
				$Email		 	= $_POST['Email'];
				
				$update = mysqli_query($koneksi, "UPDATE mahasiswa SET Nama='$Nama', Password='$Password', Gender='$Gender', Nohp='$Nohp', Email='$Email' WHERE Nim='$Nim'") or die(mysqli_error());
				if($update){
					header("Location: edit.php?Nim=".$Nim."&pesan=sukses");
				}else{
					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data gagal disimpan, silahkan coba lagi.</div>';
				}
			}
			
			if(isset($_GET['pesan']) == 'sukses'){
				echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data berhasil disimpan.</div>';
			}
			?>
			<form class="form-horizontal" action="" method="post">
				<div class="form-group">
					<label class="col-sm-3 control-label">NIM</label>
					<div class="col-sm-2">
						<input type="text" name="Nim" value="<?php echo $row ['Nim']; ?>" class="form-control" placeholder="NIM" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Nama</label>
					<div class="col-sm-4">
						<input type="text" name="Nama" value="<?php echo $row ['Nama']; ?>" class="form-control" placeholder="Nama" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Password</label>
					<div class="col-sm-4">
						<input type="password" name="Password" value="<?php echo $row ['Password']; ?>" class="form-control" placeholder="Password" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Gender</label>
					<div class="col-sm-3">
						<span><input type="radio" name="Gender" value="Laki-Laki" > Laki-Laki
						<input type="radio" name="Gender" value="Perempuan" > Perempuan </span>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">No.HP</label>
					<div class="col-sm-3">
						<input type="text" name="Nohp" value="<?php echo $row ['Nohp']; ?>" class="form-control" placeholder="No.HP" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Email</label>
					<div class="col-sm-2">
						<input type="email" name="Email" value="<?php echo $row ['Email']; ?>" class="form-control" placeholder="Email" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="save" class="btn btn-sm btn-primary" value="Simpan">
						<a href="index1.php" class="btn btn-sm btn-danger">Batal</a>
					</div>
				</div>
			</form>
		</div>
	</div>

	</script>
</body>
</html>