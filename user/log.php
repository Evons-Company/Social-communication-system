 
 <?php include '../init.php';  ?>
 
 <!DOCTYPE html>
<html lang="ar-en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل الدخول</title>
    <!-- Custom styles-path -->
    <link rel="stylesheet" href="css/styley.css">

    <!-- Font Awesome kit script -->
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>

    <!-- Google Fonts Open Sans-->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" href="img/html-5.png">




</head>

<body>
    <img class="wave" src="img/wave.svg">
    <div class="container">
        <div class="img">
            <img src="img/authentication.svg">
        </div>
        <div class="login-container">
            <form action="" method="post">
                <h2>أدخل</h2>
                <p>! مرحباً بعودتك</p>
                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-email"></i>
                    </div>
                    <div>
                        <h5>الايميل</h5>
                        <input class="input" name="name" type="email">
                    </div>
                </div>
                <div class="input-div two">
                    <div class="i">
                        <i class="fas fa-key"></i>
                    </div>
                    <div>
                        <h5>الباسورد</h5>
                        <input class="input" name="password" type="password">
                    </div>
                </div>
                <input type="submit" name="login" class="btn" value="دخول" >
                <a class="forgot" href="forgotPassword.html"> نسيت الباسورد  ؟</a>
                <div class="others">
                    <hr>
                    <p>أو</p>
                    <hr>
                </div>
                <div class="account">
                    <p>لا يوجد لديك حساب  ؟</p>
                    <a href="register.php">تسجيل جديد</a>
                </div>
            </form>
        </div>
    </div>

    <script type="text/javascript" src="js/main.js"></script>
</body>

</html>

<?php
if(isset($_POST['login'])){
$EMAIL=$_POST['name'];
strip_tags(trim($EMAIL));
$PASSWORD=$_POST['password'];
strip_tags(trim($PASSWORD));
    $sql="SELECT * from `user` where `email`='$EMAIL' AND `password`='$PASSWORD'; ";
    $qu=mysqli_query($con , $sql);
    $ro =  mysqli_num_rows($qu);
    if($ro == 0){$msg=   '<script>
        alert("الاميل اوالرقم السري  غير صحيح");
    </script>';
        echo $msg;
    die();

}

$ret=mysqli_fetch_assoc($qu);

$_SESSION['user_is_logged']=true;
header("LOCATION: index.php");

$_SESSION['user_id'] = $ret['id'];
$_SESSION['name'] = $ret['name'];
$_SESSION['email'] = $ret['email'];
$_SESSION['img'] = $ret['img'];


// add user id in session

if($ret){

    echo ' <meta http-equiv="refresh" content="1.5">';
}


}

?>


