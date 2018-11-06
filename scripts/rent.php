<?php

$idbookrent  = (!isset($_GET["idbookrent"]) ? "" : trim(strtolower($_GET["idbookrent"])));
$readingtime = (!isset($_GET["readingtime"]) ? "" : trim(strtolower($_GET["readingtime"])));

$sqlRentBook = $pdo->prepare("SELECT r.idrentals,r.rentdate,r.returndate,r.idbook,b.title,r.whattime FROM rentals  as r INNER JOIN book AS b on b.idbook=r.idbook WHERE r.iduserrented='$idconnected' AND r.status='reserved'");
$sqlRentBook->execute();

$sqlBook = $pdo->prepare("select * from book where idbook not in(select idbook from rentals where status !='delivered')");
$sqlBook->execute();




if(isset($_GET["remove"])){
	$remove = $_GET["remove"];
	$sqlRemoveBook = $pdo->prepare("DELETE FROM rentals WHERE idrentals='$remove'");
	$sqlRemoveBook->execute();
	echo "<meta http-equiv='refresh' content='1; url=/rentbook'>";
}


if(isset($_POST["btnSearchBookRent"])){
	$searchBookRent = (!isset($_POST["searchBook"]) ? "" : trim(strtolower($_POST["searchBook"])));
	$sqlSearchBook = $pdo->prepare("SELECT * FROM book WHERE title LIKE '%searchBookRent%' AND idbook NOT IN(SELECT idbook FROM rentals WHERE status != 'delivered' GROUP BY idbook)");
	$sqlSearchBook->execute();
	$tSqlSearchBook = $sqlSearchBook->rowCount();
}


if($idbookrent != ''){
	$returndate = date('Y-m-d', strtotime('+'.$readingtime.' days', strtotime($hoje)));	
	$sqlRegisterIdBookRent = $pdo->prepare("INSERT INTO rentals(iduserreceived,iduserrented,idbook,rentdate,whattime,returndate,status)VALUES('0','$idconnected','$idbookrent','$hoje','$readingtime','$returndate','reserved')");
	$sqlRegisterIdBookRent->execute();
	echo "<meta http-equiv='refresh' content='1; url=/rentbook'>";
}


if(isset($_POST["rentBook"])){
	$nameUserRent  = (!isset($_POST["nameUserRent"]) ? "" : trim(strtolower($_POST["nameUserRent"])));

	if(($nameUserRent <= 0) || ($nameUserRent == "")){
		echo "<div class='alert alert-warning'><center>Sorry, a user needs to be selected.</center></div>";
	}else{
		$sqlUpdateRentBook = $pdo->prepare("UPDATE rentals SET iduserreceived='$nameUserRent',status='rented' WHERE iduserrented='$idconnected' AND status='reserved'");
		$sqlUpdateRentBook->execute();
		if($sqlUpdateRentBook){
			echo "<div class='alert alert-success'><center>Books rented successfully.</center></div>";
			echo "<meta http-equiv='refresh' content='1; url=/rentbook'>";
		}else{
			echo "<div class='alert alert-danger'><center>Sorry, there was an error finishing.</center></div>";
			echo "<meta http-equiv='refresh' content='1; url=/rentbook'>";
		}
	}
}