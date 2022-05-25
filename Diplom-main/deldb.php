<?php
    require_once "config.php";
     $delPost = $_POST["deleteItem"];
     $queryTXT ='DELETE FROM `news` WHERE id=%u';
     $query =sprintf($queryTXT,$delPost);
    $result = mysqli_query($link,$query);
    header("location: index.php ");
 ?>
