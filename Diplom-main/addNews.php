<?php
    session_start();
    if((!isset($_SESSION["loggedin"]) || ($_SESSION["loggedin"] == true) && $_SESSION["username"] !=="Coffe")){
        header("location: login.php");  
        exit;
    }
     require_once "config.php";
     if (!empty($_POST)) 
    {$s = '.jpg';
        $msg="";
        $uploaddir = 'img/';
        $uploadfile = $uploaddir . basename($_FILES['newsImage']['name']);
         if (move_uploaded_file($_FILES['newsImage']['tmp_name'], $uploadfile)) {
       
            $msg =  "Новость опубликованна.\n";
        } else {
            $msg =  "Проверьте новость!\n";
        }
         if ($_POST["titleInput"]==null){ 
    
         $title = 'Тест';  
       } else {
        $title = $_POST["titleInput"];
       }
       if (isset($_POST["newsText"])){
        $newsText = $_POST["newsText" ];
      } else {
      $newsText =" ";
     }
     if (isset($_POST["newsText2"])){    
       $newsText2 = $_POST["newsText2"];
   } else {
    $newsText2 =" ";
   }  
   if (($_FILES['newsImage']['name']!==null)){    
     $imgLink =$_FILES['newsImage']['name'];
 } else {
    $imgLink ='Eror404.jpg';
 }  
 

        $imgLink2 = $_FILES['newsImage2']['name'];


        $date= date("Y-n-j");
 
        $stmt = mysqli_prepare($link, "INSERT INTO news VALUES (null, ?, ?, ?,?,?,?)");
        mysqli_stmt_bind_param($stmt, 'ssssss', $title, $newsText, $date ,$imgLink,$imgLink2,$newsText2,);
  mysqli_stmt_execute($stmt);  }
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
 
    <title>админка</title>
</head>
<body>
<div class="container-md">
<h1 style="">Форма добавления новостей <?php echo htmlspecialchars($_SESSION["username"]); ?></h1>
<form enctype="multipart/form-data" action="addNews.php" method="POST">
  <div class="mb-3">
    <label for="titleInput" class="form-label"></label>
    <input name="titleInput" type="text" class="form-control" id="titleInput" aria-describedby="titleInputHelp">
    <div style="color:black;"id="titleInputHelp" class="form-text">Напишите заголовок новости.</div>
  </div>
  <div class="mb-3">
    <label for="newsText" class="form-label">Содержимое</label>
    <textarea name="newsText" rows="5" style="max-height:200px;min-height:200px;" class="form-control" id="newsText" aria-describedby="newsInputHelp"> </textarea>
    <div id="newsInputHelp" class="form-text" style="color:black;">Напишите текст новости.</div>
  </div>
  <div class="mb-3">
    <input type="hidden"  name="MAX_FILE_SIZE" value="30000" />
    <label for="newsImage" style="color:black;">Прикрепите изображение</label>
    <input name="newsImage" type="file" class="form-control-file" id="newsImage">
  </div>
  <div class="mb-3">
    <label for="newsText" class="form-label"></label>
    <textarea name="newsText2" rows="5" style="max-height:200px;min-height:200px;" class="form-control" id="newsText2" aria-describedby="newsInputHelp"> </textarea>
    <div id="newsInputHelp" class="form-text" style="color:black;">Напишите текст новости.</div>
  </div>
  <div class="mb-3">
    <input type="hidden"  name="MAX_FILE_SIZE" value="30000" />
    <label for="newsImage2" style="color:black;">Прикрепите 2 изображение</label>
    <input name="newsImage2" type="file" class="form-control-file" id="newsImage2">
  </div>
 
<button type="submit" class="btn btn-primary">Опубликовать</button>
 
<br>
</form>
<button  style="margin-top:3rem;" class="btn btn-primary"><a href="index.php" style="color:white;text-decoration:none;">Назад</a></button>
<?php
if (empty($msg)) {
    $show = "visually-hidden";
} else {
    $show = "";
}
 
?>
<div class="<?php echo $show;  ?> alert alert-primary" role="alert">
  <?php
  if (!empty($msg)) {
    echo $msg;
 
  }
  ?>
</div>

</div>
</body>
</html>
 
