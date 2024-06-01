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

						$f=0;
           

						$sql = "SELECT * FROM booking ";
						$stmt = $conn->query($sql);
						$data = $stmt->fetchAll();
						$count = $stmt->rowCount();

						foreach ($data as $row) {
              $sql3 = "SELECT * FROM cars where ID = $row[renter_id]";
				  		$stmt3 = $conn->query($sql3);
					  	$data3 = $stmt3->fetch();

              $sql2 = "SELECT * FROM users where ID=$row[landlord_id]";
              $stmt2 = $conn->query($sql2);
              $data2 = $stmt2->fetch();

							$f=1;
							echo "
              <div class='section'>
              <img src='$data3[car_img]' alt='صورة 1'>
              <h2>  $data2[username] </h2>
              <p> اسم السيارة : $data3[car_name]</p>
              <a href='rent_det.php?id=$row[ID]'><button class='btn'>عرض المزيد</button></a>
            </div>
							";
						}
						if($f == 0){
							echo "
							<div style='text-align: center; width: 100%;  '>
								<h3 style='color: #95836c ;font-size: 20px;'>لا يوجد طلبات</h3>
							</div>
							";
						}
				
							}
							catch(PDOException $e){
				
								echo $e->getMessage();
				
					}
				

			?> 



</body>
</html>
