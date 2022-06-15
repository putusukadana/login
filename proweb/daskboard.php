<?php

    session_start();
    if(isset($_SESSION["login"])){
        
    ?>
        
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daskboard</title>
</head>
<body>
    <h3>Daskboard</h3>

    Selamat Datang <?=$_SESSION['user'];?>, <a href="loginpage.php?act=logout"> logout </a>
    
</body>
</html>
<?php
        
}else{
    // echo "Silahkan login terlebih dahulu";
    header("Location: loginpage.php");
}
?>
