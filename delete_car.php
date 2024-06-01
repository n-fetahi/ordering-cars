<?php
include "connect.php";

if(isset($_GET['id'])){
    $id=$_GET['id'];


    try{

            $sql = "UPDATE cars SET isEnabled = 0 WHERE ID=$id";
            $stmt= $conn->prepare($sql);
            $stmt->execute();

            if($_GET['per']== 0){
        header("location:cars_cat.php?cat=$_GET[cat]");

            }
        header("location:landlord_index.php");
        

     
      
        
        
    } catch(PDOException $e){
            
        echo $e->getMessage();

}
}