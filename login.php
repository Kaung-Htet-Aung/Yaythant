<?php
session_start();
if (isset($_SESSION["user"])) {
  header('Location:./client/index.php');
};

if(isset($_SESSION['admin'])){
    header(('Location:./admin/index.php'));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/login.css">
</head>
<body>
    <div class="container">
        <?php
        
        if (isset($_POST["login"])) {
           $email = $_POST["email"];
           $password = $_POST["password"];
            require_once "./client/database.php";
            $sql = "SELECT * FROM customers WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            $user = mysqli_fetch_array($result,MYSQLI_ASSOC);
            if($email=='admin@gmail.com'&& $password='admin1234'){
                session_start();
                $_SESSION["admin"] ='admin';
                header("Location:./admin/index.php");
                die();
            }
            if ($user) {
              $id=$user["cid"];
                if (password_verify($password, $user["password"])) {
                    session_start();
                    $_SESSION["user"] =$id;
                    header("Location: ./client/index.php");
                    die();
                }else{
                    echo "<div class='alert alert-danger'>Password does not match</div>";
                }
            }else{
                echo "<div class='alert alert-danger'>Email does not match</div>";
            }
        }
        ?>
      <div id="login-box1">
  <div class="left1" style="margin-top:50px">
    <h1 align="center">LOG IN</h1>
    <form action="" method="POST"> 
       <input type="email" name="email" placeholder="E-mail" />
       <input type="password" name="password" placeholder="Password" />   
      <input type="submit" name="login" value="Log In" />
    </form>
    <a href="./client/registration.php">Register Here</a>
  </div>

  
</div>
</body>
</html>
