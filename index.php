<?php
if(isset($_GET['done'])){

    if($_GET['done'] ==1){
		echo "<script>
			alert('تم الحجز بنجاحز يرجى التوجه للمكتب لإستلام السيارة في الموعد المحدد');
		</script>
		";
    }



}
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
	<head dir="rtl">
		<link rel="stylesheet" type="text/css" href="my .css">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
 
    
    <title>بأمانتك</title>  
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="icon" href="icon.jpg" type="static_images/x-icon" />
    
   
   

    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <link rel="stylesheet" href="css/style.css">
    
    <link rel="stylesheet" href="css/responsive.css">
    
    <link rel="stylesheet" href="css/custom.css">
	<script src="js/modernizr.js"></script> 


      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

	 
</head>
<body id="page-top" class="politics_version">


    <div id="preloader">
        <div id="main-ld">
			<div id="loader"></div>  
		</div>
    </div>
    
	
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
      <div class="container">

       
		
		

        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">القائمة
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse " id="navbarResponsive" >
          <ul class="navbar-nav text-uppercase ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger active" href="#home">رئيسي</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#about">نبذة عنا</a>
            </li>
            </li>
			<li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#kind" >فئات السيارات</a>
            </li>
			<li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="login.php">تسجيل </a>
            </li>

          </ul>
        </div>
      </div>
    </nav>
	
	<section id="home" class="main-banner parallaxie" style="background: url('static_images/rent.jpg')">
		<h1>    بأمانــــــتك  </h1>
	</section>

	

    <div id="about" class="section wb">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="message-box">                        
                        <h2>نبــذة عنــا</h2>
						
     <div id="text">                 
<p>إن كنت تبحث عن موقع تأجير سيارات في صنعاء، تصفّح موقـع بأمانتك الــــذي يوفر العديد مــن المزايا للراغبين باستــئجار السيارات من مختــلف الموديـلات.
	

	موقع وسيط بين مؤجر ومستأجر(مقدم خدمة -طالب خدمة) يعمل موقعنا على تشغيل سيارتك والاستفادة منها ,بـحيث يمكنـك عرض سيارتــك فــي الموقع , ويمكنك ايضا ايجاد سيارة بمواصفات وموديلات مختلفة . يوفــر لـك موقعنا سهولة استخدام الموقع وتوفير الجهد والوقت .
</p></div> 


                        
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="right-box-pro wow fadeIn">
							<img src="static_images/icon.jpg" alt="" class="img-fluid img-rounded">         
                    </div>
                </div>
            </div>
    </div>
	
   
	
	
	<div id="kind" class="section lb">
		<div class="container">
			<div class="section-title text-left">
                <h3 >الفئات</h3>
               
            </div>
			
			<div class="row">
				<div class="col-md-4 col-sm-6 col-lg-4">
					<div class="post-box">
						<div class="post-thumb">
							
							<a href="الفئات الداخلية/الفئات الداخلية.html"><img src="static_images/اقتصاد.jpg" class="img-fluid" alt="post-img" /></a>
							
						</div>
						<div class="post-info">
							<a href="categorise.php?cat=كهربائية">كهربائية</a>
							</div>
					</div>
				</div>
				<div class="col-md-4 col-sm-6 col-lg-4">
					<div class="post-box">
						<div class="post-thumb">
							<img src="static_images/عائلية.jpg" class="img-fluid" alt="post-img" />
							
						</div>
						<div class="post-info">
							<a href="categorise.php?cat=عائلية">عائلية</a>
							</div>
					</div>
				</div>
				<div class="col-md-4 col-sm-6 col-lg-4">
					<div class="post-box">
						<div class="post-thumb">
							<img src="static_images/صغيرة.png" class="img-fluid" alt="post-img" />
							
							
						</div>
						<div class="post-info">
							<a href="categorise.php?cat=صغيرة">صغيرة</a>
							</div>
					</div>
				</div>
			

				<div class="col-md-4 col-sm-6 col-lg-4">
					<div class="post-box">
						<div class="post-thumb">
							
							<img src="static_images/فخمة.jpg" class="img-fluid" alt="post-img" />
							
						</div>
						<div class="post-info">
							<a href="categorise.php?cat=فاخرة">فاخرة</a>
							</div>
					</div>
				</div>

				<div class="col-md-4 col-sm-6 col-lg-4">
					<div class="post-box">
						<div class="post-thumb">
							
							<img src="static_images/دفع.png" class="img-fluid" alt="post-img" />
							
						</div>
						<div class="post-info">
							<a href="categorise.php?cat=دفع رباعي">دفع رباعي</a>
							</div>
					</div>
				</div>

				<div class="col-md-4 col-sm-6 col-lg-4">
					<div class="post-box">
						<div class="post-thumb">
							
							<img src="static_images/دراجة.png" class="img-fluid" alt="post-img"  />
							
						</div>
						<div class="post-info">
							<a href="categorise.php?cat=دراجة">دراجة</a>
							</div>
					</div>
				</div>

			</div>
			
		</div>
	</div>

   

   
  <section id="footer">
    <div class="container">
      
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-5">
          <ul class="list-unstyled list-inline social text-center">
            <li class="list-inline-item"><a href="javascript:void();"><i class="fa fa-facebook"></i></a></li>
            <li class="list-inline-item"><a href="javascript:void();"><i class="fa fa-twitter"></i></a></li>
            <li class="list-inline-item"><a href="javascript:void();"><i class="fa fa-instagram"></i></a></li>
            <li class="list-inline-item"><a href="javascript:void();"><i class="fa fa-google-plus"></i></a></li>
            <li class="list-inline-item"><a href="javascript:void();" target="_blank"><i class="fa fa-envelope"></i></a></li>
          </ul>
        </div>
        </hr>
      </div>  
      
    </div>
  </section>

    <script src="js/all.js"></script>

	<script src="js/jquery.mobile.customized.min.js"></script>
	<script src="js/jquery.easing.1.3.js"></script> 
	<script src="js/parallaxie.js"></script>
	<script src="js/headline.js"></script>

    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <script src="js/custom.js"></script>
    <script src="js/jquery.vide.js"></script>
	
</body>
</html>