<?php

$data=$_REQUEST;
$month=$data['month'];
$name=$data['name'];
$attendence=$data['attendence'];
 
//echo "Hello World ".$name;



	$dsn= 'mysql:dbname=dockertest01;host=localhost';
	$user='root';
	$password='';


	try{
		//writing data to database
		
		$dbh=new PDO ($dsn, $user, $password);
		
		
		$stmt= $dbh->prepare("INSERT INTO report(name,month,attendence) VALUES (:name,:month,:attendence)");
		$stmt->bindParam(':name', $name, PDO::PARAM_STR);
		$stmt->bindParam(':month', $month, PDO::PARAM_STR);
		$stmt->bindParam(':attendence', $attendence, PDO::PARAM_INT);

		$stmt->execute();
		
		echo "INSERT SUCCESSFUL";
		
	}catch (PDOException $e){
		
		echo 'DB Connection failed'.$e->getMessage();
	}
	
	$dbh=null;



?>
