<?php

if(isset($_GET["idpublishingcompany"])){
	$idpublishingcompany = $_GET["idpublishingcompany"];
	$sqlPublishingCompany = $pdo->prepare("SELECT * FROM publishingcompany WHERE idpublishingcompany='$idpublishingcompany'");
	$sqlPublishingCompany->execute();


	if(isset($_POST["updatePublishingCompany"])){
		$name           = (!isset($_POST["name"]) ? "" : trim(strtolower($_POST["name"])));
		$address        = (!isset($_POST["address"]) ? "" : trim(strtolower($_POST["address"])));
		$neighborhood   = (!isset($_POST["neighborhood"]) ? "" : trim(strtolower($_POST["neighborhood"])));
		$number         = (!isset($_POST["number"]) ? "" : trim(strtolower($_POST["number"])));
		$city           = (!isset($_POST["city"]) ? "" : trim(strtolower($_POST["city"])));
		$zipcode        = (!isset($_POST["zipcode"]) ? "" : trim(strtolower($_POST["zipcode"])));
		$cnpj           = (!isset($_POST["cnpj"]) ? "" : trim(strtolower($_POST["cnpj"])));

		$sqlVerifyPublishingCompany = $pdo->prepare("SELECT idpublishingcompany FROM publishingcompany WHERE cnpj='$cnpj' AND idpublishingcompany!='$idpublishingcompany' ");
		$sqlVerifyPublishingCompany->execute();
		$tSqlVerifyPublishingCompany = $sqlVerifyPublishingCompany->rowCount();

		if($tSqlVerifyPublishingCompany >= 1){
			echo "<div class='alert alert-warning'><center>Another publisher is already registered with the CNPJ informed.</center></div>";
		}else{
			$sqlUpdatePublishingCompany = $pdo->prepare("UPDATE publishingcompany SET `name`='$name',`address`='$address',`neighborhood`='$neighborhood',`number`='$number',`city`='$city',`zipcode`='$zipcode',`cnpj`='$cnpj' WHERE idpublishingcompany='$idpublishingcompany'");
			$sqlUpdatePublishingCompany->execute();

			if($sqlUpdatePublishingCompany){
				echo "<div class='alert alert-success'><center>Successful update.</center></div>";
			}else{
				echo "<div class='alert alert-danger'><center>Sorry, there was an error update.</center></div>";
			}
		}
	}

}else{
	$sqlPublishingCompany = $pdo->prepare("SELECT * FROM publishingcompany ORDER BY name ASC");
	$sqlPublishingCompany->execute();

}

if(isset($_POST["btnSearchPublishingCompany"])){
	$searchPublishingCompany = $_POST["searchPublishingCompany"];
	$sqlSearchPublishingCompany = $pdo->prepare("SELECT * FROM publishingcompany WHERE name like '%$searchPublishingCompany%' OR idpublishingcompany='$searchPublishingCompany'");
	$sqlSearchPublishingCompany->execute();
	$tSqlSearchPublishingCompany = $sqlSearchPublishingCompany->rowCount();
}


if(isset($_POST["registerPublishingCompany"])){
$name           = (!isset($_POST["name"]) ? "" : trim(strtolower($_POST["name"])));
$address        = (!isset($_POST["address"]) ? "" : trim(strtolower($_POST["address"])));
$neighborhood   = (!isset($_POST["neighborhood"]) ? "" : trim(strtolower($_POST["neighborhood"])));
$number         = (!isset($_POST["number"]) ? "" : trim(strtolower($_POST["number"])));
$city           = (!isset($_POST["city"]) ? "" : trim(strtolower($_POST["city"])));
$zipcode        = (!isset($_POST["zipcode"]) ? "" : trim(strtolower($_POST["zipcode"])));
$cnpj           = (!isset($_POST["cnpj"]) ? "" : trim(strtolower($_POST["cnpj"])));

$sqlVerifyPublishingCompany = $pdo->prepare("SELECT idpublishingcompany FROM publishingcompany WHERE name='$name' OR cnpj='$cnpj'");
$sqlVerifyPublishingCompany->execute();
$tSqlVerifyPublishingCompany = $sqlVerifyPublishingCompany->rowCount();

if($tSqlVerifyPublishingCompany >= 1){
	echo "<div class='alert alert-warning'><center>A registered publisher already exists</center></div>";
	}else{
		$sqlRegisterPublishingCompany = $pdo->prepare("INSERT INTO publishingcompany(`name`,`address`,`neighborhood`,`number`,`city`,`zipcode`,`cnpj`)VALUES('$name','$address','$neighborhood','$number','$city','$zipcode','$cnpj')");
		$sqlRegisterPublishingCompany->execute();

		if($sqlRegisterPublishingCompany){
			echo "<div class='alert alert-success'><center>Successful registration.</center></div>";
		}else{
			echo "<div class='alert alert-danger'><center>Sorry, there was an error registering.</center></div>";
		}
	}

}