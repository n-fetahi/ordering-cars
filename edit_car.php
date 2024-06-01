<?php
include 'connect.php';

session_start();


if(!isset($_SESSION['landor_id'])){
    header('location:login.php');
}


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $car_cat = $_POST['car_cat'];
    $car_num = $_POST['car_num'];
    $car_name = $_POST['car_name'];
    $car_type = $_POST['car_type'];
    $car_model = $_POST['car_model'];
    $specifications = $_POST['specifications'];
    $price = $_POST['price'];
    $image = $_FILES['image'];
    $image_location = $_FILES['image']['tmp_name'];
    $image_name     = $_FILES['image']['name'];
    $image_up       = 'images/'.$image_name;

    if($car_cat == '' || $car_num == '' || $car_name == '' || $car_type == ''
     || $specifications == '' || $price == ''  ||  $image_name == '' || $car_model == '' ){



        header('location:add_car.php?err=0');

	}
    else{

        try{
			$sql = "UPDATE cars SET car_name=? , car_cat = ?
            car_type =? , car_num=? , car_model = ?, specifications = ?
            , price=? ,car_img = ?)
            WHERE ID=$_GET[car] ";
		
			$stmt= $conn->prepare($sql);
			$stmt->execute([
                $car_name,$car_cat,$car_type,$car_num,
                $car_model,$specifications,
                $price,$image_up
			]);

            if(move_uploaded_file($image_location, 'images/'.$image_name)) {
                header('location:landlord_index.php');
                }


		}
		catch(PDOException $e){

        header('location:add_car.php?err=1');

		}
    }

    
}

elseif(isset($_GET['err'])){

    if($_GET['err'] == 0){
		echo "<script>
			alert('رجاء قم بملء جميع الحقول');
		</script>
		";
    }

    elseif($_GET['err'] == 1){
        echo "<script>
        alert('هناك خطأ في البيانات');
    </script>
    ";
    }

}
?>

<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <title>بأمانتك</title> 
    <link rel='icon' href='images/icon.jpg' type='image/x-icon' />
    <Link rel='stylesheet' type='text/css' href='css/add_car_indexstyle.css'>
    
    
</head>
<body>
<?php

include 'connect.php';
if(isset($_GET['car'])){
    try{

        $sql = "SELECT * FROM cars where id=$_GET[car]";
        $stmt = $conn->query($sql);
        $data = $stmt->fetch();
    
            echo "
            <div class='main'>
                <input type='checkbox' id='chk' aria-hidden='true'>
                 
                <div class='add'>
                    <form action='add_car.php' method='post' enctype='multipart/form-data'>
                        <label for='chk' aria-hidden='true'>إضافة سيارة </label>
                    
                        <h4>الفئة : </h4>
                        <select name='car_cat'>
                            <option value='كهربائية'   selected>كهربائية</option>
                            <option value='فخمة'>فخمة</option>
                            <option value='عائلية'>عائلية</option>
                            <option value='دفع رباعي'>دفع رباعي</option>
                            <option value='السيارات الصغيرة'>السيارات الصغيرة</option>
                            <option value='عائلية'>دراجة</option>
        
                        </select>
                   
                        <input value='$data[car_num]' type='number' name='car_num' placeholder='رقم اللوحة' >
                        <input value='$data[car_name]' type='text' name='car_name' placeholder='اسم السيارة'>
                        <input value='$data[car_type]' type='text' name='car_type' placeholder=' نوع السيارة'>
                        <input value='$data[car_model]' type='number' name='car_model' placeholder=' موديل السيارة '>
                        <input value='$data[specifications]' type='text' name='specifications' placeholder=' المواصفات'>
                        <input value='$data[price]' type='number' name='price' placeholder='الاجرة اليومية (ريال يمني) '>
                        <input  type='text' name='txt' placeholder=' شروط التأجير والضمانات'>
                        
                        
                       
                            <button id='add' type='button' onclick='document.getElementById('img').click()'>اضافة صور</button>
                            <input id='img' style='display: none;' type='file' accept='image/*' name='image' placeholder='اضف صورة'>
                        
        
                        <button type='submit'>تعديل</button>
                       
                    </form>
                </div>
                <div class='rental'>
                    <form>
                        <input type='text' name='txt' placeholder=' شروط الإيجار' required=''>
                        <input type='text' name='txt' placeholder='الاجرة اليومية ' required=''>
                        
                    </form>
        
                </div>
            
               
            </div>    
            
            ";
        
    
            }
            catch(PDOException $e){
    
                echo $e->getMessage();
    
    }
}
?>
   
</body>
  
    </html>
   
   