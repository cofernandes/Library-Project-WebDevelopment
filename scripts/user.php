<?php

if(!isset($_GET["iduser"])){
	$sqlUser = $pdo->prepare("SELECT * FROM user WHERE iduser != '$idconnected'ORDER BY name ASC");
	$sqlUser->execute();
}else{
	$iduser = $_GET["iduser"];
	$sqlUser = $pdo->prepare("SELECT * FROM user WHERE iduser='$iduser'ORDER BY name ASC");
	$sqlUser->execute();



	/*Update User*/
	if(isset($_POST["updateUser"])){
		$nameUser      = (!isset($_POST["nameUser"]) ? "" : strtolower($_POST["nameUser"]));
		$emailUser     = (!isset($_POST["emailUser"]) ? "" : trim(strtolower($_POST["emailUser"])));
		$typeuser      = (!isset($_POST["typeuser"]) ? "" : trim(strtolower($_POST["typeuser"])));
		$password      = (!isset($_POST["password"]) ? "" : md5($_POST["password"]));
		$cpassword     = (!isset($_POST["cpassword"]) ? "" : md5($_POST["cpassword"]));	
		$status        = (!isset($_POST["status"]) ? "" : trim(strtolower($_POST["status"])));

		$sqlVerifyUser = $pdo->prepare("SELECT iduser FROM user WHERE email='$emailUser' AND iduser != '$iduser'");
		$sqlVerifyUser->execute();
		$tSqlVerifyUser = $sqlVerifyUser->rowCount();

		if($tSqlVerifyUser >= 1){
			echo "<div class='alert alert-warning'><center>The informed email is already registered for another user.</center></div>";
		}else{
			$sqlUpdateUser = $pdo->prepare("UPDATE user SET email='$emailUser',name='$nameUser',profile='$typeuser',status='$status' WHERE iduser='$iduser'");
			$sqlUpdateUser->execute();
			if(($password == $cpassword) && ($password != "d41d8cd98f00b204e9800998ecf8427e")){
				$sqlUpdatePassword = $pdo->prepare("UPDATE user SET password='$password' WHERE iduser='$iduser'");
				$sqlUpdatePassword->execute();
			}

			if($sqlUpdateUser){
				echo "<div class='alert alert-success'><center>User updated successfully.</center></div>";
				echo "<meta http-equiv='refresh' content='1; url=/'>";
			}else{
				echo "<div class='alert alert-danger'><center>Sorry, something went wrong while updating.</center></div>";
				echo "<meta http-equiv='refresh' content='1; url=/'>";
			}
		}

	}


}





/*Register user on system.*/
if(isset($_POST["registerUser"])){
	$nameUser      = (!isset($_POST["nameUser"]) ? "" : strtolower($_POST["nameUser"]));
	$emailUser     = (!isset($_POST["emailUser"]) ? "" : trim(strtolower($_POST["emailUser"])));
	$typeuser      = (!isset($_POST["typeuser"]) ? "client" : trim(strtolower($_POST["typeuser"])));
	$password      = (!isset($_POST["password"]) ? "" : md5($_POST["password"]));
	$cpassword     = (!isset($_POST["cpassword"]) ? "" : md5($_POST["cpassword"]));

	if(($password == $cpassword) && ($password=="d41d8cd98f00b204e9800998ecf8427e")){
		echo "<div class='alert alert-warning'><center>The password can not be null.</center></div>";
	}else if($password != $cpassword){
		echo "<div class='alert alert-warning'><center>The passwords are different.</center></div>";
	}else if($nameUser == ""){
		echo "<div class='alert alert-warning'><center>The name can not be null.</center></div>";
	}else if($emailUser == ""){
		echo "<div class='alert alert-warning'><center>The email can not be null.</center></div>";
	}else{
		$sqlVerifyUser = $pdo->prepare("SELECT iduser FROM user WHERE email='$emailUser'");
		$sqlVerifyUser->execute();
		$tSqlVerifyUser = $sqlVerifyUser->rowCount();
		if($tSqlVerifyUser >= 1){
			echo "<div class='alert alert-danger'><center>A user already exists on the system.</center></div>";
		}else{
			$sqlRegisterUser = $pdo->prepare("INSERT INTO user(name,email,password,profile)VALUES('$nameUser','$emailUser','$password','$typeuser')");
			$sqlRegisterUser->execute();
			if($sqlRegisterUser){
				echo "<div class='alert alert-success'><center>Registered user successfully.</center></div>";
				echo "<meta http-equiv='refresh' content='1; url=/'>";
			}else{
				echo "<div class='alert alert-danger'><center>Sorry, something went wrong when registering the user.</center></div>";
				echo "<meta http-equiv='refresh' content='1; url=/'>";
			}
		}
	}
}


/*Search for registered users.*/
if(isset($_POST["btnSearchUser"])){
	$searchUser = $_POST["searchUser"];
	$sqlSearchUser = $pdo->prepare("SELECT * FROM user WHERE name like '%$searchUser%' OR iduser='$searchUser' OR email='$searchUser'");
	$sqlSearchUser->execute();
	$tSqlSearchUser = $sqlSearchUser->rowCount();
}

