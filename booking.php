<?php


session_start();
if(!isset($_SESSION['renter_id'])){


    header("location:login.php");

}

if($_SERVER['REQUEST_METHOD'] == "POST"){


    $timestamp1 = $_POST['from'];
    $timestamp2 = $_POST['to'];
    $diff_seconds = strtotime($timestamp2) - strtotime($timestamp1);
    $diff_days = $diff_seconds / (60 * 60 * 24);

    $currentDate = new DateTime();
    $currentDateString = $currentDate->format('Y-m-d');

    $inputDateObject = new DateTime($_POST['from']);
    $inputDateString = $inputDateObject->format('Y-m-d');

    $_SESSION['from']= $timestamp1;
    $_SESSION['to']= $timestamp2;

    if($diff_days < 0 || $inputDateString !== $currentDateString){
 
    header("location:booking.php?err=1&id=$_POST[id]");

    }

    else{
            header("location:booking_sure.php?d=$diff_days&id=$_POST[id]");

    }



}

if(isset($_GET['err'])){
    echo "<script>
    alert('رجاء قم باختيار تاريخ مناسب ');
</script>
";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>بأمانتك</title> 
    <link rel="icon" href="images/icon.jpg" type="image/x-icon" />
    <Link rel="stylesheet" type="text/css" href="css/booking.css">
    
    
</head>
<body>
    
    <div class="main">
        
         
        <div class="add">
            <form action="booking.php" method="post">
                <label for="chk" aria-hidden="true">طلب حجز</label></br></br>
                <div id="a">

            <label dir="rtl">   مــن تاريــخ    :
            <input name="from" type="date" lang="ar">
            </label>

            <label dir="rtl">   إلــى تاريــخ    :
                <input name="to" type="date" lang="ar">
                </label>
                <?php
                echo "
                <input type='tex' hidden name='id' value='$_GET[id]'>
                ";
                ?>

                <br><br><br><br>
                <?php
                echo "
                <a id='link2' href='booking.php'><button type='submit'>حجز</button></a>
                
                
                "
                ?>
               
        </div>

        
        
            </form>
        </div>
    </div>
</body>
</html>