<?php

if(isset($_GET["idauthor"])){
	$idauthor = $_GET["idauthor"];
	$sqlAuthor = $pdo->prepare("SELECT * FROM author WHERE idauthor='$idauthor'");
	$sqlAuthor->execute();

	if(isset($_POST["updateAuthor"])){
		$nameAuthor = (!isset($_POST["nameAuthor"]) ? "" : trim(strtolower($_POST["nameAuthor"])));
		$sqlUpdateAuthor = $pdo->prepare("UPDATE author SET name='$nameAuthor' WHERE idauthor='$idauthor'");
		$sqlUpdateAuthor->execute();

		if($sqlUpdateAuthor){
			echo "<div class='alert alert-success'><center>Successful update author.</center></div>";
		}else{
			echo "<div class='alert alert-danger'><center>Sorry, there was an error subscribing the author.</center></div>";
		}
	}

}else{
	$sqlAuthor = $pdo->prepare("SELECT * FROM author ORDER BY name ASC");
	$sqlAuthor->execute();
}




if(isset($_POST["btnSearchAuthor"])){
	$searchAuthor = $_POST["searchAuthor"];
	$sqlSearchAuthor = $pdo->prepare("SELECT * FROM author WHERE idauthor='$searchAuthor' OR name like '%$searchAuthor%'");
	$sqlSearchAuthor->execute();
	$tSqlSearchAuthor = $sqlSearchAuthor->rowCount();
	
}



/*Author Registration*/
if(isset($_POST["registerAuthor"])){
	$nameAuthor = (!isset($_POST["nameAuthor"]) ? "" : strtolower($_POST["nameAuthor"]));
	$sqlVerifyAuthor = $pdo->prepare("SELECT name FROM author WHERE name='$nameAuthor'");
	$sqlVerifyAuthor->execute();
	$tSqlVerifyAuthor = $sqlVerifyAuthor->rowCount();

	if($tSqlVerifyAuthor >= 1){
		echo "<div class='alert alert-warning'><center>There is already an author registered under this name.</center></div>";
	}else{
		$sqlRegisterAuthor = $pdo->prepare("INSERT INTO author(name)VALUES('$nameAuthor')");
		$sqlRegisterAuthor->execute();

		if($sqlRegisterAuthor){
			echo "<div class='alert alert-success'><center>Successful register author.</center></div>";
		}else{
			echo "<div class='alert alert-danger'><center>Sorry, there was an error subscribing the author.</center></div>";
		}
	}
}