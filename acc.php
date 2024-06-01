<?php
include "connect.php";

if(isset($_GET['id'])){
    $id=$_GET['id'];


    try{

            $sql = "UPDATE cars SET car_state = 1 WHERE ID=$id";
            $stmt= $conn->prepare($sql);
            $stmt->execute();

        header("location:wating.php?id=$id");
        

     
      
        
        
    } catch(PDOException $e){
            
        echo $e->getMessage();

}
}