<?php
include 'connect.php';

session_start();

if(!isset($_SESSION['landor_id'])){
    header("location:login.php");
}


if($_SERVER['REQUEST_METHOD'] == "POST"){
    $car_cat = $_POST['car_cat'];
    $car_num = $_POST['car_num'];
    $car_name = $_POST['car_name'];
    $car_type = $_POST['car_type'];
    $car_model = $_POST['car_model'];
    $specifications = $_POST['specifications'];
    $price = $_POST['price'];
    $safeguards = $_POST['safeguards'];
    $image = $_FILES['image'];
    $image_location = $_FILES['image']['tmp_name'];
    $image_name     = $_FILES['image']['name'];
    $image_up       = "images/".$image_name;

    if($car_cat == "" || $car_num == "" || $car_name == "" || $car_type == ""
     || $specifications == "" || $price == ""  ||  $image_name == "" || $car_model == "" ){



        header("location:add_car.php?err=0");

	}
    else{

        try{
			$sql = "INSERT INTO cars (user_id,car_name,car_cat
            ,car_type,car_num,car_model,specifications,price,car_img,safeguards)
			 VALUES (?,?,?,?,?,?,?,?,?,?)";
		
			$stmt= $conn->prepare($sql);
			$stmt->execute([
				$_SESSION['landor_id'],
                $car_name,$car_cat,$car_type,$car_num,
                $car_model,$specifications,
                $price,$image_up,$safeguards
			]);

            if(move_uploaded_file($image_location, 'images/'.$image_name)) {
                header("location:landlord_index.php");
                }


		}
		catch(PDOException $e){

        header("location:add_car.php?err=1");

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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>بأمانتك</title> 
    <link rel="icon" href="images/icon.jpg" type="image/x-icon" />
    <Link rel="stylesheet" type="text/css" href="css/add_car_indexstyle.css">
    
    
</head>
<body>
    
    <div class="main">
        <input type="checkbox" id="chk" aria-hidden="true">
         
        <div class="add">
            <form action="add_car.php" method="post" enctype="multipart/form-data">
                <label for="chk" aria-hidden="true">إضافة سيارة </label>
            
                <h4>الفئة : </h4>
                <select name="car_cat">
                    <option value="كهربائية"  selected="selected">كهربائية</option>
                    <option value="فاخرة">فاخرة</option>
                    <option value="عائلية">عائلية</option>
                    <option value="دفع رباعي">دفع رباعي</option>
                    <option value="صغيرة">صغيرة</option>
                    <option value="دراجة">دراجة</option>

                </select>
           
                <input type="number" name="car_num" placeholder="رقم اللوحة" >
                <input type="text" name="car_name" placeholder="اسم السيارة">
                <input type="text" name="car_type" placeholder=" نوع السيارة">
                <input type="number" name="car_model" placeholder=" موديل السيارة ">
                <input type="text" name="specifications" placeholder=" المواصفات">
                <input type="number" name="price" placeholder="الاجرة اليومية (ريال يمني) ">
                <input type="text" name="safeguards" placeholder=" شروط التأجير والضمانات">
                
                
               
                    <button id="add" type="button" onclick="document.getElementById('img').click()">اضافة صور</button>
                    <input id="img" style="display: none;" type="file" accept="image/*" name="image" placeholder="اضف صورة">
                

                <button type="submit">إضافة</button>
               
            </form>
        </div>
        <div class="rental">
            <form>
                <input type="text" name="txt" placeholder=" شروط الإيجار" required="">
                <input type="text" name="txt" placeholder="الاجرة اليومية " required="">
                
            </form>

        </div>
    
       
    </div>    
</body>
  
    </html>
   
   