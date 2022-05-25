<?php
session_start();
 if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: index.php");
    exit;
}
 require_once "config.php";
 $username = $password = "";
$username_err = $password_err = $login_err = "";
 if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty(trim($_POST["username"]))){
         $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }    
   
    if(empty(trim($_POST["password"]))){
         $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
        
    if(empty($username_err) && empty($password_err)){
         $sql = "SELECT id, username, password FROM users WHERE username = ?";
         if($stmt = mysqli_prepare($link, $sql)){
                      mysqli_stmt_bind_param($stmt, "s", $param_username);           
            $param_username = $username;            
             if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);  
                            if(mysqli_stmt_num_rows($stmt) == 1){   
                
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){

                        if(password_verify($password, $hashed_password)){
                                         
 session_start();
                              
                       
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                                                     
                            header("location: index.php");
                        }     
else{
                                                      $login_err = "Invalid username or password.";
                        }  

                    }
                } else{
                    
                    $login_err = "Invalid username or password.";
                }
            } else{

                echo "Oops! Something went wrong. Please try again later.";
 
            }
            mysqli_stmt_close($stmt);
 
        }
    }    
    mysqli_close($link);
 
}
        if(!empty($login_err)){
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }        
        ?>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
 
    <style>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; margin-left:40%;margin-top:13%}
    </style>
 
</head>
<body style="background-image:url(https://i.gifer.com/Bbmn.gif); background-repeat:no-repeat; background-size:cover;width:100%;">
    <div class="wrapper">
       <div class="form-group">
        <h2 style="text-align:center; color:white">Авторизация</h2>
                <label style="color:white;">Логин</label>
                <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
 
            </div>    
            <div class="form-group">
                <label  style="color:white;">Пароль</label>
                <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group" style="text-align:center;">
                <input type="submit" class="btn btn-primary" value="Войти">
 
            </div>
           <p  style="color:white;"> У тебя нет акаунта? <a href="register.php">Зарегестрироваться</a>.</p>
 
        </form>
    </div>
</body>
</html>
