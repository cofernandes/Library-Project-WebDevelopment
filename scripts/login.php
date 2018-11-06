<?php

/*Receive data from the login form*/
$emaillogin      = (!isset($_POST["emaillogin"]) ? "" : trim(strtolower($_POST["emaillogin"])));
$passwordlogin   = (!isset($_POST["passwordlogin"]) ? "" : md5($_POST["passwordlogin"]));

/*Calls the connection file to the database*/
require("connection/connection.php");

/*Enable PDO connection*/
$pdo = connection();



/*If there is the action of clicking the enter button*/
if(isset($_POST["login"])){
	/*Executes login validation SQL*/
	$sqlLogin = $pdo->prepare("SELECT iduser,status,email FROM user WHERE email='$emaillogin' AND password='$passwordlogin'");
	$sqlLogin->execute();

	/*Pass the value of the query*/
	$tSqlLogin = $sqlLogin->rowCount();

	/*Validate query return*/
	if($tSqlLogin < 1){
		echo "<span class='text-red'><center>Sorry, the user or password is invalid.</center></span>";
	}else{
		/*Destroy the password*/
		unset($passwordlogin);

		while($userdata = $sqlLogin->fetch(PDO::FETCH_OBJ)){
			$status      = $userdata->status;
			$idconnected = $userdata->iduser;
		}

		/*Secondary profile aliasing*/
		if($status != 'A'){
			/*Informs that the user can not connect at the moment, because the profile is blocked.*/
			echo "<span class='text-info'><center>You can not access the system at this time.</center></span>";
		}else{
			/*Destroy the status*/
			unset($status);

			/*Welcome*/
			echo "<span class='text-green'><center> Welcome to the system.</center></span>";

			/*Creates a session for the user*/
			session_start();
			$_SESSION["emaillogin"]  = $emaillogin;
			$_SESSION["idconnected"] = $idconnected;
			echo "<meta http-equiv='refresh' content='1; url=/'>";
		}
	}
}





/*updates lost access data*/
$emailforgot       = (!isset($_POST["emailforgot"]) ? "" : trim(strtolower($_POST["emailforgot"])));
$passwordforgot    = (!isset($_POST["passwordforgot"]) ? "" : md5($_POST["passwordforgot"]));
$cpasswordforgot   = (!isset($_POST["cpasswordforgot"]) ? "" : md5($_POST["cpasswordforgot"]));


/*If there is the action of clicking the enter button*/
if(isset($_POST["upatedataforgot"])){
	
	/*Checks if email exists*/
	$sqlVerifyLogin = $pdo->prepare("SELECT email FROM user WHERE email='$emailforgot'");
	$sqlVerifyLogin->execute();
	$tSqlVerifyLogin = $sqlVerifyLogin->rowCount();

	/*Validate the data*/
	if($tSqlVerifyLogin < 1){
		echo "<span class='text-info'><center>Login does not exist.</center></span>";
	}else if(($passwordforgot == $cpasswordforgot) && ($passwordforgot == "d41d8cd98f00b204e9800998ecf8427e")){
		echo "<span class='text-orange'><center>The password can not be null.</center></span>";
	}else  if($passwordforgot != $cpasswordforgot){
		echo "<span class='text-orange'><center>The passwords are different.</center></span>";
	}else{

		/*Runs update*/
		$sqlUpdateForgot = $pdo->prepare("UPDATE user SET password='$passwordforgot' WHERE email='$emailforgot'");
		$sqlUpdateForgot->execute();

		if($sqlUpdateForgot){
			echo "<span class='text-green'><center>Password changed successfully.</center></span>";
		}else{
			echo "<span class='text-red'><center>Sorry, something went wrong while updating the password. Please contact the administrator.</center></span>";
		}
	}

}