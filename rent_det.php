<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>واجهة مقسمة</title>
<style>
  body {
    font-family: Arial, sans-serif;
  }
  .section {
    border-bottom: 1px solid #333256;
    padding: 10px;
    margin-right: 2%;
  
  }
  .section:last-child {
    border-bottom: none;
  }
  .section img {
    max-width: 10%;
    height: auto;
  }
  .btn {
    background-color: #2d2d4e;
    color: #fff;
    padding: 8px 16px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
  }
  nav{
    color: rgb(238, 216, 189);
    background-color: #333256;
    padding: 20px;
    text-align: center;
    font-size: larger;
    
  }
  
body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
}

nav {
  background-color:rgb(47, 49, 85);
  font-size: 40px;
 
}

.nav-links {
  list-style: none;
  padding: 0;
  margin: 0;
  display: flex;
}

.nav-links li {
  padding: 15px;
}

.nav-links li a {
  color: rgb(47, 49, 85);
  text-decoration: none;
}

</style>
</head>
<body dir="rtl">
<nav > طلبات الاستئجار</nav>

<?php
				include 'connect.php';

					try{


						$sql = "SELECT * FROM booking where ID=$_GET[id]";
						$stmt = $conn->query($sql);
						$data = $stmt->fetch();
						$count = $stmt->rowCount();

					
            $sql2 = "SELECT * FROM users where ID=$data[landlord_id]";
            $stmt2 = $conn->query($sql2);
            $landlord = $stmt2->fetch();

            $sql3= "SELECT * FROM users where ID=$data[renter_id]";
            $stmt3 = $conn->query($sql3);
            $renter = $stmt3->fetch();

            $sql3= "SELECT * FROM cars where ID=$data[car_id]";
            $stmt3 = $conn->query($sql3);
            $car = $stmt3->fetch();

							echo "
              <div class='section'>
              <img src='$car[car_img]' alt='صورة 1'>
              <h2>اسم المستأجر :  $renter[username] </h2>
              <p>التلفون  : $renter[phone]</p>
              <p>اسم صاحب السيارة : $landlord[username]</p>
              <p>التلفون  : $landlord[phone]</p>
              <p>اسم السيارة : $car[car_name]</p>
              <p>نوع السيارة :  $car[car_type]</p>
              <p>الموديل  :  $car[car_model]</p>
              <p>الاجرة اليومية  : $car[price]</p>
              <p>من تاريخ  : $data[start_date]</p>
              <p>الى تاريخ  : $data[end_date]</p>
              <p>التكلفة لكلية  : $data[total_price]</p>
              <p>طريقة الدفع  : $data[payment_method]</p>
              <p>نوع الضمان : $car[safeguards]</p>
            </div>
							";
					
				
							}
							catch(PDOException $e){
				
								echo $e->getMessage();
				
					}
				

			?> 




</body>
</html>
