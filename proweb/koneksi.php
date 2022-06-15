<?php
    include_once("konfirgurasi.php");

    $cnn = mysqli_connect(DBHOST,DBUSER,DBPASSCODE,DBNAME,DBPORT)
        or die("Koneksi ke DBMS Mysql gagal<br>");