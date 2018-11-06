<?php
function connection(){
try{
$pdo=new PDO("mysql:host=localhost;dbname=library","root","");
}catch(PDOException $e){
echo $e->getCode();
}
return $pdo;
}

function exitconnection(){
	$pdoExit = new mysql_close();
}
?>