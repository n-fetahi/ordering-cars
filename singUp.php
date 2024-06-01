<?php

include 'connect.php';
session_start();

if($_SERVER['REQUEST_METHOD'] == "POST"){

    $name = $_POST['name'];
    $number = $_POST['number'];
    $pswd = $_POST['pswd'];
    $pswd2 = $_POST['pswd2'];
    $type = $_POST['type'];

    if($name == "" || $number == "" || $pswd == "" || $pswd2 == ""
    || $type == 0 ){



       header("location:login.php?err=0");

   }
   elseif($pswd != $pswd2)
   {
    header("location:login.php?err=1");
       
   }

   else{

    try{
        $sql2 = "SELECT * FROM users where phone= $number";
        $stmt2 = $conn->query($sql2);
        $count = $stmt2->rowCount();
        if($count > 0){
    header("location:login.php?err=4");

        }

        else{
            $sql = "INSERT INTO users (username	,phone,password,type)
            VALUES (?,?,?,?)";
       
           $stmt= $conn->prepare($sql);
           $stmt->execute([
               $name,$number,$pswd,$type
           ]);
   
   
           if($type == 1){
               $_SESSION['landor_id']= $conn->lastInsertId();
           header("location:landlord_index.php");
           }
           
           else{
           $_SESSION['renter_id']= $conn->lastInsertId();
           header("location:index.php");
   
           }
        }
       
        

    }
    catch(PDOException $e){

    header("location:login.php?err=2");

    }
}
}