<?php
$i = 0; // Переменная
require_once "config.php";
 session_start(); 
 $query = "SELECT id, title, newsText, date, imgLink , imgLink2 , newsText2 FROM news ORDER BY id DESC";  
 $result = mysqli_query($link, $query); 
 if (!empty($_SESSION["username"]) && $_SESSION["username"] == "Coffe") {  
   $showAdd = ""; 
  $showLogout = ""; 
  $showLogin = "visually-hidden";
 } else {  
  $showAdd = "visually-hidden"; 
  $showLogout = "visually-hidden"; 
  $showLogin = ""; 
 }
if (!empty($_SESSION["username"]) && $_SESSION["username"] !== null) {   
   $showLogout = "";  
  $showLogin = "visually-hidden"; }
 else {
  $showLogout = "visually-hidden"; 
  $showLogin = ""; 
}
?>


<!DOCTYPE html>
 <html lang="ru" style="overflow-x:hidden;">
 <head>
<title>A C B </title>
  <link rel="stylesheet" href="style.css">
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <style>
    .column {
      float: left;
      width: 32%;
      padding: 5px;
    }
     .cart {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
}
 .buttons {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}
.buttons:hover{
  opacity: 0.7;
}
  </style>
</head>
<body>
   <div class="container-md">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav" style="width:100%; max-width:100%">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php">На главную</a>
            </li>
            <li class=" nav-item">
            <a class="nav-link active" aria-current="page" href="#o_nas">О нас</a>
            </li>
            <li class=" nav-item">
            <a class="nav-link active" aria-current="page" href="#after">Об авторе</a>
            </li>
            <li class=" nav-item">
            <a class="nav-link active" aria-current="page" href="#new">Новости </a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?php echo $showAdd; ?>" href="addNews.php">Добавить новость</a>
            </li>
            <li class=" nav-item">
        <a class="nav-link <?php echo $showLogin; ?>" href="login.php">Вход на сайт</a>
             </li>
            <li class=" nav-item">
              <a class="nav-link <?php echo $showLogout; ?>" href="logout.php">Выход</a>
             </li>
          </ul>
         </div>
      </div>
    </nav>
  </div>
   <div> <img src="https://i0.wp.com/www.xda-developers.com/files/2020/04/MIUI-12-wallpapers-featured.jpg"style="min-width:100%;">
    <p style="position:absolute; font-size:17rem;margin-left:35rem;margin-top:-40rem;color:white;"> A C B </p>
    </div>
   <div  id="o_nas"style="margin-left:5%;background-color:#f1f1f1;height:600px;margin-top:50px;width:90%; align-items:center;" class=".text-block">
  <h1 style="text-align:center;font-size:5rem;height:250px;">О нас</h1>
  <br>
  <h3 style="text-align:center;"> A C B — это интернет-ресурс, который специализируется на сборе и выдаче информации и новостей.
  <br> Это большой, многоуровневый сайт, который содержит в себе инструменты для взаимодействия<br>
     публикаций.<br>
   </div>
 <br>
    <div id ="after" class="aftor" style="background-color:#f1f1f1; width:90%;margin-left:5%;">
    <h1 style="text-align:center;font-size:5rem;">Об авторе</h1>
<br >
<div class="cart">
  <img src="https://sun9-north.userapi.com/sun9-81/s/v1/if2/IUNcxeGmEHjLOa8xHIyV5OLeAewKB7Dx_Do0XO4dAHlq5sSek6lmbIB46k1YMmfhuMCOhvRAC7rngEUuz9yDTtHq.jpg?size=1197x1600&quality=96&type=album" alt="John" style="width:100%">
  <h1>Евгений К</h1>
  <p class="title">Разработчик  & Создатель сайта</p>
  <p>Harvard University</p>
  <div style="margin: 24px 0;">
    <a href="https://vk.com/coffecuthe"><i class="fa fa-vk"></i></a>  
  </div>
  <p><button class="buttons"><a href="https://vk.com/coffecuthe" style="color:white;">Контакты</a></button></p>
</div>
     <h3>
    </h3>
    </div>
<h1 id="new" style="text-align:center">Актуальные новости</h1>
   <!-- Берет новости с базы данных и печатает их на главной странице-->
  <?php
   $w = 4;
  while ($row = mysqli_fetch_assoc($result)) {
    if ($row['imgLink'] == null) {
        $row['imgLink'] = 'test.jpg';
      }
       if ($row['imgLink2'] == null) {
        $row['imgLink2'] = 'test.jpg';
      }
       $title = htmlentities($row["title"]);
      $newsText = htmlentities($row["newsText"]);
      $newsText2 = htmlentities($row["newsText2"]);
       if ($newsText2 == null) {
        $newsText2 = "Осуществляется тест функционала";
      }
       if ($w==4){
        echo '<div class="row">';
        $w = 1;
      } 
   
          echo '<div class="column">';
          echo '<div class="card" style="width: 18rem; margin-top:10%;margin-left:30%">';
          echo ' <img  style="height:300px;width:287px;"src="img/' . $row["imgLink"] . '" class="card-img-top" alt="...">';
          echo '<div class="card-body">';
          echo ' <h1  style="text-align:center;"class="card-title">' . $title . ' </h1>';
          echo '<p class="card-text" style=""></p>';
          echo '<button alt="" type="button"style=" text-align:center;width:95%;background-color:black !important;z-index:2; border:0px white !important;-moz-opacity:.85;filter:alpha(opacity=85); opacity:.85;" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg' . $row['id'] . '">Читать полностью </button>';
          echo '</div></div>';
           echo '<div style="background-color:white;"class="modal fade bd-example-modal-lg' . $row['id'] . '" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">'; // настройка фрейма 
          echo '<div class="modal-dialog modal-lg' . $row['id'] . '">'; 
           echo '<div style="width:100%;"  class="modal-content' . $row['id'] . '">'; // контент
          echo '<h1 class="card-text" style="width:100% !important;text-align:center;">' . $title . '</h1> <br>';
           echo '<div style="width:100%; align-items:center;">';
           echo '<img style="max-width:500px;" src="img/' . $row["imgLink"] . '" alt="Fail" style="-moz-user-select: none; -webkit-user-select: none; -ms-user-select: none; user-select: none;" >';
           echo '</div>';
          echo '<p class="card-text" style="margin-top:3%">' . $newsText . '</p>';
           echo '<img style="max-width:500px;" src="img/' . $row["imgLink2"] . '" alt="Fail" style="-moz-user-select: none; -webkit-user-select: none; -ms-user-select: none; user-select: none;" >';
           echo '<p class="card-text" style="margin-top:3%;">' . $newsText2 . '</p>';
  
          echo '<p class="card-text"><small class="text-muted"><p>Дата публикации статьи ' . $row["date"] . '</p></small></p>';
           echo '</div>';
          echo '</div>';
          if (!empty($_SESSION["username"]) && $_SESSION["username"] == "Coffe") {
            echo '<form action="deldb.php" method="post">';
  
            echo '<input style="width:100%;align-items:center;text-align:center;" type="submit" class="form-button" name="deleteItem" value="' . $row['id'] . '">Нажмите кнопку ' . $row['id'] . ' чтобы удалить</input>';
             echo '</form>';
          }
          echo '</div>';
          echo '</div>';
        $w +=1;
          if ($w == 4){
           
            echo'</div>';
          }
        }
   ?>
   </body>
  </html>
  