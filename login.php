<?php

if(isset($_GET['err'])){

    if($_GET['err'] == 0){
		echo "<script>
			alert('رجاء قم بملء جميع الحقول');
		</script>
		";
    }

    elseif($_GET['err'] == 1){
        echo "<script>
        alert('كلمة المرور غير متطابقة');
    </script>
    ";
    }

    elseif($_GET['err'] == 2){
        echo "<script>
        alert('هناك خطأ في البيانات');
    </script>
    ";
    }

    elseif($_GET['err'] == 3){
        echo "
        <script>
            alert('قم بكتابة اسم المستخدم وكلمة السر بشكل صحيح');
        </script>
        ";
    }

    elseif($_GET['err'] == 4){
        echo "
        <script>
            alert('رقم الهاتف مسجل به مسبقاً');
        </script>
        ";
    }

}


?>

<!DOCTYPE html>
<html>
   <head>
    <title>تسجيل</title>
    <link rel="icon" href="icon.jpg" type="image/x-icon" />
        <Link rel="stylesheet" type="text/css" href="css/login_slidestyle.css">
        
        
   </head>
    <body dir="rtl">
        
        <div class="main">
            <input type="checkbox" id="chk" aria-hidden="true">
             
            <div class="signup">
                <form action="singUp.php" method="post">
                    <label for="chk" aria-hidden="true">إنشاء حساب</label>
                    <input type="text" name="name" placeholder="اسم المستخدم" >
                    <input type="number" name="number" placeholder="رقم الموبايل" >
                    <input type="password" name="pswd" placeholder="كلمة المرور" >
                    <input type="password" name="pswd2" placeholder="تأكيد كلمة المرور" >

                    <div class="rb">
                        <select name="type" class="form-select" aria-label="Default select example">
                            <option value="0" disabled selected hidden>الدخول كـــ  .:</option>
                            <option value="1">مؤجــر</option>
                            <option value="2">مســتأجــر</option>
                            
                          </select>
                </div>

                <button>إنشاء</button>

                </form>
            </div>
        
            <div class="login">
                <form action="signIn.php" method="post">
                    <label for="chk" aria-hidden="true">تسجيل دخول</label>
                    <input type="text" name="number" placeholder="رقم الموبايل" >
                    <input type="password" name="pswd" placeholder="كلمة المرور" >
                    <button>تسجيل دخول</button>
                </form>
            </div>
        </div>    
    </body>
</html>