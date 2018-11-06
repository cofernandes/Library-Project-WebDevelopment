<?php

/*SQL General*/

$sqlRentBook = $pdo->prepare("SELECT u.name,b.title,r.idrentals,r.idbook,r.rentdate,r.returndate FROM rentals AS r INNER JOIN book AS b ON b.idbook=r.idbook INNER JOIN user AS u ON u.iduser=r.iduserreceived WHERE r.status='rented'");
$sqlRentBook->execute();



/*search for rented book*/
if(isset($_POST["btnSearchRentedBook"])){
	$searchRentedBook = $_POST["searchRentedBook"];
	$sqlSearchRentedBook = $pdo->prepare("SELECT u.name,r.idrentals,b.title,r.idbook,r.rentdate,r.returndate FROM rentals AS r INNER JOIN book AS b ON b.idbook=r.idbook INNER JOIN user AS u ON u.iduser=r.iduserreceived WHERE r.status='rented' AND b.title like '%$searchRentedBook%'");
	$sqlSearchRentedBook->execute();
	$tSqlSearchRentedBook = $sqlSearchRentedBook->rowCount();
}


if(isset($_GET["idrentals"])){
	$idrentals = $_GET["idrentals"];
	$sqlDelivereBook = $pdo->prepare("UPDATE rentals SET status='delivered' WHERE idrentals='$idrentals'");
	$sqlDelivereBook->execute();
	echo "<meta http-equiv='refresh' content='1; url=/leased-book'>";
}


if(isset($_GET["idbook"])){
	$idbook = $_GET["idbook"];
	$sqlBook = $pdo->prepare("SELECT b.readingtime,b.isbn,b.readingtime,b.launchdate,a.idauthor,p.idpublishingcompany,b.idbook,b.title,a.name AS author,p.name AS publishingcompany,b.language,b.page,b.genre,b.edition FROM book AS b
INNER JOIN author AS a ON a.idauthor=b.author INNER JOIN publishingcompany AS p ON p.idpublishingcompany=b.publishingcompany WHERE b.idbook='$idbook'");
	$sqlBook->execute();





/*book updates*/
	if(isset($_POST["updateBook"])){
		$author            = (!isset($_POST["author"]) ? "" : trim(strtolower($_POST["author"])));
		$publishingcompany = (!isset($_POST["publishingcompany"]) ? "" : trim(strtolower($_POST["publishingcompany"])));
		$title             = (!isset($_POST["title"]) ? "" : trim(strtolower($_POST["title"])));
		$launchdate        = (!isset($_POST["launchdate"]) ? "" : trim(strtolower($_POST["launchdate"])));
		$language          = (!isset($_POST["language"]) ? "" : trim(strtolower($_POST["language"])));
		$isbn              = (!isset($_POST["isbn"]) ? "" : trim(strtolower($_POST["isbn"])));
		$edition           = (!isset($_POST["edition"]) ? "" : trim(strtolower($_POST["edition"])));
		$page              = (!isset($_POST["page"]) ? "" : trim(strtolower($_POST["page"])));
		$genre             = (!isset($_POST["genre"]) ? "" : trim(strtolower($_POST["genre"])));
		$readingtime       = (!isset($_POST["readingtime"]) ? "" : trim(strtolower($_POST["readingtime"])));

		$sqlVerifyBook = $pdo->prepare("SELECT idbook FROM book WHERE isbn='$isbn' AND idbook != '$idbook'");
		$sqlVerifyBook->execute();
		$tSqlVerifyBook = $sqlVerifyBook->rowCount();

		if($tSqlVerifyBook >= 1){
			echo "<div class='alert alert-warning'><center>Another book is already registered with the ISBN informed.</center></div>";
		}else{

			$sqlUpdateBook = $pdo->prepare("UPDATE book SET author='$author',publishingcompany='$publishingcompany',title='$title',launchdate='$launchdate',language='$language',isbn='$isbn',edition='$edition',page='$page',genre='$genre',readingtime='$readingtime' WHERE idbook='$idbook'");
			$sqlUpdateBook->execute();

			if($sqlUpdateBook){
				echo "<div class='alert alert-success'><center>Update book success.</center></div>";	
			}else{
				echo "<div class='alert alert-warning'><center>Sorry, something went wrong while updating.</center></div>";	
			}

		}

	}

}else{
	$sqlBook = $pdo->prepare("SELECT b.readingtime,b.idbook,b.title,a.name AS author,p.name AS publishingcompany,b.language,b.page,b.genre,b.edition FROM book AS b
INNER JOIN author AS a ON a.idauthor=b.author INNER JOIN publishingcompany AS p ON p.idpublishingcompany=b.publishingcompany ORDER BY b.title");
	$sqlBook->execute();

}





/*Register book*/

if(isset($_POST["registerBook"])){
	$author            = (!isset($_POST["author"]) ? "" : trim(strtolower($_POST["author"])));
	$publishingcompany = (!isset($_POST["publishingcompany"]) ? "" : trim(strtolower($_POST["publishingcompany"])));
	$title             = (!isset($_POST["title"]) ? "" : trim(strtolower($_POST["title"])));
	$launchdate        = (!isset($_POST["launchdate"]) ? "" : trim(strtolower($_POST["launchdate"])));
	$language          = (!isset($_POST["language"]) ? "" : trim(strtolower($_POST["language"])));
	$isbn              = (!isset($_POST["isbn"]) ? "" : trim(strtolower($_POST["isbn"])));
	$edition           = (!isset($_POST["edition"]) ? "" : trim(strtolower($_POST["edition"])));
	$page              = (!isset($_POST["page"]) ? "" : trim(strtolower($_POST["page"])));
	$genre             = (!isset($_POST["genre"]) ? "" : trim(strtolower($_POST["genre"])));
	$readingtime       = (!isset($_POST["readingtime"]) ? "" : trim(strtolower($_POST["readingtime"])));

	$sqlVerifyBook = $pdo->prepare("SELECT idbook FROM book WHERE isbn='$isbn'");
	$sqlVerifyBook->execute();
	$tSqlVerifyBook = $sqlVerifyBook->rowCount();

	if($tSqlVerifyBook >= 1){
		echo "<div class='alert alert-warning'><center>There is already a book registered with isbn informed.</center></div>";
	}else{

		$sqlRegisterBook = $pdo->prepare("INSERT INTO book(author,publishingcompany,title,launchdate,isbn,edition,page,genre,readingtime,language)VALUES('$author','$publishingcompany','$title','$launchdate','$isbn','$edition','$page','$genre','$readingtime','$language')");
		$sqlRegisterBook->execute();

		if($sqlRegisterBook){
			echo "<div class='alert alert-success'><center>Registered successfully.</center></div>";
		}else{
			echo "<div class='alert alert-danger'><center>Sorry, there was an error registering.</center></div>";
		}
	}
}



/*Search Book*/
if(isset($_POST["btnSearchBook"])){
	$searchBook = $_POST["searchBook"];
	$sqlSearchBook = $pdo->prepare("SELECT b.readingtime,b.isbn,b.readingtime,b.launchdate,a.idauthor,p.idpublishingcompany,b.idbook,b.title,a.name AS author,p.name AS publishingcompany,b.language,b.page,b.genre,b.edition FROM book AS b
INNER JOIN author AS a ON a.idauthor=b.author INNER JOIN publishingcompany AS p ON p.idpublishingcompany=b.publishingcompany WHERE b.idbook='$searchBook' OR b.title like '%$searchBook%'");
	$sqlSearchBook->execute();
	$tSqlSearchBook = $sqlSearchBook->rowCount();	
}