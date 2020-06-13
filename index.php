<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<link rel="shortcut icon" href="img/logo.png">
<style media="screen">
  body {
    background-image: url(img/bglogin.jpg);
    background-repeat: no-repeat;
    background-size: cover;
  }

  #backlogin {
    background: white;
    width: 35%;
    height: 350px;
    border: 5px solid #d2d2d2;
    border-radius: 75px;
    margin-top: 150px;
  }

  @font-face {
    src: url('font/Product Sans Regular.ttf');
    font-family: Product Sans;
  }

  @font-face {
    src: url('font/OpenSans-Light.ttf');
    font-family: OpenSans-Light;
  }

  #backlogin form {
    margin-top: 15px;
    float: left;
    padding: 5px;
  }

  #backlogin .inputa {
    width: 90%;
    margin-top: 1px;
    height: 50px;
    border: 0px;
    border-bottom: 1px solid #6a82fb;
    font-size: 16px;
    font-family: OpenSans-Light;
    background: transparent;
  }

  #backlogin .wed {
    margin-top: 40px;
    width: 45%;
    height: 40px;
    background: #6a82fb;
    border: none;
    color: white;
    font-family: product sans;
    font-size: 20px;
    border-radius: 5px;
  }

  #backlogin h1 {
    text-align: center;
    padding: 1px;
    color: #6a82fb;
    font-family: Product Sans;
  }

  #backlogin hr {
    width: 50%;
    height: 4px;
    border: none;
    background: #6a82fb;
  }
</style>

<body>
  <center>
    <div id="backlogin">
      <h1>Login Absensi</h1>
      <hr>
      <form id="login" action="login.php" method="post"> 
        <input type="text" class="inputa" name="username" value="" placeholder="Masukan Username" required> 
        <input type="password" class="inputa" name="password" value="" placeholder="Masukan password" required> 
        <input type="submit" class="wed"
          name="login" value="Submit"> <input type="reset" class="wed" name="" value="Reset"><br></form>
	
    </div> 
  </center> 
</body>

</html>