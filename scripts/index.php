<?php


$sqlUser = $pdo->prepare("SELECT profile FROM user WHERE iduser='$idconnected'");
$sqlUser->execute();
while($displayUser = $sqlUser->fetch(PDO::FETCH_OBJ)){
	$profileUser = $displayUser->profile;
}

$sqlReservedBook = $pdo->prepare("SELECT idbook FROM rentals WHERE status='reserved'");
$sqlReservedBook->execute();
$tSqlReservedBook = $sqlReservedBook->rowCount();

$sqlDelayedDeliveries = $pdo->prepare("SELECT idbook FROM rentals WHERE returndate < $hoje");
$sqlDelayedDeliveries->execute();
$tSqlDelayedDeliveries = $sqlDelayedDeliveries->rowCount();

$sqlDeliveriesOnTime = $pdo->prepare("SELECT idbook FROM rentals WHERE returndate > $hoje");
$sqlDeliveriesOnTime->execute();
$tSqlDeliveriesOnTime = $sqlDeliveriesOnTime->rowCount();

$sqlLeasedBook = $pdo->prepare("SELECT idbook FROM rentals WHERE status != 'delivered'");
$sqlLeasedBook->execute();
$tSqlLeasedBook = $sqlLeasedBook->rowCount();

$sqlBookRent = $pdo->prepare("SELECT b.title,r.returndate FROM rentals AS r INNER JOIN book AS b ON b.idbook=r.idbook WHERE r.iduserreceived='$idconnected' AND r.status != 'delivered'");
$sqlBookRent->execute();
$tSqlBookRent = $sqlBookRent->rowCount();