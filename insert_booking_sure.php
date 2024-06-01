<?php
    include 'connect.php';

session_start();

if($_SERVER['REQUEST_METHOD'] == "POST"){

    // print_r($_POST);

    try{
        $sql = "SELECT * FROM cars where ID=$_SESSION[car_id]";
        $stmt = $conn->query($sql);
        $data = $stmt->fetch();

        $sql2 = "INSERT INTO booking (start_date,end_date,total_price
        ,payment_method,payment_account,landlord_id,renter_id,car_id)
         VALUES (?,?,?,?,?,?,?,?)";
    
        $stmt2= $conn->prepare($sql2);
        $stmt2->execute([
            
            $_SESSION['from'],$_SESSION['to'],
            (intval($data['price'])*$_SESSION['d']),
            "خدمة حاسب من بنك الكريمي", $_POST['message1'],
            $data['user_id'],$_SESSION['renter_id'],$_SESSION['car_id']
        ]);
        $sql = "UPDATE cars SET car_state=2  where ID=$_SESSION[car_id]";
        $stmt= $conn->prepare($sql);
        $stmt->execute();
        header("location:index.php?done=1");

            }
            catch(PDOException $e){

                echo $e->getMessage();

    }

}

?>