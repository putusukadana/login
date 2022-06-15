<?php
    session_start();
    $salah = "";

    if(isset($_GET["act"])){
        if($_GET["act"] == "logout"){
            session_destroy();
        }
    }
    if(isset($_SESSION["login"])){
        header("location: daskboard.php");
    }
    if(isset($_POST["txUSER"])){
        $usr = $_POST["txUSER"];
        $pwd = md5($_POST["txPASS"]);

        include_once("koneksi.php");

        $sql = "SELECT username, passkey FROM login Where username='$usr';";
        $hsl = mysqli_query($cnn,$sql);

        if($hsl->num_rows > 0){
            $row = mysqli_fetch_array($hsl);
            $pass = $row["passkey"];

            if($pwd==$pass){
                $_SESSION["login"] = md5($pass);
                $_SESSION["user"]= $usr;
                header("location: daskboard.php");
            }
        }else{
            $salah = "Username atau password tidak sesuai";
        }
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <title>Login Form </title>
</head>
<body>
    <div class="container">
    <h3>Login</h3>
    <?=$salah;?>
    <form action="loginpage.php" method="post">
        <div class="label">User Name</div>
        <div class="txinput"><input type="text" name="txUSER" id="txUSER"></div>

        <div class="label">Password</div>
        <div class="txinput"><input type="password" name="txPASS" id="txPASS"></div>

        <div class="tombol"><button type="submit">Login</button></div>
    </form>
    </div>
</body>
</html>