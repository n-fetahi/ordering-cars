<?php

include "connect.php";

session_start();


if($_SERVER['REQUEST_METHOD'] == "POST"){

	$number = $_POST['number'];
	$pswd = $_POST['pswd'];

	if($number == "" || $pswd == "" ){
		header("location:login.php?err=0");

	}

	else{
		try{
			
			$sql = "SELECT * FROM users where phone= $number and password='$pswd'";
			$stmt = $conn->query($sql);
			$data = $stmt->fetch();
			$count = $stmt->rowCount();

			if($count >= 1){
				if($data['type'] == 2){
					$_SESSION['renter_id']= $data['ID'];
					header("location:index.php");
				}
				elseif($data['type'] == 1){
					$_SESSION['landor_id']= $data['ID'];
					header("location:landlord_index.php");
				}
				else{
					header("location:cars_cat.php");
				}

				
			}

			else{
				header("location:login.php?err=3");

			}

			
		}
		catch(PDOException $e){
			echo $e->getMessage();

			// header("location:login.php?err=2");
			
		}
	}
		
		

}


