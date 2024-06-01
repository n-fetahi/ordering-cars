<?php
$data;
session_start();
if(!isset($_SESSION['renter_id'])){


    header("location:login.php");

}
if($_SERVER['REQUEST_METHOD'] == "GET"){
    $_SESSION['car_id']= $_GET['id'];
    $_SESSION['d']= $_GET['d'];

    try{
        include 'connect.php';

        $sql = "SELECT * FROM cars where ID=$_GET[id]";
        $stmt = $conn->query($sql);
        $data = $stmt->fetch();

            }
            catch(PDOException $e){

                echo $e->getMessage();

    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>بأمانتك</title> 
    <link rel="icon" href="images/icon.jpg" type="image/x-icon" />
    <Link rel="stylesheet" type="text/css" href="css/sure_indexstyle.css">
    
    <style>
        .message {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #ffffff;
            padding: 20px;
            border: 1px solid #7e6d5c;
            border-radius: 5px;
            z-index: 1000;
        }
        .close-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
        }
    </style>
    
</head>
<body>
    <form action="insert_booking_sure.php" method="post">
        <div class="main" dir="rtl">
            <input type="checkbox" id="chk" aria-hidden="true">
             
            <div class="add">
                <form>
                    <h1 for="chk" aria-hidden="true">لتأكيد الحجز :</h1>
                    <div class="mb-3">
                    </br>
                </br>
                        <h3 for="" class="form-label">السيارة المطلوبة
                        <input name="car" readonly  value="<?php echo "$data[car_name]" ?>" type="text" class="form-control" id="formGroupExampleInput2" placeholder="">
                        </h3>
                      </div>
                    <div class="mb-3">
                        <h3 for="" class="form-label">الأجرة اليومية
                        <input readonly  value="<?php echo "$data[price] ر.ي" ?>" type="text" class="form-control" id="formGroupExampleInput" placeholder="">
                        </h3>
                    </div>
                    <div class="mb-3">
                        <h3 for="" class="form-label"> إجمــالي الأيــــــــام
                        <input readonly  value="<?php echo "$_GET[d]" ?>" type="text" class="form-control" id="formGroupExampleInput2" placeholder="">
                        </h3>
                      </div>
                      <div class="mb-3">
                        <h3 for="" class="form-label"> إجمالي التكلفة
                        <input  readonly  value="<?php
                        $int_value = intval($data['price'])*$_GET['d']; 
    
    
                        echo "$int_value" ?>" type="text" class="form-control" name="total" id="formGroupExampleInput2" placeholder="">
                    </h3>
                      </div>
                      <div class="mb-3">
                        <h3 for="" class="form-label">  الضمــــــــــــانـــــــــــــات
                        <input readonly  value="..." name="safeguards" type="text" class="form-control" id="formGroupExampleInput2" placeholder="">
                    </h3>
                      </div>

     

               

    
        <h3 dir="rtl">اختر طريقة الدفع :
        
            <h4 for="message1">- خدمة حاسب من بنك الكريمي
          <input type="radio" id="message1" name="option" value="message1"></h4>
          <h4 for="message2">- الــدفع كــحوالــة(الــكريمي)
          <input type="radio" id="message2" name="option" value="message2"></h4>
        </h3>
    
    <div id="message1Div" class="message">
        <span class="close-btn" onclick="closeMessage('message1Div')">X</span>
        <p>يرجى إدخال رمز التعريف الخاص بالدفع الالكتروني ,<br>يمكنك الحصول عليه من تطبيق بنك الكريمي :</p>
        <input type="text" id="name1" name="message1"><br><br>
        <button type='submit'>تأكيد</button>
        
    </div>
    
    <div id="message2Div" class="message">
        <span class="close-btn" onclick="closeMessage('message2Div')">X</span>
        <p>ادخل معلومات الحوالة ,مثلاً اسم المحول او رقم الحوالة :</p>
        <input type="email" id="email2" name="message2"><br><br>
        <button onclick="confirmMessage(2)">تأكيد</button>
    </div>
    
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
    
    </br>
    </br>
    </br>
    <button onclick="confirmMessage(2)">تأكيد</button>
                </form>
            </div>
           
        </div> 



    </form>
   
   

</body>
  
    </html>
   
   