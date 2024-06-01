<?php
session_start();

if(!isset($_SESSION['landor_id'])){
    header("location:login.php");

}
?>
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Car Rental Admin Dashboard</title>
    <link rel='stylesheet' href='css/landlord_index.css'>
    <link rel='stylesheet' href='css/delete.css '>

</head>
<body dir="rtl">
    <header>
        <h1> التأجير</h1>

       
    </header>
         
    <div id='b' dir='rtl'>
            <button onclick="document.location='add_car.php'" style='cursor: pointer;'>  اضافه سيارة جديدة</button>
            <!-- <a href='exam.html'><button>  الذهاب الى الرئيسية</button></a> -->
        </div>
    <main>
        <section class='car-list'>
            <h2>قائمة السيارات </h2>
            <ul>

                <?php
                
            include 'connect.php';

                try{

                    $sql = "SELECT * FROM cars where user_id=$_SESSION[landor_id] and isEnabled=1";
                    $stmt = $conn->query($sql);
                    $data = $stmt->fetchAll();

                    foreach ($data as $row) {
                        echo "
                        <li>
                        <img src='$row[car_img]' alt='Car 1'>
                        <h3> $row[car_name] </h3>
                        <p>  الموديل : $row[car_model] </p>
                        <p> السعر لكل يوم : $row[price] ر.ي</p>
                        <button onclick=document.location='edit_car.php?car=$row[ID]'>تعديل</button>
                        <a  id='deleteButton' >حذف</a>
                    </li>
                    <div id='cover' class='cover'></div>
                    <div id='confirmationBox' class='confirmation-box'>
                      <div class='confirmation-content'>
                        <p>هل أنت متأكد أنك تريد حذف هذه السيارة؟</p>
                        <div class='btns'>
                        <a id='cancelDeleteButton'>لا</a>
                        <a href='delete_car.php?id=$row[ID]' id='confirmDeleteButton'>نعم</a>
                      </div>
                      </div>
                    </div> 

                        ";
                    }

                        }
                        catch(PDOException $e){

                            echo $e->getMessage();

                }
                        ?> 
                
                <!-- Add more cars here -->
            </ul>
        </section>
   
           
    </main>
    <script>
        function showMessage(messageId) {
            document.getElementById(messageId).style.display = 'block';
        }
    
        function closeMessage(messageId) {
            document.getElementById(messageId).style.display = 'none';
        }
    
        function confirmMessage(messageId) {
            if (messageId === 1) {
                var name = document.getElementById('name1').value;
                alert('تم التأكيد : سيتم الاتصال بك قريباً');
            } else if (messageId === 2) {
                var email = document.getElementById('email2').value;
                alert('تم التأكيد : سيتم الاتصال بك قريباً ' );
            }
            closeMessage('message' + messageId + 'Div');
        }
    
        var radios = document.querySelectorAll('input[type=radio][name="option"]');
        radios.forEach(function(radio) {
            radio.addEventListener('change', function() {
                if (this.checked) {
                    showMessage(this.value + 'Div');
                }
            });
        });
    </script>
    <script src='js/delete.js'></script>

</body>
</html>