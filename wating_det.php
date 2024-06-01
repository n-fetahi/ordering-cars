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
<nav > الطلبات المعلقة</nav>

<?php
				include 'connect.php';

					try{


						$sql = "SELECT * FROM cars where ID=$_GET[id]";
						$stmt = $conn->query($sql);
						$data = $stmt->fetch();
						$count = $stmt->rowCount();

					
            $sql2 = "SELECT * FROM users where ID=$data[user_id]";
            $stmt2 = $conn->query($sql2);
            $data2 = $stmt2->fetch();

							echo "
              <div class='section'>
              <img src='$data[car_img]' alt='صورة 1'>
              <h2>  $data2[username] </h2>
              <p>رقم اللوحة : $data[car_num]</p>
              <p>الفئة  : $data[car_cat]</p>
              <p>اسم السيارة : $data[car_name]</p>
              <p>نوع السيارة : $data[car_type]</p>
              <p>الموديل  : $data[car_model]</p>
              <p>المواصفات  : $data[specifications]</p>
              <p>الاجرة اليومية : $data[price]</p>
              <p>نوع الضمان : $data[safeguards]</p>
              <a href='acc.php?id=$data[ID]' class='btn'> قبول</a>
              <a href='rej.php?id=$data[ID]' class='btn'> رفض</a>
            </div>
							";
					
				
							}
							catch(PDOException $e){
				
								echo $e->getMessage();
				
					}
				

			?> 

<!-- <div class="section">
  <img src="static_images/1.jpg" alt="صورة 1">
  <h2>محمد احمد علي </h2>
  <p>رقم اللوحة : </p>
  <p>الفئة  : </p>
  <p>اسم السيارة : </p>
  <p>نوع السيارة : </p>
  <p>الموديل  : </p>
  <p>المواصفات  : </p>
  <p>الاجرة اليومية : </p>
  <p>نوع الضمان : </p>

  <button class="btn"> قبول</button>
  <button class="btn"> رفض</button>
</div> -->


</body>
</html>
