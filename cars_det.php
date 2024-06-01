<!DOCTYPE html>
<html lang="ar" dir="rtl">
	<head dir="rtl">
		<link rel="stylesheet" type="text/css" href="my.css">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
 
    
    <title>بأمانتك</title>  
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="icon" href="icon.jpg" type="image/x-icon" />
    
   
   

    <link rel="stylesheet" href="css2/bootstrap.min.css">
    
    <link rel="stylesheet" href="css/الفئات الداخلية.css">
    
    <link rel="stylesheet" href="css/responsive.css">
    
    <link rel="stylesheet" href="css/custom.css">
	<script src="js/modernizr.js"></script> 


      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	  <link rel="stylesheet" href="css/bootstrap.min.css">
    
	  <link rel="stylesheet" href="css/style1.css">
	  
	  <link rel="stylesheet" href="css/responsive.css">
	  
	  <link rel="stylesheet" href="css/custom.css">
	  <link rel='stylesheet' href='css/delete.css '>
	 
</head>
<body id="page-top" class="politics_version">


    
    

	<nav>
		<ul class="nav-links">
		  <li><a href="rent.php">طلبات الإستئجار</a></li>
		 
		  <li class="dropdown">
			<a href="#">طلبات التأجير &#9662;</a>
			<ul class="dropdown-content">
			  <li><a href="wating.php">طلبات معلقة </a></li>
			  <li><a href="reject.php">طلبات مرفوضة </a></li>
			  <li><a href="cars_cat.php">طلبات مكتملة </a></li>
			  
			</ul>
		  </li>
		 
		</ul>
	  </nav>
    

	


	
   
	
	
	<div id="kind" class="section lb">
		<div class="container">
			<div class="section-title text-left">
                <h3 >سيارات هذه الفئة</h3>
               
            </div>
			
			<div class="row">

								<?php
				include 'connect.php';
				if(isset($_GET['cat'])){
					try{

						$f=0;

						$sql = "SELECT * FROM cars where car_cat='$_GET[cat]'  and isEnabled=1";
						$stmt = $conn->query($sql);
						$data = $stmt->fetchAll();
						$count = $stmt->rowCount();

						foreach ($data as $row) {
							$f=1;
							echo "
							<div class='col-md-4 col-sm-6 col-lg-4'>
								<div class='post-box'>
									<div class='post-thumb'>
										
										<img src='$row[car_img]' class='img-fluid' alt='post-img' />
										
									</div>
									<div class='post-info'>
										<h1> $row[car_type]-$row[car_name]-$row[car_model]</h1><h1>الاجرة اليومية:$row[price] ريال</h1><h1>المواصفات : $row[specifications]</h1><h1>مالك السيارة :</h1><h1>التلفون :</h1>
										<a href='delete_car.php?id=$row[ID]?per=0?cat=$_GET[cat]' >	<button type='button'>حذف السيارة</button></a>
										</div>
								</div>
							</div>
					
							";
						}
						if($f == 0){
							echo "
							<div style='text-align: center; width: 100%;  '>
								<h3 style='color: #95836c ;font-size: 20px;'>لا يوجد سيارات في هذه الفئة</h3>
							</div>
							";
						}
				
							}
							catch(PDOException $e){
				
								echo $e->getMessage();
				
					}
				}

			?> 
			
				
			

				

				
				

			</div>
			
		</div>
	</div>

   

    


    <script src="js/all.js"></script>

	<script src="js/jquery.mobile.customized.min.js"></script>
	<script src="js/jquery.easing.1.3.js"></script> 
	<script src="js/parallaxie.js"></script>
	<script src="js/headline.js"></script>

    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <script src="js/custom.js"></script>
    <script src="js/jquery.vide.js"></script>
    <script src='js/delete.js'></script>
	
</body>
</html>